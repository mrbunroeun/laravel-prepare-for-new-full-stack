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

Route::get('/events', function () {
    return view('pages.events');
});

Route::get('/contact-us', function () {
    return view('pages.contact_us');
});

Route::get('/properties', function () {
    return view('pages.properties');
});

Route::get('/partners', function () {
    return view('pages.partner');
});

Route::get('/partner', function () {
    return view('pages.partner');
});

Route::get('/services/property-management', function () {
    return view('pages.services.property_management');
});

Route::get('/services/property-sales', function () {
    return view('pages.services.property_sales');
});

Route::get('/services/property-leasing', function () {
    return view('pages.services.property_leasing');
});

Route::get('/services/hospitality-services', function () {
    return view('pages.services.hospitality_services');
});

Route::get('services/properties/wealth-mansion', function () {
    return view('components.detail_service_featured_project.wealth_mansion');
});
// not yet

Route::get('services/properties/uc88', function () {
    return view('components.detail_service_featured_project.uc88');
});

Route::get('services/properties/private-residential', function () {
    return view('components.detail_service_featured_project.private_residential');
});
