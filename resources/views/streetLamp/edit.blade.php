@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Update Street Lamp Information')}}</h1>
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
                            <form role="form" id="editForm" action="{{route('streetLamp.update', $data->slug)}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="lamp_name" class="col-sm-3 col-form-label">{{__('Lamp Name')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="lamp_name" name="lamp_name"
                                                   value="{{ old('lamp_name', $data->lamp_name) }}"
                                                   required>
                                            @if ($errors->has('lamp_name'))
                                                <span class="text-danger">{{ $errors->first('lamp_name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="details" class="col-sm-3 col-form-label">{{__('Details')}}</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" class="form-control" id="details" name="details"
                                                      required>{{ old('details',$data->details) }}</textarea>
                                            @if ($errors->has('details'))
                                                <span class="text-danger">{{ $errors->first('details') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="area" class="col-sm-3 col-form-label">{{__('Area')}}</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" class="form-control" id="area" name="area"
                                                      required>{{ old('area', $data->area) }}</textarea>
                                            @if ($errors->has('area'))
                                                <span class="text-danger">{{ $errors->first('area') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="road" class="col-sm-3 col-form-label">{{__('Road')}}</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" class="form-control" id="road" name="road"
                                                      required>{{ old('road', $data->road) }}</textarea>
                                            @if ($errors->has('road'))
                                                <span class="text-danger">{{ $errors->first('road') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="category" class="col-sm-3 col-form-label">{{__('Category')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="category" name="category"
                                                   value="{{ old('category', $data->category) }}" required>
                                            @if ($errors->has('category'))
                                                <span class="text-danger">{{ $errors->first('category') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="installation_date" class="col-sm-3 col-form-label">{{__('Installation Date')}}</label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control" id="installation_date" name="installation_date"
                                                   value="{{ old('installation_date', $data->installation_date) }}"
                                                   required>
                                            @if ($errors->has('installation_date'))
                                                <span class="text-danger">{{ $errors->first('installation_date') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="longitude"
                                               class="col-sm-3 col-form-label">{{__('Longitude')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="longitude" name="longitude"
                                                   value="{{ old('longitude', $data->longitude) }}">
                                            @if ($errors->has('longitude'))
                                                <span class="text-danger">{{ $errors->first('longitude') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="latitude" class="col-sm-3 col-form-label">{{__('Latitude')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="latitude" name="latitude"
                                                   value="{{ old('latitude', $data->latitude) }}">
                                            @if ($errors->has('latitude'))
                                                <span class="text-danger">{{ $errors->first('latitude') }}</span>
                                            @endif
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
        //For Longitude
        $("input[name*='longitude']").keyup(function () {
            let value_input = $("input[name*='longitude']").val();
            let regexp = /[^0-9-.]/g;
            if (value_input.match(regexp)) {
                $("input[name*='longitude']").val(value_input.replace(regexp, ''))
            }
        });
        //For Latitude
        $("input[name*='latitude']").keyup(function () {
            let value_input = $("input[name*='latitude']").val();
            let regexp = /[^0-9-.]/g;
            if (value_input.match(regexp)) {
                $("input[name*='latitude']").val(value_input.replace(regexp, ''))
            }
        });
    </script>
@endpush




