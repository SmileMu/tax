@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@section('title')
    اضافة حساب جديد
@stop


@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الحسابات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة
                حساب</span>
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
                            {{--                        {{ route('accounts.index') }}--}}
                            {{--                        <a class="btn btn-primary btn-sm" href="">رجوع</a>--}}
                        </div>
                    </div><br>
                    <form class="form"
                          action="{{route('accounts.store')}}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        {{--                           <form class="parsley-style-1" autocomplete="off" name="selectForm2"--}}
                        {{--                    action=" {{route('accounts.store')}}" method="POST">--}}
                        {{--                               @csrf--}}
                        {{--                   --}}
                        <div class="">


                        </div>

                        <div class="row mg-b-20">
                            


                            <div class="form-group col-md-6">
                                <label for="">اسم البنك
                                </label>
                                <select name="bank_name" id="" class="form-control ">
                                    <optgroup label="من فضلك أختر اسم البنك ">
                                        @if($bank && $bank -> count() > 0)
                                            @foreach($bank as $banks)
                                                <option
                                                    {{--                                                                               --}}
                                                    value="{{$banks -> id }}">{{$banks -> bank_name }}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>

                                </select>
                                {{--                            @error('emp_id')--}}
                                {{--                            <span class="text-danger"> {{$message}}</span>--}}
                                {{--                            @enderror--}}

                            </div>


                            <div class="form-group col-md-6">
                                <label for="">اسم المؤسسه
                                </label>
                                <select name="institution" id="" class="form-control ">
                                    <optgroup label="من فضلك أختر اسم المؤسسه ">
                                        @if($institution && $institution -> count() > 0)
                                            @foreach($institution as $institutions)
                                                <option
                                                    {{--                                                                                --}}
                                                    value="{{$institutions -> id }}">{{$institutions -> inst_name }}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>

                                </select>
                                {{--                            @error('emp_id')--}}
                                {{--                            <span class="text-danger"> {{$message}}</span>--}}
                                {{--                            @enderror--}}

                            </div>


                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="">
                                <label> رقم الحساب </label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="account_number" required type="text">
                            </div>
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="">
                                <label> الرصيد الافتتاحي</label>
                                <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="balance" required type="text">
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
