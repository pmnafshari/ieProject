@extends('user.layout.master')
@section('links')

    <link rel="stylesheet" href="/admin/plugins/datatables/dataTables.bootstrap4.css">

    <!-- select menu searchable -->
    <link rel="stylesheet" href="/admin/plugins/select2/select2.min.css">

@endsection
@section('content')


    <section class="content">
        <div class="row">
            <div class="col-12">

{{--                @foreach($booking as $booked)--}}
{{--                @foreach(\App\Models\Booking::createClock($booked) as $createClock)--}}
{{--                    @dd($createClock)--}}
{{--                    <option value="{{$createClock}}">{{$createClock}}--}}
{{--                        - {{\App\Models\Booking::endClock($booked,$createClock)}}</option>--}}
{{--                @endforeach--}}
{{--                @endforeach--}}


                <div class="row p-2 ">
                    <a href="{{route('booking.index')}}" class="btn py-4 btn-info m-2">ایجاد رزرو جدید</a>
                </div>

                <div class="card my-2">
                    <div class="card-header">
                        <h3 class="card-title">لیست خدمات سفارش</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">

                        <div class="row">
                            <div class="form-group col-12 col-md-4">
                                <label for="totallPrice">مبلغ کل</label>
                                <input type="text" class="form-control form-control-plaintext bg-transparent "
                                       id="totallPrice" readonly
                                       value="{{\App\Models\Booking::totalPrice($user)}} تومان">
                            </div>

                            <div class="form-group col-12 col-md-4">
                                <label for="prepayment">مبلغ پیش پرداخت</label>
                                <input type="text" class="form-control form-control-plaintext bg-transparent"
                                       id="prepayment" readonly
                                       value="{{\App\Models\Booking::totalPrepayment($user)}} تومان">
                            </div>

                            <form action="{{route('booking.preFactor',$user)}}" method="post">
                                @csrf
                                @method('GET')
                                <input type="submit" class="btn btn-success h-50 align-self-center no-shadow"
                                       value="پرداخت سبد خرید">
                            </form>


                            <div class="table-responsive my-2">
                                <table id="example1"
                                       class="table table-hover table-sm table-bordered table-striped small text-center">
                                    <thead class=" ">
                                    <tr>
                                        <th>ردیف</th>
                                        <th>ساعت</th>
                                        <th>عنوان</th>
                                        <th>مدت زمان</th>
                                        <th>قیمت</th>
                                        <th>پیش پرداخت</th>
                                        <th>تاریخ</th>
                                        <th>روز</th>
                                        <th>ارائه دهنده</th>
                                        {{--                                        <th>ویرایش</th>--}}
                                        <th>حذف</th>
                                    </tr>
                                    </thead>

                                    <tbody class="">

                                    @foreach($booking as $booked)

                                        {{--                                        @dd("08:00" < "08:15");--}}
                                        {{--                                        @foreach(\App\Models\Booking::createClock($booked) as $createClock)--}}
                                        {{--                                            <option value="{{$createClock}}">{{$createClock}} - {{\App\Models\Booking::endClock($booked,$createClock)}}</option>--}}
                                        {{--                                        @endforeach--}}
                                        {{--                                        @dd(1)--}}
                                        <tr>
                                            <td></td>


                                            <td>

                                                <form action="{{route('booking.setClock',$booked)}}" method="post">
                                                    @csrf
                                                    <label for="IDStartTime"></label>

                                                    <select
                                                        class=" select2 custom-select border-0 p-0 m-0 bg-transparent "
                                                        name="clock" id="IDStartTime"
                                                        data-animate="fade"
                                                        data-filter-placeholder="از اینجا جستجو کنید"
                                                        data-filter="true">
                                                        @if(App\Models\Buying::where('booking_id',$booked->id)->exists())

                                                            @foreach(\App\Models\Buying::where('booking_id',$booked->id)->get() as $cart)
                                                                <option value="" selected>
                                                                    {{$cart->clock}} - {{$cart->endClock}}
                                                                </option>
                                                            @endforeach

                                                        @else

                                                            @foreach(\App\Models\Booking::createClock($booked) as $createClock)
                                                                <option value="{{$createClock}}">{{$createClock}}
                                                                    - {{\App\Models\Booking::endClock($booked,$createClock)}}</option>
                                                            @endforeach

                                                        @endif
                                                    </select>


                                                    @if(! \App\Models\Buying::where('booking_id',$booked->id)->exists())
                                                        <div class="d-flex flex-row justify-content-center ">
                                                            <input type="submit" class="btn btn-info btn-sm mx-1"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="ثبت" value="ثبت ساعت">
                                                        </div>
                                                    @endif


                                                </form>

                                            </td>

                                            <td class="text-char-limit ">{{$booked->service->title}}</td>
                                            <td>{{$booked->service->servicetime}} دقیقه</td>

                                            <td>{{$booked->service->price}} تومان</td>

                                            <td><span>{{$booked->service->prepayment}}</span>درصد :
                                                <span>{{\App\Models\Service::perPaymentCalculate($booked->service)}}</span>
                                                تومان
                                            </td>

                                            <td>{{jdate($booked->date)->format('%d / %B / %Y')}}</td>

                                            <td>{{jdate($booked->date)->format('l')}}</td>

                                            <td>{{$booked->provider->firstname}} {{$booked->provider->lastname}}</td>

                                            <td>
                                                <div class="d-flex flex-row justify-content-center ">

                                                    <form action="{{route('booking.destroy',$booked)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" class="btn btn-danger btn-sm mx-1"
                                                               data-toggle="tooltip" data-placement="top" title="حذف"
                                                               value="حذف">
                                                    </form>
                                                </div>
                                            </td>


                                        </tr>

                                    @endforeach
                                    </tbody>


                                </table>
                            </div>

                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>


            </div>
        </div>
        @endsection

        @section('scripts')

            <script src="/admin//plugins/jquery/jquery.min.js"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
                $.widget.bridge('uibutton', $.ui.button)
            </script>
            <!-- Bootstrap 4 -->
            <script src="/admin//plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- Slimscroll -->
            <script src="/admin//plugins/slimScroll/jquery.slimscroll.min.js"></script>
            <!-- FastClick -->
            <script src="/admin//plugins/fastclick/fastclick.js"></script>
            <!-- AdminLTE App -->
            <script src="/admin//dist/js/adminlte.js"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="/admin//dist/js/pages/dashboard.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="/admin//dist/js/demo.js"></script>

            <!--********************************************************************************************************-->
            <!--for this page-->

            <!-- DataTables -->
            <script src="/admin//plugins/datatables/jquery.dataTables.js"></script>
            <script src="/admin//plugins/datatables/dataTables.bootstrap4.js"></script>


            <!-- select menu searchable -->
            <script src="/admin//plugins/select2/select2.full.min.js"></script>

            <!--24HourClockValue-->
            <script src="/admin//plugins/24HourClockValue/24HourClockValue.js"></script>

            <!-- page script -->
            <script>
                $(function () {
                    $('.select2').select2()
                });

                loadClock();


                $(function () {
                    //  for all table use this script start
                    var table = $('#example1').DataTable({
                        "columnDefs": [
                            {
                                "searchable": false,
                                "orderable": false,
                                "targets": 0,
                            },
                            {
                                "searchable": false,
                                "orderable": false,
                                "targets": 1,
                            }
                        ],
                        "order": [[2, 'asc']],

                        "language": {
                            "paginate": {
                                "first": "First",
                                "last": "Last",
                                "next": "بعدی",
                                "previous": "قبلی"
                            },
                            "info": "نمایش _START_ تا _END_ از _TOTAL_ ردیف",
                            "infoEmpty": "نمایش 0 تا 0 از 0 ردیف",


                            "emptyTable": "No data available in table",
                            "infoFiltered": "(فیلتر شده از  _MAX_ ردیف)",
                            "zeroRecords": "گزینه ای مطابق با جستجو یافت نشد",
                        }

                    });

                    table.on('order.dt search.dt', function () {
                        table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                            cell.innerText = i + 1;
                        });
                    }).draw();

                    $(".dataTables_info").addClass("small p-0 m-0 text-left");
                    $(".pagination").attr('dir', 'ltr');

                    //  for all table use this script END

                });

            </script>
@endsection
