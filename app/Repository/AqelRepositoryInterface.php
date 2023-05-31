<?php

namespace App\Repository;

interface AqelRepositoryInterface{

    // get all Teachers
    public function getAllAqel();

    // Get Neighborhoods
    public function GetNeighborhoods();

    // StoreTeachers
    public function StoreAqel($request);

    // StoreTeachers
    public function editAqel($id);

    // UpdateTeachers
    public function UpdateAqel($request);

    // DeleteTeachers
    public function DeleteAqel($request);

}


