<?php

namespace App\Http\Controllers\technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function list()
    {
        // Fetch all reports from the database
        $user = Auth::guard('technician')->user();
        $reports = $user->reports;
        $title = "List of report";

        // Pass the reports data to the view
        return view('technician.manageReport', ['reports' => $reports, 'title' => $title]);
    }

    public function detail()
    {
        // Find the report by ID
        $user = Auth::guard('technician')->user();
        $title = "Report Detail";

        // Pass the report data to the view
        return view('technician.reportDetail', [ 'title' => $title,]);
    }

    public function status()
    {
        // Find the report by ID
        $user = Auth::guard('technician')->user();
        $title = "Report Status";

        // Pass the report data to the view
        return view('technician.reportStatus', [ 'title' => $title,]);
    }
}
