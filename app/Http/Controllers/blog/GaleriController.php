<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        return view('blogpages.galeri');
    }
}
