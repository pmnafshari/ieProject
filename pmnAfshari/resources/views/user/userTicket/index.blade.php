@extends('user.layout.master')
@section('links')
    <link rel="stylesheet" href="/admin/plugins/datatables/dataTables.bootstrap4.css">


@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="row p-2 m-0 ">
                    <div class="col-4 col-md-3 col-xl-2 my-2">
                        <button onclick="location.href='{{route('publicTicket')}}';" class="btn btn-sm py-3 my-2 text-wrap h-100 w-100 btn-info ">تیکت های عمومی</button>
                    </div>

                    <div class="col-4 col-md-3 col-xl-2 my-2">
                        <button onclick="location.href='{{route('clientTicketList')}}';" class="btn btn-sm py-3 my-2 text-wrap h-100 w-100 btn-info ">لیست تیکت های شخصی</button>
                    </div>
                    <div class="col-4 col-md-3 col-xl-2 my-2">
                        <button onclick="location.href='{{route('clientTicketCreate')}}';" class="btn btn-sm py-3 my-2 text-wrap h-100 w-100 btn-info ">ارسال تیکت خصوصی</button>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">لیست تیکت های شخصی</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="example1" class="table table-hover table-sm table-bordered table-striped small text-center">
                                <thead class=" ">
                                <tr>
                                    <th>ردیف</th>
                                    <th>عنوان تیکت</th>
                                    <th>تاریخ دریافت </th>
                                    <th>شروع کننده تیکت</th>
                                    <th>نمایش تیکتینگ</th>

                                </tr>
                                </thead>
                                <tbody class="">
                                @foreach($tickets as $ticket )
                                    <tr>
                                        <td></td>
                                        <td>{{$ticket->title}}</td>
                                        <td>{{jdate($ticket->created_at)->format('%d / %B / %Y')}}</td>
                                        <td>
                                            @if($ticket->createBy == 'admin')
                                                ادمین
                                            @else شما
                                                @endif
                                        </td>


                                        <td>
                                            <div class="d-flex flex-row justify-content-center ">
                                                <a href="{{route('clientTicketDetail',$ticket)}}" class="btn btn-dark btn-sm text-warning"><i class="fa fa-eye"></i> </a>
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
@endsection

@section('scripts')
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

        });
    </script>
@endsection
