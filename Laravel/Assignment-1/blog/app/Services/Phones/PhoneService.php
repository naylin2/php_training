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
}
