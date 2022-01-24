@extends('admin.layout.master')
@section('links')


    <!-- Persian Data Picker -->
    <link rel="stylesheet" href="/admin/dist/css/persian-datepicker.min.css">

    <!-- (MULTIPLE SELECT)   -->
    <link rel="stylesheet" href="/admin/plugins/multipleSelect/multiple-select.min.css">
    <link rel="stylesheet" href="/admin/plugins/multipleSelect/multipleSelect-bootstrap.css">


    <!-- select menu searchable -->
    <link rel="stylesheet" href="/admin/plugins/select2/select2.min.css">


@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">



                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">


                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">ویرایش ساعت کاری</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="row border rounded p-3 my-1" method="post" action="{{route('workTime.update',$workTime)}}" >
                                    @csrf
                                    @method('PATCH')
                                    <div class=" form-group col-6" id="startTimeContainer">
                                        <label for="IDStartTime">شروع ساعت کاری</label>
                                        <select  class="time select2 custom-select border-0 p-0 m-0 bg-transparent "  name="start" id="IDStartTime"
                                                 data-animate="fade" data-filter-placeholder="از اینجا جستجو کنید" data-filter="true" >

                                            <option value="{{$workTime->start}}"  selected >{{$workTime->start}}</option>

                                        </select>
                                    </div>

                                    <div class=" form-group col-6 ">
                                        <label for="IDEndTime">پایان ساعت کاری</label>
                                        <select  class="time select2 custom-select border-0 p-0 m-0 bg-transparent "  name="end" id="IDEndTime"
                                                 data-animate="fade" data-filter-placeholder="از اینجا جستجو کنید" data-filter="true" >
                                            <option value="{{$workTime->end}}"  selected >{{$workTime->end}}</option>

                                        </select>
                                    </div>
                                    <div class="text-right my-3 mb-2">
                                        <input type="submit" class="btn btn-success text-center mb-2" value="ویرایش ساعت کاری" aria-describedby="workingTimeSubmitHelp">

                                    </div>

                                </form>
                            </div>
                        </div>



                    </div>
                    <!-- /.card-body -->
                </div>


            </div>

        </div>
        <!--/.row-->

    </section>
@endsection

@section('scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
    <script src="https://unpkg.com/persian-date@latest/dist/persian-date.min.js"></script>
    <script src="https://unpkg.com/persian-datepicker@latest/dist/js/persian-datepicker.min.js"></script>



    <!--address RelatedSelect-->
    <script src="/admin/plugins/iranAddressJS/Iran-Address-JS.js"></script>

    <!--24HourClockValue-->
    <script src="/admin/plugins/24HourClockValue/24HourClockValue.js"></script>

    <!-- (MULTIPLE SELECT) -->
    <script src="/admin/plugins/multipleSelect/multiple-select.min.js"></script>

    <!-- select menu searchable -->
    <script src="/admin/plugins/select2/select2.full.min.js" ></script>

    <script>

        $(function () {
            $('.select2').select2()
        });



        $(document).ready(function() {
            $(".example1").pDatepicker({
                initialValueType: "gregorian",
                format: "YYYY/MM/DD",
                onSelect: "year"
            });
        });

        $('.multiple-select').multipleSelect({

            placeholder: "از اینجا انتخاب کنید ",
            formatSelectAll: function () {
                return 'انتخاب همه'
            },
            formatAllSelected: function () {
                return 'همه موارد انتخاب شده اند'
            },
            filterGroup: true,

        });

        // set text from multiple select selected items into BS4 MODAL TO SHOW selected items
        $('#getSelectsBtn').click(function () {
            document.getElementById("IDselectedServices").innerText ="خدمات انتخاب شده: \n"   + $('#IDKhadamatMashmool').multipleSelect('getSelects', 'text');
        })



        loadClock();


    </script>

@endsection

