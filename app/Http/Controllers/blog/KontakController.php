<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        return view('blogpages.kontak');
    }
}
