<?php

namespace App\Repositories\User;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\User;

class UserRepositoryImplement extends Eloquent implements UserRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index(){
        return 1;
    }

   public function getAll()
   {
    return 1;
   }

   public function store($request){
    return $request;
    }

   public function detail($request){
    return $request;
    }

    public function like($request){
        return $request;
    }

    public function unlike($request){
        return $request;
    }

    // Write something awesome :)
}
