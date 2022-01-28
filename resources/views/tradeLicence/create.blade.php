@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Create Trade Licence ')}}</h1>
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
                            <form role="form" id="createForm" action="{{route('tradeLicence.store')}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
{{--                                @if($errors->any())--}}
{{--                                    {{ implode('', $errors->all('<div>:message</div>')) }}--}}

{{--                                @endif--}}


                                <div class="card-body">
                                    <div class="form-group">
                                        <h5><b>{{__('BUSINESS INFORMATION')}}</b></h5>
                                        <hr>
                                    </div>
                                    <div class="form-group row">
                                        <label for="business_name" class="col-sm-3 col-form-label">{{__('Business Name (English) *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="business_name" name="business_name"
                                                   value="{{ old('business_name') }}" required>
                                            @if ($errors->has('business_name'))
                                                <span class="text-danger">{{ $errors->first('business_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="business_name_bn" class="col-sm-3 col-form-label">{{__('Business Name (Bengali) *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="business_name_bn" name="business_name_bn"
                                                   value="{{ old('business_name_bn') }}" required>
                                            @if ($errors->has('business_name_bn'))
                                                <span class="text-danger">{{ $errors->first('business_name_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="business_details" class="col-sm-3 col-form-label">{{__('Business Details *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="business_details" name="business_details"
                                                   value="{{ old('business_details') }}" required>
                                            @if ($errors->has('business_details'))
                                                <span class="text-danger">{{ $errors->first('business_details') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="shop_holding_no" class="col-sm-3 col-form-label">{{__('Holding No *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="shop_holding_no" name="shop_holding_no"
                                                   value="{{ old('shop_holding_no') }}" required>
                                            @if ($errors->has('shop_holding_no'))
                                                <span class="text-danger">{{ $errors->first('shop_holding_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="shop_holding_no_bn" class="col-sm-3 col-form-label">{{__('Holding No (Bnegali) *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="shop_holding_no_bn" name="shop_holding_no_bn"
                                                   value="{{ old('shop_holding_no_bn') }}" required>
                                            @if ($errors->has('shop_holding_no_bn'))
                                                <span class="text-danger">{{ $errors->first('shop_holding_no_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-3 col-form-label">{{__('Address *')}} </label>
                                        <div class="col-sm-6">
                                            <textarea type="text" name="address" id="address"
                                                      class="form-control" required>{{ old('address') }}</textarea>
                                            @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address_bn" class="col-sm-3 col-form-label">{{__('Address (Bengali) *')}} </label>
                                        <div class="col-sm-6">
                                            <textarea type="text" name="address_bn" id="address_bn"
                                                      class="form-control" required>{{ old('address_bn') }}</textarea>
                                            @if ($errors->has('address_bn'))
                                                <span class="text-danger">{{ $errors->first('address_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ward_id" class="col-sm-3 col-form-label">{{__('Ward *')}} </label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" name="ward_id" id="ward_id" style="width: 100%" required>
                                                <option hidden value=""></option>
                                                @foreach($wards as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{$item->ward_id == $item->id}}>{{ucwords($item->name)}}</option>
                                                @endforeach
                                                @if ($errors->has('ward_id'))
                                                    <span class="text-danger">{{ $errors->first('ward_id') }}</span>
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="road" class="col-sm-3 col-form-label">{{__('Road *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="road" name="road" value="{{ old('road') }}" required>
                                            @if ($errors->has('road'))
                                                <span class="text-danger">{{ $errors->first('road') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="road_bn" class="col-sm-3 col-form-label">{{__('Road (Bengali) *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="road_bn" name="road_bn" value="{{ old('road_bn') }}" required>
                                            @if ($errors->has('road_bn'))
                                                <span class="text-danger">{{ $errors->first('road_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="area" class="col-sm-3 col-form-label">{{__('Business Area *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="area"
                                                   name="area" value="{{ old('area') }}"
                                                   required>
                                            @if ($errors->has('area'))
                                                <span class="text-danger">{{ $errors->first('area') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="area_bn" class="col-sm-3 col-form-label">{{__('Business Area (Bengali) *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="area_bn"
                                                   name="area_bn" value="{{ old('area_bn') }}"
                                                   required>
                                            @if ($errors->has('area_bn'))
                                                <span class="text-danger">{{ $errors->first('area_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="shop_no" class="col-sm-3 col-form-label">{{__('Shop No')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="shop_no"
                                                   name="shop_no" value="{{ old('shop_no') }}"
                                                   required>
                                            @if ($errors->has('shop_no'))
                                                <span class="text-danger">{{ $errors->first('shop_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="market_name" class="col-sm-3 col-form-label">{{__('Name of Market')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="market_name"
                                                   name="market_name" value="{{ old('market_name') }}"
                                                   required>
                                            @if ($errors->has('market_name'))
                                                <span class="text-danger">{{ $errors->first('market_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="floor_no" class="col-sm-3 col-form-label">{{__('Floor No')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="floor_no"
                                                   name="floor_no" value="{{ old('floor_no') }}"
                                                   required>
                                            @if ($errors->has('floor_no'))
                                                <span class="text-danger">{{ $errors->first('floor_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="business_start_date"
                                               class="col-sm-3 col-form-label">{{__('Date of Business Start *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control" id="business_start_date" name="business_start_date"
                                                   value="{{ old('business_start_date') }}">
                                            @if ($errors->has('business_start_date'))
                                                <span class="text-danger">{{ $errors->first('business_start_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="business_nature" class="col-sm-3 col-form-label">{{__('Nature of Business *')}} </label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="company">
                                                    <input type="radio" name="business_nature"
                                                           value="company">
                                                    <span class="mr-2 mt-0">{{__('Company')}}</span>
                                                </label>
                                                <label for="other_single">
                                                    <input type="radio" name="business_nature"
                                                           value="other_single">
                                                    <span class="mr-2">{{__('Other-Single')}}</span>
                                                </label>
                                                <label for="other_partnership">
                                                    <input type="radio" name="business_nature"
                                                           value="other_partnership">
                                                    <span class="mr-2">{{__('Other-Partnership')}}</span>
                                                </label>
                                                @if ($errors->has('business_nature'))
                                                    <span class="text-danger">{{ $errors->first('business_nature') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="authorised_capital" class="col-sm-3 col-form-label">{{__('Authorised Capital *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="authorised_capital" name="authorised_capital"
                                                   value="{{ old('authorised_capital') }}" required>
                                            @if ($errors->has('authorised_capital'))
                                                <span class="text-danger">{{ $errors->first('authorised_capital') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="paidUp_capital" class="col-sm-3 col-form-label">{{__('Paid up Capital *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="paidUp_capital" name="paidUp_capital"
                                                   value="{{ old('paidUp_capital') }}" required>
                                            @if ($errors->has('paidUp_capital'))
                                                <span class="text-danger">{{ $errors->first('paidUp_capital') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sub_category_id" class="col-sm-3 col-form-label">{{__('Business Category *')}} </label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" name="sub_category_id" id="sub_category_id" style="width: 100%" required>
                                                <option hidden value=""></option>
                                                @foreach($categories as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{$item->sub_category_id == $item->id}}>{{ucwords($item->name)}}</option>
                                                @endforeach
                                                @if ($errors->has('sub_category_id'))
                                                    <span class="text-danger">{{ $errors->first('sub_category_id') }}</span>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="licence_number" class="col-sm-3 col-form-label">{{__('Licence Number *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="licence_number" name="licence_number"
                                                   value="{{ old('licence_number') }}" required>
                                            @if ($errors->has('licence_number'))
                                                <span class="text-danger">{{ $errors->first('licence_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="issue_date" class="col-sm-3 col-form-label">{{__('Licence Issue Date *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control take_past_date" id="issue_date" name="issue_date"
                                                   value="{{ old('issue_date') }}" required>
                                            @if ($errors->has('issue_date'))
                                                <span class="text-danger">{{ $errors->first('issue_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="expiry_date" class="col-sm-3 col-form-label">{{__('Licence Expiry Date *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control take_future_date" id="expiry_date" name="expiry_date"
                                                   value="{{ old('expiry_date') }} " required>
                                            @if ($errors->has('expiry_date'))
                                                <span class="text-danger">{{ $errors->first('expiry_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="is_factory" class="col-sm-3 col-form-label">{{__('Factory *')}} </label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="is_factory_yes">
                                                    <input type="radio" name="is_factory"
                                                           value="yes">
                                                    <span class="mr-2 mt-0">{{__('Yes')}}</span>
                                                </label>
                                                <label for="is_factory_no">
                                                    <input type="radio" name="is_factory"
                                                           value="no">
                                                    <span class="mr-2">{{__('No')}}</span>
                                                </label>
                                                @if ($errors->has('is_factory'))
                                                    <span class="text-danger">{{ $errors->first('is_factory') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="is_chemical_available" class="col-sm-3 col-form-label">{{__('Chemical / Explosive *')}} </label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="is_chemical_available_yes">
                                                    <input type="radio" name="is_chemical_available"
                                                           value="yes">
                                                    <span class="mr-2 mt-0">{{__('Yes')}}</span>
                                                </label>
                                                <label for="is_chemical_available_no">
                                                    <input type="radio" name="is_chemical_available"
                                                           value="no">
                                                    <span class="mr-2">{{__('No')}}</span>
                                                </label>
                                                @if ($errors->has('is_chemical_available'))
                                                    <span class="text-danger">{{ $errors->first('is_chemical_available') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="plot_type" class="col-sm-3 col-form-label">{{__('Plot Type *')}} </label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="government">
                                                    <input type="radio" name="plot_type"
                                                           value="government">
                                                    <span class="mr-2 mt-0">{{__('Government')}}</span>
                                                </label>
                                                <label for="non_government">
                                                    <input type="radio" name="plot_type"
                                                           value="non_government">
                                                    <span class="mr-2">{{__('Non-Government')}}</span>
                                                </label>
                                                @if ($errors->has('plot_type'))
                                                    <span class="text-danger">{{ $errors->first('plot_type') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="plot_category" class="col-sm-3 col-form-label">{{__('Plot Category *')}} </label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="residential">
                                                    <input type="radio" name="plot_category"
                                                           value="residential">
                                                    <span class="mr-2 mt-0">{{__('Residential')}}</span>
                                                </label>
                                                <label for="commercial">
                                                    <input type="radio" name="plot_category"
                                                           value="commercial">
                                                    <span class="mr-2">{{__('Commercial')}}</span>
                                                </label>
                                                @if ($errors->has('plot_category'))
                                                    <span class="text-danger">{{ $errors->first('plot_category') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="place" class="col-sm-3 col-form-label">{{__('Place of Business *')}} </label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="own">
                                                    <input type="radio" name="place"
                                                           value="own">
                                                    <span class="mr-2 mt-0">{{__('Own')}}</span>
                                                </label>
                                                <label for="rented">
                                                    <input type="radio" name="place"
                                                           value="rented">
                                                    <span class="mr-2">{{__('Rented')}}</span>
                                                </label>
                                                @if ($errors->has('place'))
                                                    <span class="text-danger">{{ $errors->first('place') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="activity" class="col-sm-3 col-form-label">{{__('Type of Activity *')}} </label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="other">
                                                    <input type="radio" name="activity"
                                                           value="other">
                                                    <span class="mr-2 mt-0">{{__('Other')}}</span>
                                                </label>
                                                <label for="retail">
                                                    <input type="radio" name="activity"
                                                           value="retail">
                                                    <span class="mr-2">{{__('Retail')}}</span>
                                                </label>
                                                <label for="wholesale">
                                                    <input type="radio" name="activity"
                                                           value="wholesale">
                                                    <span class="mr-2">{{__('Wholesale')}}</span>
                                                </label>
                                                @if ($errors->has('activity'))
                                                    <span class="text-danger">{{ $errors->first('activity') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5><b>{{__('PERSONAL INFORMATION ')}}</b></h5>
                                        <hr>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">{{__('Full Name *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="name" name="name"
                                                   value="{{ old('name') }}" required>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name_bn" class="col-sm-3 col-form-label">{{__('Full Name (Bengali) *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="name_bn" name="name_bn"
                                                   value="{{ old('name_bn') }}" required>
                                            @if ($errors->has('name_bn'))
                                                <span class="text-danger">{{ $errors->first('name_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="father_name" class="col-sm-3 col-form-label">{{__('Father Name *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="father_name" name="father_name" value="{{ old('father_name') }}" required>
                                            @if ($errors->has('father_name'))
                                                <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="father_name_bn" class="col-sm-3 col-form-label">{{__('Father Name (Bengali) *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="father_name_bn" name="father_name_bn" value="{{ old('father_name_bn') }}" required>
                                            @if ($errors->has('father_name_bn'))
                                                <span class="text-danger">{{ $errors->first('father_name_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mother_name" class="col-sm-3 col-form-label">{{__('Mother Name *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="mother_name" name="mother_name"
                                                   value="{{ old('mother_name') }}" required>
                                            @if ($errors->has('mother_name'))
                                                <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mother_name_bn" class="col-sm-3 col-form-label">{{__('Mother Name (Bengali) *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="mother_name_bn" name="mother_name_bn"
                                                   value="{{ old('mother_name_bn') }}" required>
                                            @if ($errors->has('mother_name_bn'))
                                                <span class="text-danger">{{ $errors->first('mother_name_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-3 col-form-label">{{__('Gender *')}} </label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="male">
                                                    <input type="radio" name="gender"
                                                           value="male">
                                                    <span class="mr-2 mt-0">{{__('Male')}}</span>
                                                </label>
                                                <label for="female">
                                                    <input type="radio" name="gender"
                                                           value="female">
                                                    <span class="mr-2">{{__('Female')}}</span>
                                                </label>
                                                <label for="other">
                                                    <input type="radio" name="gender"
                                                           value="other">
                                                    <span class="mr-2">{{__('Other')}}</span>
                                                </label>
                                                @if ($errors->has('gender'))
                                                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="marital_status"
                                               class="col-sm-3 col-form-label">{{__('Marital Status *')}}</label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="married">
                                                    <input type="radio" name="marital_status"
                                                           value="married">
                                                    <span class="mr-2 mt-0">{{__('Married')}}</span>
                                                </label>
                                                <label for="unmarried">
                                                    <input type="radio" name="marital_status"
                                                           value="unmarried">
                                                    <span class="mr-2">{{__('Unmarried')}}</span>
                                                </label>
                                                @if ($errors->has('marital_status'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('marital_status') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div id="spouse_names">
                                        <div class="form-group row">
                                            <label for="spouse_name"
                                                   class="col-sm-3 col-form-label">{{__('Spouse Name *')}}</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="spouse_name"
                                                       name="spouse_name" value="{{ old('spouse_name') }}">
                                                @if ($errors->has('spouse_name'))
                                                    <span class="text-danger">{{ $errors->first('spouse_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div id="spouse_names_bn">
                                        <div class="form-group row">
                                            <label for="spouse_name_bn"
                                                   class="col-sm-3 col-form-label">{{__('Spouse Name (Bengali) *')}}</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="spouse_name_bn"
                                                       name="spouse_name_bn" value="{{ old('spouse_name_bn') }}">
                                                @if ($errors->has('spouse_name_bn'))
                                                    <span class="text-danger">{{ $errors->first('spouse_name_bn') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dob" class="col-sm-3 col-form-label">{{__('Date Of Birth *')}}</label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control take_past_date" id="dob" name="dob" value="{{ old('dob') }}" required>
                                            @if ($errors->has('dob'))
                                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone_number" class="col-sm-3 col-form-label">{{__('Phone Number *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="phone_number"
                                                   name="phone_number" value="{{ old('phone_number') }}"
                                                   required>
                                            @if ($errors->has('phone_number'))
                                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">{{__('Email *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="email" class="form-control" id="email"
                                                   name="email" value="{{ old('email') }}"
                                                   required>
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bin" class="col-sm-3 col-form-label">{{__('BIN Number *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="bin" name="bin"
                                                   value="{{ old('bin') }}" required>
                                            @if ($errors->has('bin'))
                                                <span class="text-danger">{{ $errors->first('bin') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nid" class="col-sm-3 col-form-label">{{__('National Id *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="nid" name="nid"
                                                   value="{{ old('nid') }}" required>
                                            @if ($errors->has('nid'))
                                                <span class="text-danger">{{ $errors->first('nid') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="passport_no" class="col-sm-3 col-form-label">{{__('Passport Number')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="passport_no" name="passport_no"
                                                   value="{{ old('passport_no') }}" required>
                                            @if ($errors->has('passport_no'))
                                                <span class="text-danger">{{ $errors->first('passport_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="birth_reg" class="col-sm-3 col-form-label">{{__('Birth Reg *')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="birth_reg" name="birth_reg" value="{{ old('birth_reg') }}" required>
                                            @if ($errors->has('birth_reg'))
                                                <span class="text-danger">{{ $errors->first('birth_reg') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5><b>{{__('PRESENT ADDRESS INFORMATION ')}}</b></h5>
                                        <hr>
                                    </div>
                                    <div class="form-group row">
                                        <label for="present_address" class="col-sm-3 col-form-label">{{__('Present Address *')}}</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" name="present_address" id="present_address"
                                                      class="form-control" required>{{ old('present_address') }}</textarea>
                                            @if ($errors->has('present_address'))
                                                <span class="text-danger">{{ $errors->first('present_address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="present_address_bn" class="col-sm-3 col-form-label">{{__('Present Address (Bengali) *')}}</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" name="present_address_bn" id="present_address_bn"
                                                      class="form-control" required>{{ old('present_address_bn') }}</textarea>
                                            @if ($errors->has('present_address_bn'))
                                                <span class="text-danger">{{ $errors->first('present_address_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="present_holding_no" class="col-sm-3 col-form-label">{{__('Holding No *')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="present_holding_no" id="present_holding_no"
                                                       value="{{ old('present_holding_no') }}"  required >
                                            @if ($errors->has('present_holding_no'))
                                                <span class="text-danger">{{ $errors->first('present_holding_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="present_holding_no_bn" class="col-sm-3 col-form-label">{{__('Holding No (Bengali) *')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="present_holding_no_bn" id="present_holding_no_bn"
                                                   value="{{ old('present_holding_no_bn') }}"  required >
                                            @if ($errors->has('present_holding_no_bn'))
                                                <span class="text-danger">{{ $errors->first('present_holding_no_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="present_address_area" class="col-sm-3 col-form-label">{{__('Area *')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="present_address_area" id="present_address_area"
                                                      class="form-control" value="{{ old('present_address_area') }}" required>
                                            @if ($errors->has('present_address_area'))
                                                <span class="text-danger">{{ $errors->first('present_address_area') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="present_address_area_bn" class="col-sm-3 col-form-label">{{__('Area (Bengali) *')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="present_address_area_bn" id="present_address_area_bn"
                                                   class="form-control" value="{{ old('present_address_area_bn') }}" required>
                                            @if ($errors->has('present_address_area_bn'))
                                                <span class="text-danger">{{ $errors->first('present_address_area_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="present_post_code" class="col-sm-3 col-form-label">{{__('Post Code *')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="present_post_code" id="present_post_code"
                                                      class="form-control" value="{{ old('present_post_code') }}" required>
                                            @if ($errors->has('present_post_code'))
                                                <span class="text-danger">{{ $errors->first('present_post_code') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="present_post_code_bn" class="col-sm-3 col-form-label">{{__('Post Code (Bengali) *')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="present_post_code_bn" id="present_post_code_bn"
                                                   class="form-control" value="{{ old('present_post_code_bn') }}" required>
                                            @if ($errors->has('present_post_code_bn'))
                                                <span class="text-danger">{{ $errors->first('present_post_code_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="present_division_id" class="col-sm-3 col-form-label">{{__('Division *')}} </label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" onchange="setPresentDistrictDropdown()" name="present_division_id" id="present_division_id" style="width: 100%" required>
                                                <option hidden value=""></option>
                                                @foreach($location as $item)
                                                    <option
                                                        value="{{ $item->id }}" data-relation="{{ $item->districts }}" >{{ucwords($item->name)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="present_district_id" class="col-sm-3 col-form-label">{{__('District *')}} </label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" disabled onchange="setPresentThanaDropdown()" name="present_district_id" id="present_district_id" style="width: 100%" required>
                                                <option hidden value="" >---Select Division First---</option>
{{--                                                @foreach($location as $item)--}}
{{--                                                    <option--}}
{{--                                                        value="{{ $item->id }}" onclick="setDistrictDropdown( {{$item->districts}} )" >{{ucwords($item->name)}}</option>--}}
{{--                                                @endforeach--}}

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="present_thana_id" class="col-sm-3 col-form-label">{{__('Thana *')}} </label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" disabled name="present_thana_id" id="present_thana_id" style="width: 100%" required>
                                                <option hidden value="">---Select District first---</option>
{{--                                                @foreach($location as $item)--}}
{{--                                                    <option--}}
{{--                                                        value="{{ $item->id }}" onclick="setDistrictDropdown( {{$item->districts}} )" >{{ucwords($item->name)}}</option>--}}
{{--                                                @endforeach--}}
                                                {{--                                                @if ($errors->has('ward_id'))--}}
                                                {{--                                                    <span class="text-danger">{{ $errors->first('ward_id') }}</span>--}}
                                                {{--                                                @endif--}}
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5><b>{{__('PERMANENT ADDRESS INFORMATION')}}</b></h5>
                                        <hr>
                                    </div>

                                    <div class="form-group row">
                                        <label for="permanent_address" class="col-sm-3 col-form-label">{{__('Permanent Address *')}}</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" name="permanent_address" id="permanent_address"
                                                      class="form-control" required>{{ old('permanent_address') }}</textarea>
                                            @if ($errors->has('permanent_address'))
                                                <span class="text-danger">{{ $errors->first('permanent_address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="permanent_address_bn" class="col-sm-3 col-form-label">{{__('Permanent Address (Bengali) *')}}</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" name="permanent_address_bn" id="permanent_address_bn"
                                                      class="form-control" required>{{ old('permanent_address_bn') }}</textarea>
                                            @if ($errors->has('permanent_address_bn'))
                                                <span class="text-danger">{{ $errors->first('permanent_address_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="permanent_holding_no" class="col-sm-3 col-form-label">{{__('Holding No *')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="permanent_holding_no" id="permanent_holding_no"
                                                      class="form-control" value="{{ old('permanent_holding_no') }}" required>
                                            @if ($errors->has('permanent_holding_no'))
                                                <span class="text-danger">{{ $errors->first('permanent_holding_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="permanent_holding_no_bn" class="col-sm-3 col-form-label">{{__('Holding No (Bengali) *')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="permanent_holding_no_bn" id="permanent_holding_no_bn"
                                                   class="form-control" value="{{ old('permanent_holding_no_bn') }}" required>
                                            @if ($errors->has('permanent_holding_no_bn'))
                                                <span class="text-danger">{{ $errors->first('permanent_holding_no_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="permanent_address_area" class="col-sm-3 col-form-label">{{__('Area *')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="permanent_address_area" id="permanent_address_area"
                                                      class="form-control" value="{{ old('permanent_address_area') }}" required>
                                            @if ($errors->has('permanent_address_area'))
                                                <span class="text-danger">{{ $errors->first('permanent_address_area') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="permanent_address_area_bn" class="col-sm-3 col-form-label">{{__('Area (Bengali) *')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="permanent_address_area_bn" id="permanent_address_area_bn"
                                                   class="form-control" value="{{ old('permanent_address_area_bn') }}" required>
                                            @if ($errors->has('permanent_address_area_bn'))
                                                <span class="text-danger">{{ $errors->first('permanent_address_area_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="permanent_post_code" class="col-sm-3 col-form-label">{{__('Post Code *')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="permanent_post_code" id="permanent_post_code"
                                                      class="form-control" value="{{ old('permanent_post_code') }}" required>
                                            @if ($errors->has('permanent_post_code'))
                                                <span class="text-danger">{{ $errors->first('permanent_post_code') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="permanent_post_code_bn" class="col-sm-3 col-form-label">{{__('Post Code (Bengali) *')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="permanent_post_code_bn" id="permanent_post_code_bn"
                                                   class="form-control" value="{{ old('permanent_post_code_bn') }}" required>
                                            @if ($errors->has('permanent_post_code_bn'))
                                                <span class="text-danger">{{ $errors->first('permanent_post_code_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="permanent_division_id" class="col-sm-3 col-form-label">{{__('Division *')}} </label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" onchange="setPermanentDistrictDropdown()" name="permanent_division_id" id="permanent_division_id" style="width: 100%" required>
                                                <option hidden value=""></option>
                                                @foreach($location as $item)
                                                    <option
                                                        value="{{ $item->id }}" data-relation="{{ $item->districts }}" >{{ucwords($item->name)}}</option>
                                                @endforeach
                                                {{--                                                @if ($errors->has('ward_id'))--}}
                                                {{--                                                    <span class="text-danger">{{ $errors->first('ward_id') }}</span>--}}
                                                {{--                                                @endif--}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="permanent_district_id" class="col-sm-3 col-form-label">{{__('District *')}} </label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" disabled onchange="setPermanentThanaDropdown()" name="permanent_district_id" id="permanent_district_id" style="width: 100%" required>
                                                <option hidden value="">---Select Division First---</option>
                                                {{--                                                @foreach($location as $item)--}}
                                                {{--                                                    <option--}}
                                                {{--                                                        value="{{ $item->id }}" onclick="setDistrictDropdown( {{$item->districts}} )" >{{ucwords($item->name)}}</option>--}}
                                                {{--                                                @endforeach--}}
                                                {{--                                                @if ($errors->has('ward_id'))--}}
                                                {{--                                                    <span class="text-danger">{{ $errors->first('ward_id') }}</span>--}}
                                                {{--                                                @endif--}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="permanent_thana_id" class="col-sm-3 col-form-label">{{__('Thana *')}} </label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" disabled name="permanent_thana_id" id="permanent_thana_id" style="width: 100%" required>
                                                <option hidden value="">---Select District first---</option>
                                                {{--                                                @foreach($location as $item)--}}
                                                {{--                                                    <option--}}
                                                {{--                                                        value="{{ $item->id }}" onclick="setDistrictDropdown( {{$item->districts}} )" >{{ucwords($item->name)}}</option>--}}
                                                {{--                                                @endforeach--}}
                                                {{--                                                @if ($errors->has('ward_id'))--}}
                                                {{--                                                    <span class="text-danger">{{ $errors->first('ward_id') }}</span>--}}
                                                {{--                                                @endif--}}
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="photo" class="col-sm-3 col-form-label">{{__('Upload Image *')}}</label>
                                        <div class="input-group col-sm-6">
                                            <div class="custom-file col-sm-6">
                                                <input type="file" name="photo" id="photo" value="{{ old('photo') }}" />
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <div id="image-holder"  style="width: 200px; position: relative"></div>
                                            </div>

                                        </div>
                                        @if ($errors->has('photo'))
                                            <span class="text-danger">{{ $errors->first('photo') }}</span>
                                        @endif
                                    </div>


                                    <div class="card-footer text-center">
                                        @include('layouts.partials.backBtn')
                                        <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle"></i>&nbsp;{{__('Save')}}
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
        var district_list;

        function setPresentDistrictDropdown(){
            var i;
            console.log("setPresentDistrictDropdown(districts)")
            var select_tag = document.getElementById("present_division_id");
            // $('#present_district_id').find('option').first().remove();
            var option_data = select_tag.options[select_tag.selectedIndex].dataset.relation;
            var dataset = JSON.parse(option_data);
            for (i = 0; i < dataset.length; i++){
                var list = '<option value="'+ dataset[i].id +'" data-relation="'+ i +'">'+ dataset[i].name +'</option>'
                $('#present_district_id').append(list);
            }
            district_list = dataset
            $('#present_district_id').removeAttr('disabled');
        }

        function setPresentThanaDropdown(){
            var i;
            console.log("setPresentThanaDropdown()")
            var select_tag = document.getElementById("present_district_id");
            // $('#present_thana_id').find('option').first().remove();
            var option_data = select_tag.options[select_tag.selectedIndex].dataset.relation;
            var dataset = district_list[option_data].thanas;
            for (i = 0; i < dataset.length; i++){
                var list = '<option value="'+ dataset[i].id +'" >'+ dataset[i].name +'</option>'
                $('#present_thana_id').append(list);
            }
            $('#present_thana_id').removeAttr('disabled');
        }

        var district_list;

        function setPermanentDistrictDropdown(){
            var i;
            console.log("setPermanentDistrictDropdown(districts)")
            var select_tag = document.getElementById("permanent_division_id");
            // $('#permanent_district_id').find('option').first().remove();
            var option_data = select_tag.options[select_tag.selectedIndex].dataset.relation;
            var dataset = JSON.parse(option_data);
            for (i = 0; i < dataset.length; i++){
                var list = '<option value="'+ dataset[i].id +'" data-relation="'+ i +'">'+ dataset[i].name +'</option>'
                $('#permanent_district_id').append(list);
            }
            district_list = dataset
            $('#permanent_district_id').removeAttr('disabled');
        }

        function setPermanentThanaDropdown(){
            var i;
            console.log("setPermanentThanaDropdown()")
            var select_tag = document.getElementById("permanent_district_id");
            // $('#permanent_thana_id').find('option').first().remove();
            var option_data = select_tag.options[select_tag.selectedIndex].dataset.relation;
            var dataset = district_list[option_data].thanas;
            for (i = 0; i < dataset.length; i++){
                var list = '<option value="'+ dataset[i].id +'" >'+ dataset[i].name +'</option>'
                $('#permanent_thana_id').append(list);
            }
            $('#permanent_thana_id').removeAttr('disabled');
        }

        // function isNumber(value){
        //     let regexp = /[^0-9+]/g;
        //     if (value.match(regexp)) {
        //         return value.replace(regexp, '')
        //     }
        // }

        $("#spouse_names").hide();
        $("#spouse_names_bn").hide();

        //For Business Name
        $("input[name*='business_name']").keyup(function () {
            let value_input = $("input[name*='business_name']").val();
            let regexp = /[^A-Za-z.& ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='business_name']").val(value_input.replace(regexp, ''))
            }
        });

        //For Phone Number
        $("input[name*='phone_number']").keyup(function () {
            let value_input = $("input[name*='phone_number']").val();
            let regexp = /[^0-9+]/g;
            if (value_input.match(regexp)) {
                $("input[name*='phone_number']").val(value_input.replace(regexp, ''))
            }
        });
        //For National Id
        $("input[name*='nid']").keyup(function () {
            let value_input = $("input[name*='nid']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='nid']").val(value_input.replace(regexp, ''))
            }
        });
        //For BIN Number
        $("input[name*='bin']").keyup(function () {
            let value_input = $("input[name*='bin']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='bin']").val(value_input.replace(regexp, ''))
            }
        });
        //For Passport Number
        $("input[name*='passport_no']").keyup(function () {
            let value_input = $("input[name*='passport_no']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='passport_no']").val(value_input.replace(regexp, ''))
            }
        });
        //For Birth Registration Number
        $("input[name*='birth_reg']").keyup(function () {
            let value_input = $("input[name*='birth_reg']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='birth_reg']").val(value_input.replace(regexp, ''))
            }
        });

        //For Full Name
        $("input[name*='name']").keyup(function () {
            let value_input = $("input[name*='name']").val();
            let regexp = /[^A-Za-z. ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='name']").val(value_input.replace(regexp, ''))
            }
        });
        //For Father's Name
        $("input[name*='father_name']").keyup(function () {
            let value_input = $("input[name*='father_name']").val();
            let regexp = /[^A-Za-z. ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='father_name']").val(value_input.replace(regexp, ''))
            }
        });
        //For Mother's Name
        $("input[name*='mother_name']").keyup(function () {
            let value_input = $("input[name*='mother_name']").val();
            let regexp = /[^A-Za-z. ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='mother_name']").val(value_input.replace(regexp, ''))
            }
        });
        //For Floor No
        $("input[name*='floor_no']").keyup(function () {
            let value_input = $("input[name*='floor_no']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='floor_no']").val(value_input.replace(regexp, ''))
            }
        });
        //For Shop No
        $("input[name*='shop_no']").keyup(function () {
            let value_input = $("input[name*='shop_no']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='shop_no']").val(value_input.replace(regexp, ''))
            }
        });
        //For image preview
        $("#photo").on('change', function () {
            var imgPath = $(this)[0].value;
            var extension = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            if (extension === "gif" || extension === "png" || extension === "jpg" || extension === "jpeg"){
                if (typeof (FileReader) != "undefined") {

                    var image_holder = $("#image-holder");
                    image_holder.empty();

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("<img />", {
                            "src": e.target.result,
                            "class": "img-thumbnail"
                        }).appendTo(image_holder);

                    };
                    image_holder.show();
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                    alert("This browser does not support FileReader.");
                }
            }else {
                alert("Please Select Image Only !");
            }
        });
    </script>
@endpush




