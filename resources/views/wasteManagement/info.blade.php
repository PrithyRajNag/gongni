@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__("Waste Management Person's Information")}}</h1>
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
                                        <label id="name" class="col-sm-3 col-form-label">{{__('Full Name')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="phone_number" class="col-sm-3 col-form-label">{{__('Phone Number')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->phone_number) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="wards_id" class="col-sm-3 col-form-label">{{__('Ward Name')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->wards->name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="contractual_period" class="col-sm-3 col-form-label">{{__('Contractual Period')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->contractual_period) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="job_type" class="col-sm-3 col-form-label">{{__('Job Type')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->job_type) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="join_date" class="col-sm-3 col-form-label">{{__('Joining Date')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->join_date) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="salary" class="col-sm-3 col-form-label">{{__('Salary')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->salary) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="file" class="col-sm-3 col-form-label">{{__('Uploaded NID')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            <a href="{{route ('wasteManagement.download', $data->slug)}}" class="text-light" title="click to download">{{ ucwords($data->file) }}</a>

                                        </div>
                                    </div>


                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    @include('layouts.partials.backBtn')

                                    <a href="{{ route('wasteManagement.edit', $data->slug) }}"
                                       class="btn btn-primary"><i class="fas fa-edit"></i>&nbsp;
                                        {{__('Update')}}</a>

                                    <a href="{{ route('wasteManagement.delete', $data->slug) }}"
                                       class="btn btn-danger"><i class="fas fa-trash"></i>&nbsp;
                                        {{__('Delete')}}</a>
                                </div>
                            {{--btn btn-danger mb-2--}}
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


