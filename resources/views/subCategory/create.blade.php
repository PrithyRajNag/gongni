@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Create Sub Category')}}</h1>
                    </div>
                </div><!-- /.container-fluid -->
                </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <form role="form" id="createForm" action="{{route('subCategory.store')}}" class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-3 col-form-label">{{__('Select Category Name')}}</label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" name="category_id" id="category_id" style="width: 100%">
                                                <option hidden value=""></option>
                                                @foreach($categories as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{$item->category_id == $item->id}}>{{ucwords($item->name)}}</option>
                                                @endforeach
                                                @if ($errors->has('category_id'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('category_id') }}</span>
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" id="name" class="col-sm-3 col-form-label">{{_('Sub Category Name')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="name" name="name"
                                                   value="{{ old('name') }}" required>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="licence_fees" id="licence_fees" class="col-sm-3 col-form-label">{{_('Fees')}}</label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control" id="licence_fees" name="licence_fees"
                                                   value="{{ old('licence_fees') }}" required>
                                            @if ($errors->has('licence_fees'))
                                                <span class="text-danger">{{ $errors->first('licence_fees') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="renewal_fees" id="licence_fees" class="col-sm-3 col-form-label">{{_('Renewal Fees')}}</label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control" id="renewal_fees" name="renewal_fees"
                                                   value="{{ old('renewal_fees') }}" required>
                                            @if ($errors->has('renewal_fees'))
                                                <span class="text-danger">{{ $errors->first('renewal_fees') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="card-footer text-center">
                                        @include('layouts.partials.backBtn')
                                        <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle"></i>&nbsp;Save</button>

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


