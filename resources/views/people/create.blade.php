@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Create People')}}</h1>
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
                            <form role="form" id="createForm" action="{{route('people.store')}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf


                                <div class="card-body row">
                                    <div class="form-group col-sm-5">
                                        <label for="first_name" class="col-form-label">{{__('First Name (English)')}}</label>
{{--                                        <div class="col-sm-6">--}}
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                   value="{{ old('first_name') }}" required>
                                            @if ($errors->has('first_name'))
                                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                            @endif
{{--                                        </div>--}}
                                    </div>

                                    <div class="form-group offset-sm-2 col-sm-5">
                                        <label for="first_name_bn" class="col-form-label">{{__('নামের প্রথম অংশ (বাংলায়)')}}</label>
{{--                                        <div class="col-sm-6">--}}
                                            <input type="text" class="form-control" id="first_name_bn"
                                                   name="first_name_bn" value="{{ old('first_name_bn') }}" required>
                                            @if ($errors->has('first_name_bn'))
                                                <span class="text-danger">{{ $errors->first('first_name_bn') }}</span>
                                            @endif
{{--                                        </div>--}}
                                    </div>

                                    <div class="form-group col-sm-5">
                                        <label for="last_name" class="col-form-label">{{__('Last Name (English)')}}</label>
{{--                                        <div class="col-sm-6">--}}
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                   value="{{ old('last_name') }}" required>
                                            @if ($errors->has('last_name'))
                                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                            @endif
{{--                                        </div>--}}
                                    </div>

                                    <div class="form-group offset-sm-2 col-sm-5">
                                        <label for="last_name_bn" class="col-form-label">{{__('নামের শেষ অংশ (বাংলায়)')}}</label>
{{--                                        <div class="col-sm-6">--}}
                                            <input type="text" class="form-control" id="last_name_bn"
                                                   name="last_name_bn" value="{{ old('last_name') }}" required>
                                            @if ($errors->has('last_name_bn'))
                                                <span class="text-danger">{{ $errors->first('last_name_bn') }}</span>
                                            @endif
{{--                                        </div>--}}
                                    </div>

                                    <div class="form-group col-sm-5">
                                        <label for="father_name" class="col-form-label">{{__('Father Name (English)')}}</label>
{{--                                        <div class="col-sm-6">--}}
                                            <input type="text" class="form-control" id="father_name" name="father_name" value="{{ old('father_name') }}" required>
                                            @if ($errors->has('father_name'))
                                                <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                            @endif
{{--                                        </div>--}}
                                    </div>

                                    <div class="form-group offset-sm-2 col-sm-5">
                                        <label for="father_name_bn" class="col-form-label">{{__('বাবার নাম (বাংলায়)')}}</label>
{{--                                        <div class="col-sm-6">--}}
                                            <input type="text" class="form-control" id="father_name_bn"
                                                   name="father_name_bn" value="{{ old('father_name_bn') }}" required>
                                            @if ($errors->has('father_name_bn'))
                                                <span class="text-danger">{{ $errors->first('father_name_bn') }}</span>
                                            @endif
{{--                                        </div>--}}
                                    </div>

                                    <div class="form-group col-sm-5">
                                        <label for="mother_name" class="col-form-label">{{__('Mother Name (English)')}}</label>
{{--                                        <div class="col-sm-6">--}}
                                            <input type="text" class="form-control" id="mother_name" name="mother_name"
                                                   value="{{ old('mother_name') }}" required>
                                            @if ($errors->has('mother_name'))
                                                <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                                            @endif
{{--                                        </div>--}}
                                    </div>

                                    <div class="form-group offset-sm-2 col-sm-5">
                                        <label for="mother_name_bn" class="col-form-label">{{__('মায়ের নাম (বাংলায়)')}}</label>
{{--                                        <div class="col-sm-6">--}}
                                            <input type="text" class="form-control" id="mother_name_bn"
                                                   name="mother_name_bn" value="{{ old('mother_name_bn') }}" required>
                                            @if ($errors->has('mother_name_bn'))
                                                <span class="text-danger">{{ $errors->first('mother_name_bn') }}</span>
                                            @endif
{{--                                        </div>--}}
                                    </div>

                                    <div class="form-group col-sm-5">
                                        <label for="gender" class="col-form-label d-block">{{__('Gender')}}</label>
{{--                                        <div class="col-sm-6 pt-2">--}}
                                            <div class="form-check form-check-inline">
                                                <label for="male">
                                                    <input type="radio" name="gender" value="male">
                                                    <span class="mr-4">{{__('Male')}}</span>
                                                </label>
                                                <label for="female">
                                                    <input type="radio" name="gender" value="female">
                                                    <span class="mr-4">{{__('Female')}}</span>
                                                </label>
                                                <label for="other">
                                                    <input type="radio" name="gender" value="other">
                                                    <span class="mr-4">{{__('Other')}}</span>
                                                </label>
                                                @if ($errors->has('gender'))
                                                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                                                @endif
                                            </div>
{{--                                        </div>--}}
                                    </div>
                                    <div class="form-group offset-sm-2 col-sm-5">
                                        <label for="marital_status"
                                               class="col-form-label d-block">{{__('Marital Status')}}</label>
{{--                                        <div class="col-sm-6 pt-2">--}}
                                            <div class="form-check form-check-inline">
                                                <label for="married">
                                                    <input type="radio" name="marital_status"
                                                           value="married">
                                                    <span class="mr-4">{{__('Married')}}</span>
                                                </label>
                                                <label for="unmarried">
                                                    <input type="radio" name="marital_status"
                                                           value="unmarried">
                                                    <span class="mr-4">{{__('Unmarried')}}</span>
                                                </label>
                                                @if ($errors->has('marital_status'))
                                                    <span class="text-danger">{{ $errors->first('marital_status') }}</span>
                                                @endif
                                            </div>
{{--                                        </div>--}}
                                    </div>
                                    <div id="spouse_names" class="col-12" style="display: flex">
                                        <div class="form-group col-sm-5 p-0" >
                                            <label for="spouse_name" class="col-form-label">{{__('Spouse Name (English)')}}</label>
{{--                                            <div class="col-sm-6">--}}
                                                <input type="text" class="form-control" id="spouse_name"
                                                       name="spouse_name" value="{{ old('spouse_name') }}">
                                                @if ($errors->has('spouse_name'))
                                                    <span class="text-danger">{{ $errors->first('spouse_name') }}</span>
                                                @endif
{{--                                            </div>--}}
                                        </div>

                                        <div class="form-group offset-sm-2 col-sm-5">
                                            <label for="spouse_name" class="col-form-label">{{__('স্বামী বা স্ত্রীর নাম (বাংলায়)')}}</label>
{{--                                            <div class="col-sm-6">--}}
                                                <input type="text" class="form-control" id="spouse_name_bn"
                                                       name="spouse_name_bn" value="{{ old('spouse_name_bn') }}">
                                                @if ($errors->has('spouse_name_bn'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('spouse_name_bn') }}</span>
                                                @endif
{{--                                            </div>--}}
                                        </div>
                                    </div>

                                    <div class="form-group  col-sm-5">
                                        <label for="birth_reg" class="col-form-label">{{__('Birth Reg')}}</label>
                                        {{--                                        <div class="col-sm-6">--}}
                                        <input type="text" class="form-control" id="birth_reg" name="birth_reg" placeholder="Enter 17 Digit Number" value="{{ old('birth_reg') }}" required>
                                        @if ($errors->has('birth_reg'))
                                            <span class="text-danger">{{ $errors->first('birth_reg') }}</span>
                                        @endif
                                        {{--                                        </div>--}}
                                    </div>

                                    <div class="form-group offset-sm-2 col-sm-5">
                                        <label for="nid" class="col-form-label">{{__('National Id')}}</label>
                                        {{--                                        <div class="col-sm-6">--}}
                                        <input type="text" class="form-control" id="nid" name="nid" placeholder="Enter 10 Digit Number" value="{{ old('nid') }}" required>
                                        @if ($errors->has('nid'))
                                            <span class="text-danger">{{ $errors->first('nid') }}</span>
                                        @endif
                                        {{--                                        </div>--}}
                                    </div>

                                    <div class="form-group  col-sm-5">
                                        <label for="phone_number" class="col-form-label">{{__('Phone Number')}}</label>
{{--                                        <div class="col-sm-6">--}}
                                            <input type="text" class="form-control" id="phone_number"
                                                   name="phone_number" value="{{ old('phone_number') }}"
                                                   required>
                                            @if ($errors->has('phone_number'))
                                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                            @endif
{{--                                        </div>--}}
                                    </div>

                                    <div class="form-group offset-sm-2 col-sm-5">
                                        <label for="dob" class="col-form-label">{{__('Date Of Birth')}}</label>
{{--                                        <div class="col-sm-6">--}}
                                            <input type="date" class="form-control take_past_date" id="dob" name="dob" value="{{ old('dob') }}" required>
                                            @if ($errors->has('dob'))
                                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                                            @endif
{{--                                        </div>--}}
                                    </div>

                                    <div class="form-group col-sm-5">
                                        <label for="blood_group_id"
                                               class="col-form-label">{{__('Blood Group')}}</label>
{{--                                        <div class="col-sm-6">--}}
                                            <select class="form-control select2" name="blood_group_id" style="width: 100%">
                                                <option hidden value=""></option>
                                                @foreach($bloodGroups as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{$item->blood_group_id == $item->id}}>{{ucwords($item->name)}}</option>
                                                @endforeach
                                                @if ($errors->has('blood_group_id'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('blood_group_id') }}</span>
                                                @endif
                                            </select>

