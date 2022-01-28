@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Delete Street Lamp Information')}}</h1>
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
                            <form role="form" id="dltForm" action="{{ route('streetLamp.destroy', $data->slug) }}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label id="lamp_name" class="col-sm-3 col-form-label">{{__('Lamp Name')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->lamp_name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="details" class="col-sm-3 col-form-label">{{__('Details')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ $data->details }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label id="area" class="col-sm-3 col-form-label">{{__('Area')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->area) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="road" class="col-sm-3 col-form-label">{{__('Road')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->road) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label id="category" class="col-sm-3 col-form-label">{{__('Category')}}:</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ $data->category }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="installation_date" class="col-sm-3 col-form-label">{{__('Installation Date')}}:</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ $data->installation_date }}
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



