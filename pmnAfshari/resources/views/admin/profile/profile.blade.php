@extends('admin.layout.master')

@section('links')
    <!--*******************************************-->
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

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">پروفایل کاربری</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
{{--                        @dd(\App\Models\User::query()->where('id',\Illuminate\Support\Facades\Auth::id())->get('id'))--}}
{{--@dd($user->id)--}}
                        <form action="{{route('user.update',$user)}}" method="post" enctype="multipart/form-data" class="row">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="form-group  col-md-6">
                                    <label for="IDInputName">نام</label>
                                    <input type="text" class="form-control" id="IDInputName" value="{{$user->firstname}}" name="firstname" aria-describedby="nameHelp" placeholder="نام خود را وارد کنید">
                                    <small id="nameHelp" class="form-text text-muted"></small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="IDInputLastname">نام خانوادگی</label>
                                    <input type="text" class="form-control" id="IDInputLastname" value="{{$user->lastname}}" name="lastname" aria-describedby="lastnameHelp" placeholder="نام خانوادگی خود را وارد کنید">
                                    <small id="lastnameHelp" class="form-text text-muted"></small>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="IDTelNumber">شماره تلفن همراه</label>
                                    <input type="number" class="form-control" id="IDTelNumber" value="{{$user->mobile}}" name="mobile" aria-describedby="telHelp" >
                                    <small id="telHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="IDEmail">ایمیل</label>
                                    <input type="email" class="form-control" id="IDEmail" value="{{$user->email}}" name="email" aria-describedby="emailHelp" placeholder="ایمیل خود را وارد کنید">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="IDKodeMelli">کد ملی</label>
                                    <input type="number" class="form-control" id="IDKodeMelli" value="{{$user->ncode}}" name="ncode" aria-describedby="emailHelp" placeholder="کد ملی خود را وارد کنید">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>


                                <fieldset class="form-group col-md-6">
                                    <div class="">
                                        <legend class="form-check-label col-form-label px-2 pt-0 font-weight-bold">جنسیت</legend>
                                        <div class="col-sm-12">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="IDMaleRadio" value="مرد"
                                                       @if($user->gender == 'مرد')
                                                       checked
                                                    @endif>
                                                <label class="form-check-label px-2" for="IDMaleRadio">
                                                    مذکر
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="IDFemaleRadio" value="زن"
                                                       @if($user->gender == 'زن')
                                                       checked
                                                    @endif>

                                                <label class="form-check-label px-2" for="IDFemaleRadio">
                                                    مونث
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="form-group col-md-6">
                                    <label>تاریخ تولد</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="fa fa-calendar"></i>
                                    </span>
                                        </div>
                                        <input class="normal-example form-control example1"

                                        @if($user->date_of_birth == null)
                                            value="{{null}}"
                                        @else
                                               value="
                                        {{($user->date_of_birth)}}"
                                        @endif
                                               name="date_of_birth" id="IDTarikhTavallod"  >
                                    </div>
                                </div>




                                <div class="form-group-inline col-md-6 mb-3" >
                                    <div class="form-group" id="farzand-section">
                                        <label class="form-check-label col-form-label px-2 pt-0 font-weight-bold row">
                                            <div class="col-12 col-md-3  "> فرزند </div>
                                            <div class="col-12 col-md-9  ">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="child_status"  id="IDFarzandYesRadio" value="بله"
                                                           @if($user->child_status == 'بله')
                                                           checked
                                                        @endif
                                                    >
                                                    <label class="form-check-label px-2" for="IDFarzandYesRadio">
                                                        دارم
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="child_status" id="IDFarzandNoRadio" value="خیر"
                                                           @if($user->child_status == 'خیر')
                                                           checked
                                                        @endif
                                                    >
                                                    <label class="form-check-label px-2" for="IDFarzandNoRadio">
                                                        ندارم
                                                    </label>
                                                </div>
                                            </div>
                                        </label>

                                        <div class="form-group">
                                            <h6>تاریخ تولد فرزندان</h6>
                                            <hr>
                                            <div id="child-dates_section">

                                            </div>


                                            @foreach($user->children as $child)

                                                <div class="row" id="row-${key}">

                                                    <div class="col-10">
                                                        <div class="form-group">
                                                            <label>تاریخ تولد</label>
                                                            <input class="form-control example1" id="${key}" value="{{jdate($child->date)->format('%d / %B / %Y')}}" >
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <label >اقدامات</label>

                                                        <div>

                                                            <button type="button" class="btn btn-sm btn-warning" onclick="document.getElementById('row-${key}').remove()" >حذف</button>

                                                        </div>


                                                    </div>
                                                </div>

                                            @endforeach

                                            <button class="btn btn-sm btn-danger" type="button" id="add-child-dates">ثبت تاریخ جدید</button>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group-inline col-md-6">
                                    <div class="form-group">
                                        <label class="form-check-label col-form-label px-2 pt-0 font-weight-bold row">
                                            <div class="col-12 col-md-3  "> وضعیت تأهل </div>
                                            <div class="col-12 col-md-9  ">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="marital_status"  id="IDMarriedRadio" value="متاهل"
                                                           @if($user->marital_status == 'متاهل')
                                                           checked
                                                        @endif
                                                    >
                                                    <label class="form-check-label px-2" for="IDMarriedRadio">
                                                        متأهل
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="marital_status" id="IDSingleRadio" value="مجرد"
                                                           @if($user->marital_status == 'مجرد')
                                                           checked
                                                        @endif
                                                    >
                                                    <label class="form-check-label px-2" for="IDSingleRadio">
                                                        مجرد
                                                    </label>
                                                </div>
                                            </div>
                                        </label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="fa fa-calendar mx-1"></i>
                                      تاریخ ازدواج
                                    </span>
                                            </div>
                                            <input class="normal-example form-control example1" value="{{$user->marriage_date}}" name="marriage_date" id="IDTarikhEzdevaj" disabled readonly >

                                        </div>
                                        <small id="emailHelp" class="form-text text-muted"></small>

                                    </div>
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label for="IDInputName">تحصیلات</label>
                                    <select class=" select2 " name="degree" id="tahsilatSelect" >
                                        <option selected disabled class="text-muted">از اینجا انتخاب کنید</option>
                                        <option value="زیر دیپلم" @if($user->degree == 'زیر دیپلم')selected @endif> زیر دیپلم</option>
                                        <option value="دیپلم" @if($user->degree == 'دیپلم')selected @endif > دیپلم</option>
                                        <option value="کاردانی" @if($user->degree == 'کاردانی') selected @endif>کاردانی</option>
                                        <option value="کارشناسی" @if($user->degree == 'کارشناسی') selected @endif>کارشناسی</option>
                                        <option value="کارشناسی ارشد" @if($user->degree == 'کارشناسی ارشد') selected @endif>کارشناسی ارشد</option>
                                        <option value="دکتری" @if($user->degree == 'دکتری') selected @endif>دکتری</option>
                                        <option value="فوق دکتری" @if($user->degree == 'فوق دکتری') selected @endif>فوق دکتری</option>
                                    </select>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="addressTextArea">آدرس</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1"  name="address" rows="3" style=" min-height: 80px;" >{{$user->address}}</textarea>
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label for="role_id">عنوان نقش</label>
                                    <select class=" select2 " name="role_id" id="role_id " >
                                        <option selected disabled class="text-muted">از اینجا انتخاب کنید</option>
                                        @foreach(\App\Models\Role::all() as $role)
                                            <option
                                                @if($role->id == $user->role_id)
                                                selected
                                                @endif

                                                value="{{$role->id}}"> {{$role->title}} </option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>

                            <div class="text-center mt-5 mb-2">
                                <input type="submit" class="btn btn-success text-center " value="ویرایش کاربر ">
                            </div>

                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>


            </div>
        </div>
    </section>

    <!-- /.content -->
