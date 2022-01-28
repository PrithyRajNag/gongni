@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Public Toilet Information')}}</h1>
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
                                        <label id="public_toilet_number"
                                               class="col-sm-3 col-form-label">{{__('Public Toilet Number')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->public_toilet_number) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="name"
                                               class="col-sm-3 col-form-label">{{__('Public Toilet Name')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="maintain_people_name"
                                               class="col-sm-3 col-form-label">{{__('Maintain People Name')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->maintain_people_name) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label id="address"
                                               class="col-sm-3 col-form-label">{{__('Public Toilet Address')}} :</label>
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
                                            <label id="latitude" class="col-sm-3 col-form-label">{{__('Latitude')}}
                                                :</label>
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
                                    <a href="{{ route('publicToilet.edit', $data->slug) }}"
                                       class="btn btn-primary"><i class="fas fa-edit"></i>&nbsp;
                                        {{__('Update')}}</a>

                                    <a href="{{ route('publicToilet.delete', $data->slug) }}"
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


