<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\laptop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   

class LaptopContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laptop = laptop::all();

        return response()->json(
            [
                "status" => true,
                "message" => "Data Laptop Berhasil Di ambil",
                "data" => $laptop,
            ],
            200 /* ini digunakna untuk membeirkan status bisa atau ngngak*/
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $laptop = new laptop(); // membuat object baru degngan nama laptop

        $messages = [ // membuet pesan validasi untuk  data data yang belom diisi
            'required' => ':attribute Harus di isi',
            'name' => 'Kolom :attribute masih kosong',
            'price' => 'Kolom :attribute masih kosong',
            'type.required' => 'Kolom :attribute masih kosong',
        ];   

        $validator = Validator::make($request -> all(), [
            'name' => 'required | name',
            'price' => 'required',
            'type' => ' required | type',
        ], $messages);

        if($validator -> fails()){
            return response()->json([
                'status' => false,
                'massage' => 'Data Laptop Gagal di tambahkan',
                'erors' => $validator -> errors(),
            ], 422);
        }

        $laptop -> name = $request -> name;
        $laptop -> price = $request -> price;
        $laptop -> type = $request -> type;
        $laptop -> save();

        return response() -> json([
          'status' => true,
          'message' => 'Data Laptop Berhasil di tambahkan',
          'data' => $laptop,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataLaptop = Laptop::find($id);

        if(!$dataLaptop){
            return response() -> json([
                'Status' => false,
                "massage" => "Data Laptop Tida ditemukan",
            ], 404);
        }

        return response() -> json([
            "Status" => true,
            "massage" => "Data Laptop Ditemukan",
            "data" => $dataLaptop
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $laptop = Laptop::find($id);

        $messages = [
            'required' => 'Kolom :attribute Harus di isi',
            'name' => 'name :attribute masih kosong',
            'price' => 'price :attribute masih kosong',
            'type' => 'type :attribute masih kosong',
        ];   

        $validator = Validator::make($request -> all(), [
            'name' => 'reuired | name',
            'price' => 'reuired | price',
            'type' => 'reuired | type',
        ], $messages);

        if($validator -> fails()){
            return response()->json([
                'status' => false,
                'massage' => 'Data Laptop Gagal di tambahkan',
                'erors' => $validator -> errors(),
            ], 422);
        }

        if($laptop == null){
            return response() -> json([
                'status' => false,
                'message' => 'Data Laptop Tidak Ditemukan',
            ], 404);

        }

        $laptop -> name = $request -> name;
        $laptop -> price = $request -> price;
        $laptop -> type = $request -> type;
        $laptop -> save();

        return response() -> json([
          'status' => true,
          'message' => 'Data Laptop Berhasil di update',
          'data' => $laptop,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $laptop = Laptop::find($id);

        if($laptop == null){
            return response() -> json([
                'status' => false,
                'massage' => "Data Leptop Tidak Ditemukan"
            ], 404);
        }

        $laptop -> delete();

        return response()->json([
            "status" => true,
            "Massage" => "Data Berhasil di hapus",
            "Data" => $laptop,
        ], 201);
    }
}
