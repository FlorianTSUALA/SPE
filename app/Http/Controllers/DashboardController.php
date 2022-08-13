<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  // Dashboard - Analytics
  public function dashboardAdmin()
  {
    $pageConfigs = ['pageHeader' => false];

    return view('/content/dashboard/dashboard-admin', ['pageConfigs' => $pageConfigs]);
  }

}
