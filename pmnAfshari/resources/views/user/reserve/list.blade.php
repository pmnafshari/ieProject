@extends('user.layout.master')
@section('links')
    <link rel="stylesheet" href="/admin/plugins/datatables/dataTables.bootstrap4.css">


@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="row p-2 m-0 ">



                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">لیست سفارشات کاربر</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="example1"
                                   class="table table-hover table-sm table-bordered table-striped small text-center">
                                <thead class=" ">
                                <tr>
                                    <th>ردیف</th>
                                    <th>عنوان</th>
                                    <th>تاریخ</th>
                                    <th>ساعت</th>
                                    <th>قیمت</th>
                                    <th>تخفیف</th>
                                    <th>پیش پرداخت</th>
                                    <th>لغو سفارش</th>
                                    <th>ویرایش</th>
                                </tr>
                                </thead>
                                <tbody class="">
                                <tr>
                                    <td>1</td>
                                    <td class="text-char-limit "> رنگ مو </td>
                                    <td>1400/09/06</td>
                                    <td><span>4:30</span> الی <span>5:00</span></td>
                                    <td> <span>1,000,000</span> تومان</td>
                                    <td><span>15</span>درصد : <span>150,000</span> تومان</td>
                                    <td>
                                        <form action="{{route('discount.exists',$user)}}" method="post">
                                            @csrf
                                            <label for="IDStartTime"></label>
                                            <input type="text"  id="title" name="code" class="form-control col-9 col-md-12" aria-describedby="nameHelp" required placeholder="کد تخفیف یا کد آفر خود را وارد کنید">
                                            <input type="submit" class="btn btn-success text-center col-2 col-md-2 " value="ثبت ">

                                        </form>

                                    </td>
                                    <td>
                                        <a href="" class="btn btn-danger btn-sm mx-1" data-toggle="tooltip" data-placement="top"
                                           title="لغو سفارش-بدون عودت پیش پرداخت"> <i class="fa fa-times-rectangle"></i></a>
                                    </td>
                                    <td>
                                        <div class="">
                                            <div class="d-flex flex-row justify-content-center">
                                                <a href="" class="btn btn-primary btn-sm mx-1" data-toggle="tooltip" data-placement="top"
                                                   title="تأیید"> <i class="fa fa-edit"></i></a>
                                            </div>
                                        </div>
                                        <div class=" d-none ">
                                            <div class="d-flex flex-row justify-content-center">
                                                <a href="" class="btn btn-success btn-sm mx-1" data-toggle="tooltip" data-placement="top"
                                                   title="تاییدشده"> تأییدشده <i class="fa fa-check-square-o"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>


                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>


            </div>
        </div>
    </section>
@endsection

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
                    cell.innerText = i+1;
                } );
            } ).draw();

            $(".dataTables_info").addClass("small p-0 m-0 text-left");
            $(".pagination").attr('dir','ltr');

            //  for all table use this script END

        });  </script>

@endsection
