@extends('admin.layout.master')
@section('links')
    <link rel="stylesheet" href="/admin/plugins/datatables/dataTables.bootstrap4.css">


@endsection
@section('content')

    <section class="content">

        <div class="row">
            <div class="col-12">

                <div class="row p-2 m-0 justify-content-start ">

                    <div class="col-4 col-md-3 col-xl-2 my-2">
                        <button onclick="location.href='{{route('branch.create')}}';" class="btn btn-sm py-3 my-2 text-wrap h-100 w-100 btn-info align-middle">ایجاد شاخه خدمت </button>
                    </div>

                    <div class="col-4 col-md-3 col-xl-2 my-2">
                        <button onclick="location.href='{{route('branch.index')}}';" class="btn btn-sm py-3 my-2 text-wrap h-100 w-100 btn-info align-middle">لیست شاخه‌ها</button>
                    </div>

                    <div class="col-4 col-md-3 col-xl-2 my-2">
                        <button onclick="location.href='{{route('service.create')}}';" class="btn btn-sm py-3 my-2 text-wrap h-100 w-100 btn-info align-middle">ایجاد خدمت</button>
                    </div>

                    <div class="col-4 col-md-3 col-xl-2 my-2">
                        <button onclick="location.href='{{route('service.index')}}';" class="btn btn-sm py-3 my-2 text-wrap h-100 w-100 btn-info align-middle">لیست خدمت‌ها</button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">لیست خدمت‌های شاخه‌ {{$branch->title}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">

                        <div class="row mb-4">

                            <div class="btn d-flex flex-column col-6 col-md-3 ">
                                <label  class="font-weight-light small">شاخه خدمت: </label>
                                <span class="  lead font-weight-bolder"  >{{$branch->title}}</span>
                            </div>

                            <div class="btn d-flex flex-column col-6 col-md-3 ">
                                <label  class="font-weight-light small">تاریخ ایجاد شاخه : </label>
                                <span class="  lead font-weight-bolder">{{jdate($branch->create_date)->format('%d / %B / %Y')}}</span>
                            </div>

                        </div>

                        <div class="table-responsive">
                            <table id="example1" class="table table-hover table-sm table-bordered table-striped small text-center">
                                <thead class=" ">
                                <tr>
                                    <th>ردیف</th>
                                    <th>عنوان خدمت</th>
                                    <th>ویرایش</th>

                                </tr>
                                </thead>
                                <tbody class="">


                                @foreach($branch->services as $service)
                                        <tr>
                                            <td >1</td>
                                            <td>{{$service->title}}</td>
                                            <td >
                                                <div class="d-flex flex-row justify-content-center ">
                                                    <a href="{{route('service.edit',$service)}}" class="btn btn-primary btn-sm mx-1" data-toggle="tooltip" data-placement="top" title="ویرایش"> <i class="fa fa-edit"></i></a>
{{--                                                    <form action="{{route('service.destroy',$service)}}" method="post">--}}
{{--                                                        @csrf--}}
{{--                                                        @method('DELETE')--}}
{{--                                                        <input type="submit" class="btn btn-danger btn-sm mx-1" data-toggle="tooltip" data-placement="top" title="حذف" value="حذف">--}}
{{--                                                    </form>--}}
                                                </div>
                                            </td>
                                        </tr>

                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>


            </div>
        </div>
    </section>


@section('scripts')

    <!-- DataTables -->
    <script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/admin/plugins/datatables/dataTables.bootstrap4.js"></script>

    <!-- page script -->
    <script>
        $(function () {
            //  for all table use this script start
            var table = $('#example1').DataTable( {
                "columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                } ],
                "order": [[ 1, 'asc' ]],

                "language": {
                    "paginate": {
                        "first": "First",
                        "last": "Last",
                        "next": "بعدی",
                        "previous": "قبلی"
                    },
                    "info": "نمایش _START_ تا _END_ از _TOTAL_ ردیف",
                    "infoEmpty": "نمایش 0 تا 0 از 0 ردیف",


                    "emptyTable":     "No data available in table",
                    "infoFiltered":   "(فیلتر شده از  _MAX_ ردیف)",
                    "zeroRecords":    "گزینه ای مطابق با جستجو یافت نشد",
                }

            } );

            table.on( 'order.dt search.dt', function () {
                table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();

            $(".dataTables_info").addClass("small p-0 m-0 text-left");
            $(".pagination").attr('dir','ltr');

            //  for all table use this script END

        });
    </script>

@endsection
@endsection