{{--                                        </div>--}}
                                    </div>

                                    <div class="form-group offset-sm-2 col-sm-5">
                                        <label for="ward_id" class="col-form-label">{{__('Ward')}}</label>
                                        {{--                                        <div class="col-sm-6">--}}
                                        <select class="form-control select2" name="ward_id" id="ward_id"
                                                style="width: 100%" required>
                                            <option hidden value=""></option>
                                            @foreach($wards as $item)
                                                <option
                                                    value="{{ $item->id }}" {{$item->ward_id == $item->id}}>{{ucwords($item->name)}}</option>
                                            @endforeach
                                            @if ($errors->has('ward_id'))
                                                <span class="text-danger">{{ $errors->first('ward_id') }}</span>
                                            @endif
                                        </select>

                                        {{--                                        </div>--}}
                                    </div>

                                    <div class="form-group col-sm-5">
                                        <label for="present_address" class="col-form-label">{{__('Present Address')}}</label>
{{--                                        <div class="col-sm-6">--}}
                                            <textarea type="text" name="present_address" id="present_address"
                                                      class="form-control" required>{{ old('present_address') }}</textarea>
                                            @if ($errors->has('present_address'))
                                                <span class="text-danger">{{ $errors->first('present_address') }}</span>
                                            @endif
{{--                                        </div>--}}
                                    </div>

                                    <div class="form-group  offset-sm-2 col-sm-5">
                                        <label for="permanent_address" class="col-form-label">{{__('Permanent Address')}}</label>
{{--                                        <div class="col-sm-6">--}}
                                            <textarea type="text" name="permanent_address" id="permanent_address"
                                                      class="form-control" required>{{ old('permanent_address') }}</textarea>
                                            @if ($errors->has('permanent_address'))
                                                <span class="text-danger">{{ $errors->first('permanent_address') }}</span>
                                            @endif
{{--                                        </div>--}}
                                    </div>

                                    <div class="form-group  col-sm-5">
                                        <label for="occupation" class="col-form-label">{{__('Occupation')}}</label>
                                        {{--                                        <div class="col-sm-6">--}}
                                        <input type="text" class="form-control" id="occupation" name="occupation" value="{{ old('occupation') }}" required>
                                        @if ($errors->has('occupation'))
                                            <span class="text-danger">{{ $errors->first('occupation') }}</span>
                                        @endif
                                        {{--                                        </div>--}}
                                    </div>

                                    <div class="form-group offset-sm-2  col-sm-5">
                                        <label for="cover" class="col-form-label">{{__('Upload Image')}}</label>
                                        <div class="col-sm-6 p-0">
                                            <div class="custom-file">
                                                <input type="file" name="cover" id="cover" value="{{ old('cover') }}" />
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <div id="image-holder"  style="width: 200px; position: relative"></div>
                                            </div>
                                        </div>
                                        @if ($errors->has('cover'))
                                            <span class="text-danger">{{ $errors->first('cover') }}</span>
                                        @endif
                                    </div>

                                    <div class="card-footer text-center col-sm-12">
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
    <script >
        //For image preview
        $("#cover").on('change', function () {
            var imgPath = $(this)[0].value;
            var extension = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            if (extension === "gif" || extension === "png" || extension === "jpg" || extension === "jpeg"){
                if (typeof (FileReader) != "undefined") {

                    var image_holder = $("#image-holder");
                    image_holder.empty();

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("<img />", {
                            "src": e.target.result,
                            "class": "img-thumbnail"
                        }).appendTo(image_holder);
                    };
                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    alert("This browser does not support FileReader.");
                }
            }else {
                alert("Please Select Image Only !");
            }
        });

        // function isNumber(value){
        //     let regexp = /[^0-9+]/g;
        //     if (value.match(regexp)) {
        //         return value.replace(regexp, '')
        //     }
        // }

        $("#spouse_names").hide();

        //For National Id
        $("input[name*='nid']").keyup(function () {
            let value_input = $("input[name*='nid']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='nid']").val(value_input.replace(regexp, ''))
            }
        });

        //For Birth Reg
        $("input[name*='birth_reg']").keyup(function () {
            let value_input = $("input[name*='birth_reg']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='birth_reg']").val(value_input.replace(regexp, ''))
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




