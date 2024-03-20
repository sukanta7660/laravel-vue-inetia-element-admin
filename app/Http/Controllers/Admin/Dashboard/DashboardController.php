<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Admin/Dashboard/Index');
    }
}
