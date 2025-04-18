<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Z3d0X\FilamentFabricator\Models\Page;

class PageController extends Controller
{
    public function index() {

        $page = Page::where('slug','home')->firstOrFail();
        return view('pages.index')->with('page', $page);

    }

    public function logout() {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();

        return redirect('/');
    }
}
