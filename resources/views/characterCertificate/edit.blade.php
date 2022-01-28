@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Update Character Certificate Information')}}</h1>
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
                            <form role="form" id="editForm" action="{{route('characterCertificate.update', $data->slug)}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="issue_date"
                                               class="col-sm-3 col-form-label">{{__('Date')}} </label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control" id="issue_date" name="issue_date"
                                                   value="{{ old('issue_date', $data->issue_date) }}">
                                            @if ($errors->has('issue_date'))
                                                <span class="text-danger">{{ $errors->first('issue_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="serial" class="col-sm-3 col-form-label">{{__('Serial Number')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="serial" name="serial"
                                                   value="{{ old('serial', $data->serial) }}" required>
                                            @if ($errors->has('serial'))
                                                <span class="text-danger">{{ $errors->first('serial') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="people_id" class="col-sm-3 col-form-label">{{__('People Name')}}</label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" name="people_id" id="people_id"
                                                    required>
                                                <option hidden
                                                        value="{{ old('people_id', $data->people_id) }}"> {{ $data->peoples->full_name }}</option>
                                                @foreach($peoples as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{$item->people_id == $item->id  ? 'selected' : ''}}>{{ucwords($item->full_name)}}</option>
                                                @endforeach
                                                @if ($errors->has('people_id'))
                                                    <span class="text-danger">{{ $errors->first('people_id') }}</span>
                                                @endif
                                            </select>
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

    </script>
@endpush




