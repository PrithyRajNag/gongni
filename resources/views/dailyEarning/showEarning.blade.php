@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Daily Earning')}}</h1>
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
                                    <div class="col-sm-12" style="text-align: center;  font-family: 'Comfortaa'; border-radius: 3px;">
                                        <i ></i>
                                        <h4>{{__("Today's Earning From Contractor Licence")}}</h4>
                                    </div>
                                    <table id="infoTable" class="table table-dark table-bordered " style="text-align: center">

                                        <thead>
                                        <tr class="text-center">
                                            <th>{{__('SL')}}</th>
                                            <th>{{__('Date')}}</th>
                                            <th>{{__('Amount')}}</th>
                                            {{--                                        <th>{{__('Total')}}</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($contractor as $item)
                                            <tr>
                                                <td>{{ ++ $loop->index}}</td>
                                                <td>{{ normalDateFormat($item->created_at) }}</td>
                                                <td>{{ $item->fees . ' '. 'Tk'  }}</td>
                                            </tr>
                                        @endforeach


                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td class="right" style="text-align: right" colspan="2"><b>Total:</b></td>
                                            <td class="right">{{$total . ' '. 'Tk'}}</td>
                                        </tr>
                                        </tfoot>

                                    </table>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form class="form-horizontal">
                                <div class="card-body">
                                    <div class="col-sm-12" style= "text-align: center; font-family: 'Comfortaa' ; border-radius: 3px;">
                                        <h4>{{__("Today's Earning From Trade Licence")}}</h4>
                                    </div>
                                    <table id="infoTable" class="table table-dark table-bordered " style="text-align: center;">
                                        <thead>
                                        <tr class="text-center">
                                            <th>{{__('SL')}}</th>
                                            <th>{{__('Date')}}</th>
                                            <th>{{__('Amount')}}</th>
                                            {{--                                        <th>{{__('Total')}}</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($tradeLicence as $item)
                                            <tr>
                                                <td>{{ ++ $loop->index}}</td>
                                                <td>{{ normalDateFormat($item->created_at) }}</td>
                                                <td>{{ $item->businessCategories->fees . ' '. 'Tk'  }}</td>
                                            </tr>
                                        @endforeach

                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <td class="right" style="text-align: right" colspan="2"><b>Total:</b></td>
                                            <td class="right">{{  ' '. 'Tk'}}</td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- /.content -->

    </div>
@endsection
@push('customScripts')
    <!-- Page specific script -->
    <script>

    </script>
@endpush


