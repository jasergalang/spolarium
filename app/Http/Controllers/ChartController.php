<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        $userCount = User::where('roles', 'user')->count();
        $artistCount = User::where('roles', 'artist')->count();

        return view('charts.charts', ['userCount' => $userCount, 'artistCount' => $artistCount]);
    }
}
