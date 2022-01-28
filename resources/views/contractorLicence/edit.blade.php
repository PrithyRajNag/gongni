@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Update Contractor Information')}}</h1>
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
                            <form role="form" id="editForm" action="{{route('contractorLicence.update', $data->slug)}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
{{--                                @if($errors->any())--}}
{{--                                    {{ implode('', $errors->all('<div>:message</div>')) }}--}}

{{--                                @endif--}}


                                <div class="card-body">
                                    <div class="form-group">
                                        <h5><b>{{__('INFORMATION OF APPLICANT')}}</b></h5>
                                        <hr>
                                    </div>
                                    <div class="form-group row">
                                        <label for="enlistment_no" class="col-sm-3 col-form-label">{{__('Invitation for Enlistment No')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="enlistment_no" name="enlistment_no"
                                                   value="{{ old('enlistment_no', $data->enlistment_no) }}" required>
                                            @if ($errors->has('enlistment_no'))
                                                <span class="text-danger">{{ $errors->first('enlistment_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="application_type" class="col-sm-3 col-form-label">{{__('Application Type')}}</label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="first_time_application">
                                                    <input type="radio" name="application_type"
                                                           value="first_time_application" {{($data->application_type === "first_time_application") ? "checked" : ""}}>
                                                    <span class="mr-2 mt-0">{{__('First Time Application')}}</span>
                                                </label>
                                                <label for="renewal_application ">
                                                    <input type="radio" name="application_type"
                                                           value="renewal_application" {{($data->application_type === "renewal_application") ? "checked" : ""}}>
                                                    <span class="mr-2">{{__('Renewal Application')}}</span>
                                                </label>
                                                @if ($errors->has('application_type'))
                                                    <span class="text-danger">{{ $errors->first('application_type') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="applicant_name" class="col-sm-3 col-form-label">{{__('Applicant Legal Name')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="applicant_name" name="applicant_name"
                                                   value="{{ old('applicant_name', $data->applicant_name) }}" required>
                                            @if ($errors->has('applicant_name'))
                                                <span class="text-danger">{{ $errors->first('applicant_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="applicant_constitution" class="col-sm-3 col-form-label">{{__('Constitution Of Applicant')}}</label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="proprietorship">
                                                    <input type="radio" name="applicant_constitution"
                                                           value="proprietorship" {{($data->applicant_constitution === "proprietorship") ? "checked": ""}}>
                                                    <span class="mr-2 mt-0">{{__('Proprietorship')}}</span>
                                                </label>
                                                <label for="partnership">
                                                    <input type="radio" name="applicant_constitution"
                                                           value="partnership" {{($data->applicant_constitution === "partnership") ? "checked" : ""}}>
                                                    <span class="mr-2">{{__('Partnership')}}</span>
                                                </label>
                                                <label for="private_limited">
                                                    <input type="radio" name="applicant_constitution"
                                                           value="private_limited" {{($data->applicant_constitution === "private_limited") ? "checked" : ""}}>
                                                    <span class="mr-2">{{__('Private Limited')}}</span>
                                                </label>
                                                @if ($errors->has('applicant_constitution'))
                                                    <span class="text-danger">{{ $errors->first('applicant_constitution') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="constitution_date" class="col-sm-3 col-form-label">{{__('Date Of Constitution')}}</label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control " id="constitution_date" name="constitution_date"
                                                   value="{{ old('constitution_date', $data->constitution_date) }}" required>
                                            @if ($errors->has('constitution_date'))
                                                <span class="text-danger">{{ $errors->first('constitution_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5><b>{{'BUSINESS / MAILING ADDRESS'}}</b></h5>
                                        <hr>
                                    </div>
                                    <div class="form-group row">
                                        <label for="business_address_street" class="col-sm-3 col-form-label">{{__('Village / Street')}}</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" name="business_address_street" id="business_address_street"
                                                      class="form-control" required>{{ old('business_address_street', $data->business_address_street) }}</textarea>
                                            @if ($errors->has('business_address_street'))
                                                <span class="text-danger">{{ $errors->first('business_address_street') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="business_address_post_office" class="col-sm-3 col-form-label">{{__('Post Office')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="business_address_post_office" name="business_address_post_office"
                                                   value="{{ old('business_address_post_office', $data->business_address_post_office) }}" required>
                                            @if ($errors->has('business_address_post_office'))
                                                <span class="text-danger">{{ $errors->first('business_address_post_office') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="business_address_district_id" class="col-sm-3 col-form-label">{{__('District')}} </label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2"  name="business_address_district_id" id="business_address_district_id" style="width: 100%" required>
                                                <option hidden value="{{old('business_address_district_id', $data->business_address_district_id)}}">{{$data->districts->name }}</option>
                                                @foreach($locations as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{$item->business_address_district_id == $item->id ? 'selected' : ''}} >{{ucwords($item->name)}}</option>
                                                @endforeach
                                                @if ($errors->has('business_address_district_id'))
                                                    <span class="text-danger">{{ $errors->first('business_address_district_id') }}</span>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="business_address_post_code" class="col-sm-3 col-form-label">{{__('Post code')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="business_address_post_code" name="business_address_post_code"
                                                   value="{{ old('business_address_post_code', $data->business_address_post_code) }}" required>
                                            @if ($errors->has('business_address_post_code'))
                                                <span class="text-danger">{{ $errors->first('business_address_post_code') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="business_phone" class="col-sm-3 col-form-label">{{__('Telephone')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="business_phone"
                                                   name="business_phone" value="{{ old('business_phone', $data->business_phone) }}"
                                                   required>
                                            @if ($errors->has('business_phone'))
                                                <span class="text-danger">{{ $errors->first('business_phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="business_email" class="col-sm-3 col-form-label">{{__('Email')}}</label>
                                        <div class="col-sm-6">
                                            <input type="email" class="form-control" id="business_email" name="business_email"
                                                   value="{{ old('business_email', $data->business_email) }}" required>
                                            @if ($errors->has('business_email'))
                                                <span class="text-danger">{{ $errors->first('business_email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="vat_reg_no" class="col-sm-3 col-form-label">{{__('Vat Registration Number')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="vat_reg_no"
                                                   name="vat_reg_no" value="{{ old('vat_reg_no', $data->vat_reg_no) }}"
                                                   required>
                                            @if ($errors->has('vat_reg_no'))
                                                <span class="text-danger">{{ $errors->first('vat_reg_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tin_no" class="col-sm-3 col-form-label">{{__('TIN')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="tin_no"
                                                   name="tin_no" value="{{ old('tin_no', $data->tin_no) }}"
                                                   required>
                                            @if ($errors->has('tin_no'))
                                                <span class="text-danger">{{ $errors->first('tin_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5><b>{{__('PERSONAL INFORMATION  OF PROPRIETOR / MANAGING DIRECTOR')}}</b></h5>
                                        <hr>
                                    </div>
                                    <div class="form-group row">
                                        <label for="managing_director_name" class="col-sm-3 col-form-label">{{__('Name Of Proprietor / Managing Director ')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="managing_director_name" name="managing_director_name"
                                                   value="{{ old('managing_director_name', $data->managing_director_name) }}" required>
                                            @if ($errors->has('managing_director_name'))
                                                <span class="text-danger">{{ $errors->first('managing_director_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-3 col-form-label">{{__('Gender')}}</label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="male">
                                                    <input type="radio" name="gender"
                                                           value="male" {{($data->gender === "male") ? "checked": ""}}>
                                                    <span class="mr-2 mt-0">{{__('Male')}}</span>
                                                </label>
                                                <label for="female">
                                                    <input type="radio" name="gender"
                                                           value="female" {{($data->gender === "female") ? "checked": ""}}>
                                                    <span class="mr-2">{{__('Female')}}</span>
                                                </label>
                                                <label for="other">
                                                    <input type="radio" name="gender"
                                                           value="other" {{($data->gender === "other") ? "checked": ""}}>
                                                    <span class="mr-2">{{__('Other')}}</span>
                                                </label>
                                                @if ($errors->has('gender'))
                                                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="father_name" class="col-sm-3 col-form-label">{{__('Father Name')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="father_name" name="father_name" value="{{ old('father_name', $data->father_name) }}" required>
                                            @if ($errors->has('father_name'))
                                                <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mother_name" class="col-sm-3 col-form-label">{{__('Mother Name')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="mother_name" name="mother_name"
                                                   value="{{ old('mother_name', $data->mother_name) }}" required>
                                            @if ($errors->has('mother_name'))
                                                <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="age" class="col-sm-3 col-form-label">{{__('Age')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="age" name="age"
                                                   value="{{ old('age', $data->age) }}" required>
                                            @if ($errors->has('age'))
                                                <span class="text-danger">{{ $errors->first('age') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="education_qualification" class="col-sm-3 col-form-label">{{__('Educational Qualification')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="education_qualification" name="education_qualification"
                                                   value="{{ old('education_qualification', $data->education_qualification) }}" required>
                                            @if ($errors->has('education_qualification'))
                                                <span class="text-danger">{{ $errors->first('education_qualification') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nid" class="col-sm-3 col-form-label">{{__('National ID')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="nid" name="nid" value="{{ old('nid', $data->nid) }}" required>
                                            @if ($errors->has('nid'))
                                                <span class="text-danger">{{ $errors->first('nid') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="personal_phone_number" class="col-sm-3 col-form-label">{{__('Telephone')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="personal_phone_number" name="personal_phone_number"
                                                   value="{{ old('personal_phone_number', $data->personal_phone_number) }}" required>
                                            @if ($errors->has('personal_phone_number'))
                                                <span class="text-danger">{{ $errors->first('personal_phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="personal_email" class="col-sm-3 col-form-label">{{__('Personal E-mail')}}</label>
                                        <div class="col-sm-6">
                                            <input type="email" class="form-control" id="personal_email" name="personal_email"
                                                   value="{{ old('personal_email', $data->personal_email) }}" required>
                                            @if ($errors->has('personal_email'))
                                                <span class="text-danger">{{ $errors->first('personal_email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5><b>{{__('PARTICULAR OF BANK ACCOUNT')}}</b></h5>
                                        <hr>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bank_name" class="col-sm-3 col-form-label">{{__('Name of the Bank')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="bank_name" name="bank_name"
                                                   value="{{ old('bank_name', $data->bank_name) }}" required>
                                            @if ($errors->has('bank_name'))
                                                <span class="text-danger">{{ $errors->first('bank_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="branch" class="col-sm-3 col-form-label">{{__('Branch Name')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="branch" name="branch"
                                                   value="{{ old('branch', $data->branch) }}" required>
                                            @if ($errors->has('branch'))
                                                <span class="text-danger">{{ $errors->first('branch') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="account_no" class="col-sm-3 col-form-label">{{__('A/C No')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="account_no" name="account_no"
                                                   value="{{ old('account_no', $data->account_no) }}" required>
                                            @if ($errors->has('account_no'))
                                                <span class="text-danger">{{ $errors->first('account_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5><b>{{__('OTHER INFORMATION OF APPLICANT')}}</b></h5>
                                        <hr>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-3 col-form-label">{{__('Applicant Category')}} </label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" name="category_id" id="category_id" style="width: 100%" required>
                                                <option hidden value="{{old('category_id', $data->category_id)}}">{{$data->subCategories->name}}</option>
                                                @foreach($categories as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{$item->category_id == $item->id ? 'selected' : ''}}>{{ucwords($item->name)}}</option>
                                                @endforeach
                                                @if ($errors->has('category_id'))
                                                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="technical_employee" class="col-sm-3 col-form-label">{{__('Number Of Technical Employees')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="technical_employee" name="technical_employee"
                                                   value="{{ old('technical_employee', $data->technical_employee) }}" required>
                                            @if ($errors->has('technical_employee'))
                                                <span class="text-danger">{{ $errors->first('technical_employee') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="support_staff" class="col-sm-3 col-form-label">{{__('Number Of Support Staff')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="support_staff" name="support_staff"
                                                   value="{{ old('support_staff', $data->support_staff) }}" required>
                                            @if ($errors->has('support_staff'))
                                                <span class="text-danger">{{ $errors->first('support_staff') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="other_staff" class="col-sm-3 col-form-label">{{__('Number Of Others Staff')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="other_staff" name="other_staff"
                                                   value="{{ old('other_staff', $data->other_staff) }}" required>
                                            @if ($errors->has('other_staff'))
                                                <span class="text-danger">{{ $errors->first('other_staff') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="equipment_name" class="col-sm-3 col-form-label">{{__('Name Of Equipment')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="equipment_name" name="equipment_name"
                                                   value="{{ old('equipment_name', $data->equipment_name) }}" >
                                            @if ($errors->has('equipment_name'))
                                                <span class="text-danger">{{ $errors->first('equipment_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="number" class="col-sm-3 col-form-label">{{__('Number Of Equipment')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="number" name="number"
                                                   value="{{ old('number', $data->number) }}" >
                                            @if ($errors->has('number'))
                                                <span class="text-danger">{{ $errors->first('number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="year" class="col-sm-3 col-form-label">{{__('Year of Ownership / Acquisition')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="year" name="year"
                                                   value="{{ old('year', $data->year) }}" >
                                            @if ($errors->has('year'))
                                                <span class="text-danger">{{ $errors->first('year') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="condition" class="col-sm-3 col-form-label">{{__('Present Condition')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="condition" name="condition"
                                                   value="{{ old('condition', $data->condition) }}" >
                                            @if ($errors->has('condition'))
                                                <span class="text-danger">{{ $errors->first('condition') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="financial_source" class="col-sm-3 col-form-label">{{__('Source of Financing')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="financial_source" name="financial_source"
                                                   value="{{ old('financial_source', $data->financial_source) }}" required>
                                            @if ($errors->has('financial_source'))
                                                <span class="text-danger">{{ $errors->first('financial_source') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="amount" class="col-sm-3 col-form-label">{{__('Amount Available')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="amount" name="amount"
                                                   value="{{ old('amount', $data->amount) }}" required>
                                            @if ($errors->has('amount'))
                                                <span class="text-danger">{{ $errors->first('amount') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="file" class="col-sm-3 col-form-label">{{__('Update Documents')}}</label>
                                        <div class="input-group col-sm-6">
                                            <div class="custom-file">
                                                <input type="file" multiple name="file[]" id="file" value="{{ old('file') }}" />
                                                <input type="hidden" name="doc_id[]" id="document_id_array">
                                            </div>
                                        </div>
                                        @if ($errors->has('file'))
                                            <span class="text-danger">{{ $errors->first('file') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label id="file" class="col-sm-6  col-md-3 col-form-label">{{__('Uploaded File')}} :</label>
                                        <div class="col-sm-6 col-md-9 pt-2">
                                            @if($data->contractorDocuments != null)
                                                {{--                                                @dd($data)--}}
                                                @foreach($data->contractorDocuments as $file)
                                                    <div class="form-group">
                                                        <a href="{{ route('contractorLicence.download',  $file->id) }}" class="text-light" title="Click to download">{{ $file->file_name }}</a>
                                                        <span type="button"
                                                              class=" text-danger text-bold ml-3 "
                                                              onclick="removeDocument(this, {{ $loop->index }} )"
                                                              id="removeDoc{{ $loop->index }}"
                                                        ><i class="fa fa-times-circle"></i> </span>
                                                    </div>
                                                    {{--                                                                                                                {{ $data->file }}--}}
                                                @endforeach
                                            @else
                                                {{ __("No Files Available") }}

                                            @endif

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="debarred" class="col-sm-3 col-form-label">{{__('Have You Ever Been Debarred By Any Govt. Agency ?')}}</label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="proprietorship">
                                                    <input type="radio" name="debarred"
                                                           value="yes" {{($data->debarred === "yes") ? "checked" : ""}}>
                                                    <span class="mr-2 mt-0">{{__('Yes')}}</span>
                                                </label>
                                                <label for="partnership">
                                                    <input type="radio" name="debarred"
                                                           value="no" {{($data->debarred === "no") ? "checked" : ""}}>
                                                    <span class="mr-2">{{__('No')}}</span>
                                                </label>
                                                @if ($errors->has('debarred'))
                                                    <span class="text-danger">{{ $errors->first('debarred') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div id="debarred_reasons">
                                        <div class="form-group row">
                                            <label for="debarred_reason" class="col-sm-3 col-form-label">{{__('Please State When & Where')}}</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="debarred_reason" name="debarred_reason"
                                                       value="{{ old('debarred_reason', $data->debarred_reason) }}" >
                                                @if ($errors->has('debarred_reason'))
                                                    <span class="text-danger">{{ $errors->first('debarred_reason') }}</span>
                                                @endif
                                            </div>
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
        var doc_id_array =[];
        $(function (){

            var contractor_doc_array = {!! json_encode($data->contractorDocuments->toArray() ) !!}
            console.log("contractor Document Id" )
            console.log(contractor_doc_array)

            for(var i=0; i<contractor_doc_array.length; i++)
            {
                doc_id_array.push(contractor_doc_array[i].id)
            }
            console.log("Doc Id Array")
            console.log(doc_id_array)
            $("#document_id_array").val(doc_id_array)
        })

        function removeDocument(fullTag, index){
            doc_id_array.splice(index, 1)
            console.log("Remove Document", index)
            console.log(doc_id_array)

            $("#document_id_array").val(doc_id_array)

            console.log("FullTag")
            console.log(fullTag.parentElement)
            fullTag.parentElement.remove()

        }

        // Contractor Licence debarred reason field toggle
        $("#debarred_reasons").hide();

        $('input[name="debarred"]').on('change', function () {
            if (this.value != 'yes') {
                $("#debarred_reasons").hide()
            } else {
                $("#debarred_reasons").show()
            }
        });
        //For Post Code
        $("input[name*='business_address_post_code']").keyup(function () {
            let value_input = $("input[name*='business_address_post_code']").val();
            let regexp = /[^0-9+]/g;
            if (value_input.match(regexp)) {
                $("input[name*='business_address_post_code']").val(value_input.replace(regexp, ''))
            }
        });

        //For Business Telephone
        $("input[name*='business_phone']").keyup(function () {
            let value_input = $("input[name*='business_phone']").val();
            let regexp = /[^0-9+]/g;
            if (value_input.match(regexp)) {
                $("input[name*='business_phone']").val(value_input.replace(regexp, ''))
            }
        });
        //For Personal Telephone
        $("input[name*='personal_phone_number']").keyup(function () {
            let value_input = $("input[name*='personal_phone_number']").val();
            let regexp = /[^0-9+]/g;
            if (value_input.match(regexp)) {
                $("input[name*='personal_phone_number']").val(value_input.replace(regexp, ''))
            }
        });
        //For VAT Reg No
        $("input[name*='vat_reg_no']").keyup(function () {
            let value_input = $("input[name*='vat_reg_no']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='vat_reg_no']").val(value_input.replace(regexp, ''))
            }
        });
        //For TIN No
        $("input[name*='tin_no']").keyup(function () {
            let value_input = $("input[name*='tin_no']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='tin_no']").val(value_input.replace(regexp, ''))
            }
        });
        //For Age
        $("input[name*='age']").keyup(function () {
            let value_input = $("input[name*='age']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='age']").val(value_input.replace(regexp, ''))
            }
        });
        //For Applicant Name
        $("input[name*='applicant_name']").keyup(function () {
            let value_input = $("input[name*='applicant_name']").val();
            let regexp = /[^A-Za-z. ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='applicant_name']").val(value_input.replace(regexp, ''))
            }
        });
        //For Bank Name
        $("input[name*='bank_name']").keyup(function () {
            let value_input = $("input[name*='bank_name']").val();
            let regexp = /[^A-Za-z. ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='bank_name']").val(value_input.replace(regexp, ''))
            }
        });
        //For Branch Name
        $("input[name*='branch']").keyup(function () {
            let value_input = $("input[name*='branch']").val();
            let regexp = /[^A-Za-z. ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='branch']").val(value_input.replace(regexp, ''))
            }
        });
        //For Managing Director Name
        $("input[name*='managing_director_name']").keyup(function () {
            let value_input = $("input[name*='managing_director_name']").val();
            let regexp = /[^A-Za-z. ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='managing_director_name']").val(value_input.replace(regexp, ''))
            }
        });
        //For Account No
        $("input[name*='account_no']").keyup(function () {
            let value_input = $("input[name*='account_no']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='account_no']").val(value_input.replace(regexp, ''))
            }
        });
        //For Number of Technical Employee
        $("input[name*='technical_employee']").keyup(function () {
            let value_input = $("input[name*='technical_employee']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='technical_employee']").val(value_input.replace(regexp, ''))
            }
        });
        //For Number of Support Staff
        $("input[name*='support_staff']").keyup(function () {
            let value_input = $("input[name*='support_staff']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='support_staff']").val(value_input.replace(regexp, ''))
            }
        });
        //For Number of Other Staff
        $("input[name*='other_staff']").keyup(function () {
            let value_input = $("input[name*='other_staff']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='other_staff']").val(value_input.replace(regexp, ''))
            }
        });
        //For Father Name
        $("input[name*='father_name']").keyup(function () {
            let value_input = $("input[name*='father_name']").val();
            let regexp = /[^A-Za-z. ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='father_name']").val(value_input.replace(regexp, ''))
            }
        });

        //For Mother Name
        $("input[name*='mother_name']").keyup(function () {
            let value_input = $("input[name*='mother_name']").val();
            let regexp = /[^A-Za-z. ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='mother_name']").val(value_input.replace(regexp, ''))
            }
        });

        //For National ID
        $("input[name*='nid']").keyup(function () {
            let value_input = $("input[name*='nid']").val();
            let regexp = /[^0-9 ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='nid']").val(value_input.replace(regexp, ''))
            }
        });

    </script>
@endpush




