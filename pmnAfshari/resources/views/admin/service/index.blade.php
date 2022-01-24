@extends('admin.layout.master')



@section('links')
    <link rel="stylesheet" href="/admin/plugins/datatables/dataTables.bootstrap4.css">


@endsection

@section('content')


    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="row p-2 m-0 ">
                    <a href="{{route('branch.create')}}" class="btn btn-info m-2 py-4 ">ایجاد شاخه خدمت جدید</a>
                    <a href="{{route('branch.index')}}" class="btn btn-info m-2 py-4 ">لیست شاخه‌های خدمت</a>
                    <a href="{{route('service.create')}}" class="btn btn-info m-2 py-4 ">ایجاد خدمت جدید</a>


                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">لیست خدمت‌ ها</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="example1" class="table table-hover table-sm table-bordered table-striped small text-center">
                                <thead class=" ">
                                <tr>
                                    <th>ردیف</th>
                                    <th>عنوان خدمت</th>
                                    <th>گالری</th>

                                    <th>عنوان شاخه </th>
                                    <th>زمان مصرفی(دقیقه)</th>
                                    <th>هزینه(تومان)</th>
                                    <th>پیش پرداخت</th>
                                    <th>مبلغ پیش پرداخت</th>
                                    <th>زمان تمدید(روز)</th>
                                    <th>افراد ارائه‌دهنده</th>
                                    <th>وضعیت</th>
                                    <th>ویرایش</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($services as $service)

                                <tr>
                                    <td >{{$service->id}}</td>
                                    <td>{{$service->title}}</td>
                                    <td>
                                        <a href="{{route('picture.index',$service )}}" class="btn btn-dark btn-sm "><i class="fa fa-picture-o "></i> </a>
                                    </td>
                                    <td>{{$service->branch->title}}</td>
                                    <td><span >{{$service->servicetime}}</span> دقیقه</td>
                                    <td><span >{{$service->price}}</span> تومان</td>
                                    <td><span >{{$service->prepayment}}</span> درصد </td>
                                    <td><span >{{\App\Models\Service::perPaymentCalculate($service)}}</span> تومان </td>
                                    <td><span >{{$service->period}}</span> </td>



                                    <td>

                                        <span>
                                        @foreach($service->providers as $provider)
                                            {{ $provider->firstname }} {{ $provider->lastname }} ,
                                        @endforeach
                                          </span>
                                    </td>



                                    <td>
                                        <form action="{{route('service.status.update',$service)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="d-flex flex-row justify-content-center ">

                                                <button type="submit"
                                                        @if($service->status=='فعال' )
                                                        class="btn btn-sm mx-1 btn-success focus"
                                                        @else
                                                        class="btn btn-sm mx-1"
                                                        @endif
                                                        data-toggle="tooltip" data-placement="top" name="status" value="فعال" title="فعال" > <i class="fa fa-bell"></i></button>




                                                <button type="submit"
                                                        @if($service->status=='غیرفعال')
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
                                            <a href="{{route('service.edit',$service)}}" class="btn btn-primary btn-sm mx-1" data-toggle="tooltip" data-placement="top" title="ویرایش"> <i class="fa fa-edit"></i></a>
{{--                                            <form action="{{route('service.destroy',$service)}}" method="post">--}}
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


@endsection
