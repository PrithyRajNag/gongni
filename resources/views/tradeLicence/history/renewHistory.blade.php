@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Trade Licence History Information')}}</h1>
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
{{--                                    <div class="form-group row">--}}
{{--                                        <label id="company_name" class="col-sm-3 col-form-label">{{__('Company Name')}} :</label>--}}
{{--                                        <div class="col-sm-9 pt-2">--}}
{{--                                            {{ ucwords($data->company_name) }}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label id="contractor_name" class="col-sm-3 col-form-label">{{__('Contractor Name')}} :</label>--}}
{{--                                        <div class="col-sm-9 pt-2">--}}
{{--                                            {{ ucwords($data->contractor_name) }}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label id="category_id" class="col-sm-3 col-form-label">{{__('Contractor Category')}} :</label>--}}
{{--                                        <div class="col-sm-9 pt-2">--}}
{{--                                            {{ ucfirst($data->contractorCategories->name) }}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label id="category_id" class="col-sm-3 col-form-label">{{__('Contractor Enlistment Fee')}} :</label>--}}
{{--                                        <div class="col-sm-9 pt-2">--}}
{{--                                            {{ ucfirst($data->contractorCategories->fees) .' '.'BDT'}}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label id="licence_number" class="col-sm-3 col-form-label">{{__('Trade Licence Number')}} :</label>--}}
{{--                                        <div class="col-sm-9 pt-2">--}}
{{--                                            {{ ucwords($data->licence_number) }}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    --}}{{--                                    <div class="form-group row">--}}
{{--                                    --}}{{--                                        <label id="start_date" class="col-sm-3 col-form-label">{{__('Start Date')}} :</label>--}}
{{--                                    --}}{{--                                        <div class="col-sm-9 pt-2">--}}
{{--                                    --}}{{--                                            {{ ucwords($data->start_date) }}--}}
{{--                                    --}}{{--                                        </div>--}}
{{--                                    --}}{{--                                    </div>--}}
{{--                                    --}}{{--                                    <div class="form-group row">--}}
{{--                                    --}}{{--                                        <label id="expiry_date" class="col-sm-3 col-form-label">{{__('Expiry Date')}} :</label>--}}
{{--                                    --}}{{--                                        <div class="col-sm-9 pt-2">--}}
{{--                                    --}}{{--                                            {{ ucwords($data->expiry_date) }}--}}
{{--                                    --}}{{--                                        </div>--}}
{{--                                    --}}{{--                                    </div>--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label id="father_name" class="col-sm-3 col-form-label">{{__('Father Name')}} :</label>--}}
{{--                                        <div class="col-sm-9 pt-2">--}}
{{--                                            {{ ucwords($data->father_name) }}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label id="mother_name" class="col-sm-3 col-form-label">{{__('Mother Name')}} :</label>--}}
{{--                                        <div class="col-sm-9 pt-2">--}}
{{--                                            {{ ucwords($data->mother_name) }}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label id="gender" class="col-sm-3 col-form-label">{{__('Gender')}} :</label>--}}
{{--                                        <div class="col-sm-9 pt-2">--}}
{{--                                            {{ ucfirst($data->gender) }}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label id="phone_number" class="col-sm-3 col-form-label">{{__('Phone Number')}} :</label>--}}
{{--                                        <div class="col-sm-9 pt-2">--}}
{{--                                            {{ $data->phone_number }}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label id="address" class="col-sm-3 col-form-label">{{__('Office Address')}}--}}
{{--                                            :</label>--}}
{{--                                        <div class="col-sm-9 pt-2">--}}
{{--                                            {{ ucfirst($data->address) }}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label id="nid" class="col-sm-3 col-form-label">{{__('National ID')}} :</label>--}}
{{--                                        <div class="col-sm-9 pt-2">--}}
{{--                                            {{ $data->nid }}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <table style="text-align: center" id="historyTable" class="table table-dark">
                                        <thead>
                                        <tr >
                                            <th>{{__('SL')}}</th>
                                            <th>{{__('Licence Number')}}</th>
                                            <th>{{__('Issue Date')}}</th>
                                            <th>{{__('Expire Date')}}</th>
                                            <th>{{__('Fees')}}</th>
                                            <th>{{__('Status')}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data->tradeLicenceHistory as $item)
                                            <tr>
                                                <td>{{++ $loop->index}}</td>
                                                <td>{{ ucwords($item->licence_number)}}</td>
                                                <td>{{ ucwords($item->issue_date) }}</td>
                                                <td>{{ ucwords($item->expiry_date) }}</td>

                                                @if($item->flag != 'renew')
                                                    <td>{{ ucwords($item->subCategories->licence_fees) }}</td>
                                                @else
                                                    <td>{{ ucwords($item->subCategories->renewal_fees) }}</td>
                                                @endif

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


