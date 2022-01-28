@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Delete Tender Information')}}</h1>
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
                            <form role="form" id="dltForm" action="{{ route('tender.destroy', $data->slug) }}" class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label id="ministry_id" class="col-md-3 col-form-label">{{__('Ministry / Division')}} :</label>
                                        <div class=" col-md-9 pt-2">
                                            {{ ucwords($data->ministries->name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="entity_name" class=" col-md-3 col-form-label">{{__('Entity Name')}} :</label>
                                        <div class=" col-md-9 pt-2">
                                            {{ ($data->entity_name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="entity_code" class=" col-md-3 col-form-label">{{__('Entity Code')}} :</label>
                                        <div class=" col-md-9 pt-2">
                                            {{ ucwords($data->entity_code) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="invitation_for" class=" col-md-3 col-form-label">{{__('Invitation For')}} :</label>
                                        <div class=" col-md-9 pt-2">
                                            {{ ucwords($data->invitation_for) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="submission_date" class=" col-md-3 col-form-label">{{__('Submission Date')}} :</label>
                                        <div class=" col-md-9 pt-2">
                                            {{ ($data->submission_date) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="method" class=" col-md-3 col-form-label">{{__('Procuring Method')}} :</label>
                                        <div class=" col-md-9 pt-2">
                                            {{ ucfirst($data->method) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="budget" class=" col-md-3 col-form-label">{{__('Budget & Source Of Funds')}} :</label>
                                        <div class=" col-md-9 pt-2">
                                            {{ ($data->budget) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="development_partner" class=" col-md-3 col-form-label">{{__('Development Partner')}} :</label>
                                        <div class=" col-md-9 pt-2">
                                            {{ ucfirst($data->development_partner) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="package_name" class=" col-md-3 col-form-label">{{__('Package Name')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->package_name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="package_no" class="col-md-3 col-form-label">{{__('Package No')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ($data->package_no) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="programme_name" class="col-md-3 col-form-label">{{__('Project / Programme Name')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->programme_name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="programme_code" class="col-md-3 col-form-label">{{__('Project / Programme Code')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ($data->programme_code) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="publish_date" class="col-md-3 col-form-label">{{__('Tender Publish Date')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->publish_date) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="last_selling_date" class="col-md-3 col-form-label">{{__('Tender Last Selling Date')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->last_selling_date) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="closing_date" class="col-md-3 col-form-label">{{__('Tender Closing Date & Time')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->closing_date) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="opening_date" class="col-md-3 col-form-label">{{__('Tender Opening Date & Time')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->opening_date) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="principle_selling_document" class="col-md-3 col-form-label">{{__('Selling Tender Document (Principal) ')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->principle_selling_document) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="receiving_document" class="col-md-3 col-form-label">{{__('Receiving Tender Document')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->receiving_document) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="opening_document" class="col-md-3 col-form-label">{{__('Opening Tender Document ')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->opening_document) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="other_selling_document" class="col-md-3 col-form-label">{{__('Selling Tender Document (Others)')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->other_selling_document) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="meeting_place" class="col-md-3 col-form-label">{{__('Meeting Place')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->meeting_place) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="meeting_date" class="col-md-3 col-form-label">{{__('Meeting Date & Time')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->meeting_date) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="eligibility" class="col-md-3 col-form-label">{{__('Eligibility of Tenderer')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->eligibility) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="description_goods" class="col-md-3 col-form-label">{{__('Brief Description of Goods or Works')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst ($data->description_goods) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="description_related_service" class="col-md-3 col-form-label">{{__('Brief Description of Related Services')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst ($data->description_related_service)  }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="document_price" class="col-md-3 col-form-label">{{__('Tender Document Price ')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->document_price) }}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label id="lot_no" class="col-md-3 col-form-label">{{__('Lot No')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->lot_no) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="identification" class="col-md-3 col-form-label">{{__('Identification Of Lot')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->identification) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="location" class="col-md-3 col-form-label">{{__('Location')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->location) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="security_amount" class="col-md-3 col-form-label">{{__('Tender Security Amount (Refundable)')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ($data->security_amount) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="completion" class="col-md-3 col-form-label">{{__('Completion Time')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->completion) }}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label id="official_inviting_name" class="col-md-3 col-form-label">{{__('Name Of Official Inviting Tender')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ($data->official_inviting_name) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="official_inviting_designation" class="col-md-3 col-form-label">{{__('Designation Of Official Inviting Tender')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->official_inviting_designation) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="official_inviting_address" class="col-md-3 col-form-label">{{__('Address Of Official Inviting Tender')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ($data->official_inviting_address) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="official_inviting_contact_phone" class="col-md-3 col-form-label">{{__('Telephone Of Official Inviting Tender')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->official_inviting_contact_phone) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label id="official_inviting_contact_fax" class="col-md-3 col-form-label">{{__('Fax Of Official Inviting Tender')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->official_inviting_contact_fax) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label id="official_inviting_contact_email" class="col-md-3 col-form-label">{{__('Email Of Official Inviting Tender')}} :</label>
                                        <div class="col-md-9 pt-2">
                                            {{ ucfirst($data->official_inviting_contact_email) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label id="file" class="col-sm-6  col-md-3 col-form-label">{{__('Uploaded File')}} :</label>
                                        <div class="col-sm-6 col-md-9 pt-2">
                                            @if($data->tenderDocuments != null)
                                                @foreach($data->tenderDocuments as $file)
                                                    <div class="form-group">
                                                        <a href="{{ route('tender.downloadFile',  $file->id) }}" class="text-light" title="Click to download">{{ $file->file_name }}</a>
                                                    </div>

                                                    {{--                                                                                                                {{ $data->file }}--}}
                                                @endforeach
                                            @else
                                                {{ __("No Files Available") }}

                                            @endif
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



