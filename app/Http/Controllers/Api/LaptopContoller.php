<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\laptop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LaptopContoller extends Controller
{
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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $laptop = new laptop(); // membuat object baru degngan nama laptop

        $messages = [ // membuet pesan validasi untuk  data data yang belom diisi
            'required' => ':attribute Harus di isi',
            'name' => 'Kolom :attribute masih kosong',
            'price' => 'Kolom :attribute masih kosong',
            'type' => 'Kolom :attribute masih kosong',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'type' => ' required',
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'massage' => 'Data Laptop Gagal di tambahkan',
                'erors' => $validator->errors(),
            ], 422);
        }

        $laptop->name = $request->name;
        $laptop->price = $request->price;
        $laptop->type = $request->type;
        $laptop->save();

        return response()->json([
            'status' => true,
            'message' => 'Data Laptop Berhasil di tambahkan',
            'data' => $laptop,
        ], 201);
    }

    public function show(string $id)
    {
        $dataLaptop = Laptop::find($id);

        if (!$dataLaptop) {
            return response()->json([
                'Status' => false,
                "massage" => "Data Laptop Tida ditemukan",
            ], 404);
        }

        return response()->json([
            "Status" => true,
            "massage" => "Data Laptop Ditemukan",
            "data" => $dataLaptop
        ], 200);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $laptop = Laptop::find($id);

        $messages = [
            'required' => 'Kolom :attribute Harus di isi', // field ini sudah ada dan sudah sesuai dengan apa yang ada seperti string, email, number, required, size, min dkk
            //relasi di laravel
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'type' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'massage' => 'Data Laptop Gagal di tambahkan',
                'erors' => $validator->errors(),
            ], 422);
        }

        if ($laptop == null) {
            return response()->json([
                'status' => false,
                'message' => 'Data Laptop Tidak Ditemukan',
            ], 404);
        }

        $laptop->name = $request->name;
        $laptop->price = $request->price;
        $laptop->type = $request->type;
        $laptop->save();

        return response()->json([
            'status' => true,
            'message' => 'Data Laptop Berhasil di update',
            'data' => $laptop,
        ], 201);
    }

    public function destroy(string $id)
    {
        $laptop = Laptop::find($id);

        if ($laptop == null) {
            return response()->json([
                'status' => false,
                'massage' => "Data Leptop Tidak Ditemukan"
            ], 404);
        }

        $laptop->delete();

        return response()->json([
            "status" => true,
            "Massage" => "Data Berhasil di hapus",
            "Data" => $laptop,
        ], 201);
    }


    public function showLaptops()
    {
        $laptop = Laptop::all();

        return view("laptop", [
            "laptop" => $laptop
        ]);
    }
}
