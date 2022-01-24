@extends('admin.layout.master')
@section('links')

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- fullCalendar css -->
    <link rel="stylesheet" href="/admin/plugins/FullCalandar/cupertino/jquery-ui.min.css">

    <link rel="stylesheet" href="/admin/plugins/FullCalandar/fullcalendar.min.css">

    <style>
        .fc-today {
            background: rgba(182, 255, 219, 0.5) !important;
            border: none !important;
            border-top: 1px solid #ddd !important;
            font-weight: bold;
        }
    </style>
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="row py-2"
                >

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{\App\Models\Buying::all()->count()}}</h3>
                                <p> تعداد رزرو ها </p>

                            </div>
                            <div class="icon">
                                <i class="fa  fa-shopping-cart"></i>

                            </div>
{{--                            <a href="#......" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>--}}
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>{{\App\Models\Dashboard::countTodayBook()}}</h3>
                                <p>رزرو های امروز <i class="fa fa-plus"></i></p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-shopping-bag"></i>
                            </div>
{{--                            <a href="#......" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>--}}
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>0<sup style="font-size: 20px">%</sup></h3>

                                <p>درصد افزایش فروش</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-bar-chart-o"></i>
                            </div>
{{--                            <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>--}}
                        </div>
                    </div>


                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{\App\Models\User::all()->count()-2}}</h3>
                                <p>تعداد کاربران</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-plus"></i>
                            </div>
{{--                            <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>--}}
                        </div>
                    </div>

                </div>

{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h3 class="card-title">لیست رزرو ها</h3>--}}
{{--                    </div>--}}
{{--                    <!-- /.card-header -->--}}
{{--                    <div class="card-body ">--}}

{{--                        <div id='calendar'></div>--}}


{{--                    </div>--}}
{{--                    <!-- /.card-body -->--}}
{{--                </div>--}}


            </div>
        </div>
    </section>
@endsection

@section('scripts')

    <!-- fullCalendar-->
    <script src="/admin/plugins/FullCalandar/moment.min.js"></script>
    <script src="/admin/plugins/FullCalandar/moment-jalaali.js"></script>

    <script src="/admin/plugins/FullCalandar/jquery.min.js"></script>
    <script src="/admin/plugins/FullCalandar/fullcalendar.min.js"></script>
    <script src="/admin/plugins/FullCalandar/lang/fa.js"></script>


    <!-- page script -->
    <script>

        $(document).ready(function() {

            $('#calendar').fullCalendar({
                defaultView: 'agendaDay',
                theme: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                isJalaali : true,
                isRTL : true,
                lang: 'fa',
                navLinks: true, // can click day/week names to navigate views
                eventLimit: true, // allow "more" link when too many events
                events: [
                    {
                        title: 'نوبت پر کردن دندان',
                        start: '2021-11-23T16:00:00'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2021-11-23T17:00:00'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2021-11-25T17:00:00'
                    },
                ]
            });
        });


    </script>
@endsection
