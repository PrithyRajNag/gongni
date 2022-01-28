@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Update Circular')}}</h1>
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
                            <form role="form" id="editForm" action="{{route('circular.update', $data->slug)}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">{{__('Circular Name')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="name" name="name"
                                                   value="{{ old('name', $data->name) }}" required>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="issue_date"
                                               class="col-sm-3 col-form-label">{{__('Issue Date')}}</label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control take_past_date" id="issue_date" name="issue_date"
                                                   value="{{ old('issue_date', $data->issue_date) }}" required>
                                            @if ($errors->has('issue_date'))
                                                <span class="text-danger">{{ $errors->first('issue_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="issue_date"
                                               class="col-sm-3 col-form-label">{{__('Expire Date')}}</label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control take_future_date" id="expire_date" name="expire_date"
                                                   value="{{ old('expire_date', $data->expire_date) }}">
                                            @if ($errors->has('expire_date'))
                                                <span class="text-danger">{{ $errors->first('expire_date') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="file" class="col-sm-3 col-form-label">{{__('Upload Document')}}</label>
                                        <div class="col-sm-6">
                                            <div class="custom-file">
                                                <input type="file" name="file"
                                                       value="{{ old('file', $data->file) }}">
                                            </div>
                                            @if ($errors->has('file'))
                                                <span class="text-danger">{{ $errors->first('file') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="file" class="col-sm-3 col-form-label">{{__('Uploaded Document')}}</label>
                                        <div class="col-sm-6 mt-2">
                                            @if($data->file != null)
                                                <a href="{{ route('circular.download',  $data->slug) }}" class="text-light" title="Click to download">{{ $data->file }}</a>
                                            @else
                                                {{ __("No Files Available") }}
                                            @endif
                                        </div>
                                    </div>
{{--                                    <iframe src="{{ url('storage/app/uploads/'. $data->cover) }}" ></iframe>--}}

{{--                                <iframe src="{{ asset( 'uploads/'.  $data->cover ) }}"></iframe>                 --}}
{{--                                <iframe src="{{ $data->file_path }}"></iframe>                                  --}}
{{--                                <iframe src="{{ $data->file_path }}"></iframe>                                  --}}

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
        //For Circular Name
        $("input[name*='name']").keyup(function () {
            let value_input = $("input[name*='name']").val();
            let regexp = /[^A-Za-z ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='name']").val(value_input.replace(regexp, ''))
            }
        });

    </script>
@endpush


