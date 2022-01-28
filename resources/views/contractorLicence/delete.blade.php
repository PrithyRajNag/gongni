@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Delete Contractor Information')}}</h1>
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
                            <form role="form" id="dltForm" action="{{ route('contractorLicence.destroy', $data->slug) }}" class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')

                                <div class="card-body">
                                    <div class="form-group">
                                        <h5><b>{{__('INFORMATION OF APPLICANT')}}</b></h5>
                                        <hr>
                                    </div>
                                    <div class="form-group row">
                                        <label id="enlistment_no" class="col-sm-3 col-form-label">{{__('Enlistment No')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->enlistment_no) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="application_type" class="col-sm-3 col-form-label">{{__('Application Type')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ getWordWithSpace(ucwords($data->application_type)) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="applicant_name" class="col-sm-3 col-form-label">{{__('Applicant Legal Name')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->applicant_name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="applicant_constitution" class="col-sm-3 col-form-label">{{__('Applicant Constitution')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->applicant_constitution) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="constitution_date" class="col-sm-3 col-form-label">{{__('Date Of Constitution')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->constitution_date) }}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5><b>{{'BUSINESS / MAILING ADDRESS'}}</b></h5>
                                        <hr>
                                    </div>
                                    <div class="form-group row">
                                        <label id="business_address_street" class="col-sm-3 col-form-label">{{__('Village / Street')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->business_address_street) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="business_address_post_office" class="col-sm-3 col-form-label">{{__('Post Office')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->business_address_post_office) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="business_address_district_id" class="col-sm-3 col-form-label">{{__('District')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->districts->name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="business_address_post_code" class="col-sm-3 col-form-label">{{__('Post Code')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->business_address_post_code) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="business_phone" class="col-sm-3 col-form-label">{{__('Business Telephone')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->business_phone) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="business_email" class="col-sm-3 col-form-label">{{__('Business Email')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->business_email) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="vat_reg_no" class="col-sm-3 col-form-label">{{__('VAT Registration Number')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->vat_reg_no) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="tin_no" class="col-sm-3 col-form-label">{{__('TIN')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->tin_no) }}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5><b>{{__('PERSONAL INFORMATION  OF PROPRIETOR / MANAGING DIRECTOR')}}</b></h5>
                                        <hr>
                                    </div>
                                    <div class="form-group row">
                                        <label id="managing_director_name" class="col-sm-3 col-form-label">{{__('Name Of Proprietor / Managing Director')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->managing_director_name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="gender" class="col-sm-3 col-form-label">{{__('Gender')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->gender) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="father_name" class="col-sm-3 col-form-label">{{__('Father Name')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->father_name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="mother_name" class="col-sm-3 col-form-label">{{__('Mother Name')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->mother_name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="age" class="col-sm-3 col-form-label">{{__('Age')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->age). ' ' . 'years' }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="education_qualification" class="col-sm-3 col-form-label">{{__('Education Qualification')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->education_qualification) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="nid" class="col-sm-3 col-form-label">{{__('NID')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->nid) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="personal_phone_number" class="col-sm-3 col-form-label">{{__('Telephone')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->personal_phone_number) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="personal_email" class="col-sm-3 col-form-label">{{__('Email')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->personal_email) }}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5><b>{{__('PARTICULAR OF BANK ACCOUNT')}}</b></h5>
                                        <hr>
                                    </div>
                                    <div class="form-group row">
                                        <label id="bank_name" class="col-sm-3 col-form-label">{{__('Name Of Bank')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->bank_name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="branch" class="col-sm-3 col-form-label">{{__('Branch Name')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->branch) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="account_no" class="col-sm-3 col-form-label">{{__('A/C No')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->account_no) }}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <h5><b>{{__('OTHER INFORMATION OF APPLICANT')}}</b></h5>
                                        <hr>
                                    </div>
                                    <div class="form-group row">
                                        <label id="category_id" class="col-sm-3 col-form-label">{{__('Applicant Category')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucfirst($data->subCategories->name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="technical_employee" class="col-sm-3 col-form-label">{{__('Number of Technical Employees')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->technical_employee) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="support_staff" class="col-sm-3 col-form-label">{{__('Number of Support Staff')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->support_staff) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="other_staff" class="col-sm-3 col-form-label">{{__('Number of Other Staff')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->other_staff) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="equipment_name" class="col-sm-3 col-form-label">{{__('Name of Equipment')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->equipment_name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="number" class="col-sm-3 col-form-label">{{__('Number of Equipment')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->number) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="year" class="col-sm-3 col-form-label">{{__('Year of Ownership / Acquisition')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->year) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="condition" class="col-sm-3 col-form-label">{{__('Present Condition')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->condition) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="financial_source" class="col-sm-3 col-form-label">{{__('Source of Finance')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->financial_source) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="amount" class="col-sm-3 col-form-label">{{__('Amount Available')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->amount) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="debarred" class="col-sm-3 col-form-label">{{__('Have You Ever Been Debarred By Any Govt. Agency ?')}} </label>
                                        <div class="col-sm-9 pt-2">
                                            {{ ucwords($data->debarred) }}
                                        </div>
                                    </div>
                                    @if( $data->debarred == 'yes' )
                                        <div class="form-group row">
                                            <label id="debarred_reason" class="col-sm-3 col-form-label">{{__('Please State When & Where')}} :</label>
                                            <div class="col-sm-9 pt-2">
                                                {{ ucwords($data->debarred_reason) }}
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group row">
                                        <label id="file" class="col-sm-3 col-form-label">{{__('Uploaded Document')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            @if($data->contractorDocuments != null)
                                                @foreach($data->contractorDocuments as $file)
                                                    <div class="form-group">
                                                        <a href="{{ route('contractorLicence.download',  $file->id) }}" class="text-light" title="Click to download">{{ $file->file_name }}</a>
                                                    </div>
                                                @endforeach
                                            @else
                                                {{__('No Files Available')}}
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label id="fees" class="col-sm-3 col-form-label">{{__('Contractor Enlistment Fees')}} :</label>
                                        <div class="col-sm-9 pt-2">
                                            @foreach($data->contractorLicenceHistory as $item)
                                                {{ ucfirst($item->fees) .' '.'BDT'}}
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    @include('layouts.partials.backBtn')
                                    <button type="submit" name="dltBtn" id="dltBtn" value="Save"
                                            class="btn btn-danger ml-2"><i
                                            class="fas fa-trash"></i>&nbsp;{{__('Delete')}}
                                    </button>
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



