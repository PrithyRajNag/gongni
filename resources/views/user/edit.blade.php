@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Update Employee Information')}}</h1>
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
                            <form role="form" id="editForm" action="{{route('employee.update', $data->slug)}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="first_name"
                                               class="col-sm-3 col-form-label">{{__('First Name (English)')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                   value="{{ old('first_name', $data->first_name) }}" required>
                                            @if ($errors->has('first_name'))
                                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="first_name_bn"
                                               class="col-sm-3 col-form-label">{{__('নামের প্রথম অংশ (বাংলায়)')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="first_name_bn"
                                                   name="first_name_bn"
                                                   value="{{ old('first_name_bn', $data->first_name_bn) }}" required>
                                            @if ($errors->has('first_name_bn'))
                                                <span class="text-danger">{{ $errors->first('first_name_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="last_name"
                                               class="col-sm-3 col-form-label">{{__('Last Name (English)')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                   value="{{ old('last_name', $data->last_name) }}" required>
                                            @if ($errors->has('last_name'))
                                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="last_name_bn"
                                               class="col-sm-3 col-form-label">{{__('নামের শেষ অংশ (বাংলায়)')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="last_name_bn"
                                                   name="last_name_bn"
                                                   value="{{ old('last_name_bn', $data->last_name_bn) }}" required>
                                            @if ($errors->has('last_name_bn'))
                                                <span class="text-danger">{{ $errors->first('last_name_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="father_name"
                                               class="col-sm-3 col-form-label">{{__('Father Name (English)')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="father_name" name="father_name"
                                                   value="{{ old('father_name', $data->father_name) }}" required>
                                            @if ($errors->has('father_name'))
                                                <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="father_name_bn"
                                               class="col-sm-3 col-form-label">{{__('বাবার নাম (বাংলায়)')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="father_name_bn"
                                                   name="father_name_bn"
                                                   value="{{ old('father_name_bn', $data->father_name_bn) }}" required>
                                            @if ($errors->has('father_name_bn'))
                                                <span class="text-danger">{{ $errors->first('father_name_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="mother_name"
                                               class="col-sm-3 col-form-label">{{__('Mother Name (English)')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="mother_name" name="mother_name"
                                                   value="{{ old('mother_name', $data->mother_name) }}" required>
                                            @if ($errors->has('mother_name'))
                                                <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="mother_name_bn"
                                               class="col-sm-3 col-form-label">{{__('মায়ের নাম (বাংলায়)')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="mother_name_bn"
                                                   name="mother_name_bn"
                                                   value="{{ old('mother_name_bn', $data->mother_name_bn) }}" required>
                                            @if ($errors->has('mother_name_bn'))
                                                <span class="text-danger">{{ $errors->first('mother_name_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-3 col-form-label">{{__('Gender')}}</label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="male">
                                                    <input type="radio" name="gender"
                                                           value="male" {{ ($data->gender === "male")? "checked" : ""}}>
                                                    <span class="mr-sm-2 mt-0">{{__('Male')}}</span>
                                                </label>
                                                <label for="female">
                                                    <input type="radio" name="gender"
                                                           value="female" {{ ($data->gender === "female")? "checked" : ""}}>
                                                    <span class="mr-sm-2">{{__('Female')}}</span>
                                                </label>
                                                <label for="other">
                                                    <input type="radio" name="gender"
                                                           value="other" {{ ($data->gender === "other")? "checked" : ""}}>
                                                    <span class="mr-sm-2">{{__('Other')}}</span>
                                                </label>
                                                @if ($errors->has('gender'))
                                                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone_number"
                                               class="col-sm-3 col-form-label">{{__('Phone Number')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="phone_number"
                                                   name="phone_number"
                                                   value="{{ old('phone_number', $data->phone_number) }}" required>
                                            @if ($errors->has('phone_number'))
                                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="emergency_contact"
                                               class="col-sm-3 col-form-label">{{__('Emergency Contact')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="emergency_contact"
                                                   name="emergency_contact"
                                                   value="{{ old('emergency_contact', $data->emergency_contact) }}"
                                                   required>
                                            @if ($errors->has('emergency_contact'))
                                                <span
                                                    class="text-danger">{{ $errors->first('emergency_contact') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="dob" class="col-sm-3 col-form-label">{{__('Date Of Birth')}}</label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control take_past_date" id="dob" name="dob"
                                                   value="{{ old('dob', $data->dob) }}" required>
                                            @if ($errors->has('dob'))
                                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="blood_group_id"
                                               class="col-sm-3 col-form-label">{{__('Blood Group')}}</label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" name="blood_group_id">
                                                <option hidden
                                                        value="{{ old('blood_group_id', $data->blood_group_id) }}"> {{ $data->bloodGroups->name }}</option>
                                                @foreach($bloodGroups as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{$item->blood_group_id == $item->id ? 'selected' : ''}}>{{ucwords($item->name)}}</option>
                                                @endforeach
                                                @if ($errors->has('blood_group_id'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('blood_group_id') }}</span>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="marital_status"
                                               class="col-sm-3 col-form-label">{{__('Marital Status')}}</label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="married">
                                                    <input type="radio" name="marital_status"
                                                           value="married" {{ ($data->marital_status === "married")? "checked" : ""}}>
                                                    <span class="mr-sm-2 mt-0">{{__('Married')}}</span>
                                                </label>
                                                <label for="unmarried">
                                                    <input type="radio" name="marital_status"
                                                           value="unmarried" {{ ($data->marital_status === "unmarried")? "checked" : ""}}>
                                                    <span class="mr-sm-2">{{__('Unmarried')}}</span>
                                                </label>
                                                @if ($errors->has('marital_status'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('marital_status') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div id="spouse_names">
                                        {{--                                    @if($data->marital_status =='married')--}}
                                        <div class="form-group row">
                                            <label for="spouse_name"
                                                   class="col-sm-3 col-form-label">{{__('Spouse Name (English)')}}</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="spouse_name"
                                                       name="spouse_name"
                                                       value="{{ old('spouse_name', $data->spouse_name) }}">
                                                @if ($errors->has('spouse_name'))
                                                    <span class="text-danger">{{ $errors->first('spouse_name') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="spouse_name_bn"
                                                   class="col-sm-3 col-form-label">{{__('স্বামী বা স্ত্রীর নাম (বাংলায়)')}}</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="spouse_name_bn"
                                                       name="spouse_name_bn"
                                                       value="{{ old('spouse_name_bn', $data->spouse_name_bn) }}">
                                                @if ($errors->has('spouse_name_bn'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('spouse_name_bn') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        {{--                                    @endif--}}
                                    </div>

                                    <div class="form-group row">
                                        <label for="present_address"
                                               class="col-sm-3 col-form-label">{{__('Present Address')}}</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" name="present_address" id="present_address"
                                                      class="form-control"
                                                      required>{{ old('present_address', $data->present_address) }}</textarea>
                                            @if ($errors->has('present_address'))
                                                <span class="text-danger">{{ $errors->first('present_address') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="permanent_address"
                                               class="col-sm-3 col-form-label">{{__('Permanent Address')}}</label>
                                        <div class="col-sm-6">
                                            <textarea type="text" name="permanent_address" id="permanent_address"
                                                      class="form-control"
                                                      required>{{ old('permanent_address', $data->permanent_address) }}</textarea>
                                            @if ($errors->has('permanent_address'))
                                                <span
                                                    class="text-danger">{{ $errors->first('permanent_address') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nid" class="col-sm-3 col-form-label">{{__('National Id')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="nid" name="nid"
                                                   value="{{ old('nid', $data->nid) }}" required>
                                            @if ($errors->has('nid'))
                                                <span class="text-danger">{{ $errors->first('nid') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    {{--                                    @dd($data)--}}
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">{{__('Role')}}</label>
                                        <div class="col-sm-6">
                                            <select name="role" id="user_role" class="form-control select2">
                                                <option hidden
                                                        value="{{ getRoleName($data) }}">{{ ucwords(getRoleName($data)) }}</option>
                                                @foreach($roles as $item)
                                                    <option
                                                        value="{{ $item->name }}">{{ ucfirst($item->name) }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('role'))
                                                <span class="text-danger">{{ $errors->first('role') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="designation"
                                               class="col-sm-3 col-form-label">{{__('Designation')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="designation" name="designation"
                                                   value="{{ old('designation', $data->designation) }}"
                                                   placeholder="Designation" required>
                                            @if ($errors->has('designation'))
                                                <span class="text-danger">{{ $errors->first('designation') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="job_type" class="col-sm-3 col-form-label">{{__('Job Type')}}</label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="temporary">
                                                    <input type="radio" id="job_type" name="job_type"
                                                           value="temporary" {{ ($data->job_type === "temporary")? "checked" : ""}}>
                                                    <span class="mr-sm-2 mt-0">{{__('Temporary')}}</span>
                                                </label>
                                                <label for="permanent">
                                                    <input type="radio" id="job_type" name="job_type"
                                                           value="permanent" {{ ($data->job_type === "permanent")? "checked" : ""}}>
                                                    <span class="mr-sm-2">{{__('Permanent')}}</span>
                                                </label>
                                                @if ($errors->has('job_type'))
                                                    <span class="text-danger">{{ $errors->first('job_type') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="join_date"
                                               class="col-sm-3 col-form-label">{{__('Join Date')}}</label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control take_past_date" id="join_date" name="join_date"
                                                   value="{{ old('join_date', $data->join_date) }}" required>
                                            @if ($errors->has('join_date'))
                                                <span class="text-danger">{{ $errors->first('join_date') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="salary" class="col-sm-3 col-form-label">{{__('Salary')}}</label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control" id="salary" name="salary"
                                                   value="{{ old('salary', $data->salary) }}" required>
                                            @if ($errors->has('salary'))
                                                <span class="text-danger">{{ $errors->first('salary') }}</span>
                                            @endif
                                        </div>
                                    </div>

{{--                                    <div class="form-group row">--}}
{{--                                        <label for="email" class="col-sm-3 col-form-label">{{__('Email')}}</label>--}}
{{--                                        <div class="col-sm-6">--}}
{{--                                            <input type="email" class="form-control" id="email" name="email"--}}
{{--                                                   value="{{ old('email', $data->email) }}" required>--}}
{{--                                            @if ($errors->has('email'))--}}
{{--                                                <span class="text-danger">{{ $errors->first('email') }}</span>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    {{--                                    @if( in_array( 'commissioner', $data->getRoleNames()->toArray() ) )--}}
                                    <div class="form-group row" id="user_ward_id">
                                        <label for="ward_id" class="col-sm-3 col-form-label">{{__('Ward')}}</label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" name="ward_id" id="ward_id">
                                                <option hidden
                                                        value="{{ old('ward_id', $data->ward_id != null ? $data->ward_id : '') }}"> {{ $data->ward_id != null ? $data->wards->name : '' }}</option>
                                                @foreach($wards as $item)
                                                    <option
                                                        value="{{ $item->id }}" {{$item->ward_id == $item->id  ? 'selected' : ''}}>{{ucwords($item->name)}}</option>
                                                @endforeach
                                                @if ($errors->has('ward_id'))
                                                    <span class="text-danger">{{ $errors->first('ward_id') }}</span>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
{{--                                                                        @endif--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label for="file" class="col-sm-3 col-form-label">{{__('Upload Documents')}}</label>--}}
{{--                                        <div class="form-group col-sm-6">--}}
{{--                                            <div class="input-group control-group increment" >--}}
{{--                                                <input type="file" name="file" class="col-form-label">--}}
{{--                                                <div class="input-group-btn">--}}
{{--                                                    <button class="btn btn-outline-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>--}}
{{--                                                </div>--}}
{{--                                                @if ($errors->has('file'))--}}
{{--                                                    <span class="text-danger">{{ $errors->first('file') }}</span>--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                            <div class="clone hide">--}}
{{--                                                <div class="control-group input-group" style="margin-top:10px">--}}
{{--                                                    <input type="file" name="file" class="col-form-label">--}}
{{--                                                    <div class="input-group-btn">--}}
{{--                                                        <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="form-group row">
                                        <label for="file" class="col-sm-3 col-form-label">{{__('Upload Documents')}}</label>
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
                                    <div class="form-group row">
                                        <label for="file[]" id="file" class="col-sm-6  col-md-3 col-form-label">{{__('Uploaded File')}} :</label>
                                        <input type="hidden" name="doc_id[]" id="document_id_array">
                                        <div class="col-sm-6 col-md-9 pt-2">
                                            @if($data->employeeDocuments != null)
{{--                                                @dd($data)--}}
                                                @foreach($data->employeeDocuments as $file)
                                                    <div class="form-group">
                                                        <a href="{{ route('employee.downloadFile',  $file->id) }}" class="text-light" title="Click to download">{{ $file->file_name }}</a>
                                                        <span type="button"
                                                              class="text-danger text-bold ml-3"
                                                              id="removeDoc{{ $loop->index }}"
                                                              onclick="removeDocument(this, {{ $loop->index }})"
                                                        ><i class="fa fa-times-circle"></i></span>
                                                    </div>
                                                @endforeach
                                            @else
                                                {{ __("No Files Available") }}
                                            @endif

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cover" class="col-sm-3 col-form-label">{{__('Upload Image')}}</label>
                                        <div class="input-group col-sm-6">
                                            <div class="custom-file">
                                                <input type="file" name="cover" id="cover" />
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <div id="image-holder"  style="width: 200px; position: relative"></div>
                                            </div>
                                            @if ($errors->has('cover'))
                                                <span class="text-danger">{{ $errors->first('cover') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="cover" class="col-sm-3 col-form-label">{{__('Uploaded Image')}}</label>
                                        <div class="col-sm-6 mt-2">
                                            @if($data->cover != null)
                                                <a href="{{ route('employee.downloadImage',  $data->slug) }}" class="text-light" title="Click to download">{{ $data->cover }}</a>
                                            @else
                                                {{ __("No Files Available") }}
                                            @endif
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
    <script type="text/javascript">
        var doc_id_array = [];

        $(function () {

            var employee_doc_array = {!! json_encode($data->employeeDocuments->toArray() ) !!}
{{--            var employee_doc_array = {{ $data->employeeDocuments->toJson() }}--}}
            console.log("Employee Document array")
            console.log(employee_doc_array)

            for(var i=0; i<employee_doc_array.length; i++){

                doc_id_array.push(employee_doc_array[i].id)

            }
            console.log("Document Id array")
            console.log(doc_id_array)

            $("#document_id_array").val(doc_id_array)

        })
        function removeDocument(fullTag, index){
            console.log("Remove Document: ", index)
            // var document_ids = $("#document_id_array").val()
            // console.log(document_ids);

            doc_id_array.splice(index,1)
            console.log(doc_id_array);

            $("#document_id_array").val(doc_id_array)

            console.log("FullTag")
            console.log(fullTag.parentElement)
            fullTag.parentElement.remove()
        }

        // $("#user_role").on('change', function () {
        //     console.log(this.value);
        var role = $("#user_role").val();
        if (role != 'commissioner') {
            $("#user_ward_id").hide()
        } else {
            $("#user_ward_id").show()
        }
        // })


        var is_married = $('input[name="marital_status"]:checked').val();
        console.log('is_married : ' + is_married)
        if (is_married != 'married') {
            $("#spouse_names").hide()
        } else {
            $("#spouse_names").show()
        }



        //For National Id
        $("input[name*='nid']").keyup(function () {
            let value_input = $("input[name*='nid']").val();
            let regexp = /[^0-9]/g;
            if (value_input.match(regexp)) {
                $("input[name*='nid']").val(value_input.replace(regexp, ''))
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

        //For Emergency Contact
        $("input[name*='emergency_contact']").keyup(function () {
            let value_input = $("input[name*='emergency_contact']").val();
            let regexp = /[^0-9+]/g;
            if (value_input.match(regexp)) {
                $("input[name*='emergency_contact']").val(value_input.replace(regexp, ''))
            }
        });

        //For First Name
        $("input[name*='first_name']").keyup(function () {
            let value_input = $("input[name*='first_name']").val();
            let regexp = /[^A-Za-z ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='first_name']").val(value_input.replace(regexp, ''))
            }
        });

        //For Last Name
        $("input[name*='last_name']").keyup(function () {
            let value_input = $("input[name*='last_name']").val();
            let regexp = /[^A-Za-z ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='last_name']").val(value_input.replace(regexp, ''))
            }
        });

        //For Father Name
        $("input[name*='father_name']").keyup(function () {
            let value_input = $("input[name*='father_name']").val();
            let regexp = /[^A-Za-z ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='father_name']").val(value_input.replace(regexp, ''))
            }
        });

        //For Mother Name
        $("input[name*='mother_name']").keyup(function () {
            let value_input = $("input[name*='mother_name']").val();
            let regexp = /[^A-Za-z ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='mother_name']").val(value_input.replace(regexp, ''))
            }
        });

        //For Spouse Name
        $("input[name*='spouse_name']").keyup(function () {
            let value_input = $("input[name*='spouse_name']").val();
            let regexp = /[^A-Za-z ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='spouse_name']").val(value_input.replace(regexp, ''))
            }
        });

        //For Designation
        $("input[name*='designation']").keyup(function () {
            let value_input = $("input[name*='designation']").val();
            let regexp = /[^A-Za-z ]/g;
            if (value_input.match(regexp)) {
                $("input[name*='designation']").val(value_input.replace(regexp, ''))
            }
        });

        // //For UploadDocument field add & remove
        // $(document).ready(function() {
        //
        //     $(".btn-outline-success").click(function(){
        //         var html = $(".clone").html();
        //         $(".increment").after(html);
        //     });
        //
        //     $("body").on("click",".btn-danger",function(){
        //         $(this).parents(".control-group").remove();
        //     });
        //
        // });

        //For image preview
        $("#cover").on('change', function () {
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




