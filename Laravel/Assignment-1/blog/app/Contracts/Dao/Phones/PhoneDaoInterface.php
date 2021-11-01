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

    /**
     * import
     * @param $request
     */
    public function importExcel($request);
    /**
     * search date
     * @param $request
     */
    public function searchDate($request);
    /**
     * search name
     * @param $request
     */
    public function searchName($request);
    /**
     * search detail
     * @param $request
     */
    public function searchDetail($request);
}
