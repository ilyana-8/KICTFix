@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <div class="card shadow mb-3">
        <div class="card-header">
            Report Form
        </div>

        <div class="card-body">
            <form action="{{ route('account.submitReport') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Reporter Name</label>
                    <input class="form-control" type="text" name="name" value="{{ Auth::user()->name}}" readonly>
                </div>
                <div class="form-group mt-2">
                    <label for="id">Reporting ID</label>
                    <input class="form-control" type="text" name="reporting_id" value="{{ $reportingId }}" readonly>
                </div>

                <div class="form-group mt-2">
                    <label for="title">Report Title*</label>
                    <input class="form-control" type="text" name="title" placeholder="Report Title" value="{{ old('title') }}">
                    @error('title')
                    <small class="text-danger pl-3">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="description">Report Description*</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Report Description" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                    <small class="text-danger pl-3">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="type">Type of Report</label>
                    <select class="form-control" id="type" name="type">
                        <option value="" disabled selected>Please Select</option>
                        <option value="Air Conditioning">Air Conditioning</option>
                        <option value="Furniture">Furniture</option>
                        <option value="Internet">Internet</option>
                        <option value="Toilet(Leakage/Clogged/Others)">Toilet</option>
                        <option value="Teaching Aids">Teaching Aids</option>
                    </select>
                    @error('type')
                    <small class="text-danger pl-3">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="file">Attachment</label>
                    <input class="form-control-file" type="file" name="file" />
                    @error('file')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- succesful message -->
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" style="font-size: 0.9rem;">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <!-- button save -->
                <div class="d-flex justify-content-end mb-3">
                    <input type="hidden" name="reporting_id" value="{{ $reportingId }}">
                    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">Report</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
