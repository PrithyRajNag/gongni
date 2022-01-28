@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Delete Character Certificate')}}</h1>
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
                            <form role="form" id="dltForm" action="{{ route('characterCertificate.destroy', $data->slug) }}" class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label id="issue_date" class="col-sm-3 col-form-label">{{__('Date')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->issue_date) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="serial" class="col-sm-3 col-form-label">{{__('Serial Number')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->serial) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="people_id" class="col-sm-3 col-form-label">{{__('People Name')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->peoples->full_name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="people_id" class="col-sm-3 col-form-label">{{__('Father Name')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->peoples->father_name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="people_id" class="col-sm-3 col-form-label">{{__('Mother Name')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->peoples->mother_name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="people_id" class="col-sm-3 col-form-label">{{__('Address')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->peoples->present_address) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="ward_id" class="col-sm-3 col-form-label">{{__('Ward')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucfirst($data->peoples->wards->name) }}
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    @include('layouts.partials.backBtn')
                                    <button type="submit" name="dltBtn" id="dltBtn" value="Save"
                                            class="btn btn-danger ml-2"><i
                                            class="fas fa-trash"></i>&nbsp;{{__('Delete')}}
                                    </button>
                                    {{--                                    <button type="submit" name="createBtn" id="createBtn" value="Save" class="btn btn-info">Save</button>--}}
                                    {{--                                    <button type="submit" class="btn btn-default float-right">Cancel</button>--}}
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



