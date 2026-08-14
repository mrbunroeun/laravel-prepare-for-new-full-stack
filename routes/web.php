<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about-us', function () {
    return view('pages.about_us');
});

Route::get('/latest-activities', function () {
    return view('pages.latest_activities');
});

Route::get('/products', function () {
    return view('pages.products');
});

Route::get('/insights', function () {
    return view('pages.insights');
});

Route::get('/services/property-management', function () {
    return view('pages.services.property_management');
});

Route::get('/services/property-sales', function () {
    return view('pages.services.property_sales');
});
