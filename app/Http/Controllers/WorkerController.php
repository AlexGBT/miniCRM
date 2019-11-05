<?php

namespace App\Http\Controllers;

use App\Model\Worker;
use App\Repositories\WorkerRepository;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

class WorkerController extends Controller
{

    public $companyRepository;
    public $workerRepository;
    public function __construct()
    {
        $this->middleware('auth');
        $this->companyRepository = app(CompanyRepository::class);
        $this->workerRepository = app(WorkerRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        dd(__METHOD__);
    }

    public function add($companyId)
    {
        return view("worker.create", compact('companyId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
        $this->workerRepository->create($data);

        $company = $this->companyRepository->find($request->company_id);
        return view('company.show',compact('company'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker = $this->workerRepository->find($id);
        $company = $this->companyRepository->find($worker->company_id);
        $result = Worker::destroy($id);

        if ($result) {
            return redirect()->route('companies.show',$company->id)->with(['workerDeletedSuccessfully' => "Worker was deleted"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}
