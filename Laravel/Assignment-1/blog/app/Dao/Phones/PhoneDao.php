<?php
namespace App\Dao\Phones;

use App\Contracts\Dao\Phones\PhoneDaoInterface;
use App\Imports\PhonesImport;
use App\Models\Phone;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
     * To get trashphones
     * @return $phones
     */
    public function getTrashPhones()
    {
        $phones = Phone::onlyTrashed()->get();
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

    /**
     * import
     * @param $request
     */
    public function importExcel($request)
    {
        Excel::import(new PhonesImport, $request->file('file')->store('temp'));
    }

    /**
     * search date
     * @param $request
     */
    public function searchDate($request)
    {
        $start_date = Carbon::parse($request->start_date)
            ->toDateTimeString();

        $end_date = Carbon::parse($request->end_date)
            ->toDateTimeString();

        $phones = DB::table('phones')
            ->select('*')
            ->whereRaw(
                "(created_at >= ? AND created_at <= ?)",
                [
                    $start_date . " 00:00:00",
                    $end_date . " 23:59:59",
                ]
            )
            ->get();
        return $phones;
    }
    /**
     * search name
     * @param $request
     */
    public function searchName($request)
    {
        $name = $request->get('name');
        $phones = DB::table('phones')
            ->select('*')
            ->where('name', '=', $name)
            ->get();
        return $phones;
    }
    /**
     * search detail
     * @param $request
     */
    public function searchDetail($request)
    {
        $detail = $request->get('detail');
        $phones = DB::table('phones')
            ->select('*')
            ->where('detail', '=', $detail)
            ->get();

        return $phones;
    }
}
