<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppsController extends Controller
{
    // invoice list App
    public function invoice_list()
    {
        $pageConfigs = ['pageHeader' => false];

        return view('/content/apps/invoice/app-invoice-list', ['pageConfigs' => $pageConfigs]);
    }

    // invoice preview App
    public function invoice_preview()
    {
        $pageConfigs = ['pageHeader' => false];

        return view('/content/apps/invoice/app-invoice-preview', ['pageConfigs' => $pageConfigs]);
    }

    // invoice edit App
    public function invoice_edit()
    {
        $pageConfigs = ['pageHeader' => false];

        return view('/content/apps/invoice/app-invoice-edit', ['pageConfigs' => $pageConfigs]);
    }

    // invoice edit App
    public function invoice_add()
    {
        $pageConfigs = ['pageHeader' => false];

        return view('/content/apps/invoice/app-invoice-add', ['pageConfigs' => $pageConfigs]);
    }

    // invoice print App
    public function invoice_print()
    {
        $pageConfigs = ['pageHeader' => false];

        return view('/content/apps/invoice/app-invoice-print', ['pageConfigs' => $pageConfigs]);
    }

    // User List Page
    public function user_list()
    {
        $pageConfigs = ['pageHeader' => false];
        return view('/content/apps/user/app-user-list', ['pageConfigs' => $pageConfigs]);
    }

    // User Account Page
    public function user_view_account()
    {
        $pageConfigs = ['pageHeader' => false];
        return view('/content/apps/user/app-user-view-account', ['pageConfigs' => $pageConfigs]);
    }

    // User Security Page
    public function user_view_security()
    {
        $pageConfigs = ['pageHeader' => false];
        return view('/content/apps/user/app-user-view-security', ['pageConfigs' => $pageConfigs]);
    }

    // User Billing and Plans Page
    public function user_view_billing()
    {
        $pageConfigs = ['pageHeader' => false];
        return view('/content/apps/user/app-user-view-billing', ['pageConfigs' => $pageConfigs]);
    }

    // User Notification Page
    public function user_view_notifications()
    {
        $pageConfigs = ['pageHeader' => false];
        return view('/content/apps/user/app-user-view-notifications', ['pageConfigs' => $pageConfigs]);
    }

    // User Connections Page
    public function user_view_connections()
    {
        $pageConfigs = ['pageHeader' => false];
        return view('/content/apps/user/app-user-view-connections', ['pageConfigs' => $pageConfigs]);
    }


}
