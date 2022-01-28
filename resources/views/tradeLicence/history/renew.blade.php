@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Renew Trade Licence')}}</h1>
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
                            <form role="form" id="editForm" action="{{route('tradeLicence.renewUpdate', $data->slug)}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                {{--                                @if($errors->any())--}}
                                {{--                                    {{ implode('', $errors->all('<div>:message</div>')) }}--}}
                                {{--                                @endif--}}

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-9">
{{--                                            <div class="form-group" style="font-family: Bahnschrift">--}}
{{--                                                <h5>{{__('BUSINESS INFORMATION')}}</h5>--}}
{{--                                                <hr>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="business_name" class="col-sm-6 col-md-3 col-form-label">{{__('Business Name')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucwords($data->business_name) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="business_name_bn" class="col-sm-6 col-md-3 col-form-label">{{__('Business Name (Bengali)')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ($data->business_name_bn) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="business_details" class="col-sm-6 col-md-3 col-form-label">{{__('Business Details')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucwords($data->business_details) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="shop_holding_no" class="col-sm-6 col-md-3 col-form-label">{{__('Holding No')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucwords($data->shop_holding_no) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="shop_holding_no_bn" class="col-sm-6 col-md-3 col-form-label">{{__('Holding No (Bengali)')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ($data->shop_holding_no_bn) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="address" class="col-sm-6 col-md-3 col-form-label">{{__('Address')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->address) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="address_bn" class="col-sm-6 col-md-3 col-form-label">{{__('Address (Bengali)')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ($data->address_bn) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="ward_id" class="col-sm-6 col-md-3 col-form-label">{{__('Ward')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->wards->name) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="road" class="col-sm-6 col-md-3 col-form-label">{{__('Road')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->road) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="road_bn" class="col-sm-6 col-md-3 col-form-label">{{__('Road (Bengali)')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ($data->road_bn) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="area" class="col-sm-6 col-md-3 col-form-label">{{__('Business Area')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->area) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="area_bn" class="col-sm-6 col-md-3 col-form-label">{{__('Business Area (Bengali)')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ($data->area_bn) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="shop_no" class="col-sm-6 col-md-3 col-form-label">{{__('Shop No')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->shop_no) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="floor_no" class="col-sm-6 col-md-3 col-form-label">{{__('Floor No')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->floor_no) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="market_name" class="col-sm-6 col-md-3 col-form-label">{{__('Market Name')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->market_name) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="business_start_date" class="col-sm-6 col-md-3 col-form-label">{{__('Date of Business Start')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->business_start_date) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="business_nature" class="col-sm-6 col-md-3 col-form-label">{{__('Business Nature')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst(getWordWithSpace($data->business_nature)) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="authorised_capital" class="col-sm-6 col-md-3 col-form-label">{{__('Authorised Capital')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->authorised_capital) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="paidUp_capital" class="col-sm-6 col-md-3 col-form-label">{{__('Paid up Capital')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->paidUp_capital) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="category_id" class="col-sm-6 col-md-3 col-form-label">{{__('Business Category')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->businessCategories->name) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="licence_number" class="col-sm-6 col-md-3 col-form-label">{{__('Licence Number')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->licence_number) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="category_id" class="col-sm-6 col-md-3 col-form-label">{{__('Licence Fee')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->businessCategories->fees) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="is_factory" class="col-sm-6 col-md-3 col-form-label">{{__('Factory')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->is_factory) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="is_chemical_available" class="col-sm-6 col-md-3 col-form-label">{{__('Explosive / Chemical')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst ($data->is_chemical_available) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="plot_type" class="col-sm-6 col-md-3 col-form-label">{{__('Plot Type')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst (getWordWithSpace($data->plot_type) ) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="plot_category" class="col-sm-6 col-md-3 col-form-label">{{__('Plot Category')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->plot_category) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="place" class="col-sm-6 col-md-3 col-form-label">{{__('Place of Business')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->place) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="activity" class="col-sm-6 col-md-3 col-form-label">{{__('Type of Activity')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->activity) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <br>--}}
{{--                                            <div class="form-group" style="font-family: Bahnschrift">--}}
{{--                                                <h5>{{__('PERSONAL INFORMATION')}}</h5>--}}
{{--                                                <hr>--}}
{{--                                            </div>--}}

{{--                                            <div class="form-group row">--}}
{{--                                                <label id="name" class="col-sm-6 col-md-3 col-form-label">{{__('Full Name')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->name) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="name_bn" class="col-sm-6 col-md-3 col-form-label">{{__('Full Name (Bengali)')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ($data->name_bn) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="father_name" class="col-sm-6 col-md-3 col-form-label">{{__('Father Name')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->father_name) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="father_name_bn" class="col-sm-6 col-md-3 col-form-label">{{__('Father Name (Bengali)')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ($data->father_name_bn) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="mother_name" class="col-sm-6 col-md-3 col-form-label">{{__('Mother Name')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->mother_name) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="mother_name_bn" class="col-sm-6 col-md-3 col-form-label">{{__('Mother Name (Bengali)')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ($data->mother_name_bn) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="gender" class="col-sm-6 col-md-3 col-form-label">{{__('Gender')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->gender) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="marital_status" class="col-sm-6 col-md-3 col-form-label">{{__('Marital Status')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->marital_status) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            @if( $data->marital_status == 'married' )--}}
{{--                                                <div class="form-group row">--}}
{{--                                                    <label id="spouse_name" class="col-sm-6 col-md-3 col-form-label">{{__('Spouse Name')}} :</label>--}}
{{--                                                    <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                        {{ ucfirst($data->spouse_name) }}--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group row">--}}
{{--                                                    <label id="spouse_name_bn" class="col-sm-6 col-md-3 col-form-label">{{__('Spouse Name (Bengali)')}} :</label>--}}
{{--                                                    <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                        {{ ($data->spouse_name_bn) }}--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            @endif--}}

{{--                                            <div class="form-group row">--}}
{{--                                                <label id="dob" class="col-sm-6 col-md-3 col-form-label">{{__('Date of Birth')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->dob) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="phone_number" class="col-sm-6 col-md-3 col-form-label">{{__('Phone Number')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->phone_number) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="email" class="col-sm-6 col-md-3 col-form-label">{{__('Email')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->email) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="bin" class="col-sm-6 col-md-3 col-form-label">{{__('BIN')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->bin) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="nid" class="col-sm-6 col-md-3 col-form-label">{{__('National ID')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->nid) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="passport_no" class="col-sm-6 col-md-3 col-form-label">{{__('Passport Number')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->passport_no) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="birth_reg" class="col-sm-6 col-md-3 col-form-label">{{__('Birth Registration Number')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->birth_reg) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <br>--}}
{{--                                            <div class="form-group" style="font-family: Bahnschrift">--}}
{{--                                                <h5>{{__('PRESENT ADDRESS INFORMATION')}}</h5>--}}
{{--                                                <hr>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="present_address" class="col-sm-6 col-md-3 col-form-label">{{__('Present Address')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->present_address) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="present_address_bn" class="col-sm-6 col-md-3 col-form-label">{{__('Present Address (Bengali)')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ($data->present_address_bn) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="present_holding_no" class="col-sm-6 col-md-3 col-form-label">{{__('Present Address Holding No')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->present_holding_no) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="present_holding_no_bn" class="col-sm-6 col-md-3 col-form-label">{{__('Present Address Holding No (Bengali)')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ($data->present_holding_no_bn) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="present_address_area" class="col-sm-6 col-md-3 col-form-label">{{__('Area')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->present_address_area) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="present_address_area_bn" class="col-sm-6 col-md-3 col-form-label">{{__('Area (Bengali)')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ($data->present_address_area_bn) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="present_post_code" class="col-sm-6 col-md-3 col-form-label">{{__('Post Code')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->present_post_code) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="present_post_code_bn" class="col-sm-6 col-md-3 col-form-label">{{__('Post Code (Bengali)')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ($data->present_post_code_bn) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="present_division_id" class="col-sm-6 col-md-3 col-form-label">{{__('Division')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->presentDivisions->name) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="present_district_id" class="col-sm-6 col-md-3 col-form-label">{{__('District')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->presentDistricts->name) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="present_thana_id" class="col-sm-6 col-md-3 col-form-label">{{__('Thana')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->presentThanas->name) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <br>--}}
{{--                                            <div class="form-group" style="font-family: Bahnschrift">--}}
{{--                                                <h5>{{__('PERMANENT ADDRESS INFORMATION')}}</h5>--}}
{{--                                                <hr>--}}
{{--                                            </div>--}}

{{--                                            <div class="form-group row">--}}
{{--                                                <label id="permanent_address" class="col-sm-6 col-md-3 col-form-label">{{__('Permanent Address')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->permanent_address) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="permanent_address_bn" class="col-sm-6 col-md-3 col-form-label">{{__('Permanent Address (Bengali)')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ($data->permanent_address_bn) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="permanent_holding_no" class="col-sm-6 col-md-3 col-form-label">{{__('Permanent Address Holding No')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->permanent_holding_no) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="permanent_holding_no_bn" class="col-sm-6 col-md-3 col-form-label">{{__('Permanent Address Holding No (Bengali)')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ($data->permanent_holding_no_bn) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="permanent_address_area" class="col-sm-6 col-md-3 col-form-label">{{__('Area')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->permanent_address_area) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="permanent_address_area_bn" class="col-sm-6 col-md-3 col-form-label">{{__('Area (Bengali)')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ($data->permanent_address_area_bn) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="permanent_post_code" class="col-sm-6 col-md-3 col-form-label">{{__('Post Code')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->permanent_post_code) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="permanent_post_code_bn" class="col-sm-6 col-md-3 col-form-label">{{__('Post Code (Bengali)')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ($data->permanent_post_code_bn) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="permanent_division_id" class="col-sm-6 col-md-3 col-form-label">{{__('Division')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->permanentDivisions->name) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="permanent_district_id" class="col-sm-6 col-md-3 col-form-label">{{__('District')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->permanentDistricts->name) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label id="permanent_thana_id" class="col-sm-6 col-md-3 col-form-label">{{__('Thana')}} :</label>--}}
{{--                                                <div class="col-sm-6 col-md-9 pt-2">--}}
{{--                                                    {{ ucfirst($data->permanentThanas->name) }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="form-group row">
                                                <label for="issue_date" class="col-sm-3 col-form-label">{{__('Licence Issue Date *')}} </label>
                                                <div class="col-sm-6">
                                                    <input type="date" class="form-control" id="issue_date" name="issue_date"
                                                           value="{{ old('issue_date', $data->expiry_date) }}" required>
                                                    @if ($errors->has('issue_date'))
                                                        <span class="text-danger">{{ $errors->first('issue_date') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="expiry_date" class="col-sm-3 col-form-label">{{__('Licence Expiry Date *')}} </label>
                                                <div class="col-sm-6">
                                                    <input type="date" class="form-control take_future_date" id="expiry_date" name="expiry_date"
                                                           value="{{ old('expiry_date') }}" required>
                                                    @if ($errors->has('expiry_date'))
                                                        <span class="text-danger">{{ $errors->first('expiry_date') }}</span>
                                                    @endif
                                                </div>
                                            </div>
{{--                                            <div class="form-group row">--}}
{{--                                                <label for="category_id" class="col-sm-3 col-form-label">{{__('Business Category *')}} </label>--}}
{{--                                                <div class="col-sm-6">--}}
{{--                                                    <select class="form-control select2" name="category_id" id="category_id" style="width: 100%" required>--}}
{{--                                                        <option hidden value=""></option>--}}
{{--                                                        @foreach($categories as $item)--}}
{{--                                                            <option--}}
{{--                                                                value="{{ $item->id }}" {{$item->category_id == $item->id}}>{{ucwords($item->name)}}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                        @if ($errors->has('category_id'))--}}
{{--                                                            <span class="text-danger">{{ $errors->first('category_id') }}</span>--}}
{{--                                                        @endif--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                        </div>
                                        <div class="col-sm-3">
                                            <img src="{{asset("/storage/".$data->photo)}}" class="img-thumbnail" width="100%"  >
                                        </div>
                                    </div>


                                    <div class="card-footer text-center">
                                        @include('layouts.partials.backBtn')
                                        <button type="submit" class="btn btn-success"><i class="fas fa-highlighter"></i>&nbsp;{{__('Renew')}}
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




