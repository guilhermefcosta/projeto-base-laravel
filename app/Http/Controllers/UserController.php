<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function show() {
        // return View('user.profile', [
        //     'usuario' => 'aranha'
        // ]);
        $filmes = DB::select('select * from filmes');
        // $array = json_decode(json_encode($filmes), true);
        // dd($array);die
        return response()->json($filmes);
    }
}
