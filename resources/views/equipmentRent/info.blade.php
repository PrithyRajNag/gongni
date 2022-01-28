@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Rented Equipment Information')}}</h1>
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
                            <form class="form-horizontal">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label id="equipment_name" class="col-sm-3 col-form-label">{{__('Equipment Name')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucfirst($data->equipment_name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="equipment_number" class="col-sm-3 col-form-label">{{__('Equipment Number')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucfirst($data->equipment_number) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="rental_period" class="col-sm-3 col-form-label">{{__('Rental Period')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucfirst($data->rental_period) .' ' . 'Hours'}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="rental_cost" class="col-sm-3 col-form-label">{{__('Rental Cost (Per Hour)')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucfirst($data->rental_cost) . ' ' . 'BDT'}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="total" class="col-sm-3 col-form-label">{{__('Total Cost')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucfirst($data->total) . ' ' . 'BDT'}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="name" class="col-sm-3 col-form-label">{{__('Company Name')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucfirst($data->name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="category" class="col-sm-3 col-form-label">{{__('Equipment Category Name')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucfirst($data->category) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="address" class="col-sm-3 col-form-label">{{__('Office Address')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucfirst($data->address) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="phone_number" class="col-sm-3 col-form-label">{{__('Contact')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucfirst($data->phone_number) }}
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    @include('layouts.partials.backBtn')
                                    <a href="{{ route('equipmentRent.edit', $data->slug) }}"
                                       class="btn btn-primary"><i class="fas fa-highlighter"></i>&nbsp;
                                    {{__('Update')}}</a>

                                    <a href="{{ route('equipmentRent.delete', $data->slug) }}" class="btn btn-danger"><i
                                            class="fas fa-trash"></i>&nbsp;{{__('Delete')}}</a>
                                </div>
                                <!-- /.card-footer -->
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

    </script>
@endpush


