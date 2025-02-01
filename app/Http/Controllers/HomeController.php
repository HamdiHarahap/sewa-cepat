<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::orderBy('id', 'asc')->get();
        return view('home', compact('cars'));
    }

    public function booking()
    {
        $cars = Car::where('status', 'tersedia')->get();
        return view('pages.booking', compact('cars'));
    }
}
