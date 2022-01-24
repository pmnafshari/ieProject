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



            <div class="card">

                <!-- /.card-header -->
                <div class="card-body ">

                    <form class="row">
                        <div class="row">

                            <div class="card-body ">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">تعیین ساعت کاری</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body row border rounded ">
                                        <div class=" form-group col-6" id="startTimeContainer">
                                            <label for="IDStartTime">شروع ساعت کاری</label>
                                            <select  class=" select2 custom-select border-1 p-2 m-0 bg-transparent border"  name="start" id="IDStartTime"
                                                     data-animate="fade" data-filter-placeholder="از اینجا جستجو کنید" data-filter="true" >

                                                <option value="1">1</option>

                                            </select>
                                        </div>
                                        <div class=" form-group col-6  ">
                                            <label for="IDEndTime">پایان ساعت کاری</label>
                                            <select  class=" select2 custom-select border-1 p-2 m-0 bg-transparent "  name="end" id="IDEndTime"
                                                     data-animate="fade" data-filter-placeholder="از اینجا جستجو کنید" data-filter="true" >
                                                <option value="2"   selected>2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
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
