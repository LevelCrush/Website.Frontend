<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function showDestiny() {
        return view('tools.destiny');
    }
}
