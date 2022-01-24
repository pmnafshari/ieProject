@extends('admin.layout.master')
@section('links')
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

  <section class="content">
    <div class="row">
        <div class="col-12">

            <div class="row p-2 ">
                <a href="{{route('service.index')}}" class="btn py-4 btn-info m-2">لیست خدمت ها</a>
                <a href="{{route('branch.index')}}" class="btn py-4 btn-info m-2">لیست شاخه های خدمت</a>
                <a href="{{route('branch.create')}}" class="btn py-4 btn-info m-2">ایجاد شاخه خدمت جدید</a>

            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد خدمت جدید</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">

                    <form action="{{route('service.store')}}" method="post" enctype="multipart/form-data" class="row">
                        @csrf
                        <div class="row">
                            <div class="form-group  col-md-6">
                                <label for="IDOnvaneKhedmat">عنوان خدمت</label>
                                <input type="text" class="form-control" id="IDOnvaneKhedmat" name="title" aria-describedby="nameHelp" placeholder="نام خود را وارد کنید">
                                <small id="nameHelp" class="form-text text-muted"></small>
                            </div>

                            <div class="form-group col-md-6 ">
                                <label for="khadamatSelect">عنوان شاخه خدمت</label>
                                <select class=" select2 " name="branch_id" id="khadamatSelect " >
                                    <option selected disabled class="text-muted">از اینجا انتخاب کنید</option>
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}"> {{$branch->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6 ">
                                <label for="IDZamanHodoodiSelect">زمان حدودی(دقیقه)</label>
                                <select class=" select2 " name="servicetime" id="IDZamanHodoodiSelect" data-number-target="fa" >
                                    <option selected disabled class="text-muted">از اینجا انتخاب کنید</option>
                                    <option value="30">30</option>
                                    <option value="60">60</option>
                                    <option value="90">90</option>
                                    <option value="120">120</option>
                                </select>
                            </div>


                            <div class="form-group mb-3 col-md-6 ">
                                <label for="inputGroupFile">آپلود تصویر اصلی</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile02" name="file" multiple>
                                    <label class="custom-file-label " for="inputGroupFile">آپلود تصویر اصلی</label>
                                </div>

                            </div>



                            <div class="form-group col-md-6">
                                <label>هزینه (تومان)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="price" id="IDHazine">
                                    <div class="input-group-append">
                                        <div class="input-group-text" id="btnGroupAddon2">
                                            تومان
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6 ">
                                <label for="onvanShakheSelect">افراد ارائه دهنده</label>
                                <select class=" select2 " name="providers[]" id="IDOnvanAfradEraeDahande" data-placeholder="افراد را از اینجا انتخاب کنید" multiple>
                                    <option disabled class="text-muted">افراد از اینجا انتخاب کنید</option>
                                    @foreach(\App\Models\Provider::all() as $provider)
                                        <option value="{{ $provider->id }}">{{ $provider->firstname }} {{ $provider->lastname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>درصد پیش‌پرداخت</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="prepayment" id="IDdarsadPishpardakht" min="0" max="100">
                                    <div class="input-group-append">
                                        <div class="input-group-text" id="btnGroupAddon2">
                                            درصد
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>مدت زمان تمدید دوره(روز)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="period" id="IDModatTamdid" aria-describedby="tamdidHelp" >
                                    <div class="input-group-append">
                                        <div class="input-group-text" id="btnGroupAddon2">
                                            روز
                                        </div>
                                    </div>
                                </div>
                                <small id="tamdidHelp" class="form-text text-muted">برای آن دسته از خدماتی که  بعد از مدت‌زمان خاصی نیاز به چک‌کردن، تمدید،ترمیم و... دارند.</small>

                            </div>


                        </div>
                        <div class="d-flex justify-content-center mt-5 mb-2 text-center">
                            <input type="submit" class="btn btn-success text-center " value="ثبت خدمت جدید">
                        </div>



                    </form>

                </div>
                <!-- /.card-body -->
            </div>


        </div>
    </div>
    </section>

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




        $('#inputGroupFile02').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })


        $(document).ready(function() {
            $(".example1").pDatepicker({
                initialValueType: "gregorian",
                format: "YYYY/MM/DD",
                onSelect: "year"
            });
        });

        $(function () {
            $('.select2').select2()
            multiple:true
        })

        //for chek anabling
        $(function () {
            $("input[name='taahol']").click(function () {
                if ($("#IDMarriedRadio").is(":checked")) {
                    $("#IDTarikhEzdevaj").removeAttr("disabled");
                    $("#IDTarikhEzdevaj").focus();
                } else {
                    $("#IDTarikhEzdevaj").attr("disabled", "disabled");
                }
            });
        });

        $(function () {
            $("input[name='farzand']").click(function () {
                if ($("#IDFarzandYesRadio").is(":checked")) {
                    $("#IDtarikhTavallodFarzand1").removeAttr("disabled");
                    $("#IDtarikhTavallodFarzand1").focus();
                    $("#newFarzandBtn").removeAttr("disabled");

                } else {
                    $("#newFarzandBtn").attr("disabled", "disabled");
                    $("#IDtarikhTavallodFarzand1").attr("disabled", "disabled");
                }
            });
        });



        //for add new farzand
        document.getElementById("newFarzandBtn").onclick = function() {
            var container = document.getElementById("farzand-section");
            var section = document.getElementById("farzandTarikhInput");


            container.appendChild(section.cloneNode(true));


        }






    </script>
@endsection
