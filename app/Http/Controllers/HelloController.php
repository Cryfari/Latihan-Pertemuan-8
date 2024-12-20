<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    function hello() {
        return response()->json([
            'data'=> 'Hello World!',
            'nama'=> 'Pahrijal',
            ]);
    }

    function nama(Request $request) {
        $request->validate([
            'nama'=>'required|min:5|max:10'
        ],
        [
            'nama.required'=>'Nama harus diisi',
            'nama.min'=>'nama harus setidaknya 5 karakter',
            'nama.max' => 'nama harus kurang dari 10 karakter'
        ]
    );
        $data = $request->nama;
        return response()->json([
            'nama'=> $data,
            ])->setStatusCode(201);
    }
}
