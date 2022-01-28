@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Update Rented Equipment Information')}}</h1>
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
                            <form role="form" id="editForm" action="{{route('equipmentRent.update', $data->slug)}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="equipment_name" class="col-sm-3 col-form-label">{{__('Equipment Name')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="equipment_name" name="equipment_name"
                                                   value="{{ old('name', $data->equipment_name) }}" required>
                                            @if ($errors->has('equipment_name'))
                                                <span class="text-danger">{{ $errors->first('equipment_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="equipment_number" class="col-sm-3 col-form-label">{{__('Equipment Number')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="equipment_number" name="equipment_number"
                                                   value="{{ old('equipment_number', $data->equipment_number) }}" required>
                                            @if ($errors->has('equipment_number'))
                                                <span class="text-danger">{{ $errors->first('equipment_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="rental_period" class="col-sm-3 col-form-label">{{__('Rental Period')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="rental_period" name="rental_period"
                                                   value="{{ old('rental_period', $data->rental_period )}}" required>
                                            @if ($errors->has('rental_period'))
                                                <span class="text-danger">{{ $errors->first('rental_period') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="rental_cost" class="col-sm-3 col-form-label">{{__('Rental Cost (Per Hour)')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="rental_cost" name="rental_cost"
                                                   value="{{ old('rental_cost', $data->rental_cost ) }}" required>
                                            @if ($errors->has('rental_cost'))
                                                <span class="text-danger">{{ $errors->first('rental_cost') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category" class="col-sm-3 col-form-label">{{__('Equipment Category Name')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="category" name="category"
                                                   value="{{ old('category', $data->category )}}" required>
                                            @if ($errors->has('category'))
                                                <span class="text-danger">{{ $errors->first('category') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">{{__('Company Name')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="name" name="name"
                                                   value="{{ old('name', $data->name )}}" required>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-3 col-form-label">{{__('Office Address')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="address" name="address"
                                                   value="{{ old('address', $data->address) }}" required>
                                            @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone_number" class="col-sm-3 col-form-label">{{__('Contact')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                                   value="{{ old('phone_number', $data->phone_number) }}" required>
                                            @if ($errors->has('phone_number'))
                                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
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
        //For Company Name
        $("input[name*='name']").keyup(function () {
            let value_input = $("input[name*='name']").val();
            let regexp = /[^A-Za-z. ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='name']").val(value_input.replace(regexp, ''))
            }
        });
        //For Contact
        $("input[name*='phone_number']").keyup(function () {
            let value_input = $("input[name*='phone_number']").val();
            let regexp = /[^0-9 ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='phone_number']").val(value_input.replace(regexp, ''))
            }
        });

    </script>
@endpush




