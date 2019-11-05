<?php
namespace App\Repositories;

abstract class BaseRepository
{
    public $model;

    public function __construct()
    {
        $this->model = app($this->getModel());
    }

    protected function startConditions()
    {
        return clone $this->model;
    }

    abstract public function getModel();

    public function all()
    {
        return $this->model
            ->orderBy($this->sortBy, $this->sortOrder)
            ->get();
    }

    public function paginated($paginate)
    {
        return $this->model->orderBy('id', 'DESC')->paginate($paginate);
    }

    public function create($input)
    {
        $model = $this->model;
        $model->fill($input);
        $model->save();

        return $model;
    }

    public function find($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function destroy($id)
    {
        return $this->find($id)->delete();
    }

    public function update($id, array $input)
    {
        $model = $this->find($id);
        $model->fill($input);
        $model->save();

        return $model;
    }


}