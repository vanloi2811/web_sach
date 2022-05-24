<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sach;
use App\Models\LoaiSach;

class UserController extends Controller
{
    public function index(){
        $sachs = Sach::paginate(5);
        $loaisachs = LoaiSach::all();
        return view('layouts.app_listsach')->with('sachs', $sachs)->with('loaisachs', $loaisachs);
    }
}
