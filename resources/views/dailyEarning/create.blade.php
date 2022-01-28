@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Accounts - Daily Earning')}}</h1>
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
                            <form role="form" id="createForm" action="{{route('dailyEarning.store')}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                {{--                                @if($errors->any())--}}
                                {{--                                    {{ implode('', $errors->all('<div>:message</div>')) }}--}}

                                {{--                                @endif--}}


                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="category" class="col-sm-3 col-form-label">{{__('Pay Category *')}} </label>
                                        <div class="col-sm-6">
                                            <select class="form-control"  name="category" id="category" style="width: 100%" required>

                                            </select>
                                        </div>
                                    </div>
                                    <div id = "" >

                                    </div>
                                    <div class="form-group row">
                                        <label for="sub_category" class="col-sm-3 col-form-label">{{__('Sub Category*')}} </label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2"   name="sub_category" id="sub_category" style="width: 100%" required>
                                                <option hidden value="" >---Select Division First---</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="amount" class="col-sm-3 col-form-label">{{__('Payable Amount')}} </label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control" id="amount" name="amount"
                                                   value="{{ old('amount') }}" required>
                                            @if ($errors->has('amount'))
                                                <span class="text-danger">{{ $errors->first('amount') }}</span>
                                            @endif
                                        </div>
                                    </div>


