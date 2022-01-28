@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Create Education Institute')}}</h1>
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
                            <form role="form" id="createForm" action="{{route('educationInstitution.store')}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                {{--                                @if($errors->any())--}}
                                {{--                                    {{ implode('', $errors->all('<div>:message</div>')) }}--}}

                                {{--                                @endif--}}


                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="institution_category"
                                               class="col-sm-3 col-form-label">{{__('Organization Type')}}</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" name="institution_category"
                                                    id="institution_category" required>
                                                <option hidden></option>
                                                <option value="Government">Government</option>
                                                <option value="Private">Private</option>

                                                @if ($errors->has('institution_category'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('institution_category') }}</span>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="institution_type"
                                               class="col-sm-3 col-form-label">{{__('Institution Type')}}</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" name="institution_type" id="institution_type"
                                                    required>
                                                <option hidden></option>
                                                <option value="primary_school">Primary School</option>
                                                <option value="high_school">High School</option>
                                                <option value="college">College</option>
                                                <option value="madrasa">Madrasa</option>
                                                <option value="university">University</option>
                                                @if ($errors->has('institution_type'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('institution_type') }}</span>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-sm-3 col-form-label">{{__('Institution Name')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="name" name="name"
                                                   value="{{ old('name') }}"
                                                   required>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="code"
                                               class="col-sm-3 col-form-label">{{__('Institution Code')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="code" name="code"
                                                   value="{{ old('code') }}"
                                                   required>
                                            @if ($errors->has('code'))
                                                <span class="text-danger">{{ $errors->first('code') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="address" class="col-sm-3 col-form-label">{{__('Address')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="address" name="address"
                                                   value="{{ old('address') }}"
                                                   required>
                                            @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="principle_name"
                                               class="col-sm-3 col-form-label">{{__('Institution Head')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="principle_name"
                                                   name="principle_name"
                                                   value="{{ old('principle_name') }}"
                                                   required>
                                            @if ($errors->has('principle_name'))
                                                <span class="text-danger">{{ $errors->first('principle_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone_number"
                                               class="col-sm-3 col-form-label">{{__('Phone Number')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="phone_number"
                                                   name="phone_number"
                                                   value="{{ old('phone_number') }}"
                                                   required>
                                            @if ($errors->has('phone_number'))
                                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="details" class="col-sm-3 col-form-label">{{__('Details')}}</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" class="form-control" id="details" name="details"
                                                      required>{{ old('details') }}</textarea>
                                            @if ($errors->has('details'))
                                                <span class="text-danger">{{ $errors->first('details') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="ward_id" class="col-sm-3 col-form-label">{{__('Ward')}}</label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" name="ward_id" id="ward_id" style="width: 100%"required>
                                                <option hidden value=""></option>
                                                @foreach($wards as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{$item->ward_id == $item->id}}>{{ucwords($item->name)}}</option>
                                                @endforeach
                                                @if ($errors->has('ward_id'))
                                                    <span class="text-danger">{{ $errors->first('ward_id') }}</span>
                                                @endif
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="longitude"
                                               class="col-sm-3 col-form-label">{{__('Longitude')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="longitude" name="longitude"
                                                   value="{{ old('longitude') }}">
                                            @if ($errors->has('longitude'))
                                                <span class="text-danger">{{ $errors->first('longitude') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="latitude" class="col-sm-3 col-form-label">{{__('Latitude')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="latitude" name="latitude"
                                                   value="{{ old('latitude') }}">
                                            @if ($errors->has('latitude'))
                                                <span class="text-danger">{{ $errors->first('latitude') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="card-footer text-center">
                                        @include('layouts.partials.backBtn')
                                        <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle"></i>&nbsp;{{__('Save')}}
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
        //For Phone_Number
        $("input[name*='phone_number']").keyup(function () {
            let value_input = $("input[name*='phone_number']").val();
            let regexp = /[^0-9+]/g;
            if (value_input.match(regexp)) {
                $("input[name*='phone_number']").val(value_input.replace(regexp, ''))
            }
        });


    </script>
@endpush




