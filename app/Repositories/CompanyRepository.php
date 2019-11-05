<?php

namespace App\Repositories;

use App\Model\Company;
use App\Model\Worker;

class CompanyRepository extends BaseRepository {
    public $model;
    public function getModel()
    {
        return Company::class;
    }

    public function getForShowing($id) {
        $columns = [
            'id',
            'user_id',
            'name',
            'email',
            'phone',
            'email',
            'website',
            'logo',
        ];
        return $this->startConditions()->select($columns)->with(['user:id','workers:id,first_name,last_name,phone,email'])->first($id);
    }

    public function destroyCompanyWithWorkers($id) {
        $company = $this->startConditions()->find($id);
        $deletedWorkersIds = [];
        foreach ($company->workers as $worker) {
            $deletedWorkersIds[] = $worker->id;
            Worker::destroy($worker->id);
        }
        $result = Company::destroy($id);
//      $result = Company::find($id)->forceDelete(); // удаляется из базы полностью
        return [ 'result' => $result, 'deletedWorkersIds' =>$deletedWorkersIds] ;
    }

    public function restoreCompanyWithWorkers($id,$workersString) {
        $workers = explode('worker',$workersString);
        Company::onlyTrashed()->where('id', $id)->restore();
         foreach ($workers as $workerId) {
            Worker::onlyTrashed()->where('id', $workerId)->restore();
        }

    }

}