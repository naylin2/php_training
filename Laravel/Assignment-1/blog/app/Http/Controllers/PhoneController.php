<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Phones\PhoneServiceInterface;
use App\Exports\PhonesExport;
use App\Http\Requests\CreateProductRequest;
use App\Models\Phone;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PhoneController extends Controller
{
    private $phoneInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PhoneServiceInterface $phoneServiceInterface)
    {
        $this->phoneInterface = $phoneServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = $this->phoneInterface->getPhones();

        return view('phones.index', compact('phones'))
            ->with('i');
    }
    /**
     * Display softdeleted list
     *
     * @return \Illuminate\Http\Response
     */
    public function showTrash()
    {
        $phones = $this->phoneInterface->getTrashPhones();

        return view('phones.trash', compact('phones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CreateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $validated = $request->validated();
        $this->phoneInterface->addPhone($request);

        return redirect()->route('phones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        return view('phones.show', compact('phone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(Phone $phone)
    {
        return view('phones.edit', compact('phone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProductRequest $request, Phone $phone)
    {
        $validated = $request->validated();
        $this->phoneInterface->updatePhone($request, $phone);

        return redirect()->route('phones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        $this->phoneInterface->deletePhone($phone);

        return redirect()->route('phones.index');
    }

    /**
     * Export to excel
     *
     */
    public function export()
    {
        return Excel::download(new PhonesExport, 'phones.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImport(Request $request)
    {
        $this->phoneInterface->importExcel($request);
        return back();
    }

    /**
     * @return $phones from input duration
     */
    public function searchDate(Request $request)
    {
        $phones = $this->phoneInterface->searchDate($request);
        return view('phones.index', compact('phones'))
            ->with('i');
    }
    /**
     * search name
     * @param $request
     */
    public function searchName(Request $request)
    {
        $phones = $this->phoneInterface->searchName($request);
        return view('phones.index', compact('phones'))
            ->with('i');
    }
    /**
     * search detail
     * @param $request
     */
    public function searchDetail(Request $request)
    {
        $phones = $this->phoneInterface->searchDetail($request);
        return view('phones.index', compact('phones'))
            ->with('i');
    }

}
