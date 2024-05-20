@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <div class="card shadow mb-3">
        <div class="card-header">
            Report Information
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mt-0">
                        <label for="reporter_name">Reporter Name</label>
                        <input class="form-control" type="text" id="reporter_name" value="{{ $report->name }}" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mt-0">
                        <label for="reporting_id">Reporting ID</label>
                        <input class="form-control" type="text" id="reporting_id" value="{{ $report->reporting_id }}" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mt-0">
                        <label for="report_date">Date</label>
                        <input class="form-control" type="text" id="report_date" value="{{ $report->created_at }}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-0">
                        <label for="report_title">Report Title</label>
                        <input class="form-control" type="text" id="report_title" value="{{ $report->title }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-0">
                        <label for="report_type">Report Type</label>
                        <input class="form-control" type="text" id="report_type" value="{{ $report->type }}" readonly>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="report_description">Report Description</label>
                <textarea class="form-control" id="report_description" rows="3" readonly>{{ $report->description }}</textarea>
            </div>
            <div class="form-group mt-3">
                <label for="attachment">Attachment</label>
                @if($report->attachment)
                    <a href="{{ asset('storage/' . $report->attachment) }}" target="_blank" class="btn btn-primary">Download Attachment</a>
                @else
                    <span>No attachment available</span>
                @endif
            </div>
            <div class="form-group mt-3">
                <label for="final_status_remark">Final Status Remark</label>
                <input class="form-control" type="text" id="final_status_remark" value="{{ $report->final_status_remark }}" readonly>
            </div>
            <div class="form-group mt-3">
                <label for="technician_picture">Technician Picture</label>
                <img src="{{ asset('storage/' . $report->technician_picture) }}" alt="Technician Picture" style="max-width: 200px;">
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('account.reportHistory') }}" class="btn btn-primary">Exit</a>
    </div>
</div>
@endsection
