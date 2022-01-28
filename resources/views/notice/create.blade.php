@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Create Notice')}}</h1>
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
                            <form role="form" id="createForm" action="{{route('notice.store')}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="name" id="name"
                                               class="col-sm-3 col-form-label">{{__('Notice Name')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="name" name="name"
                                                   value="{{ old('name') }}" placeholder="Name" required>
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
                                                   value="{{ old('issue_date') }}" required>
                                            @if ($errors->has('issue_date'))
                                                <span class="text-danger">{{ $errors->first('issue_date') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="expire_date"
                                               class="col-sm-3 col-form-label">{{__('Expire Date')}}</label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control take_future_date" id="expire_date" name="expire_date"
                                                   value="{{ old('expire_date') }}">
                                            @if ($errors->has('expire_date'))
                                                <span class="text-danger">{{ $errors->first('expire_date') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="cover" class="col-sm-3 col-form-label">{{__('File Input')}}</label>
                                        <div class="input-group col-sm-6">
                                            <div class="custom-file">
                                                <input type="file" name="cover"
                                                       value="{{ old('cover') }}" />
                                            </div>
                                        </div>
                                        @if ($errors->has('cover'))
                                            <span class="text-danger">{{ $errors->first('cover') }}</span>
                                        @endif
                                    </div>

                                    <div class="card-footer text-center">
                                        @include('layouts.partials.backBtn')
                                        <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle"></i>&nbsp;Save
                                        </button>

                                        {{--                                        <button type="submit" class="btn btn-success swalDefaultSuccess">--}}
                                        {{--                                            <i class="fas fa-plus-circle"></i>&nbsp;Save--}}
                                        {{--                                        </button>--}}
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


