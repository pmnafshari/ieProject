@extends('admin.layout.master')



@section('links')
    <!-- For this page -->
    <!-- daterange picker -->
    <link rel="stylesheet" href="/admin/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="/admin/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Persian Data Picker -->
    <link rel="stylesheet" href="/admin/dist/css/persian-datepicker.min.css">

    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@latest/dist/css/persian-datepicker.min.css"/>


    <!-- DataTables for table features-->
    <link rel="stylesheet" href="/admin/plugins/datatables/dataTables.bootstrap4.css">


    <!-- select menu searchable -->
    <link rel="stylesheet" href="/admin/plugins/select2/select2.min.css">

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">

                    <div class="row p-2 ">
                        <a href="{{route('branch.index')}}" class="btn py-4 btn-info m-2">لیست شاخه‌های خدمت</a>
                        <a href="{{route('service.create')}}" class="btn btn-info m-2 py-4 ">ایجاد خدمت جدید</a>
                        <a href="{{route('service.index')}}" class="btn btn-info m-2 py-4 ">لیست خدمت ها</a>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ایجاد شاخه‌ی خدمت جدید</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body ">

                            <form action="{{route('branch.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group  col-md-6">
                                        <label for="IDInputName">عنوان شاخه خدمت</label>
                                        <input type="text" class="form-control" id="title" name="title" aria-describedby="nameHelp" required placeholder="عنوان شاخه خدمت را وارد کنید">
                                        <small id="nameHelp" class="form-text text-muted"></small>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label>تاریخ </label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="fa fa-calendar"></i>
                                    </span>
                                            </div>
                                            <input class="normal-example form-control example1" name="create_date" id="IDTarikhTavallod"  ></div>
                                        </div>
                                    </div>


                                    <div class=" mb-3 col-md-6 ">
                                        <label for="inputGroupFile02">بارگذاری آیکون</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file" name="file"/>
                                            <label class="custom-file-label " for="inputGroupFile02">آپلود فایل</label>
                                        </div>

                                    </div>



                                <div class="text-center mt-5 mb-2">
                                    <input type="submit" class="btn btn-success mx-auto mt-5 d-block" value="ثبت شاخه خدمت جدید">
                                </div>

                            </form>

                        </div>
                        @if(count($errors->all()) > 0 )
                            <ul class="bg-danger">
                                @foreach($errors->all() as $error)
                                    <li class="text-white">{{$error}}</li>
                                @endforeach
                            </ul>
                    @endif
                        <!-- /.card-body -->
                    </div>


                </div>
            </div>
        </section>
        <!-- /.content -->
    <!-- /.content-wrapper -->

@endsection

@section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Persian Data Picker -->
        <!-- Persian Data Picker -->
        <script src="/admin/dist/js/persian-date.min.js"></script>
        <script src="/admin/dist/js/persian-datepicker.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
        <script src="https://unpkg.com/persian-date@latest/dist/persian-date.min.js"></script>
        <script src="https://unpkg.com/persian-datepicker@latest/dist/js/persian-datepicker.min.js"></script>


        <!-- DataTables -->
        <script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
        <script src="/admin/plugins/datatables/dataTables.bootstrap4.js"></script>

        <!-- select menu searchable -->
        <script src="/admin/plugins/select2/select2.full.min.js"></script>


        <script>




            $('#file').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })


            $(document).ready(function() {
                $(".example1").pDatepicker({
                    // initialValueType: "gregorian",
                    format: 'YYYY-MM-DD',
                    // onSelect: "year",
                    onSelect: function (unix) {
                        to.touched = true;
                        if (from && from.options && from.options.maxDate != unix) {
                            var cachedValue = from.getState().selected.unixDate;
                            from.options = {maxDate: unix};
                            if (from.touched) {
                                from.setDate(cachedValue);
                            }
                        }
                    },
                    calendar:{
                        persian: {
                            locale: 'fa'
                        }
                    },
                    timePicker: {
                        enabled: true,
                        meridiem: {
                            enabled: true
                        }
                    },
                });
            });

            $(function () {
                $('.select2').select2()
            })




        </script>
 @endsection



