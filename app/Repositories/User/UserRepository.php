<?php

namespace App\Repositories\User;

use LaravelEasyRepository\Repository;

interface UserRepository extends Repository{

    // Write something awesome :)
    public function index();
    public function getAll();
    public function store($request);
    public function detail($request);
    public function like($request);
    public function unlike($request);


}
