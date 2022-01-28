@extends('layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('Equipment List')}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('equipment.create') }}" class="btn btn-success float-right"><i
                                class="fas fa-plus"></i>&nbsp;
                            {{__('Add')}}</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="indexTable" class="table table-bordered table-striped">

                                    <thead>
                                    <tr class="text-center">
                                        <th>{{__('SL')}}</th>
                                        <th>{{__('Equipment Name')}}</th>
                                        <th>{{__('Equipment Category Name')}}</th>

                                        {{--                                        <th>Ward Name</th>--}}
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contentData as $item)
{{--                                                                                @dd($contentData)--}}
                                        @if($item->equipmentCategories()->exists())
                                            <tr>
                                                <td>{{ ++$loop->index }}</td>
                                                <td>{{ ucwords($item->name) }}</td>
                                                <td>{{ ucwords($item->equipmentCategories->name ?? '') }}</td>
                                                {{--                                            <td>{{ ucwords($item->wards->name) }}</td>--}}
                                                <td class="text-center">
{{--                                                    <a href="{{route('equipment.show', $item->slug)}}"--}}
{{--                                                       class="btn btn-info mb-2">--}}
{{--                                                        <i class="fas fa-info"></i> {{__('Info')}}</a>--}}
                                                    <a href="{{ route('equipment.edit', $item->slug) }}"
                                                       class="btn btn-primary mb-2"><i class="fas fa-edit"></i>&nbsp;
                                                        {{__('Edit')}}</a>

                                                    <a href="{{ route('equipment.delete', $item->slug) }}"
                                                       class="btn btn-danger mb-2"><i class="fas fa-trash"></i>&nbsp;
                                                        {{__('Delete')}}</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>

                                </table>
{{--                                <div class="mt-1 pagination">--}}
{{--                                    {{ $contentData->links() }}--}}
{{--                                </div>--}}

                                {{--                                {{ $contentData->appends(Request::except('page'))->links() }}--}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
@push('customScripts')
    <script>
        //        // Browser validation
        //        $("input[name*='title']").keyup(function () {
        //            let value_input = $("input[name*='title']").val();
        //            // let regexp = /[^a-zA-Z. ]/g ;
        //            // if (value_input.match(regexp)) {
        //            //     $("input[name*='driver_name']").val(value_input.replace(regexp,''))
        //            // }
        //            if (value_input.length < 5) {
        //                $("#title_error").text("Minimum 5 Character Required");
        //                $('#createBtn').attr('disabled', true);
        //                return;
        //            }
        //            $("#title_error").text('');
        //            $('#createBtn').attr('disabled', false);
        //        });
        // $("#search").keyup(function (event)
        // // $(document).keyup(function (event)
        // let value_input = $("input[name*='search']").val();
        //
        // console.log('value_input')
        // alert('You have released a key');
        // }


        // $("#search").keyup(function (event) {
        //     let value_input = $("input[name*='search']").val();
        //     // console.log(value_input)
        //
        //     if(value_input.length < 2){
        //         $("#lists").empty();
        //         return;
        //     }
        //
        //     $


    </script>
@endpush

