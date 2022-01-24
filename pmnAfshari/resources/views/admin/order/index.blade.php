@extends('admin.layout.master')
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
                        <h3 class="card-title">لیست سفارشات</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="example1"
                                   class="table table-hover table-sm table-bordered table-striped small text-center">
                                <thead class=" ">
                                <tr>
                                    <th>ردیف</th>
                                    <th>عنوان خدمات سفارش</th>
                                    <th>تاریخ سفارش</th>
                                    <th>ساعت سفارش</th>
                                    <th>ارائه دهنده</th>
                                    <th>مبلغ کل</th>
                                    <th>پیش پرداخت</th>
                                    <th>نام کاربر سفارش دهنده</th>
                                    <th>شماره تماس کاربر</th>
{{--                                    <th>مشاهده جزئیات</th>--}}
{{--                                    <th>وضعیت تأیید</th>--}}

                                </tr>
                                </thead>
                                <tbody class="">
                                @foreach($buying as $buy)

{{--                                    @dd(\App\Models\Order::getServices($buy->booking_id))--}}
                                <tr>
                                    <td>{{$buy->id}}</td>
                                    <td class="text-char-limit ">{{\App\Models\Order::Services($buy->booking_id)->title}}</td>

                                    <td>{{jdate(\App\Models\Order::Booked($buy->booking_id)->date) ->format('%d / %B / %Y')}}</td>
                                    <td><span>{{$buy->clock}}</span> الی <span>{{$buy->endClock}}</span></td>
                                    <td>{{\App\Models\Order::provider($buy->booking_id)->firstname}} {{\App\Models\Order::provider($buy->booking_id)->lastname}}</td>
                                    <td> <span>{{\App\Models\Order::Services($buy->booking_id)->price}}</span> تومان</td>
                                    <td><span>{{\App\Models\Order::Services($buy->booking_id)->prepayment}}</span>درصد : <span>{{\App\Models\Order::prepaymentService($buy->booking_id)}}</span> تومان</td>
                                    <td>{{\App\Models\Order::user($buy->booking_id)->firstname}} {{\App\Models\Order::user($buy->booking_id)->lastname}}</td>
                                    @if(\App\Models\Order::user($buy->booking_id)->mobile != null)
                                        <td>{{\App\Models\Order::user($buy->booking_id)->mobile}}</td>
                                    @else <td></td>
                                    @endif

{{--                                    <td>--}}
{{--                                        <!-- one of the bottom sections must show Due to the setting(نیاز به تایید - بدون نیاز به تایید)-->--}}
{{--                                        <!--for each div set class: d-none to dont display them -->--}}
{{--                                        <div class=" d- ">--}}
{{--                                            <div class="d-flex flex-row justify-content-center">--}}
{{--                                                <a href="" class="btn btn-success btn-sm mx-1" data-toggle="tooltip" data-placement="top"--}}
{{--                                                   title="تأیید"> <i class="fa fa-check-square"></i></a>--}}
{{--                                                <a href="" class="btn btn-danger btn-sm mx-1" data-toggle="tooltip" data-placement="top"--}}
{{--                                                   title="رد"> <i class="fa fa-times-rectangle"></i></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class=" d-none ">--}}
{{--                                            <div class="d-flex flex-row justify-content-center">--}}
{{--                                                <a href="" class="btn btn-success btn-sm mx-1" data-toggle="tooltip" data-placement="top"--}}
{{--                                                   title="تاییدشده"> تأییدشده <i class="fa fa-check-square-o"></i></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </td>--}}
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
@endsection

@section('scripts')
    <script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/admin/plugins/datatables/dataTables.bootstrap4.js"></script>

    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "language": {
                    "paginate": {
                        "next": "بعدی",
                        "previous": "قبلی"
                    }
                },
                "info": false,
            });
            $('#example2').DataTable({
                "language": {
                    "paginate": {
                        "next": "بعدی",
                        "previous": "قبلی"
                    }

                },
                "info": false,
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "autoWidth": false
            });
        });
    </script>

@endsection

