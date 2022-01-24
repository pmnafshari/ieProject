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

    <!-- (MULTIPLE SELECT)   -->
    <link rel="stylesheet" href="/admin/plugins/multipleSelect/multiple-select.min.css">
    <link rel="stylesheet" href="/admin/plugins/multipleSelect/multipleSelect-bootstrap.css">
@endsection
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="row p-2 ">
                    <a href="{{route('role.list')}}" class="btn py-4 btn-primary m-2">لیست نقش ها</a>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ویرایش نقش جدید</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">

                        <form action="{{route('role.update',$role)}}" method="post" enctype="multipart/form-data" >
                            @csrf
                            @method('PATCH')

                            <div class="row">

                                <div class="form-group  col-md-12">
                                    <label for="IDOnvanInput">عنوان </label>
                                    <input type="text" class="form-control" id="IDOnvanInput" name="title" value={{$role->title}} aria-describedby="onvanHelp" placeholder=" عنوان  را وارد کنید">
                                    <small id="onvanHelp" class="form-text text-muted">عنوان نقش</small>
                                </div>


                                <div class="form-group col-12 ">
                                    <label for="IDDastesiHa" class="  px-2 pt-0 font-weight-bold row">
                                        انتخاب لیست دسترسی ها
                                    </label>

                                    <select class="multiple-select custom-select border-0 p-0 m-0 bg-transparent " multiple
                                            id="IDDastresiHa" data-select-all="true" data-minimum-count-selected="50" data-filter="true"
                                            data-multiple-width="80" data-display-delimiter= " | " name="permissions[]" data-filter-placeholder="از اینجا جستجو کنید"
                                            data-group="false" data-animate="fade">

                                        @foreach($permissions as $permission)
                                            <option
                                                @if($role->hasPermission($permission))
                                                    selected
                                                @endif
                                                value="{{$permission->id}}" >{{$permission->label}} </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="text-center mt-5 mb-2">
                                    <input type="submit" class="btn btn-success text-center " value="ویرایش نقش ">
                                </div>

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
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Persian Data Picker -->
    <script src="/admin/dist/js/persian-date.min.js"></script>
    <script src="/admin/dist/js/persian-datepicker.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
    <script src="https://unpkg.com/persian-date@latest/dist/persian-date.min.js"></script>
    <script src="https://unpkg.com/persian-datepicker@latest/dist/js/persian-datepicker.min.js"></script>

    <!-- select menu searchable -->
    <script src="/admin/plugins/select2/select2.full.min.js" ></script>

    <!-- (MULTIPLE SELECT) -->
    <script src="/admin/plugins/multipleSelect/multiple-select.min.js"></script>


    <!--address RelatedSelect-->
    <script src="/admin/plugins/iranAddressJS/Iran-Address-JS.js"></script>


    <script>


        $(document).ready(function() {
            $(".example1").pDatepicker({
                initialValueType: "gregorian",
                format: "YYYY/MM/DD",
                onSelect: "year"
            });
        });

        $(function () {
            $('.select2').select2()
        })


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
            document.getElementById("IDselectedServices").innerText ="دسترسی های انتخاب شده: \n"   + $('#IDDastresiHa').multipleSelect('getSelects', 'text');
        })




    </script>

@endsection

