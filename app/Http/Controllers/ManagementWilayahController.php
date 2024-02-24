<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Wilayah;
use App\Models\Wisma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable;

class ManagementWilayahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $area = Area::all();
        $wilayah = Area::with('wilayah')->get();
        return view('management.wilayah.index',compact('area','wilayah'));
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

    public function dataArea(){

        $area = Area::select('nama')->get();

        $no = 0;
        $data = array();

        foreach($area as $list){

            $row = array();
            $row[] = $list->nama;
            $row[] = '<button class="btn-sm btn-danger">Delete</button>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }

    public function createWilayah(Request $request){

        $checkData = Wilayah::where('nama',$request->wilayah)->where('id_area',$request->areaId)->first();
        if($checkData != null){
            return response()->json(['status' => false,'message' => 'Wilayah Sudah Terdaftar'],500);
        }

        $wilayah = new Wilayah();
        $wilayah->id_area = $request->areaId;
        $wilayah->nama = $request->wilayah;
        $wilayah->save();

        return response()->json(['status' => true,'message' => 'Berhasil Menambahkan Wilayah'],200);

    }

    public function dataWilayah(){

        $wilayah = Wilayah::select('wilayahs.*','areas.nama as nama_area')->leftJoin('areas','areas.id','wilayahs.id_area')->get();

        $no = 0;
        $data = array();

        foreach($wilayah as $list){

            $row = array();
            $row[] = $list->nama_area;
            $row[] = $list->nama;
            $row[] = '<button class="btn-sm btn-danger">Delete</button>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }

    public function dataWisma(){

        $wilayah = Wisma::select('wismas.*','areas.nama as nama_area','wilayahs.nama as nama_wilayah')
        ->leftJoin('wilayahs','wilayahs.id','wismas.id_wilayah')
        ->leftJoin('areas','areas.id','wilayahs.id_area')->get();

        $no = 0;
        $data = array();

        foreach($wilayah as $list){

            $row = array();
            $row[] = $list->nama_area;
            $row[] = $list->nama_wilayah;
            $row[] = $list->nama;
            $row[] = '<button class="btn-sm btn-danger">Delete</button>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }

    public function createWisma(Request $request){

        $checkData = Wisma::where('nama',$request->wisma)->where('id_wilayah',$request->wilayahId)->first();
        if($checkData != null){
            return response()->json(['status' => false,'message' => 'Wisma Sudah Terdaftar'],500);
        }

        $wilayah = new Wisma();
        $wilayah->id_wilayah = $request->wilayahId;
        $wilayah->nama = $request->wisma;
        $wilayah->save();

        return response()->json(['status' => true,'message' => 'Berhasil Menambahkan Wisma'],200);
    }
}
