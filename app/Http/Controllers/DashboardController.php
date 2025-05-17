<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.index');
    }

    public function orders()
    {

        $orders = [];

        return view('pages.dashboard.order')->with('orders', $orders);
    }

    public function integrations()
    {
        $integrations = [];
        return view('pages.dashboard.integrations')->with('integrations', $integrations);
    }
}
