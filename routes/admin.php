<?php

// :TODO: Add the admin routes here

\Illuminate\Support\Facades\Route::get('/', function () {
    return \Inertia\Inertia::render('Admin/Dashboard/Index');
})->name('admin');