<?php

use App\Models\Location;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $districts = Location::pluck('district', 'district');
    return view('front', compact('districts'));
});
