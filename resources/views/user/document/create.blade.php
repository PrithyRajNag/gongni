@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('Create Employee')}}</h1>
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
                            <form role="form" id="createForm" action="{{route('employee.store')}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                {{--                                @if($errors->any())--}}
                                {{--                                    {{ implode('', $errors->all('<div>:message</div>')) }}--}}

                                {{--                                @endif--}}


                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="input-group control-group increment" >
                                            <input type="file" name="file[]" class="col-sm-3 col-form-label">
                                            <div class="input-group-btn">
                                                <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                            </div>
                                        </div>
                                        <div class="clone hide">
                                            <div class="control-group input-group" style="margin-top:10px">
                                                <input type="file" name="file[]" class="col-sm-3 col-form-label">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                                </div>
                                            </div>
                                        </div>
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

    <script type="text/javascript">


        $(document).ready(function() {

            $(".btn-success").click(function(){
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click",".btn-danger",function(){
                $(this).parents(".control-group").remove();
            });

        });

    </script>
    <!-- Page specific script -->
{{--    <script>--}}
{{--        $("#user_ward_id").hide();--}}
{{--        $("#spouse_names").hide();--}}

{{--        //For National Id--}}
{{--        $("input[name*='nid']").keyup(function () {--}}
{{--            let value_input = $("input[name*='nid']").val();--}}
{{--            let regexp = /[^0-9]/g;--}}
{{--            if (value_input.match(regexp)) {--}}
{{--                $("input[name*='nid']").val(value_input.replace(regexp, ''))--}}
{{--            }--}}
{{--        });--}}

{{--        //For Phone Number--}}
{{--        $("input[name*='phone_number']").keyup(function () {--}}
{{--            let value_input = $("input[name*='phone_number']").val();--}}
{{--            let regexp = /[^0-9+]/g;--}}
{{--            if (value_input.match(regexp)) {--}}
{{--                $("input[name*='phone_number']").val(value_input.replace(regexp, ''))--}}
{{--            }--}}
{{--        });--}}

{{--        //For Emergency Contact--}}
{{--        $("input[name*='emergency_contact']").keyup(function () {--}}
{{--            let value_input = $("input[name*='emergency_contact']").val();--}}
{{--            let regexp = /[^0-9+]/g;--}}
{{--            if (value_input.match(regexp)) {--}}
{{--                $("input[name*='emergency_contact']").val(value_input.replace(regexp, ''))--}}
{{--            }--}}
{{--        });--}}

{{--        //For First Name--}}
{{--        $("input[name*='first_name']").keyup(function () {--}}
{{--            let value_input = $("input[name*='first_name']").val();--}}
{{--            let regexp = /[^A-Za-z ]/g;--}}
{{--            if (value_input.match(regexp)) {--}}
{{--                $("input[name*='first_name']").val(value_input.replace(regexp, ''))--}}
{{--            }--}}
{{--        });--}}

{{--        //For Last Name--}}
{{--        $("input[name*='last_name']").keyup(function () {--}}
{{--            let value_input = $("input[name*='last_name']").val();--}}
{{--            let regexp = /[^A-Za-z ]/g;--}}
{{--            if (value_input.match(regexp)) {--}}
{{--                $("input[name*='last_name']").val(value_input.replace(regexp, ''))--}}
{{--            }--}}
{{--        });--}}

{{--        //For Father Name--}}
{{--        $("input[name*='father_name']").keyup(function () {--}}
{{--            let value_input = $("input[name*='father_name']").val();--}}
{{--            let regexp = /[^A-Za-z ]/g;--}}
{{--            if (value_input.match(regexp)) {--}}
{{--                $("input[name*='father_name']").val(value_input.replace(regexp, ''))--}}
{{--            }--}}
{{--        });--}}

{{--        //For Mother Name--}}
{{--        $("input[name*='mother_name']").keyup(function () {--}}
{{--            let value_input = $("input[name*='mother_name']").val();--}}
{{--            let regexp = /[^A-Za-z ]/g;--}}
{{--            if (value_input.match(regexp)) {--}}
{{--                $("input[name*='mother_name']").val(value_input.replace(regexp, ''))--}}
{{--            }--}}
{{--        });--}}

{{--        //For Spouse Name--}}
{{--        $("input[name*='spouse_name']").keyup(function () {--}}
{{--            let value_input = $("input[name*='spouse_name']").val();--}}
{{--            let regexp = /[^A-Za-z ]/g;--}}
{{--            if (value_input.match(regexp)) {--}}
{{--                $("input[name*='spouse_name']").val(value_input.replace(regexp, ''))--}}
{{--            }--}}
{{--        });--}}

{{--        //For Designation--}}
{{--        $("input[name*='designation']").keyup(function () {--}}
{{--            let value_input = $("input[name*='designation']").val();--}}
{{--            let regexp = /[^A-Za-z ]/g;--}}
{{--            if (value_input.match(regexp)) {--}}
{{--                $("input[name*='designation']").val(value_input.replace(regexp, ''))--}}
{{--            }--}}
{{--        });--}}

{{--        // $(document).ready(function() {--}}
{{--        //     $(".btn-success").click(function(){--}}
{{--        //         var lsthmtl = $(".clone").html();--}}
{{--        //         $(".increment").after(lsthmtl);--}}
{{--        //     });--}}
{{--        //     $("body").on("click",".btn-danger",function(){--}}
{{--        //         $(this).parents(".hdtuto control-group lst").remove();--}}
{{--        //     });--}}
{{--        // });--}}
{{--    </script>--}}

@endpush




