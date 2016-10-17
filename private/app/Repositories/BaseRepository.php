<?php

namespace App\Repositories;

abstract class BaseRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Destroy a model.
     *
     * @param  int $id
     * @return void
     */
    public function destroy($id)
    {
        $this->getById($id)->delete();
    }

    /**
     * Get Model by id.
     *
     * @param  int  $id
     * @return \App\Models\Model
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Get Model by id.
     *
     * @param  int  $id
     * @return \App\Models\Model
     */
    public function getByPid($pId)
    {
        return $this->model->where('pId', $pId)->get();;
    }
    
    public function paginateByPid($pId, $pageSize)
    {
        return $this->model->where('pId', $pId)->paginate($pageSize);
    }
    
    public function paginate($pageSize)
    {
        return $this->model->paginate($pageSize);
    }
    
    public function getAll()
    {
        return $this->model->all();
    }
    
    public function getActive($n=null)
    {
        if($n){
            return $this->model
                    ->whereActive(true)
                    ->orderBy('ind', 'asc')
                    ->paginate($n);
        }
        else{ 
            return $this->model
                    ->whereActive(true)
                    ->orderBy('ind', 'asc')
                    ->get();

        }
    }
}
