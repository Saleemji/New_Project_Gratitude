@extends('layouts.main')

@section('meta')
    @include('layouts.meta')
@endsection

@section('title')
    QUESTION PAGE
@endsection

@section('head')
    @include('layouts.head')

@endsection

@section('theme')
    @include('layouts.theme')
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')


    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row" style="margin-left: 246px;
    margin-top: 50px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <div style="float: right;">
                                <div class="btn-group btn-group-example mb-3" role="group">
                                    <a class="btn btn-success w-xs" data-bs-toggle="modal" data-bs-target="#addModal"><i class="mdi mdi-plus"></i></a>
                                    <a class="btn btn-primary w-xs" data-bs-toggle="modal" data-bs-target="#searchModal" ><i class="mdi mdi-filter"></i></a>
                                </div>
                            </div>


                            <table id="list" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="th-sm">Category
                                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                    </th>
                                    <th class="th-sm">Question
                                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                    </th>
                                    <th class="th-sm">Option One
                                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                    </th>
                                    <th class="th-sm">Option Two
                                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                    </th>
                                    <th class="th-sm">Option Three
                                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                    </th>
                                    <th class="th-sm">Option Four
                                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                    </th>
                                    <th class="th-sm">Correct Answer
                                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                    </th>
                                    <th class="th-sm">Action
                                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>

                            </table>

                        </div>


                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>



@endsection

{{--@section('delete')--}}
{{--    @include('delete')--}}
{{--@endsection--}}

@section('delete')
    @include('question.delete')
@endsection


@section('create')
    @include('question.create')
@endsection

@section('search')
    @include('question.search')
@endsection

@section('footer')
    @include('layouts.footer')
@endsection

@section('script')
    @include('layouts.script')
    @include('question.ajax')
@endsection


