@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Delete Vehicle Licence Information')}}</h1>
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
                            <form role="form" id="dltForm" action="{{ route('vehicleLicence.destroy', $data->slug) }}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label id="type_id" class="col-sm-3 col-form-label">{{__('Vehicle Type')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucfirst($data->subCategories->name ?? '') }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="licence_number" class="col-sm-3 col-form-label">{{__('Licence Number')}}
                                            :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->licence_number) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="name" class="col-sm-3 col-form-label">{{__('Full Name')}}
                                            :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="father_name" class="col-sm-3 col-form-label">{{__('Father Name')}}
                                            :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->father_name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="mother_name" class="col-sm-3 col-form-label">{{__('Mother Name')}}
                                            :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->mother_name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="gender" class="col-sm-3 col-form-label">{{__('Gender')}}
                                            :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->gender) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="owner_name" class="col-sm-3 col-form-label">{{__('Owner Name')}}
                                            :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->owner_name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="address" class="col-sm-3 col-form-label">{{__('Address')}}
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
                                        <label id="nid" class="col-sm-3 col-form-label">{{__('National ID')}}
                                            :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->nid) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="expiry_date" class="col-sm-3 col-form-label">{{__('Expiry Date')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucfirst($data->expiry_date) }}
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



