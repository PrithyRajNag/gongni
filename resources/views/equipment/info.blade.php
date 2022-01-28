@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Equipment Information')}}</h1>
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
                                        <label id="name" class="col-sm-3 col-form-label">{{__('Equipment Name')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucfirst($data->name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="category_id" class="col-sm-3 col-form-label">{{__('Equipment Category Name')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucfirst($data->equipmentCategories->name ?? '') }}
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    @include('layouts.partials.backBtn')
                                    <a href="{{ route('equipment.edit', $data->slug) }}"
                                       class="btn btn-primary"><i class="fas fa-highlighter"></i>&nbsp;
                                    {{__('Update')}}</a>

                                    <a href="{{ route('equipment.delete', $data->slug) }}" class="btn btn-danger"><i
                                            class="fas fa-trash"></i>&nbsp;{{__('Delete')}}</a>
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


