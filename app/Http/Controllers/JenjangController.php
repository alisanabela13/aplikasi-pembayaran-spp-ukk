<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenjang;

class JenjangController extends Controller
{
    public function __construct(Jenjang $jenjang)
    {
        $this->jenjang = $jenjang;
    }

    public function index()
    {
        $jenjang = $this->jenjang->get();
        return view('jenjang.index', compact('jenjang'));
    }

    
}
