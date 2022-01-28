@extends('layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: 'Comfortaa'">
                        <h1>{{__('SMS Templates List')}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('smsTemplate.create') }}" class="btn btn-success float-right"><i
                                class="fas fa-plus"></i>&nbsp;
                            {{__('Add')}}</a>
                    </div>
                </div>
{{--                <form id="search_box" style="width:100%" action="{{ route('sms.index') }}" method="GET">--}}


{{--                    --}}{{--                    @csrf--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-8 col-sm-4 col-md-4">--}}
{{--                            --}}{{--                            <label for="ward_id" class="col-sm-3 col-form-label">{{__('Ward')}}</label>--}}
{{--                            <div class="form-group">--}}
{{--                                <select class="form-control select2" name="ward_id" id="ward_id"--}}
{{--                                        required>--}}
{{--                                    --}}{{--                                    <option hidden--}}
{{--                                    --}}{{--                                            value="{{ old('ward_id', $data->ward_id) }}"> {{ $data->wards->name }}</option>--}}
{{--                                    @foreach($wards as $item)--}}
{{--                                        <option--}}
{{--                                            value="{{ $item->id }}" {{$item->ward_id == $item->id ? 'selected' : ''}} >{{ucwords($item->name)}}</option>--}}
{{--                                    @endforeach--}}
{{--                                    @if ($errors->has('ward_id'))--}}
{{--                                        <span class="text-danger">{{ $errors->first('ward_id') }}</span>--}}
{{--                                    @endif--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-8 col-sm-5 col-md-6">--}}
{{--                            <div class="input-group">--}}
{{--                                <div class="input-group-prepend">--}}
{{--                                    <button type="submit" class="btn btn-default">--}}
{{--                                        <i class="fa fa-search"></i>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                                <label for="search"></label><input type="search" id="search" name="search"--}}
{{--                                                                   value="{{ old('search', request()->get('search') != null ? request()->get('search') : '' ) }}"--}}
{{--                                                                   class="form-control form-control"--}}
{{--                                                                   placeholder="{{__('Search by Name')}}">--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-4 col-sm-3 col-md-2">--}}
{{--                            <a href="{{ route('people.index') }}" type="button" class="btn btn-danger"--}}
{{--                               style="width: 100%">--}}
{{--                                <i class="fas fa-sync-alt"></i>--}}
{{--                                {{__('Reset')}}--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
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
                                        <th>{{__('Title')}}</th>
                                        <th>{{__('Description')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contentData as $item)
                                            <tr>
                                                <td style="text-align: center;">
                                                    {{++ $loop->index}}
                                                </td>
                                                <td>{{ ucwords($item->title) }}</td>
                                                <td>{{ ucwords($item->description) }}</td>
                                                <td class="text-center">
                                                    <a href="{{route('smsTemplate.send', $item->slug)}}"
                                                       class="btn btn-success mb-2" style="color: white"><i
                                                            class="fas fa-paper-plane" style="color: green"></i>&nbsp; {{__('Send')}}</a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('smsTemplate.delete', $item->slug)}}"
                                                       class="btn btn-danger mb-2"><i class="fas fa-trash"></i>&nbsp; {{__('Delete')}}</a>
                                                </td>
                                            </tr>
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



    </script>
@endpush

