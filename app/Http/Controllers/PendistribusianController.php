<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PendistribusianController extends Controller
{
     public function index(){
        return view('dashboard.pendistribusian.index');
     }
}
