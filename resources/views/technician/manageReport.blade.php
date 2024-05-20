
@extends('layouts.technician')

@section('content')
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<div class="container">
        <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>
        <div class="col-md-12">
            {{ session('message') }}

    <div class="container-fluid">
    <table class="table">
        <thead>
            <tr class="table-header-row">
                <th style="width: 20%;">Reporting ID</th>
                <th style="width: 20%;">Report Date</th>
                <th style="width: 20%;">Complain Name</th>
                <th style="width: 20%;">Status</th>
                <th style="width: 20%;">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1714762163</td>
                <td>2024-05-03</td>
                <td>Che Ku Harraz</td>
                <td><span style="background-color: red; color: white;">Not Process Yet</span></td>
                <td><a href="{{ route('technician.reportDetail') }}" class="btn btn-primary">View Detail</a></td>
            </tr>
            @foreach($reports as $report)
            <tr>
                <td>{{ $report->reporting_id }}</td>
                <td>{{ $report->created_at->format('Y-m-d') }}</td>
                <td>
                    @if($report->status === 'Not Process Yet')
                    <span style="color: red;">{{ $report->status }}</span>
                    @elseif($report->status === 'In Progress')
                    <span style="color: green;">{{ $report->status }}</span>
                    @else
                    <span style="color: darkblue;">{{ $report->status }}</span>
                    @endif
                </td>
                <td><a href="{{ route('technician.reportDetail') }}" class="btn btn-info">View Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
