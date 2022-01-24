@extends('admin.layout.master')
@section('links')
    <link rel="stylesheet" href="/admin/plugins/datatables/dataTables.bootstrap4.css">


@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="row p-2 m-0 ">
                    <a href="{{route('provider.create')}}" class="btn btn-info m-2 py-4 ">ایجاد ارائه دهنده</a>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">لیست ارائه دهندگان</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="example1" class="table table-hover table-sm table-bordered table-striped small text-center">
                                <thead class=" ">
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام </th>
                                    <th>شماره تماس</th>
                                    <th>کد ملی</th>
                                    <th>جنسیت</th>
                                    <th>تاریخ تولد</th>
                                    <th>خدمات</th>
                                    <th>تحصیلات</th>
                                    <th>وضعیت</th>
                                    <th>ویرایش</th>

                                </tr>
                                </thead>
                                <tbody class="">

                                @foreach($providers as $provider)
                                    <tr>
                                        <td>1</td>
                                        <td>{{$provider->firstname}} {{$provider->lastname}}</td>
                                        <td>{{$provider->mobile}}</td>
                                        <td>{{$provider->ncode}}</td>
                                        <td>{{$provider->gender}}</td>
                                        <td>{{jdate($provider->birthdate)->format('%d / %B / %Y')}}</td>

                                        <td> @foreach($provider->services as $service)
                                                {{ $service->title }} ,
                                            @endforeach
                                        </td>


                                        <td>{{$provider->degree}}</td>





                                        <td>
                                            <form action="{{route('provider.status.update',$provider)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <div class="d-flex flex-row justify-content-center ">

                                                    <button type="submit"
                                                            @if($provider->status=='فعال' )
                                                            class="btn btn-sm mx-1 btn-success focus"
                                                            @else
                                                            class="btn btn-sm mx-1"
                                                            @endif
                                                            data-toggle="tooltip" data-placement="top" name="status" value="فعال" title="فعال" > <i class="fa fa-bell"></i></button>




                                                    <button type="submit"
                                                            @if($provider->status=='غیرفعال')
                                                            class="btn  btn-sm mx-1 btn-dark focus"
                                                            @else
                                                            class="btn btn-sm mx-1"
                                                            @endif
                                                            data-toggle="tooltip" name="status" value="غیرفعال" data-placement="top" title="غیرفعال"> <i class="fa fa-bell-slash"></i></button>
                                                </div>
                                            </form>

                                        </td>









                                        <td >
                                            <div class="d-flex flex-row justify-content-center ">
                                                <a href="{{route('provider.edit',$provider)}}" class="btn btn-primary btn-sm mx-1" data-toggle="tooltip" data-placement="top" title="ویرایش"> <i class="fa fa-edit"></i></a>
{{--                                                <form action="{{route('provider.destroy',$provider)}}" method="post">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    <input type="submit" class="btn btn-danger btn-sm mx-1" data-toggle="tooltip" data-placement="top" title="حذف" value="حذف">--}}
{{--                                                </form>                                            </div>--}}
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
