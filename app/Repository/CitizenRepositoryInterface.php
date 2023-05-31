<?php

namespace App\Repository;

interface CitizenRepositoryInterface{

    // get all Teachers
    public function getAllCitizen();

    // Get Delegates
    public function GetDelegates();

    // StoreTeachers
    public function StoreCitizen($request);

    // StoreTeachers
    public function editCitizen($id);

    // UpdateTeachers
    public function UpdateCitizen($request);

    // DeleteTeachers
    public function DeleteCitizen($request);

}


