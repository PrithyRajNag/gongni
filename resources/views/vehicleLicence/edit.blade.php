@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Update Vehicle Licence Information')}}</h1>
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
                            <form role="form" id="editForm" action="{{route('vehicleLicence.update', $data->slug)}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="subCategory_id" class="col-sm-3 col-form-label">{{__('Vehicle Type')}} </label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" name="subCategory_id" id="subCategory_id"
                                                    required>
                                                <option hidden
                                                        value="{{ old('subCategory_id', $data->subCategory_id) }}"> {{ $data->subCategories->name ?? '' }}</option>
                                                @foreach($types as $item)
                                                    <option hidden
                                                            value="{{ $item->id }}"{{$item->subCategory_id == $item->id  ? 'selected' : ''}} >{{ucwords($item->name)}}</option>
                                                @endforeach
                                                @if ($errors->has('subCategory_id'))
                                                    <span class="text-danger">{{ $errors->first('subCategory_id') }}</span>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-sm-3 col-form-label">{{__('Full Name')}} </label>
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
                                        <label for="licence_number"
                                               class="col-sm-3 col-form-label">{{__('Licence Number')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="licence_number" name="licence_number"
                                                   value="{{ old('licence_number', $data->licence_number) }}"
                                                   required>
                                            @if ($errors->has('licence_number'))
                                                <span class="text-danger">{{ $errors->first('licence_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="father_name"
                                               class="col-sm-3 col-form-label">{{__('Father Name')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="father_name" name="father_name"
                                                   value="{{ old('father_name', $data->father_name) }}"
                                                   required>
                                            @if ($errors->has('father_name'))
                                                <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mother_name"
                                               class="col-sm-3 col-form-label">{{__('Mother Name')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="mother_name" name="mother_name"
                                                   value="{{ old('mother_name', $data->mother_name) }}"
                                                   required>
                                            @if ($errors->has('mother_name'))
                                                <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-3 col-form-label">{{__('Gender')}} </label>
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
                                        <label for="owner_name"
                                               class="col-sm-3 col-form-label">{{__('Owner Name')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="owner_name" name="owner_name"
                                                   value="{{ old('mother_name', $data->owner_name) }}"
                                                   required>
                                            @if ($errors->has('owner_name'))
                                                <span class="text-danger">{{ $errors->first('owner_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address"
                                               class="col-sm-3 col-form-label">{{__('Address')}} </label>
                                        <div class="col-sm-6">
                                            <textarea type="text" class="form-control" id="address" name="address"
                                                      required>{{ old('address', $data->address) }}</textarea>
                                            @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone_number"
                                               class="col-sm-3 col-form-label">{{__('Phone Number')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="phone_number"
                                                   name="phone_number"
                                                   value="{{ old('phone_number', $data->phone_number) }}"
                                                   required>
                                            @if ($errors->has('phone_number'))
                                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nid"
                                               class="col-sm-3 col-form-label">{{__('National ID')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="nid" name="nid"
                                                   value="{{ old('nid', $data->nid) }}"
                                                   required>
                                            @if ($errors->has('nid'))
                                                <span class="text-danger">{{ $errors->first('nid') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="expiry_date"
                                               class="col-sm-3 col-form-label">{{__('Expire Date')}} </label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control take_future_date" id="expiry_date" name="expiry_date"
                                                   value="{{ old('expiry_date', $data->expiry_date) }}">
                                            @if ($errors->has('expiry_date'))
                                                <span class="text-danger">{{ $errors->first('expiry_date') }}</span>
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
        //For Phone_Number
        $("input[name*='phone_number']").keyup(function () {
            let value_input = $("input[name*='phone_number']").val();
            let regexp = /[^0-9+]/g;
            if (value_input.match(regexp)) {
                $("input[name*='phone_number']").val(value_input.replace(regexp, ''))
            }
        });
        //For National Id
        $("input[name*='nid']").keyup(function () {
            let value_input = $("input[name*='nid']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='nid']").val(value_input.replace(regexp, ''))
            }
        });
        //For Full Name
        $("input[name*='name']").keyup(function () {
            let value_input = $("input[name*='name']").val();
            let regexp = /[^A-Za-z. ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='name']").val(value_input.replace(regexp, ''))
            }
        });
        //For Full Name
        $("input[name*='owner_name']").keyup(function () {
            let value_input = $("input[name*='owner_name']").val();
            let regexp = /[^A-Za-z. ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='owner_name']").val(value_input.replace(regexp, ''))
            }
        });
        //For Father's Name
        $("input[name*='father_name']").keyup(function () {
            let value_input = $("input[name*='father_name']").val();
            let regexp = /[^A-Za-z. ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='father_name']").val(value_input.replace(regexp, ''))
            }
        });
        //For Mother's Name
        $("input[name*='mother_name']").keyup(function () {
            let value_input = $("input[name*='mother_name']").val();
            let regexp = /[^A-Za-z. ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='mother_name']").val(value_input.replace(regexp, ''))
            }
        });
    </script>
@endpush




