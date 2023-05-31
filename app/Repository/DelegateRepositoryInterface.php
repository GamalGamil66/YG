<?php

namespace App\Repository;

interface DelegateRepositoryInterface{

    // get all Teachers
    public function getAllDelegate();

    // Get Aqels
    public function GetAqels();

    // StoreTeachers
    public function StoreDelegate($request);

    // StoreTeachers
    public function editDelegate($id);

    // UpdateTeachers
    public function UpdateDelegate($request);

    // DeleteTeachers
    public function DeleteDelegate($request);

}


