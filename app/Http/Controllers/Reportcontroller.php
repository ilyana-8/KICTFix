<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;


class reportcontroller extends Controller
{
    //newReport
    public function newReport()
    {
        // Generate a unique reporting ID using UUID
        $reportingId = time();

        $title = "New Report";

        return view('newReport', compact('title','reportingId'));

    }

    public function submitReport(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'reporting_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048'
            // Add validation rules for other fields
        ]);

        // Create a new report instance
        $report = new Report();
        $report->user_id = Auth::user()->id;
        $report->name = $request->name;
        $report->reporting_id = $request->reporting_id;
        $report->title = $request->title;
        $report->description = $request->description;
        $report->type = $request->type;


        // Handle file upload
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('attachments', 'public');
            $report->attachment = $filePath;
        }

        // Save the report to the database
        $report->save();

        // Optionally, you can redirect the user after saving the report
        return redirect()->route('account.newReport')->with('success', 'Report submitted successfully!');
    }

    public function history()
    {
        // Fetch all reports from the database
        $user = Auth::user();
        $reports = $user->reports;
        $title = "Report History";

        // Pass the reports data to the view
        return view('reportHistory', ['reports' => $reports, 'title' => $title]);
    }

    public function detail($id)
    {
        // Find the report by ID
        $report = Report::findOrFail($id);
        $title = "Report Detail";

        // Pass the report data to the view
        return view('reportDetail', ['report' => $report , 'title' => $title, 'user' => auth()->user()]);
    }

}
