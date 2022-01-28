@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Contractor Licence History Information')}}</h1>
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
                                    <table style="text-align: center" id="historyTable" class="table table-dark">
                                        <thead>
                                        <tr >
                                            <th>{{__('SL')}}</th>
                                            <th>{{__('Issue Date')}}</th>
                                            <th>{{__('Expire Date')}}</th>
                                            <th>{{__('Fees')}}</th>
                                            <th>{{__('Status')}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data->contractorLicenceHistory as $item)
                                            <tr>
                                                <td>{{ ++$loop->index}}</td>
                                                <td>{{ ucwords($item->start_date) }}</td>
                                                <td>{{ ucwords($item->expiry_date) }}</td>
                                                <td>{{ $item->subCategories->fees . ' ' . 'Tk'  }}</td>
                                                <td>{{ ucwords($item->flag) }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    @include('layouts.partials.backBtn')

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


