<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyUpdateRequest;
use App\Repositories\CompanyRepository;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompanyCreateRequest;

class CompanyController extends Controller
{
    public $companyRepository;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('company.create',['only' => 'store']);
        $this->middleware('company.update',['only' => 'update']);
        $this->companyRepository = app(CompanyRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $paginator = $this->companyRepository->paginated(7);
        return view('company.index',compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyCreateRequest $request)
    {
        $data = $request->input();
        Storage::disk('public')->putFileAs('companies',$request->file('logo'),$data['logo']);
        $this->companyRepository->create($data);
        return redirect('companies')->withInput();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $company = $this->companyRepository->find($id);
         return view('company.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->companyRepository->find($id);
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request, $id)
    {
        $item = $this->companyRepository->find($id);
        $data = $request->all();
        $result = $item->fill($data)->save();
        if ($result) {
            return redirect()->route('companies.show',$item->id)->with(['successChanged' => 'Успешно изменено']);
        } else {
            return back()->withErrors(['msg' => ' Ошибка Сохранения'])->withInputs();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $result = $this->companyRepository->destroyCompanyWithWorkers($id);
       if ($result['result']) {
            return redirect()->route('companies.index')->with(['deletedSuccessfully' => "Company was deleted",'companyId' => $id,'deletedWorkersIds' => $result['deletedWorkersIds']]);
       } else {
           return back()->withErrors(['msg' => 'Ошибка удаления']);
       }
    }

    public function restore($id,$workers)
    {
        $result = $this->companyRepository->restoreCompanyWithWorkers($id,$workers);
        return redirect()->route('companies.show',$id)->with(['restoredSuccessfully' => "Company was restored"]);
    }
}