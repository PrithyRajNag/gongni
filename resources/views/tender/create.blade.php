@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Create Tender ')}}</h1>
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
                            <form role="form" id="createForm" action="{{route('tender.store')}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
{{--                                @if($errors->any())--}}
{{--                                    {{ implode('', $errors->all('<div>:message</div>')) }}--}}

{{--                                @endif--}}


                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="ministry_id" class="col-sm-3 col-form-label">{{__('Ministry / Division *')}} </label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" name="ministry_id" id="ministry_id" style="width: 100%" required>
                                                <option hidden value=""></option>
                                                @foreach($ministries as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{$item->ministry_id == $item->id}}>{{ucwords($item->name)}}</option>
                                                @endforeach
                                                @if ($errors->has('ministry_id'))
                                                    <span class="text-danger">{{ $errors->first('ministry_id') }}</span>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="entity_name" class="col-sm-3 col-form-label">{{__('Entity Name *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="entity_name" name="entity_name"
                                                   value="{{ old('entity_name') }}" required>
                                            @if ($errors->has('entity_name'))
                                                <span class="text-danger">{{ $errors->first('entity_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="entity_code" class="col-sm-3 col-form-label">{{__('Entity Code *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="entity_code" name="entity_code"
                                                   value="{{ old('entity_code') }}" required>
                                            @if ($errors->has('entity_code'))
                                                <span class="text-danger">{{ $errors->first('entity_code') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="invitation_for" class="col-sm-3 col-form-label">{{__('Invitation For')}}</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" name="invitation_for" id="invitation_for" required>
                                                <option hidden></option>
                                                <option value="work">Work</option>
                                                <option value="goods">Goods</option>
                                                <option value="product">Product</option>

                                                @if ($errors->has('invitation_for'))
                                                    <span class="text-danger">{{ $errors->first('invitation_for') }}</span>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="submission_date" class="col-sm-3 col-form-label">{{__('Submission Date *')}}</label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control take_future_date" id="submission_date" name="submission_date"
                                                   value="{{ old('submission_date') }}" required>
                                            @if ($errors->has('submission_date'))
                                                <span class="text-danger">{{ $errors->first('submission_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="method" class="col-sm-3 col-form-label">{{__('Procuring Method *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="method" name="method"
                                                   value="{{ old('method') }}" required>
                                            @if ($errors->has('method'))
                                                <span class="text-danger">{{ $errors->first('method') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="budget" class="col-sm-3 col-form-label">{{__('Budget and Source of Funds *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="budget" name="budget"
                                                   value="{{ old('budget') }}" required>
                                            @if ($errors->has('budget'))
                                                <span class="text-danger">{{ $errors->first('budget') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="development_partner" class="col-sm-3 col-form-label">{{__('Development Partner *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="development_partner" name="development_partner"
                                                   value="{{ old('development_partner') }}" required>
                                            @if ($errors->has('development_partner'))
                                                <span class="text-danger">{{ $errors->first('development_partner') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="package_name" class="col-sm-3 col-form-label">{{__('Tender Package Name *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="package_name" name="package_name"
                                                   value="{{ old('package_name') }}" required>
                                            @if ($errors->has('package_name'))
                                                <span class="text-danger">{{ $errors->first('package_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="package_no" class="col-sm-3 col-form-label">{{__('Tender Package No *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="package_no" name="package_no"
                                                   value="{{ old('package_no') }}" required>
                                            @if ($errors->has('package_no'))
                                                <span class="text-danger">{{ $errors->first('package_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="programme_name" class="col-sm-3 col-form-label">{{__('Project / Programme Name *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="programme_name" id="programme_name"
                                                      class="form-control" value="{{ old('programme_name') }}" required>
                                            @if ($errors->has('programme_name'))
                                                <span class="text-danger">{{ $errors->first('programme_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="programme_code" class="col-sm-3 col-form-label">{{__('Project / Programme Code *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="programme_code" id="programme_code"
                                                   class="form-control" value="{{ old('programme_code') }}" required>
                                            @if ($errors->has('programme_code'))
                                                <span class="text-danger">{{ $errors->first('programme_code') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="publish_date" class="col-sm-3 col-form-label">{{__('Tender Publish Date *')}}</label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control" id="publish_date" name="publish_date"
                                                   value="{{ old('publish_date') }}" required>
                                            @if ($errors->has('publish_date'))
                                                <span class="text-danger">{{ $errors->first('publish_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="last_selling_date" class="col-sm-3 col-form-label">{{__('Tender Last Selling Date *')}}</label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control take_past_date" id="last_selling_date" name="last_selling_date"
                                                   value="{{ old('last_selling_date') }}" required>
                                            @if ($errors->has('last_selling_date'))
                                                <span class="text-danger">{{ $errors->first('last_selling_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="closing_date" class="col-sm-3 col-form-label">{{__('Tender Closing Date and Time *')}}</label>
                                        <div class="col-sm-6">
                                            <input type="datetime-local" class="form-control" id="closing_date" name="closing_date"
                                                   value="{{ old('closing_date') }}" required>
                                            @if ($errors->has('closing_date'))
                                                <span class="text-danger">{{ $errors->first('closing_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="opening_date" class="col-sm-3 col-form-label">{{__('Tender Opening Date and Time *')}}</label>
                                        <div class="col-sm-6">
                                            <input type="datetime-local" class="form-control" id="opening_date" name="opening_date"
                                                   value="{{ old('opening_date') }}" required>
                                            @if ($errors->has('opening_date'))
                                                <span class="text-danger">{{ $errors->first('opening_date') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="principle_selling_document" class="col-sm-3 col-form-label">{{__('Selling Tender Document (Principal) *')}} </label>
                                        <div class="col-sm-6">
                                            <textarea type="text" class="form-control" id="principle_selling_document" name="principle_selling_document" required>{{ old('principle_selling_document') }}</textarea>
                                            @if ($errors->has('principle_selling_document'))
                                                <span class="text-danger">{{ $errors->first('principle_selling_document') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="receiving_document" class="col-sm-3 col-form-label">{{__('Receiving Tender Document *')}} </label>
                                        <div class="col-sm-6">
                                            <textarea type="text" class="form-control" id="receiving_document" name="receiving_document" required>{{ old('receiving_document') }}</textarea>
                                            @if ($errors->has('receiving_document'))
                                                <span class="text-danger">{{ $errors->first('receiving_document') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="opening_document" class="col-sm-3 col-form-label">{{__('Opening Tender Document *')}} </label>
                                        <div class="col-sm-6">
                                            <textarea type="text" class="form-control" id="opening_document" name="opening_document" required>{{ old('opening_document') }}</textarea>
                                            @if ($errors->has('opening_document'))
                                                <span class="text-danger">{{ $errors->first('opening_document') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="other_selling_document" class="col-sm-3 col-form-label">{{__('Selling Tender Document (Others)')}} </label>
                                        <div class="col-sm-6">
                                            <textarea type="text" class="form-control" id="other_selling_document"
                                                   name="other_selling_document" required>{{ old('other_selling_document') }}</textarea>
                                            @if ($errors->has('other_selling_document'))
                                                <span class="text-danger">{{ $errors->first('other_selling_document') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="meeting_place" class="col-sm-3 col-form-label">{{__('Meeting Place')}} </label>
                                        <div class="col-sm-6">
                                            <textarea type="text" class="form-control" id="meeting_place" name="meeting_place">{{ old('meeting_place') }}</textarea>
                                            @if ($errors->has('meeting_place'))
                                                <span class="text-danger">{{ $errors->first('meeting_place') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="meeting_date" class="col-sm-3 col-form-label">{{__('Meeting Date & Time ')}}</label>
                                        <div class="col-sm-6">
                                            <input type="datetime-local" class="form-control take_past_date" id="meeting_date" name="meeting_date"
                                                   value="{{ old('meeting_date') }}" required >
                                            @if ($errors->has('meeting_date'))
                                                <span class="text-danger">{{ $errors->first('meeting_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="eligibility" class="col-sm-3 col-form-label">{{__('Eligibility of Tenderer *')}} </label>
                                        <div class="col-sm-6">
                                            <textarea type="text" class="form-control" id="eligibility" name="eligibility" required>{{ old('eligibility') }}</textarea>
                                            @if ($errors->has('eligibility'))
                                                <span class="text-danger">{{ $errors->first('eligibility') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description_goods" class="col-sm-3 col-form-label">{{__('Brief Description of Goods or Works *')}} </label>
                                        <div class="col-sm-6">
                                            <textarea type="text" class="form-control" id="description_goods" name="description_goods"
                                                      required>{{ old('description_goods') }}</textarea>
                                            @if ($errors->has('description_goods'))
                                                <span class="text-danger">{{ $errors->first('description_goods') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description_related_service" class="col-sm-3 col-form-label">{{__('Brief Description of Related Services *')}} </label>
                                        <div class="col-sm-6">
                                            <textarea type="text" class="form-control" id="description_related_service" name="description_related_service"
                                                      required>{{ old('description_related_service') }}</textarea>
                                            @if ($errors->has('description_related_service'))
                                                <span class="text-danger">{{ $errors->first('description_related_service') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="document_price" class="col-sm-3 col-form-label">{{__('Tender Document Price *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="document_price" name="document_price"
                                                   value="{{ old('document_price') }}" required>
                                            @if ($errors->has('document_price'))
                                                <span class="text-danger">{{ $errors->first('document_price') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lot_no" class="col-sm-3 col-form-label">{{__('Lot No *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="lot_no" name="lot_no"
                                                   value="{{ old('lot_no') }}" required>
                                            @if ($errors->has('lot_no'))
                                                <span class="text-danger">{{ $errors->first('lot_no') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="identification" class="col-sm-3 col-form-label">{{__('Identification of Lot *')}} </label>
                                        <div class="col-sm-6">
                                            <textarea type="text" class="form-control" id="identification" name="identification"
                                                       required>{{ old('identification') }}</textarea>
                                            @if ($errors->has('identification'))
                                                <span class="text-danger">{{ $errors->first('identification') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="location" class="col-sm-3 col-form-label">{{__('Location *')}} </label>
                                        <div class="col-sm-6">
                                            <textarea type="text" class="form-control" id="location" name="location"
                                                      required>{{ old('location') }}</textarea>
                                            @if ($errors->has('location'))
                                                <span class="text-danger">{{ $errors->first('location') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="security_amount" class="col-sm-3 col-form-label">{{__('Tender Security Amount (Refundable) *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="security_amount" name="security_amount"
                                                   value="{{ old('security_amount') }}" required>
                                            @if ($errors->has('security_amount'))
                                                <span class="text-danger">{{ $errors->first('security_amount') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="completion" class="col-sm-3 col-form-label">{{__('Completion Time *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="completion" name="completion"
                                                   value="{{ old('completion') }}" required>
                                            @if ($errors->has('completion'))
                                                <span class="text-danger">{{ $errors->first('completion') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="official_inviting_name" class="col-sm-3 col-form-label">{{__('Name of Official Inviting Tender *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="official_inviting_name" name="official_inviting_name"
                                                   value="{{ old('official_inviting_name') }}" required>
                                            @if ($errors->has('official_inviting_name'))
                                                <span class="text-danger">{{ $errors->first('official_inviting_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="official_inviting_designation" class="col-sm-3 col-form-label">{{__('Designation of Official Inviting Tender *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="official_inviting_designation" name="official_inviting_designation"
                                                   value="{{ old('official_inviting_designation') }}" required>
                                            @if ($errors->has('official_inviting_designation'))
                                                <span class="text-danger">{{ $errors->first('official_inviting_designation') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="official_inviting_address" class="col-sm-3 col-form-label">{{__('Address of Official Inviting Tender *')}} </label>
                                        <div class="col-sm-6">
                                            <textarea type="text" class="form-control" id="official_inviting_address" name="official_inviting_address"  required>{{ old('official_inviting_address') }}</textarea>
                                            @if ($errors->has('official_inviting_address'))
                                                <span class="text-danger">{{ $errors->first('official_inviting_address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="official_inviting_contact_phone" class="col-sm-3 col-form-label">{{__('Telephone of Official Inviting Tender *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="official_inviting_contact_phone" name="official_inviting_contact_phone" value="{{ old('official_inviting_contact_phone') }}" required>
                                            @if ($errors->has('official_inviting_contact_phone'))
                                                <span class="text-danger">{{ $errors->first('official_inviting_contact_phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="official_inviting_contact_fax" class="col-sm-3 col-form-label">{{__('Fax of Official Inviting Tender *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="official_inviting_contact_fax" name="official_inviting_contact_fax"
                                                   value="{{ old('official_inviting_contact_fax') }}" required>
                                            @if ($errors->has('official_inviting_contact_fax'))
                                                <span class="text-danger">{{ $errors->first('official_inviting_contact_fax') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="official_inviting_contact_email" class="col-sm-3 col-form-label">{{__('Email of Official Inviting Tender *')}} </label>
                                        <div class="col-sm-6">
                                            <input type="email" class="form-control" id="official_inviting_contact_email" name="official_inviting_contact_email"
                                                   value="{{ old('official_inviting_contact_email') }}" required>
                                            @if ($errors->has('official_inviting_contact_email'))
                                                <span class="text-danger">{{ $errors->first('official_inviting_contact_email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="file" class="col-sm-3 col-form-label">{{__('Upload Documents *')}}</label>
                                        <div class="input-group col-sm-6">
                                            <div class="custom-file">
                                                <input type="file" multiple name="file[]" id="file"
                                                       value="{{ old('file') }}" />
                                            </div>
                                        </div>
                                        @if ($errors->has('file'))
                                            <span class="text-danger">{{ $errors->first('file') }}</span>
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

        //For Entity Name
        $("input[name*='entity_name']").keyup(function () {
            let value_input = $("input[name*='entity_name']").val();
            let regexp = /[^A-Za-z.& ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='entity_name']").val(value_input.replace(regexp, ''))
            }
        });

        //For Project / Programme Name
        $("input[name*='programme_name']").keyup(function () {
            let value_input = $("input[name*='programme_name']").val();
            let regexp = /[^A-Za-z.& ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='programme_name']").val(value_input.replace(regexp, ''))
            }
        });

        //For Telephone of Official Inviting Tender
        $("input[name*='official_inviting_contact_phone']").keyup(function () {
            let value_input = $("input[name*='official_inviting_contact_phone']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='official_inviting_contact_phone']").val(value_input.replace(regexp, ''))
            }
        });
        //For Fax of Official Inviting Tender
        $("input[name*='official_inviting_contact_fax']").keyup(function () {
            let value_input = $("input[name*='official_inviting_contact_fax']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='official_inviting_contact_fax']").val(value_input.replace(regexp, ''))
            }
        });

        //For Lot No
        $("input[name*='lot_no']").keyup(function () {
            let value_input = $("input[name*='lot_no']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='lot_no']").val(value_input.replace(regexp, ''))
            }
        });


    </script>
@endpush




