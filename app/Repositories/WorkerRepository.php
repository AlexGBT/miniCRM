<?php


namespace App\Repositories;

use App\Model\Worker;

class WorkerRepository extends BaseRepository
{
    public $model;
    public function getModel()
    {
        return Worker::class;
    }

 }