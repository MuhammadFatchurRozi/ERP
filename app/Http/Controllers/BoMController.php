<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bom;
use App\Models\product;
use DB;

class BoMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boms = bom::latest()->paginate(8);
        return view('admins.bom.tampilbom', compact('boms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = product::all();
        return view('admins.bom.tambahbom',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    //Ajax for table Nama
    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('products')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dependent . '" name="nama" selected>' . ucfirst($row->$dependent) . '</option>';
        }
        echo $output;
    }

    // //Ajax for table ukuran
    // function fetch1(Request $request)
    // {
    //     $select = $request->get('select');
    //     $value = $request->get('value');
    //     $dynamic = $request->get('dynamic');
    //     $data = DB::table('products')
    //         ->where($select, $value)
    //         ->groupBy($dynamic)
    //         ->get();
    //     foreach ($data as $row) {
    //         $output = '<option value="' . $row->$dynamic . '" name="ukuran" selected>' . ucfirst($row->$dynamic) . '</option>';
    //     }
    //     echo $output;
    // }
}
