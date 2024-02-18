<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class ManagementWilayahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('management.wilayah.index');
    }

    public function createArea(Request $request){

        $checkData = Area::where('nama',$request->area)->first();
        if($checkData != null){
            return response()->json(['status' => false,'message' => 'Area Sudah Terdaftar'],500);
        }

        $area = new Area();
        $area->nama = $request->area;
        $area->save();

            return response()->json(['status' => true,'message' => 'Berhasil Menambahkan Area'],200);

    }
}
