<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Http\Requests\StoreOutletRequest;
use App\Http\Requests\UpdateOutletRequest;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.outlets.index', [
            'outlets' => Outlet::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.outlets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOutletRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOutletRequest $request)
    {
        $validatedData = $request->validate([
            'KdOutlet' => 'required|max:8',
            'NmOutlet' => 'required|max:100',
            'Alamat' => 'required|max:200',
        ]);

        $validatedData['Aktif'] = 0;

        if($request->input('Aktif')){
            $validatedData['Aktif'] = 1;
        }

        Outlet::create($validatedData);

        return redirect('outlets')->with('success', 'Outlet baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit(Outlet $outlet)
    {
        return view('dashboard.outlets.edit', [
            'outlet' => $outlet
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOutletRequest  $request
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOutletRequest $request, Outlet $outlet)
    {
        $rules = [
            'KdOutlet' => 'required|max:5',
            'NmOutlet' => 'required|max:100',
            'Alamat' => 'required|max:200'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['Aktif'] = 0;

        if($request->input('Aktif')){
            $validatedData['Aktif'] = 1;
        }

        Outlet::where('KdOutlet', $outlet->KdOutlet)
            ->update($validatedData);
        
        return redirect('/outlets')->with('success', 'Outlet telah di update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlet $outlet)
    {
        Outlet::destroy($outlet->id);

        return redirect('/outlets')->with('success', 'Outlet telah dihapus!');
    }
}
