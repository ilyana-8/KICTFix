@extends('layouts.technician')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <div class="card shadow mb-3">
        <div class="card-header">
            Report Information
        </div>
        <div class="card-body">
                <div class="col-md-0">
                    <div class="form-group mt-8">
                        <label for="id">Reporting ID</label>
                        <input class="form-control" type="text" name="reporting_id" readonly>
                    </div>

                    <div class="form-group mt-2">
                        <label for="type">Status</label>
                        <select class="form-control" id="type" name="type">
                            <option value="" disabled selected>Please Select</option>
                            <option value="Air Conditioning">Not Process Yet</option>
                            <option value="Furniture">In Progress</option>
                            <option value="Internet">Done</option>
                        </select>
                        @error('status')
                        <small class="text-danger pl-3">{{ $message }}</small>
                         @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="description">Remark</label>
                    <textarea class="form-control" id="remark" name="remark" placeholder="Remark" rows="3">{{ old('remark') }}</textarea>
                    @error('remark')
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
                </div>
            </div>
            <div class="d-flex justify-content-end mb-3">
                    <form action="{{ route('technician.reportDetail') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Your form fields -->
                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">Submit</button>
                    </form>
            </div>
        </div>



        @endsection
