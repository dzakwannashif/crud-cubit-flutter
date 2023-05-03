<?php

namespace App\Http\Controllers\Controller;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function index()
    {
        $anggota = Anggota::latest()->get();

        return response()->json([
            'status' => true,
            'data' => $anggota,
            'message' => 'Data berhasil di tampilkan'
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $rules = [
            'name' => 'required',
            'price' => 'required',
        ];

        $validator = Validator::make($input, $rules);
        if (!$validator) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ]);
        }
        $anggota = Anggota::create($input);

        return response()->json([
            'status' => true,
            'data' => $anggota
        ]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $rules = [
            'name' => 'required',
            'price' => 'required',
        ];

        $validator = Validator::make($input, $rules);
        if (!$validator) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ]);
        }

        $anggota = Anggota::find($id);
        if (!$anggota) {
            return response()->json([
                'status' => false,
                'message' => 'data tidak ditemukan',
            ]);
        }

        $anggota->update($input);

        return response()->json([
            'status' => true,
            'data' => $anggota
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $input = $request->all();

        $rules = [
            'name' => 'required',
            'price' => 'required',
        ];

        $validator = Validator::make($input, $rules);
        if (!$validator) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ]);
        }

        $anggota = Anggota::find($id);
        if (!$anggota) {
            return response()->json([
                'status' => false,
                'message' => 'id tidak ditemukan',
            ]);
        }

        $anggota->delete();
        return response()->json([
            'status' => true,
            'message' => 'data telah berhasil di hapus',
        ]);
    }
}
