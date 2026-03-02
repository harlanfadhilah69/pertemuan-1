<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function about()
    {
        $data = [
            'nama' => 'Harlan Fadhilah',
            'nim' => '20230140009',
            'prodi' => 'Teknologi Informasi',
            'hobi' => 'Hiking & Traveling'
        ];
        return view('about', $data);
    }
}