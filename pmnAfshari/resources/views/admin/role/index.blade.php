@extends('admin.layout.master')
@section('links')
    <link rel="stylesheet" href="/admin/plugins/datatables/dataTables.bootstrap4.css">


@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">لیست کاربران</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="example1" class="table table-hover table-sm table-bordered table-striped small text-center">
                                <thead class=" ">
                                <tr>
                                    <th>ردیف</th>
                                    <th>عنوان</th>
                                    <th>دسترسی ها</th>
                                    <th>ویرایش/حذف</th>

                                </tr>
                                </thead>
                                <tbody class="">
                                @foreach($roles as $role)
                                <tr>
                                    <td></td>
                                    <td>{{$role->title}}</td>
                                    <td>

                                        @foreach($role->permissions as $permission)
                                            {{$permission->label}},
                                        @endforeach
                                    </td>

                                    @if($role->title != 'admin'  And $role->title != 'user')
                                    <td >
                                        <div class="d-flex flex-row justify-content-center ">
                                            <a href="{{route('role.edit',$role)}}" class="btn btn-primary btn-sm mx-1" data-toggle="tooltip" data-placement="top" title="ویرایش"> <i class="fa fa-edit"></i></a>
                                            <form action="{{route('role.destroy',$role)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger btn-sm mx-1" data-toggle="tooltip" data-placement="top" title="حذف" value="حذف">
                                            </form>                                         </div>
                                    </td>

                                    @endif
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

        });
    </script>

@endsection

