@extends('admin.layout.master')
@section('links')
    <!--*******************************************-->
    <!-- For this page -->
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- fullCalendar css -->
    <link rel="stylesheet" href="/admin/plugins/FullCalandar/cupertino/jquery-ui.min.css">
    <link rel="stylesheet" href="/admin/plugins/FullCalandar/fullcalendar.min.css">

    <!-- select menu searchable -->
    <link rel="stylesheet" href="/admin/plugins/select2/select2.min.css">

    <!-- Persian Data Picker -->
    <link rel="stylesheet" href="/admin/dist/css/persian-datepicker.min.css">
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@latest/dist/css/persian-datepicker.min.css"/>



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
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-12 p-2">
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h6 class="">فیلتر کردن</h6>--}}
{{--                    </div>--}}
{{--                    <!-- /.card-header -->--}}
{{--                    <div class="card-body ">--}}
{{--                        <form action="" class="row">--}}

{{--                            <div class="form-group col-12 mx-auto col-md-7">--}}
{{--                                <label for="reportCategory">گزارش بر اساس</label>--}}
{{--                                <select class="select2" name="" id="reportCategory" >--}}
{{--                                    <option selected disabled class="text-muted">از اینجا انتخاب کنید</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}


{{--                            <div class="form-group col-md-6">--}}
{{--                                <label for="IDStartDate">از تاریخ</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <div class="input-group-prepend">--}}
{{--                                    <span class="input-group-text">--}}
{{--                                      <i class="fa fa-calendar"></i>--}}
{{--                                    </span>--}}
{{--                                    </div>--}}
{{--                                    <input class="normal-example form-control example1" name="startDate" id="IDStartDate"  >--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group col-md-6">--}}
{{--                                <label for="IDEndDate">تا تاریخ</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <div class="input-group-prepend">--}}
{{--                                    <span class="input-group-text">--}}
{{--                                      <i class="fa fa-calendar"></i>--}}
{{--                                    </span>--}}
{{--                                    </div>--}}
{{--                                    <input class="normal-example form-control example1" name="endDate" id="IDEndDate"  >--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-12 d-flex justify-content-center mt-5 mb-2">--}}
{{--                                <input type="submit" class="btn btn-success text-center mx-2" value="نمایش نمودار">--}}
{{--                                <input type="submit" class="btn btn-success text-center mx-2" value="خروجی اکسل">--}}

{{--                            </div>--}}


{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            <div class="col-12">



                <div class="row">

                    <div class="col-12 h-auto">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="">درآمد ماهیانه</h6>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <div class="chartBox">
                                    <canvas id="IncomeChart" class="control-chart-size"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 p-2 h-auto">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="">رزروهای ماهیانه</h6>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <div class="chartBox">
                                    <canvas id="bookingChart" class="control-chart-size"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 h-auto">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="">نسبت جنسیت مشتریان</h6>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <div class="chartBox">
                                    <canvas id="UsersChart" class="control-chart-size"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>






                </div>


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

    <!--CHARTjS-->
    <script src="/admin/dist/js/chartJS/chart.min.js"></script>
    <!-- select menu searchable -->
    <script src="/admin/plugins/select2/select2.full.min.js" ></script>

    <!-- Persian Data Picker -->
    <script src="https://unpkg.com/persian-date@latest/dist/persian-date.min.js"></script>
    <script src="https://unpkg.com/persian-datepicker@latest/dist/js/persian-datepicker.min.js"></script>


    <!-- page script -->
    <script>

        // persian datePicker
        $(document).ready(function() {
            $(".example1").pDatepicker({
                initialValueType: "gregorian",
                format: "YYYY/MM/DD",
                onSelect: "year",
            });
        });


        $(function () {
            $('.select2').select2()
        })
        @php
        $report=100;
        @endphp

        <!--    نمودار درآمد ماهیانه -->
        const IncomeChart = document.getElementById('IncomeChart');
        const IncomeChartFunc = new Chart(IncomeChart, {
            type: 'line',
            data: {
                labels: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد','شهریور', 'مهر' , 'آبان','آذر','دی','بهمن','اسفند'],
                datasets: [
                    {
                        label: 'درآمد ماه',
                        data: [{{\App\Models\Report::monthInvoice(1)}},
                            {{\App\Models\Report::monthInvoice(2)}},
                            {{\App\Models\Report::monthInvoice(3)}},
                            {{\App\Models\Report::monthInvoice(4)}},
                            {{\App\Models\Report::monthInvoice(5)}},
                            {{\App\Models\Report::monthInvoice(6)}},
                            {{\App\Models\Report::monthInvoice(7)}},
                            {{\App\Models\Report::monthInvoice(8)}},
                            {{\App\Models\Report::monthInvoice(9)}},
                            {{\App\Models\Report::monthInvoice(10)}},
                            {{\App\Models\Report::monthInvoice(11)}},
                            {{\App\Models\Report::monthInvoice(12)}}],
                        backgroundColor: [
                            'rgba(106,150,255,0.67)',

                        ],
                        borderColor: [
                            'rgb(0,0,0)',

                        ],
                        borderWidth: 1,
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
            }
        });
        <!--    نمودار درآمد ماهیانه /. -->


        <!--    نمودار رزرو ماهیانه -->
        const bookingChart = document.getElementById('bookingChart');
        const bookingChartFunc = new Chart(bookingChart, {
            type: 'bar',
            data: {
                labels: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد','شهریور', 'مهر' , 'آبان','آذر','دی','بهمن','اسفند'],
                datasets: [
                    {
                        label: 'تعداد رزرو ها',
                        data: [{{\App\Models\Report::monthReserve(1)}},
                            {{\App\Models\Report::monthReserve(2)}},
                            {{\App\Models\Report::monthReserve(3)}},
                            {{\App\Models\Report::monthReserve(4)}},
                            {{\App\Models\Report::monthReserve(5)}},
                                    {{\App\Models\Report::monthReserve(6)}},
                                    {{\App\Models\Report::monthReserve(7)}},
                                    {{\App\Models\Report::monthReserve(8)}},
                                    {{\App\Models\Report::monthReserve(9)}},
                                    {{\App\Models\Report::monthReserve(10)}},
                                    {{\App\Models\Report::monthReserve(11)}},
                                    {{\App\Models\Report::monthReserve(12)}}],
                        backgroundColor: [
                            'rgba(106,150,255,0.67)',

                        ],
                        borderColor: [
                            'rgb(0,0,0)',

                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
            }
        });
        <!--    نمودار رزرو ماهیانه /. -->

        <!--    نمودار جنسیت مشتریان -->
        const UsersChart = document.getElementById('UsersChart');
        const UsersChartFunc = new Chart(UsersChart, {
            type:'doughnut',
            data: {
                labels: ['مرد', 'زن' , 'نامشخص'],
                datasets: [
                    {
                        label: 'تعداد رزرو ها',
                        data: [{{\App\Models\Report::genderMan()}}, {{\App\Models\Report::genderWoman()}} ,{{\App\Models\Report::genderUnknown()}}],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(127, 127, 127)',

                        ],
                        borderColor: [
                            'rgb(255,252,252)',

                        ],
                        borderWidth: 1,
                        hoverOffset: 4,
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
            }
        });
        <!--     نمودار جنسیت مشتریان /. -->




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
