<?php

namespace App\Contracts\Dao\Phones;

use Illuminate\Http\Request;

interface PhoneDaoInterface
{
    /**
     * To get phones
     * @return $phones
     */
    public function getPhones();

    /**
     * To get trashphones
     * @return $phones
     */
    public function getTrashPhones();

    /**
     * Add new phone
     * @param $request
     */
    public function addPhone($request);

    /**
     * update
     * @param $request, $phone
     */
    public function updatePhone($request, $phone);

    /**
     * delete
     * @param $phone
     */
    public function deletePhone($phone);
}
