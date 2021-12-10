<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => 'logout']);

    }

     public function question()
    {
        return view('question.index');
    }

    


}
