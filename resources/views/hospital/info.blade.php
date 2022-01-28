@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Hospital Information')}}</h1>
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
                                        <label id="hospital_type"
                                               class="col-sm-3 col-form-label">{{__('Hospital Type')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->hospital_type) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="name" class="col-sm-3 col-form-label">{{__('Hospital Name')}}
                                            :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->name) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label id="address" class="col-sm-3 col-form-label">{{__('Hospital Address')}}
                                            :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->address) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label id="address" class="col-sm-3 col-form-label">{{__('Phone Number')}}
                                            :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->phone_number) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="details" class="col-sm-3 col-form-label">{{__('Details')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ $data->details }}
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label id="total_shop" class="col-sm-3 col-form-label">{{__('Owner Name')}}
                                            :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ $data->owner_name }}
                                        </div>
                                    </div>

                                    @if($data->longitude != null)
                                        <div class="form-group row">
                                            <label id="longitude" class="col-sm-3 col-form-label">{{__('Longitude')}}
                                                :</label>
                                            <div class="col-sm-9 pt-2">
                                                {{ ucfirst($data->longitude) }}
                                            </div>
                                        </div>
                                    @endif

                                    @if($data->latitude != null)
                                        <div class="form-group row">
                                            <label id="latitude" class="col-sm-3 col-form-label">{{__('Latitude')}} :</label>
                                            <div class="col-sm-9 pt-2">
                                                {{ ucfirst($data->latitude) }}
                                            </div>
                                        </div>
                                    @endif


                                    <div class="form-group row">
                                        <label id="ward_id" class="col-sm-3 col-form-label">{{__('Ward')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucfirst($data->wards->name) }}
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    @include('layouts.partials.backBtn')
                                    <a href="{{ route('hospital.edit', $data->slug) }}"
                                       class="btn btn-primary"><i class="fas fa-edit"></i>&nbsp;
                                        {{__('Update')}}</a>

                                    <a href="{{ route('hospital.delete', $data->slug) }}"
                                       class="btn btn-danger"><i class="fas fa-trash"></i>&nbsp;
                                        {{__('Delete')}}</a>

                                </div>
                            {{--                                <div class="card-footer text-center">--}}
                            {{--                                    --}}
                            {{--                                </div>--}}

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


