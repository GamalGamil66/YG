<?php

namespace App\Repository;

interface ManagerRepositoryInterface{

    // get all Teachers
    public function getAllManager();

    // Get directorates
    public function GetDirectorates();

    // StoreTeachers
    public function StoreManager($request);

    // StoreTeachers
    public function editManager($id);

    // UpdateTeachers
    public function UpdateManager($request);

    // DeleteTeachers
    public function DeleteManager($request);

}


