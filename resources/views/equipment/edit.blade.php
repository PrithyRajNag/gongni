@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Update Equipment Information')}}</h1>
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
                            <form role="form" id="editForm" action="{{route('equipment.update', $data->slug)}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">{{__('Equipment Name')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="name" name="name"
                                                   value="{{ old('name', $data->name) }}" required>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-3 col-form-label">{{__('Equipment Category Name')}}</label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" name="category_id" id="category_id"
                                                    required>
                                                <option hidden
                                                        value="{{ old('category_id', $data->category_id) }}"> {{ $data->equipmentCategories->name ?? '' }}</option>
                                                @foreach($types as $item)
                                                    <option hidden
                                                        value="{{ $item->id }}"{{$item->category_id == $item->id  ? 'selected' : ''}} >{{ucwords($item->name)}}</option>
                                                @endforeach
                                                @if ($errors->has('category_id'))
                                                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
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
        //For Equipment Name
        $("input[name*='name']").keyup(function () {
            let value_input = $("input[name*='name']").val();
            let regexp = /[^A-Za-z. ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='name']").val(value_input.replace(regexp, ''))
            }
        });

    </script>
@endpush




