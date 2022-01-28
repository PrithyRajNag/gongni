@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('New Invoice')}}</h1>
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
                            <form role="form" id="createForm" action="{{route('invoice.store')}}"
                                  class="form-horizontal clearfix"
                                  method="POST"
                            >
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">{{__('Name')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="name" name="name"
                                                   value="{{ old('name') }}"
                                                   required>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone_number"
                                               class="col-sm-3 col-form-label">{{__('Phone Number')}}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="phone_number"
                                                   name="phone_number"
                                                   value="{{ old('phone_number') }}"
                                                   required>
                                            @if ($errors->has('phone_number'))
                                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="category_id"
                                               class="col-sm-3 col-form-label">{{__('Pay Category')}} </label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" name="category_id" id="category_id"
                                                    style="width: 100%" required>
                                                <option hidden value=""></option>
                                                @foreach ($categories as $category)
                                                    <option value={{$category->id}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="sub_category_id"
                                               class="col-sm-3 col-form-label">{{__('Sub Category')}} </label>
                                        <div class="col-sm-6">
                                            <select class="form-control select2" name="sub_category_id" id="sub_category_id"
                                                    style="width: 100%" required>
                                                <option >---Select Category First---</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="type"
                                               class="col-sm-3 col-form-label">{{__('Type')}}</label>
                                        <div class="col-sm-6 pt-2">
                                            <div class="form-check form-check-inline">
                                                <label for="new">
                                                    <input type="radio" name="type" id="new_licence_fee"
                                                           >
                                                    <span class="mr-2 mt-0">{{__('New')}}</span>
                                                </label>
                                                <label for="renew">
                                                    <input type="radio" name="type" id="renew_licence_fee"
                                                           >
                                                    <span class="mr-2">{{__('Renew')}}</span>
                                                </label>
                                                @if ($errors->has('type'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('type') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="amount"
                                               class="col-sm-3 col-form-label">{{__('Payable Amount')}} </label>
                                        <div class="col-sm-6">
                                            <input type="text" disabled  class="form-control" id="amount"
                                                   value="{{ old('amount') }}" required>
                                            <input type="text"  class="form-control" id="price" name="amount" hidden>
                                            @if ($errors->has('amount'))
                                                <span class="text-danger">{{ $errors->first('amount') }}</span>
                                            @endif
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
    <script>
        $(document).ready(function () {
            $('#category_id').on('change', function (e) {
                fetch(`/invoice/get-sub-category/${e.target.value}`)
                    .then(res => res.json())
                    .then(res => {
                        let html = '<option hidden> </option>'
                        res.forEach(sub_category_id => {
                            html += `<option value="${sub_category_id.id}">${sub_category_id.name}</option>`
                            console.log(html)
                        })
                        $('#sub_category_id').html(html)
                    })
                    .catch(err => {
                        console.log(err)
                    })
            })

            //for sub category id set in radio button
            $('#sub_category_id').on('change', function (e) {
                let sub_cat_id = $(this).val()
                $('#new_licence_fee').val(sub_cat_id)
                $('#renew_licence_fee').val(sub_cat_id)
            })

            $('#new_licence_fee').on('click', function (e) {
                fetch(`/invoice/get-sub-category-price/${e.target.value}`)
                    .then(res => res.json())
                    .then(res => {
                        // console.log(res)
                        $('#amount').val(res.licence_fees)
                        $('#price').val(res.licence_fees)
                    })
                    .catch(err => {
                        console.log(err)
                    })
            })

            $('#renew_licence_fee').on('click', function (e) {
                fetch(`/invoice/get-sub-category-price/${e.target.value}`)
                    .then(res => res.json())
                    .then(res => {
                        // console.log(res)
                        $('#amount').val(res.renewal_fees)
                        $('#price').val(res.renewal_fees)
                    })
                    .catch(err => {
                        console.log(err)
                    })
            })
        })
    </script>
@endpush




