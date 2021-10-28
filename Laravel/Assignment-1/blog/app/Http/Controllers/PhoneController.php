<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Phones\PhoneServiceInterface;
use App\Http\Requests\CreateProductRequest;
use App\Models\Phone;
use Illuminate\Http\Request;

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
            ->with('i', (request()->input('page', 1) - 1) * 10);
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
}
