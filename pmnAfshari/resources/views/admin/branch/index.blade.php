@extends('admin.layout.master')



@section('links')

    <link rel="stylesheet" href="/admin/plugins/datatables/dataTables.bootstrap4.css">

@endsection

@section('content')

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">

                    <div class="row p-2 m-0 ">
                        <a href="{{route('branch.create')}}" class="btn btn-info m-2 py-4 ">ایجاد شاخه جدید</a>
                        <a href="{{route('service.create')}}" class="btn btn-info m-2 py-4 ">ایجاد خدمت جدید</a>
                        <a href="{{route('service.index')}}" class="btn btn-info m-2 py-4 ">لیست خدمت ها</a>

                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">لیست شاخه ها</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body ">
                            <div class="table-responsive">
                                <table id="example1" class="table table-hover table-sm table-bordered table-striped small text-center">
                                    <thead class=" ">
                                    <tr>
                                        <th>ردیف</th>
                                        <th>نام شاخه</th>
                                        <th>تاریخ ایجاد</th>
                                        <th>آیکون</th>
                                        <th>نمایش خدمات</th>
                                        <th>ویرایش/حذف</th>

                                    </tr>
                                    </thead>
                                    <tbody class="">
                                    @foreach($branches as $branch)
                                    <tr>
                                        <td ></td>
                                        <td>{{$branch->title}}</td>
                                        <td>{{jdate($branch->create_date)->format('%d / %B / %Y')}}</td>
                                        <td> <img src="{{$branch->icon}}" class="shakhe-icon "></img> </td>
                                        <td>
                                            <a href="{{route('branch.services',$branch)}}" class="btn btn-dark btn-sm text-warning"><i class="fa fa-eye"></i> </a>
                                        </td>

                                        <td >
                                            <div class="d-flex flex-row justify-content-center ">
                                                <a href="{{route('branch.edit',$branch)}}" class="btn btn-primary btn-sm mx-1" data-toggle="tooltip" data-placement="top" title="ویرایش"> <i class="fa fa-edit"></i></a>

                                                <form action="{{route('branch.destroy',$branch)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-danger btn-sm mx-1" data-toggle="tooltip" data-placement="top" title="حذف" value="حذف">
                                                </form>
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
        <!-- /.content -->
@section('scripts')
    <!-- DataTables -->
    <script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/admin/plugins/datatables/dataTables.bootstrap4.js"></script>

    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "language": {
                    "paginate": {
                        "next": "بعدی",
                        "previous" : "قبلی"
                    }
                },
                "info" : false,
            });
            $('#example2').DataTable({
                "language": {
                    "paginate": {
                        "next": "بعدی",
                        "previous" : "قبلی"
                    }

                },
                "info" : false,
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "autoWidth": false
            });
        });
    </script>
@endsection