{{--                                    <div class="form-group row">--}}
{{--                                        <label for="present_thana_id" class="col-sm-3 col-form-label">{{__('Thana *')}} </label>--}}
{{--                                        <div class="col-sm-6">--}}
{{--                                            <select class="form-control select2" disabled name="present_thana_id" id="present_thana_id" style="width: 100%" required>--}}
{{--                                                <option hidden value="">---Select District first---</option>--}}
{{--                                                --}}{{--                                                @foreach($location as $item)--}}
{{--                                                --}}{{--                                                    <option--}}
{{--                                                --}}{{--                                                        value="{{ $item->id }}" onclick="setDistrictDropdown( {{$item->districts}} )" >{{ucwords($item->name)}}</option>--}}
{{--                                                --}}{{--                                                @endforeach--}}
{{--                                                --}}{{--                                                @if ($errors->has('ward_id'))--}}
{{--                                                --}}{{--                                                    <span class="text-danger">{{ $errors->first('ward_id') }}</span>--}}
{{--                                                --}}{{--                                                @endif--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    --}}


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
        $(document).ready(function () {
            let category = [
                {
                    "id": 1,
                    "slug": "trade-licence",
                    "name": "Trade Licence",
                    "created_at": "2021-09-08T06:54:45.000000Z",
                    "updated_at": "2021-09-08T06:54:45.000000Z",
                    "deleted_at": null,
                    "sub_categories": [
                        {
                            "id": 1,
                            "slug": "bankinsurance-financial-institution",
                            "name": "Bank,Insurance & Financial Institution",
                            "category_id": 1,
                            "fees": 5000,
                            "created_at": "2021-09-08T06:54:45.000000Z",
                            "updated_at": "2021-09-08T06:54:45.000000Z",
                            "deleted_at": null
                        },
                        {
                            "id": 2,
                            "slug": "institutetraining-center",
                            "name": "Institute/Training Center",
                            "category_id": 1,
                            "fees": 5000,
                            "created_at": "2021-09-08T06:54:45.000000Z",
                            "updated_at": "2021-09-08T06:54:45.000000Z",
                            "deleted_at": null
                        }
                    ]
                },
                {
                    "id": 2,
                    "slug": "contractor-licence",
                    "name": "Contractor Licence",
                    "created_at": "2021-09-08T06:54:45.000000Z",
                    "updated_at": "2021-09-08T06:54:45.000000Z",
                    "deleted_at": null,
                    "sub_categories": [
                        {
                            "id": 3,
                            "slug": "electrical-contractor",
                            "name": "Electrical Contractor",
                            "category_id": 2,
                            "fees": 5000,
                            "created_at": "2021-09-08T06:54:45.000000Z",
                            "updated_at": "2021-09-08T06:54:45.000000Z",
                            "deleted_at": null
                        },
                        {
                            "id": 4,
                            "slug": "mechanical-contractor",
                            "name": "Mechanical Contractor",
                            "category_id": 2,
                            "fees": 5000,
                            "created_at": "2021-09-08T06:54:45.000000Z",
                            "updated_at": "2021-09-08T06:54:45.000000Z",
                            "deleted_at": null
                        }
                    ]
                },
                {
                    "id": 3,
                    "slug": "vehicle-licence",
                    "name": "Vehicle Licence",
                    "created_at": "2021-09-08T06:54:45.000000Z",
                    "updated_at": "2021-09-08T06:54:45.000000Z",
                    "deleted_at": null,
                    "sub_categories": [
                        {
                            "id": 5,
                            "slug": "auto",
                            "name": "Auto",
                            "category_id": 3,
                            "fees": 1000,
                            "created_at": "2021-09-08T06:54:45.000000Z",
                            "updated_at": "2021-09-08T06:54:45.000000Z",
                            "deleted_at": null
                        },
                        {
                            "id": 6,
                            "slug": "rickshaw",
                            "name": "Rickshaw",
                            "category_id": 3,
                            "fees": 500,
                            "created_at": "2021-09-08T06:54:45.000000Z",
                            "updated_at": "2021-09-08T06:54:45.000000Z",
                            "deleted_at": null
                        }
                    ]
                }
            ]
            $.ajax('allSub',{
                dataType: 'json',
                success: function(data){
                    // console.log(data.original)
                  $.each(data,function(index, value){
                      console.log(value)
                    $('#category').append(`<option value="${value.id}>${value.name}</option>`)
                  })

              }
            });


        });

        {{--$(document).ready(function(){--}}

        {{--    $('select[name="category"]').on('change',function(){--}}


        {{--        var cat_id=$(this).val();--}}
        {{--        // console.log(cat_id);--}}
        {{--        var div=$(this).parent();--}}

        {{--        var op=" ";--}}

        {{--        $.ajax({--}}
        {{--            type:'get',--}}
        {{--            url:'allSub',--}}
        {{--            data:{'id':cat_id},--}}
        {{--            success:function(data){--}}
        {{--                //console.log('success');--}}

        {{--                console.log(data);--}}

        {{--                //console.log(data.length);--}}
        {{--                op+='<option value="0" selected disabled></option>';--}}
        {{--                //--}}
        //                 if (data){
        //                     data.original.data.forEach((category, index) => {
        //
        //                         op+='<option value="'+data[index].id+'">'+data[index].subCategory+'</option>'
        //                     } )
        //                 }

        {{--                // div.find($('select[name ="subCategory"]')).html(" ");--}}
        {{--                // div.find($('select[name ="subCategory"]')).append(op);--}}

        {{--                // div.find('select[name = "subCategory"]').html(" ");--}}
        {{--                // div.find('select[name = "subCategory"]').append(op);--}}
        {{--            },--}}
        {{--            error:function(){--}}

        {{--            }--}}
        {{--        });--}}
        {{--    });--}}

        {{--    $(document).on('change','.productname',function () {--}}
        {{--        var prod_id=$(this).val();--}}

        {{--        var a=$(this).parent();--}}
        {{--        console.log(prod_id);--}}
        {{--        var op="";--}}
        {{--        $.ajax({--}}
        {{--            type:'get',--}}
        {{--            url:'{!!URL::to('findPrice')!!}',--}}
        {{--            data:{'id':prod_id},--}}
        {{--            dataType:'json',//return data will be json--}}
        {{--            success:function(data){--}}
        {{--                console.log("price");--}}
        {{--                console.log(data.price);--}}

        {{--                // here price is coloumn name in products table data.coln name--}}

        {{--                a.find('.prod_price').val(data.price);--}}

        {{--            },--}}
        {{--            error:function(){--}}

        {{--            }--}}
        {{--        });--}}


        {{--    });--}}

        {{--});--}}


        // $(document).ready(function() {
        //     $('select[name="category"]').on('change', function() {
        //         var categoryID = $(this).val();
        //         console.log(categoryID)
        //         if(categoryID) {
        //             $.ajax({
        //                 url: 'allSub/'+categoryID,
        //                 type: "GET",
        //                 dataType: "json",
        //                 success:function(data) {
        //
        //
        //
        //                     $('select[name="subCategory"]').empty();
        //                     $.each(data, function( ) {
        //                         $('select[name="subCategory"]').append('<option value="'+  +'">'+  +'</option>');
        //                     });
        //
        //
        //                 }
        //             });
        //         }else{
        //             $('select[name="subCategory"]').empty();
        //         }
        //     });
        // });



        // var district_list;
        //
        // function setCategoryDropdown(){
        //     // var i;
        //     console.log("setCategoryDropdown(businessCategories)")
        //     var select_tag = document.getElementById("department_id");
        //     $('#category_id').find('option').first().remove();
        //     var option_data = select_tag.options[select_tag.selectedIndex].dataset.relation;
        //     var dataset = JSON.parse(option_data);
        //     for (i = 0; i < dataset.length; i++){
        //         var list = '<option value="'+ dataset[i].id +'" data-relation="'+ i +'">'+ dataset[i].name +'</option>'
        //         $('#category_id').append(list);
        //     }
        //     district_list = dataset
        //     $('#category_id').removeAttr('disabled');
        // }
        //
        // function setPresentThanaDropdown(){
        //     var i;
        //     console.log("setPresentThanaDropdown()")
        //     var select_tag = document.getElementById("present_district_id");
        //     $('#present_thana_id').find('option').first().remove();
        //     var option_data = select_tag.options[select_tag.selectedIndex].dataset.relation;
        //     var dataset = district_list[option_data].thanas;
        //     for (i = 0; i < dataset.length; i++){
        //         var list = '<option value="'+ dataset[i].id +'" >'+ dataset[i].name +'</option>'
        //         $('#present_thana_id').append(list);
        //     }
        //     $('#present_thana_id').removeAttr('disabled');
        // }
        //
        // var district_list;
        //
        // function setPermanentDistrictDropdown(){
        //     var i;
        //     console.log("setPermanentDistrictDropdown(districts)")
        //     var select_tag = document.getElementById("permanent_division_id");
        //     $('#permanent_district_id').find('option').first().remove();
        //     var option_data = select_tag.options[select_tag.selectedIndex].dataset.relation;
        //     var dataset = JSON.parse(option_data);
        //     for (i = 0; i < dataset.length; i++){
        //         var list = '<option value="'+ dataset[i].id +'" data-relation="'+ i +'">'+ dataset[i].name +'</option>'
        //         $('#permanent_district_id').append(list);
        //     }
        //     district_list = dataset
        //     $('#permanent_district_id').removeAttr('disabled');
        // }
        //
        // function setPermanentThanaDropdown(){
        //     var i;
        //     console.log("setPermanentThanaDropdown()")
        //     var select_tag = document.getElementById("permanent_district_id");
        //     $('#permanent_thana_id').find('option').first().remove();
        //     var option_data = select_tag.options[select_tag.selectedIndex].dataset.relation;
        //     var dataset = district_list[option_data].thanas;
        //     for (i = 0; i < dataset.length; i++){
        //         var list = '<option value="'+ dataset[i].id +'" >'+ dataset[i].name +'</option>'
        //         $('#permanent_thana_id').append(list);
        //     }
        //     $('#permanent_thana_id').removeAttr('disabled');
        // }

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




