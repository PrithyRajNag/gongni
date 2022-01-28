@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Send SMS')}}</h1>
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
                            <form role="form" id="createForm" action="{{route('sms.send')}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf


                                <div class="card-body">
                                    <div class="form-group row">
                                        <label id="title" class="col-sm-6 col-md-3  col-form-label">{{__('Template Title')}} :</label>
                                        <div class="col-sm-6 col-md-9  pt-2">
                                            {{ ucwords($data->title) }}
                                        </div>
                                    </div>
{{--                                    <div class="form-group row">--}}
{{--                                        <label id="body" class="col-sm-6 col-md-3  col-form-label">{{__('SMS Template')}} :</label>--}}
{{--                                        <div class="col-sm-6 col-md-9  pt-2">--}}
{{--                                            {{ ucwords($data->description) }}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}


                                    <div class="form-group row">
                                        <label for="message" class="col-sm-3 col-form-label">{{__('Message')}} </label>
                                        <div class="col-sm-6">
                                            <textarea type="text" class="form-control" id="message" name="message" required>{{ old('message', $data->description) }}</textarea>
                                            @if ($errors->has('message'))
                                                <span class="text-danger">{{ $errors->first('message') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div id="receivers">
                                        <div class="form-group row">
                                            <label for="receiver" class="col-sm-3 col-form-label">{{__('Receiver Number')}}</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="receiver"
                                                       name="receiver" value="{{ old('receiver') }}">
                                                @if ($errors->has('receiver'))
                                                    <span class="text-danger">{{ $errors->first('receiver') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="marital_status"
                                               class="col-sm-3 col-form-label">{{__('Select Category')}}</label>
                                        <div class="col-sm-6 pt-2">
                                            <label for="sms_to">
                                                <input type="radio" name="sms_to" value="people">
                                                <span class="mr-sm-2">All People</span>
                                            </label>

                                            <label for="sms_to">
                                                <input type="radio" name="sms_to" value="all">
                                                <span class="mr-sm-2">All Employees</span>
                                            </label>

                                            <label for="sms_to">
                                                <input type="radio" name="sms_to"  value="specific">
                                                <span class="mr-sm-2">Specific</span>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="card-footer text-center">
                                        @include('layouts.partials.backBtn')
                                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>&nbsp;{{__('Send Message')}}
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
    <script >
        $("#receivers").hide()
        $('input[name="sms_to"]').on('change', function () {
            if (this.value != 'specific') {
                $("#receivers").hide()
            } else {
                $("#receivers").show()
            }
        });

    </script>
@endpush





