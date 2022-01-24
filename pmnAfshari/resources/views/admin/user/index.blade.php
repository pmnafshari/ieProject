@extends('admin.layout.master')
@section('links')

    <link rel="stylesheet" href="/admin/plugins/datatables/dataTables.bootstrap4.css">

@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="row p-2 m-0 ">
                    <a href="{{route('user.create')}}" class="btn btn-info m-2 py-4 ">ایجاد کاربر جدید</a>
                    <a href="{{route('contract.index')}}" class="btn btn-info m-2 py-4 ">قراردهای کاربران</a>

                </div>

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
                                    <th>نام کاربر</th>
                                    <th>جنسیت</th>
                                    <th>شماره تماس</th>
                                    <th>تاریخ تولد</th>
                                    <th>وضعیت تأهل</th>
                                    <th>تحصیلات</th>
                                    <th>قراردادها</th>
                                    <th>ویرایش</th>

                                </tr>
                                </thead>
                                <tbody class="">
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->firstname}} {{$user->lastname}}</td>
                                    <td>{{$user->gender}}</td>
                                    <td>{{$user->mobile}}</td>
                                    @if($user->date_of_birth == null)
                                        <td></td>
                                    @else
                                        <td>{{jdate($user->date_of_birth)->format('%d / %B / %Y')}}</td>

                                    @endif

                                    <td>{{$user->marital_status}}</td>
                                    <td>{{$user->degree}}</td>
                                    <td>
                                        <a href="{{route('user.contract',$user)}}" class="btn btn-dark btn-sm text-warning"><i class="fa fa-eye"></i> </a>
                                    </td>
                                    <td >
                                        <div class="d-flex flex-row justify-content-center ">
                                            <a href="{{route('user.edit',$user)}}" class="btn btn-primary btn-sm mx-1" data-toggle="tooltip" data-placement="top" title="ویرایش"> <i class="fa fa-edit"></i></a>


{{--                                            <form action="{{route('user.destroy',$user)}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <input type="submit" class="btn btn-danger btn-sm mx-1" data-toggle="tooltip" data-placement="top" title="حذف" value="حذف">--}}
{{--                                            </form>          --}}

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

