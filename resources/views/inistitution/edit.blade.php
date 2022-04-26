@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@section('title')
    تعديل بيانات مؤسسه
@stop


@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> المؤسسات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل
                مؤسسه</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">


        <div class="col-lg-12 col-md-12">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>خطا</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            {{--                        {{ route('users.index') }}--}}
                            {{--                        <a class="btn btn-primary btn-sm" href="">رجوع</a>--}}
                        </div>
                    </div><br>
                    <form class="form"
                          action="{{route('institutions.update')}}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$institution -> id}}">
                        {{--                           <form class="parsley-style-1" autocomplete="off" name="selectForm2"--}}
                        {{--                    action=" {{route('types.store')}}" method="POST">--}}
                        {{--                               @csrf--}}
                        {{--                   --}}
                        <div class="">


                        </div>

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>اسم المؤسسه </label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="name" value="{{$institution -> inst_name}}" required type="text">
                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="">
                                <label> تاريخ التاسيس </label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="date" value="{{$institution -> found_year}}" required type="date">
                            </div>


                            <div class="form-group col-md-6">
                                <label for=""> نوع المؤسسه
                                </label>
                                <select name="type_name" id="" class="form-control ">
                                    <optgroup label="من فضلك أختر نوع المؤسسه ">
                                        @if($type && $type -> count() > 0)
                                            @foreach($type as $types)
                                                <option
                                                    {{--                                                                                {{ old('emp_id') == $job->id  }}--}}
                                                    value="{{$types -> id }}">{{$types -> type_name }}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>

                                </select>
                                {{--                            @error('emp_id')--}}
                                {{--                            <span class="text-danger"> {{$message}}</span>--}}
                                {{--                            @enderror--}}

                            </div>
                            <div class="form-group col-md-6">
                                <label for="emp_id"> قطاع المؤسسه
                                </label>
                                <select name="section_type" id="" class="form-control">
                                    <optgroup label="من فضلك أختر قطاع المؤسسه ">
                                        @if($section && $section -> count() > 0)
                                            @foreach($section as $sections)
                                                <option
                                                    {{--                                                                                {{ old('emp_id') == $job->id  }}--}}
                                                    value="{{$sections -> id }}">{{$sections -> section_type }}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>

                                </select>

                            </div>


                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="">
                                <label> الموقع </label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="location" value="{{$institution -> location}}" required type="text">
                            </div>
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="">
                                <label> التلفون </label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="phone" value="{{$institution -> phone_no}}" required type="text">
                            </div>
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="">
                                <label> البريد الالكتروني </label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="email" value="{{$institution -> email}}" required type="email">
                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="">
                                <label> كلمة المرور  </label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="password" value="{{$institution -> password}}" required type="password">
                            </div>

                        </div>



                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-main-primary pd-x-20" type="submit">تاكيد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- Container closed -->

    <!-- main-content closed -->
@endsection
@section('js')


    <!-- Internal Nice-select js-->
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

    <!--Internal  Parsley.min js -->
    <script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
@endsection