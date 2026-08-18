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

Route::get('/insights/view-full-insight', function () {
    return view('pages.insights_detail.view_full_insight');
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

Route::get('/services/properties/wealth-mansion', function () {
    return view('components.detail_service_featured_project.wealth_mansion');
});
Route::get('/properties/wealth-mansion', function () {
    return view('components.detail_service_featured_project.wealth_mansion');
});

Route::get('/services/properties/uc88', function () {
    return view('components.detail_service_featured_project.uc88');
});
Route::get('/properties/uc88', function () {
    return view('components.detail_service_featured_project.uc88');
});
Route::get('/properties/uc88-residence', function () {
    return view('components.detail_service_featured_project.uc88');
});

Route::get('/services/properties/private-residential', function () {
    return view('components.detail_service_featured_project.private_residential');
});
Route::get('/properties/private-residential', function () {
    return view('components.detail_service_featured_project.private_residential');
});
Route::get('/properties/private-residential-collection', function () {
    return view('components.detail_service_featured_project.private_residential');
});

Route::get('/services/property-leasing/daily-weekly-rentals', function () {
    return view('pages.services.properties_leasing_list.daily_&_weekly_rentals');
});
Route::get('/services/properties-leasing-list/daily-weekly-rentals', function () {
    return view('pages.services.properties_leasing_list.daily_&_weekly_rentals');
});
Route::get('/services/property-leasing/daily-weekly-rentals/studio-room', function () {
    return view('pages.services.properties_leasing_list.detail_img.studio_room');
});
Route::get('/services/properties-leasing-list/detail-img/studio-room', function () {
    return view('pages.services.properties_leasing_list.detail_img.studio_room');
});

Route::get('/services/property-leasing/daily-weekly-rentals/1-bedroom', function () {
    return view('pages.services.properties_leasing_list.detail_img.studio_room');
});
Route::get('/services/properties-leasing-list/detail-img/1-bedroom', function () {
    return view('pages.services.properties_leasing_list.detail_img.studio_room');
});

Route::get('/services/property-leasing/daily-weekly-rentals/2-bedroom-with-balcony', function () {
    return view('pages.services.properties_leasing_list.detail_img.studio_room');
});
Route::get('/services/properties-leasing-list/detail-img/2-bedroom-with-balcony', function () {
    return view('pages.services.properties_leasing_list.detail_img.studio_room');
});

Route::get('/services/property-leasing/daily-weekly-rentals/3-bedroom', function () {
    return view('pages.services.properties_leasing_list.detail_img.studio_room');
});
Route::get('/services/properties-leasing-list/detail-img/3-bedroom', function () {
    return view('pages.services.properties_leasing_list.detail_img.studio_room');
});

