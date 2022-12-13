<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\costumer;
use Alert;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costumers = costumer::orderBy('id', 'desc')->paginate(10);
        return view('admins.costumer.tampilcostumer',compact('costumers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.costumer.tambahcostumer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $costumers = costumer::create($request->all());
        
        if ($costumers) {
            Alert::success('Success', 'Data Berhasil Ditambahkan');
            return redirect()->route('costumer.index');
        } else {
            Alert::error('Error', 'Data Gagal Ditambahkan');
            return redirect()->route('costumer.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $costumers = costumer::find($id);
        return view('admins.costumer.editcostumer',compact('costumers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $costumers = costumer::find($id)->update($request->all());
        
        if ($costumers) {
            Alert::success('Success', 'Data Berhasil Diubah');
            return redirect()->route('costumer.index');
        } else {
            Alert::error('Error', 'Data Gagal Diubah');
            return redirect()->route('costumer.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $costumers = costumer::find($id)->delete();
        
        if ($costumers) {
            Alert::success('Success', 'Data Berhasil Dihapus');
            return redirect()->route('costumer.index');
        } else {
            Alert::error('Error', 'Data Gagal Dihapus');
            return redirect()->route('costumer.index');
        }
    }
}