@endsection

@section('scripts')

    <!--********************************************************************************************************-->
    <!--for this page-->
    <!-- date-range-picker -->
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
    <script src="/admin/plugins/select2/select2.full.min.js" ></script>


    <script>


        $(function () {
            $("input[name='marital_status']").click(function () {
                if ($("#IDMarriedRadio").is(":checked")) {
                    $("#IDTarikhEzdevaj").removeAttr("disabled");
                    $("#IDTarikhEzdevaj").focus();
                } else {
                    $("#IDTarikhEzdevaj").attr("disabled", "disabled");
                }
            });
        });


        $('#file').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })

        let useDatePicker = (key) => {
            $(document).ready(function() {
                $(`#${key}`).pDatepicker({
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
        }

        useDatePicker('IDTarikhTavallod')
        useDatePicker('IDTarikhEzdevaj')


        $(function () {
            $('.select2').select2()
        });




        let createNewChildDate = ({ id , key }) => {

            return `
                    <div class="row" id="row-${key}">

                        <div class="col-10">
                            <div class="form-group">
                                 <label>تاریخ تولد</label>
                                 <input class="form-control example1" id="${key}"  name="child-dates[]">
                            </div>
                        </div>
                         <div class="col-2">
                            <label >اقدامات</label>
                            <div>
                                <button type="button" class="btn btn-sm btn-warning" onclick="document.getElementById('row-${key}').remove()">حذف</button>
                            </div>
                        </div>
                    </div>
                `
        }


        $('#add-child-dates').click(function() {
            let childDatesSection = $('#child-dates_section');
            let id = childDatesSection.children().length;
            let key = `key-${Math.floor(Math.random() * 100)}-${Date.now()}`;

            childDatesSection.append(
                createNewChildDate({
                    id,
                    key
                })
            );

            useDatePicker(key)
        });



        //for add new farzand
        document.getElementById("newFarzandBtn").onclick = function() {
            var container = document.getElementById("farzand-section");
            var section = document.getElementById("farzandTarikhInput");


            container.appendChild(section.cloneNode(true));
        }

        //for chek anabling
        $(function () {
            $("input[name='marital_status']").click(function () {
                if ($("#IDMarriedRadio").is(":checked")) {
                    $("#IDTarikhEzdevaj").removeAttr("disabled");
                    $("#IDTarikhEzdevaj").focus();
                } else {
                    $("#IDTarikhEzdevaj").attr("disabled", "disabled");
                }
            });
        });


        $(function () {
            $("input[name='child_status']").click(function () {
                if ($("#IDFarzandYesRadio").is(":checked")) {
                    $("#IDtarikhTavallodFarzand1").removeAttr("disabled");
                    $("#IDtarikhTavallodFarzand1").focus();
                    $("#newFarzandBtn").removeAttr("disabled");

                } else {
                    $("#IDtarikhTavallodFarzand1").removeAttr("disabled");

                    $("#newFarzandBtn").attr("disabled", "disabled");
                    $("#IDtarikhTavallodFarzand1").attr("disabled", "disabled");
                }
            });
        });



        // for persian number









    </script>
@endsection


