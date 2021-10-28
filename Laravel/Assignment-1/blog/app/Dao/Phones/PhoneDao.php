<?php
namespace App\Dao\Phones;

use App\Contracts\Dao\Phones\PhoneDaoInterface;
use App\Models\Phone;

class PhoneDao implements PhoneDaoInterface
{
    /**
     * To get phones
     * @return $phones
     */
    public function getPhones()
    {
        $phones = Phone::latest()->paginate(10);
        return $phones;
    }

    /**
     * Add new phone
     * @param $request
     */
    public function addPhone($request)
    {
        Phone::create($request->all());
    }

    /**
     * update
     * @param $request, $phone
     */
    public function updatePhone($request, $phone)
    {
        $phone->update($request->all());
    }

    /**
     * delete
     * @param $phone
     */
    public function deletePhone($phone)
    {
        $phone->delete();
    }
}
