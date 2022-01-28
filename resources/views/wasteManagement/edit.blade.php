@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__("Update Waste Management Person's Information")}}</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <form role="form" id="editForm" action="{{route('wasteManagement.update', $data->slug)}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">{{__('Full Name')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="name" name="name"
                                                   value="{{ old('name', $data->name) }}"
                                                   required>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone_number" class="col-sm-3 col-form-label">{{__('Phone Number')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                                   value="{{ old('phone_number', $data->phone_number) }}" required>
                                            @if ($errors->has('phone_number'))
                                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="contractual_period" class="col-sm-3 col-form-label">{{__('Contractual Period')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="contractual_period" name="contractual_period"
                                                   value="{{ old('contractual_period', $data->contractual_period) }}" required>
                                            @if ($errors->has('contractual_period'))
                                                <span class="text-danger">{{ $errors->first('contractual_period') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="job_type" class="col-sm-3 col-form-label">{{__('Job Type')}}</label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="temporary">
                                                    <input type="radio" id="job_type" name="job_type"
                                                           value="temporary" {{ ($data->job_type === "temporary") ? "checked" : ""}}>
                                                    <span class="mr-sm-2 mt-0">{{__('Temporary')}}</span>
                                                </label>
                                                <label for="permanent">
                                                    <input type="radio" id="job_type" name="job_type"
                                                           value="permanent" {{ ($data->job_type === "permanent") ? "checked" : ""}}>
                                                    <span class="mr-sm-2">{{__('Permanent')}}</span>
                                                </label>
                                                @if ($errors->has('job_type'))
                                                    <span class="text-danger">{{ $errors->first('job_type') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="salary" class="col-sm-3 col-form-label">{{__('Salary')}}</label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control" id="salary" name="salary"
                                                   value="{{ old('salary', $data->salary) }}" required>
                                            @if ($errors->has('salary'))
                                                <span class="text-danger">{{ $errors->first('salary') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="join_date" class="col-sm-3 col-form-label">{{__('Joining Date')}}</label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control take_past_date" id="join_date" name="join_date"
                                                   value="{{ old('join_date', $data->join_date) }}" required>
                                            @if ($errors->has('join_date'))
                                                <span class="text-danger">{{ $errors->first('join_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row" id="user_ward_id">
                                        <label for="ward_id" class="col-sm-3 col-form-label">{{__('Ward')}}</label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" name="ward_id" id="ward_id">
                                                <option hidden
                                                        value="{{ old('ward_id', $data->ward_id != null ? $data->ward_id : '') }}"> {{ $data->ward_id != null ? $data->wards->name : '' }}</option>
                                                @foreach($wards as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{$item->ward_id == $item->id  ? 'selected' : ''}}>{{ucwords($item->name)}}</option>
                                                @endforeach
                                                @if ($errors->has('ward_id'))
                                                    <span class="text-danger">{{ $errors->first('ward_id') }}</span>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="file" class="col-sm-3 col-form-label">{{__('Update NID')}}</label>
                                        <div class="input-group col-sm-6">
                                            <div class="custom-file">
                                                <input type="file" name="file" id="file" value="{{ old('file') }}">
                                            </div>
                                        </div>
                                        @if ($errors->has('file'))
                                            <span class="text-danger">{{ $errors->first('file') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label for="file" class="col-sm-3 col-form-label">{{__('Uploaded NID')}}</label>
                                        <div class="input-group col-sm-6">
                                            <div class="custom-file">
                                                <a href="{{route('wasteManagement.download', $data->slug)}}" class="text-light" title="click to download">{{ucwords($data->file)}}</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer text-center">
                                        @include('layouts.partials.backBtn')
                                        <button type="submit" class="btn btn-success"><i class="fas fa-highlighter"></i>&nbsp;{{__('Update')}}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('customScripts')
    <!-- Page specific script -->
    <script>
        //For Phone Number
        $("input[name*='phone_number']").keyup(function () {
            let value_input = $("input[name*='phone_number']").val();
            let regexp = /[^0-9+]/g;
            if (value_input.match(regexp)) {
                $("input[name*='phone_number']").val(value_input.replace(regexp, ''))
            }
        });
        //For Full Name
        $("input[name*='name']").keyup(function () {
            let value_input = $("input[name*='name']").val();
            let regexp = /[^A-Za-z ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='name']").val(value_input.replace(regexp, ''))
            }
        });
    </script>
@endpush




