@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'comfortaa'">
                        <h1>{{__('Update Profile Information')}}</h1>
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
                            <form role="form" id="editForm" action="{{route('profile.update', $data->slug)}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="first_name"
                                               class="col-sm-3 col-form-label">{{__('First Name (English)')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                   value="{{ old('first_name', $data->first_name) }}" required>
                                            @if ($errors->has('first_name'))
                                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="first_name_bn"
                                               class="col-sm-3 col-form-label">{{__('নামের প্রথম অংশ (বাংলায়)')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="first_name_bn"
                                                   name="first_name_bn"
                                                   value="{{ old('first_name_bn', $data->first_name_bn) }}" required>
                                            @if ($errors->has('first_name_bn'))
                                                <span class="text-danger">{{ $errors->first('first_name_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="last_name"
                                               class="col-sm-3 col-form-label">{{__('Last Name (English)')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                   value="{{ old('last_name', $data->last_name) }}" required>
                                            @if ($errors->has('last_name'))
                                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="last_name_bn"
                                               class="col-sm-3 col-form-label">{{__('নামের শেষ অংশ (বাংলায়)')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="last_name_bn"
                                                   name="last_name_bn"
                                                   value="{{ old('last_name_bn', $data->last_name_bn) }}" required>
                                            @if ($errors->has('last_name_bn'))
                                                <span class="text-danger">{{ $errors->first('last_name_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="father_name"
                                               class="col-sm-3 col-form-label">{{__('Father Name (English)')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="father_name" name="father_name"
                                                   value="{{ old('father_name', $data->father_name) }}" required>
                                            @if ($errors->has('father_name'))
                                                <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="father_name_bn"
                                               class="col-sm-3 col-form-label">{{__('বাবার নাম (বাংলায়)')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="father_name_bn"
                                                   name="father_name_bn"
                                                   value="{{ old('father_name_bn', $data->father_name_bn) }}" required>
                                            @if ($errors->has('father_name_bn'))
                                                <span class="text-danger">{{ $errors->first('father_name_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="mother_name"
                                               class="col-sm-3 col-form-label">{{__('Mother Name (English)')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="mother_name" name="mother_name"
                                                   value="{{ old('mother_name', $data->mother_name) }}" required>
                                            @if ($errors->has('mother_name'))
                                                <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="mother_name_bn"
                                               class="col-sm-3 col-form-label">{{__('মায়ের নাম (বাংলায়)')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="mother_name_bn"
                                                   name="mother_name_bn"
                                                   value="{{ old('mother_name_bn', $data->mother_name_bn) }}" required>
                                            @if ($errors->has('mother_name_bn'))
                                                <span class="text-danger">{{ $errors->first('mother_name_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-3 col-form-label">{{__('Gender')}}</label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="male">
                                                    <input type="radio" name="gender"
                                                           value="male" {{ ($data->gender === "male")? "checked" : ""}}>
                                                    <span class="mr-sm-2 mt-0">{{__('Male')}}</span>
                                                </label>
                                                <label for="female">
                                                    <input type="radio" name="gender"
                                                           value="female" {{ ($data->gender === "female")? "checked" : ""}}>
                                                    <span class="mr-sm-2">{{__('Female')}}</span>
                                                </label>
                                                <label for="other">
                                                    <input type="radio" name="gender"
                                                           value="other" {{ ($data->gender === "other")? "checked" : ""}}>
                                                    <span class="mr-sm-2">{{__('Other')}}</span>
                                                </label>
                                                @if ($errors->has('gender'))
                                                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone_number"
                                               class="col-sm-3 col-form-label">{{__('Phone Number')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="phone_number"
                                                   name="phone_number"
                                                   value="{{ old('phone_number', $data->phone_number) }}" required>
                                            @if ($errors->has('phone_number'))
                                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="emergency_contact"
                                               class="col-sm-3 col-form-label">{{__('Emergency Contact')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="emergency_contact"
                                                   name="emergency_contact"
                                                   value="{{ old('emergency_contact', $data->emergency_contact) }}"
                                                   required>
                                            @if ($errors->has('emergency_contact'))
                                                <span
                                                    class="text-danger">{{ $errors->first('emergency_contact') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="dob" class="col-sm-3 col-form-label">{{__('Date Of Birth')}}</label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control take_past_date" id="dob" name="dob"
                                                   value="{{ old('dob', $data->dob) }}" required>
                                            @if ($errors->has('dob'))
                                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="blood_group_id"
                                               class="col-sm-3 col-form-label">{{__('Blood Group')}}</label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" name="blood_group_id">
                                                <option hidden
                                                        value="{{ old('blood_group_id', $data->blood_group_id) }}"> {{ $data->bloodGroups->name }}</option>
                                                @foreach($bloodGroups as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{$item->blood_group_id == $item->id ? 'selected' : ''}}>{{ucwords($item->name)}}</option>
                                                @endforeach
                                                @if ($errors->has('blood_group_id'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('blood_group_id') }}</span>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="marital_status"
                                               class="col-sm-3 col-form-label">{{__('Marital Status')}}</label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="married">
                                                    <input type="radio" name="marital_status"
                                                           value="married" {{ ($data->marital_status === "married")? "checked" : ""}}>
                                                    <span class="mr-sm-2 mt-0">{{__('Married')}}</span>
                                                </label>
                                                <label for="unmarried">
                                                    <input type="radio" name="marital_status"
                                                           value="unmarried" {{ ($data->marital_status === "unmarried")? "checked" : ""}}>
                                                    <span class="mr-sm-2">{{__('Unmarried')}}</span>
                                                </label>
                                                @if ($errors->has('marital_status'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('marital_status') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div id="spouse_names">
                                        <div class="form-group row">
                                            <label for="spouse_name"
                                                   class="col-sm-3 col-form-label">{{__('Spouse Name (English)')}}</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="spouse_name"
                                                       name="spouse_name"
                                                       value="{{ old('spouse_name', $data->spouse_name) }}">
                                                @if ($errors->has('spouse_name'))
                                                    <span class="text-danger">{{ $errors->first('spouse_name') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="spouse_name_bn"
                                                   class="col-sm-3 col-form-label">{{__('স্বামী বা স্ত্রীর নাম (বাংলায়)')}}</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="spouse_name_bn"
                                                       name="spouse_name_bn"
                                                       value="{{ old('spouse_name_bn', $data->spouse_name_bn) }}">
                                                @if ($errors->has('spouse_name_bn'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('spouse_name_bn') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="present_address"
                                               class="col-sm-3 col-form-label">{{__('Present Address')}}</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" name="present_address" id="present_address"
                                                      class="form-control"
                                                      required>{{ old('present_address', $data->present_address) }}</textarea>
                                            @if ($errors->has('present_address'))
                                                <span class="text-danger">{{ $errors->first('present_address') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="permanent_address"
                                               class="col-sm-3 col-form-label">{{__('Permanent Address')}}</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" name="permanent_address" id="permanent_address"
                                                      class="form-control"
                                                      required>{{ old('permanent_address', $data->permanent_address) }}</textarea>
                                            @if ($errors->has('permanent_address'))
                                                <span
                                                    class="text-danger">{{ $errors->first('permanent_address') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nid" class="col-sm-3 col-form-label">{{__('National Id')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="nid" name="nid"
                                                   value="{{ old('nid', $data->nid) }}" required>
                                            @if ($errors->has('nid'))
                                                <span class="text-danger">{{ $errors->first('nid') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    @if( $data->ward_id != NULL)
                                        <div class="form-group row">
                                            <label for="ward_id" class="col-sm-3 col-form-label">{{__('Ward')}}</label>
                                            <div class="col-sm-6">
                                                <select class="form-control select2" name="ward_id" id="ward_id"
                                                        required>
                                                    <option hidden
                                                            value="{{ old('ward_id', $data->ward_id) }}"> {{ $data->wards->name }}</option>
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
                                    @endif

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
        $(function () {
            var is_married = $('input[name="marital_status"]:checked').val();
            console.log('is_married : ' + is_married)
            if (is_married != 'married') {
                $("#spouse_names").hide()
            } else {
                $("#spouse_names").show()
            }
        })

        //For National Id
        $("input[name*='nid']").keyup(function () {
            let value_input = $("input[name*='nid']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='nid']").val(value_input.replace(regexp, ''))
            }
        });

        //For Phone Number
        $("input[name*='phone_number']").keyup(function () {
            let value_input = $("input[name*='phone_number']").val();
            let regexp = /[^0-9+]/g;
            if (value_input.match(regexp)) {
                $("input[name*='phone_number']").val(value_input.replace(regexp, ''))
            }
        });

        //For Emergency Contact
        $("input[name*='emergency_contact']").keyup(function () {
            let value_input = $("input[name*='emergency_contact']").val();
            let regexp = /[^0-9+]/g;
            if (value_input.match(regexp)) {
                $("input[name*='emergency_contact']").val(value_input.replace(regexp, ''))
            }
        });

        //For First Name
        $("input[name*='first_name']").keyup(function () {
            let value_input = $("input[name*='first_name']").val();
            let regexp = /[^A-Za-z ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='first_name']").val(value_input.replace(regexp, ''))
            }
        });

        //For Last Name
        $("input[name*='last_name']").keyup(function () {
            let value_input = $("input[name*='last_name']").val();
            let regexp = /[^A-Za-z ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='last_name']").val(value_input.replace(regexp, ''))
            }
        });

        //For Father Name
        $("input[name*='father_name']").keyup(function () {
            let value_input = $("input[name*='father_name']").val();
            let regexp = /[^A-Za-z ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='father_name']").val(value_input.replace(regexp, ''))
            }
        });

        //For Mother Name
        $("input[name*='mother_name']").keyup(function () {
            let value_input = $("input[name*='mother_name']").val();
            let regexp = /[^A-Za-z ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='mother_name']").val(value_input.replace(regexp, ''))
            }
        });

        //For Spouse Name
        $("input[name*='spouse_name']").keyup(function () {
            let value_input = $("input[name*='spouse_name']").val();
            let regexp = /[^A-Za-z ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='spouse_name']").val(value_input.replace(regexp, ''))
            }
        });

    </script>
@endpush



