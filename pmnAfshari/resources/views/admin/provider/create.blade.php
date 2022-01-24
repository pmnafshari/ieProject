@extends('admin.layout.master')
@section('links')
    <!-- For this page -->
    <!-- Persian Data Picker -->
    <link rel="stylesheet" href="/admin/dist/css/persian-datepicker.min.css">
    <!-- (MULTIPLE SELECT)   -->
    <link rel="stylesheet" href="/admin/plugins/multipleSelect/multiple-select.min.css">
    <link rel="stylesheet" href="/admin/plugins/multipleSelect/multipleSelect-bootstrap.css">

@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="row p-2 ">
                    <a href="{{route('provider.index')}}" class="btn py-4 btn-info m-2">لیست ارائه دهندگان</a>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ایجاد ارائه دهنده جدید</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">

                        <form action="{{route('provider.store')}}" method="post" enctype="multipart/form-data" class="row">
                            @csrf

                            <div class="row">
                                <div class="form-group  col-md-6">
                                    <label for="IDInputName">نام</label>
                                    <input type="text" class="form-control" id="IDInputName" name="firstname" aria-describedby="nameHelp" placeholder="نام خود را وارد کنید">
                                    <small id="nameHelp" class="form-text text-muted"></small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="IDInputLastname">نام خانوادگی</label>
                                    <input type="text" class="form-control" id="IDInputLastname" name="lastname" aria-describedby="lastnameHelp" placeholder="نام خانوادگی خود را وارد کنید">
                                    <small id="lastnameHelp" class="form-text text-muted"></small>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="IDTelNumber">شماره تلفن همراه</label>
                                    <input type="number" class="form-control" id="IDTelNumber" name="mobile" aria-describedby="telHelp" >
                                    <small id="telHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="IDEmail">ایمیل</label>
                                    <input type="email" class="form-control" id="IDEmail" name="email" aria-describedby="emailHelp" placeholder="ایمیل خود را وارد کنید">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="IDKodeMelli">کد ملی</label>
                                    <input type="number" class="form-control" id="IDKodeMelli" name="ncode" aria-describedby="melliCodeHelp" placeholder="کد ملی خود را وارد کنید">
                                    <small id="melliCodeHelp" class="form-text text-muted"></small>
                                </div>


                                <fieldset class="form-group col-md-6">
                                    <div class="">
                                        <legend class="form-check-label col-form-label px-2 pt-0 font-weight-bold">جنسیت</legend>
                                        <div class="col-sm-12">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="IDMaleRadio" value="مرد" >
                                                <label class="form-check-label px-2" for="IDMaleRadio">
                                                    مذکر
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="IDFemaleRadio" value="زن">
                                                <label class="form-check-label px-2" for="IDFemaleRadio">
                                                    مونث
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>



                                <div class="form-group col-md-6">
                                    <label for="IDTarikhTavallod">تاریخ تولد</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  <i class="fa fa-calendar"></i>
                                                </span>
                                        </div>
                                        <input class="normal-example form-control example1" name="birthdate" id="IDTarikhTavallod"  >
                                    </div>
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label for="IDInputName">تحصیلات</label>
                                    <select class=" select2 " name="degree" id="tahsilatSelect" >
                                        <option selected disabled class="text-muted">از اینجا انتخاب کنید</option>
                                        <option value="زیر دیپلم">زیر دیپلم</option>
                                        <option value="دیپلم">دیپلم</option>
                                        <option value="کاردانی">کاردانی</option>
                                        <option value="کارشناسی">کارشناسی</option>
                                        <option value="کارشناسی ارشد">کارشناسی ارشد</option>
                                        <option value="دکتری">دکتری</option>
                                        <option value="فوق دکتری">فوق دکتری</option>
                                    </select>
                                </div>


                                <div class="form-group col-12 ">
                                    <label for="IDKhadamatMashmool" class="  px-2 pt-0 font-weight-bold row">
                                        خدمات ارائه دهنده
                                    </label>

                                    <select class="multiple-select custom-select border-0 p-0 m-0 bg-transparent " name="services[]"  multiple
                                            id="IDKhadamatMashmool" data-select-all="true" data-minimum-count-selected="50" data-filter="true"
                                            data-multiple-width="80" data-display-delimiter= " | "  data-filter-placeholder="از اینجا جستجو کنید"
                                            data-group="false" data-animate="fade">
                                        @foreach($branches as $branch)
                                            <optgroup value="{{ $branch->id }}"label="{{$branch->title}}">
                                                @foreach($branch->services as $service)

                                                    <option value="{{ $service->id }}"> {{ $service->title }} </option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>

                                    <button type="button" id="getSelectsBtn" class="btn btn-sm btn-secondary small my-2 " data-toggle="modal" data-target="#exampleModalCenter">نمایش انتخاب شده ها </button>
                                </div>

                                <div class="">

                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header mx-auto">
                                                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h5 class="modal-title " id="exampleModalLongTitle">خدمات انتخاب شده</h5>

                                                </div>

                                                <div class="modal-body">
                                                    <p class="text-right text-justify" id="IDselectedServices">444</p>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body ">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">تعیین ساعت کاری</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body row border rounded " style="margin: 10px">
                                            <div class=" form-group col-6" id="startTimeContainer">
                                                <label for="IDStartTime">شروع ساعت کاری</label>
                                                <select  class=" select2 custom-select border-1 p-2 m-0 bg-transparent border"  name="start" id="IDStartTime"
                                                         data-animate="fade" data-filter-placeholder="از اینجا جستجو کنید" data-filter="true" >
                                                    @foreach(\App\Models\Provider::providerClocks() as $providerClock)
                                                        <option value="{{$providerClock}}">{{$providerClock}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class=" form-group col-6  ">
                                                <label for="IDEndTime">پایان ساعت کاری</label>
                                                <select  class=" select2 custom-select border-1 p-2 m-0 bg-transparent "  name="end" id="IDEndTime"
                                                         data-animate="fade" data-filter-placeholder="از اینجا جستجو کنید" data-filter="true" >
                                                    @foreach(\App\Models\Provider::providerClocks() as $providerClock)
                                                        <option value="{{$providerClock}}"   selected>{{$providerClock}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div></div>


                                <div class="form-group col-md-6 w-100 ">
                                    <label for="exampleFormControlTextarea1">آدرس</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address" ></textarea>
                                </div>

                            </div>

                            <div class="text-center mt-5 mb-2">
                                <input type="submit" class="btn btn-success text-center " value="ثبت ارائه دهنده جدید">
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
    <!--for this page-->
    <!-- Persian Data Picker -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
    <script src="https://unpkg.com/persian-date@latest/dist/persian-date.min.js"></script>
    <script src="https://unpkg.com/persian-datepicker@latest/dist/js/persian-datepicker.min.js"></script>
    <!-- (MULTIPLE SELECT) -->
    <script src="/admin/plugins/multipleSelect/multiple-select.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".example1").pDatepicker({
                // initialValueType: "gregorian",
                format: 'YYYY-MM-DD',
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


    </script>
@endsection
