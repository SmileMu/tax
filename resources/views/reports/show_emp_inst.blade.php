@extends('layouts.master')
@section('css')

@section('title')
    جميع الموظفين
@stop

<!-- Internal Data table css -->

<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection
@section('page-header')
    <!-- breadcrumb -->

    <div class="container bg-white" >
       <div class="row" >
             <div class="col-lg-4"> 
             <img src="{{ URL::asset('assets/img/brand/tax1.jfif') }}" class="rounded" alt="Cinque Terre">
             </div>
            <div class="col-lg-4">
             <h1 class="content-title mb-0 my-auto">ضريبة الدخل الشخصي </h1> 
               
            </p>
            </div>
            <div class="col-lg-4">
            <img src="{{ URL::asset('assets/img/brand/tax1.jfif') }}"bg-white alt="Cinque Terre"> </div>
      </div>
   </div>
    <div class="breadcrumb-header justify-content-between">

    
        
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="col-sm-1 col-md-2">
                       
                        <a   {{$i=0}}> </a>
                        {{-- @endcan --}}
                    </div>
                </div>
                <div class="card-body">
                <div class="my-auto">
            <div class="d-flex ">
                <h5 class="content-title mb-0 my-auto text-center">تقرير عن موظفين مؤسسة الشروق </h5>
            </div>
        </div><br>
                    <div class="table-responsive hoverable-table">
                        <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                            <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">  اسم الموظف </th>
                                <th class="wd-20p border-bottom-0">تاريخ التعيين</th>
                                <th class="wd-20p border-bottom-0">اسم المؤسسه</th>
                                <th class="wd-20p border-bottom-0">العمر</th>
                                <th class="wd-20p border-bottom-0">المرتب </th>
                                <th class="wd-20p border-bottom-0">قيمة الضريبة </th>
                                <th class="wd-20p border-bottom-0">الايميل </th>
                                <th class="wd-20p border-bottom-0">  </th>
                                <th class="wd-20p border-bottom-0"> </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($employee as $employees)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $employees->emp_name }}</td>
                                    <td>{{ $employees->appation_date }}</td>
                                    <td>{{$employees-> institution ? $employees -> institution -> inst_name : 'بدون' }}</td>


                        
                                    <td>{{ $employees->age }}</td>
                                    <td>{{ $employees->primary_sal }}</td>
                                    <td>{{ $employees->tax_value }}</td>
                                    <td>{{ $employees->email }}</td>
                                   
                                   
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

        <!-- Modal effects -->



        <!-- /row -->
    </div>
    <!-- Container closed -->

    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

    <script>
        $('#modaldemo8').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var user_id = button.data('user_id')
            var username = button.data('username')
            var modal = $(this)
            modal.find('.modal-body #user_id').val(user_id);
            modal.find('.modal-body #username').val(username);
        })

    </script>


@endsection
