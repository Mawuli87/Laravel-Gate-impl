<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class DashBoardController extends Controller
{
    //
    function index(){
        return view('dashboard.index');
    }
}
