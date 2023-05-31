<?php

namespace App\Repository;

interface DeliveryRepositoryInterface{

    // get all Teachers
    public function getAllDeliveryMan();
    
    // StoreTeachers
    public function StoreDeliveryMan($request);

    // StoreTeachers
    public function editDeliveryMan($id);

    // UpdateTeachers
    public function UpdateDeliveryMan($request);

    // DeleteTeachers
    public function DeleteDeliveryMan($request);

}


