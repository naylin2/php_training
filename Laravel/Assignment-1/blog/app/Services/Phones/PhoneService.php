<?php

namespace App\Services\Phones;

use App\Contracts\Dao\Phones\PhoneDaoInterface;
use App\Contracts\Services\Phones\PhoneServiceInterface;

class PhoneService implements PhoneServiceInterface
{

    /**
     * phone dao
     */
    private $phoneDao;
    /**
     * Class Constructor
     * @param PhoneDaoInterface
     * @return
     */
    public function __construct(PhoneDaoInterface $phoneDao)
    {
        $this->phoneDao = $phoneDao;
    }

    /**
     * To get phones
     * @return $phones
     */
    public function getPhones()
    {
        return $this->phoneDao->getPhones();
    }

    /**
     * To get trashphones
     * @return $phones
     */
    public function getTrashPhones()
    {
        return $this->phoneDao->getTrashPhones();
    }


    /**
     * Add new phone
     * @param $request
     */
    public function addPhone($request)
    {
        $this->phoneDao->addPhone($request);
    }

    
    /**
     * update
     * @param $request, $phone
     */
    public function updatePhone($request, $phone)
    {
        $this->phoneDao->updatePhone($request, $phone);
    }
    
    
    /**
     * delete
     * @param $phone
     */
    public function deletePhone($phone)
    {
        $this->phoneDao->deletePhone($phone);
    }
    
    /**
     * import Excel
     * @param $request
     */
    public function importExcel($request)
    {
        $this->phoneDao->importExcel($request);
    }
    /**
     * search date
     * @param $request
     */
    public function searchDate($request)
    {
        $phones = $this->phoneDao->searchDate($request);
        return $phones;
    }
    /**
     * search name
     * @param $request
     */
    public function searchName($request)
    {
        $phones = $this->phoneDao->searchName($request);
        return $phones;
    }
    /**
     * search detail
     * @param $request
     */
    public function searchDetail($request)
    {
        $phones = $this->phoneDao->searchDetail($request);
        return $phones;
    }
}
