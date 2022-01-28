@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Work Information')}}</h1>
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
                                        <label id="category"
                                               class="col-sm-3 col-form-label">{{__('Selected Work Level')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->category) }}
                                        </div>
                                        @if ($errors->has('category'))
                                            <span class="text-danger">{{ $errors->first('category') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label id="name" class="col-sm-3 col-form-label">{{__('Name of the complainant')}}
                                            :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->name) }}
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label id="address" class="col-sm-3 col-form-label">{{__('Address')}}
                                            :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->address) }}
                                        </div>
                                        @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label id="area" class="col-sm-3 col-form-label">{{__('Area')}}
                                            :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->area) }}
                                        </div>
                                        @if ($errors->has('area'))
                                            <span class="text-danger">{{ $errors->first('area') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label id="address" class="col-sm-3 col-form-label">{{__('Phone Number')}}
                                            :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->phone_number) }}
                                        </div>
                                        @if ($errors->has('phone_number'))
                                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label id="title" class="col-sm-3 col-form-label">{{__('Complain Title')}}
                                            :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->title) }}
                                        </div>
                                        @if ($errors->has('title'))
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label id="details" class="col-sm-3 col-form-label">{{__('Complain Details')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ $data->details }}
                                        </div>
                                        @if ($errors->has('details'))
                                            <span class="text-danger">{{ $errors->first('details') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label id="ward_id" class="col-sm-3 col-form-label">{{__('Ward')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucfirst($data->wards->name) }}
                                        </div>
                                        @if ($errors->has('ward_id'))
                                            <span class="text-danger">{{ $errors->first('ward_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label id="current_status" class="col-sm-3 col-form-label">{{__('Current Status')}}
                                            :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords(getWordWithSpace($data->current_status) ) }}
                                        </div>
                                        @if ($errors->has('current_status'))
                                            <span class="text-danger">{{ $errors->first('current_status') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    @include('layouts.partials.backBtn')
                                    <a href="{{ route('work.edit', $data->slug) }}"
                                       class="btn btn-primary"><i class="fas fa-edit"></i>&nbsp;
                                        {{__('Update')}}</a>

                                    <a href="{{ route('work.delete', $data->slug) }}"
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


