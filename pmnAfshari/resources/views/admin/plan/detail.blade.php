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
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="example1" class="table table-hover table-sm table-bordered table-striped small text-center">
                                <thead class=" ">
                                <tr>
                                    <th>ردیف</th>
                                    <th>ساعت شروع کاری</th>
                                    <th>ساعت پایان کاری</th>
                                    <th>ساعت شروع تعطیلی بین ساعت کاری</th>
                                    <th>ساعت پایان تعطیلی بین ساعت کاری</th>
                                    <th>تنظیم ساعت تعطیلی</th>
                                    <th>ویرایش ساعت کاری</th>
                                    <th>ویرایش/حذف ساعت تعطیلی</th>


                                    {{--                                    <th>ویرایش ساعت کاری</th>--}}

                                </tr>

                                </thead>
                                <tbody>
{{--                                @php--}}
{{--                                foreach(\App\Models\WorkTime::all() as $workTime){--}}
{{--                                        $workTime=$workTime->start;--}}
{{--                                        $workTime=$workTime->append();--}}

{{--                                        dd($workTime);--}}

{{--                                    }--}}

{{--                                @endphp--}}

                                @foreach($workTimes as $workTime)

                                    <tr>
                                        <td >1</td>
                                        <td>{{$workTime->start}}</td>
                                        <td>{{$workTime->end}}</td>

                                        @if($offTimes->count() != 0)
                                        @foreach(\App\Models\OffTime::all() as $offTime){
                                        <td>{{$offTime->start}}</td>
                                        <td>{{$offTime->end}}</td>
                                        @endforeach

                                        @elseif($offTimes->count() == 0)
                                            <td></td>
                                            <td></td>
                                        @endif

                                        <td>
                                            <a href="{{route('offTimeSet',$workTime)}}"  class="btn btn-primary btn-sm @if($offTimes->count() != 0) disabled @endif "><i class="fa fa-power-off "></i> </a>
                                        </td>

                                        <td>
                                            <a href="{{route('workTime.edit',$workTime)}}"  class="btn btn-primary btn-sm " > <i class="fa fa-edit"></i></a>
                                        </td>

                                        <td >

                                            <div class="d-flex flex-row justify-content-center ">
                                                <a href="{{route('offTime.edit',$workTime)}}" class="btn btn-primary btn-sm  @if($offTimes->count() == 0) disabled @endif" > <i class="fa fa-edit"></i></a>

                                                <form action="{{route('offTime.destroy')}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-danger btn-sm  @if($offTimes->count() == 0) disabled @endif" value="حذف">
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

@section('scripts')

    <script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/admin/plugins/datatables/dataTables.bootstrap4.js"></script>

@endsection


