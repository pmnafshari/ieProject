@extends('admin.layout.master')
@section('links')

    <link rel="stylesheet" href="/admin/dist/css/persian-datepicker.min.css">
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@latest/dist/css/persian-datepicker.min.css"/>

@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="row p-2 m-0 justify-content-start ">

                    <div class="col-4 col-md-3 col-xl-2 my-2">
                        <button onclick="location.href='{{route('create.ticket')}}';" class="btn btn-sm py-3 my-2 text-wrap h-100 w-100 btn-info ">ایجاد تیکت عمومی</button>
                    </div>

                    <div class="col-4 col-md-3 col-xl-2 my-2">
                        <button onclick="location.href='{{route('ticket.index')}}';" class="btn btn-sm py-3 my-2 text-wrap h-100 w-100 btn-info ">لیست تیکت های عمومی</button>
                    </div>

                    <div class="col-4 col-md-3 col-xl-2 my-2">
                        <button onclick="location.href='{{route('userTicketList')}}';" class="btn btn-sm py-3 my-2 text-wrap h-100 w-100 btn-info ">لیست تیکت های خصوصی</button>
                    </div>

                    <div class="col-4 col-md-3 col-xl-2 my-2">
                        <button onclick="location.href='{{route('userTicketCreate')}}';" class="btn btn-sm py-3 my-2 text-wrap h-100 w-100 btn-info ">ایجاد تیکت خصوصی</button>
                    </div>



                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ایجاد تیکت جدید</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">

                        <form action="{{route('ticket.store')}}" method="post" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">

                                <div class="form-group  col-md-6">
                                    <label for="IDTicketName">عنوان تیکت</label>
                                    <input type="text" class="form-control" id="IDTicketName" name="title" aria-describedby="nameHelp" placeholder="عنوان تیکت را وارد کنید">
                                    <small id="nameHelp" class="form-text text-muted"></small>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="IDEndDate">تاریخ ایجاد تیکت</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="fa fa-calendar"></i>
                                    </span>
                                        </div>
                                        <input class="normal-example form-control example1" name="date" id="IDEndDate" tabindex="-1" readonly>
                                    </div>
                                </div>

                                <div class="form-group col-12 ">
                                    <div class="mb-3">
                                        <label for="editor1"> متن  تیکت</label>
                                        <textarea id="editor1" name="text"></textarea>
                                    </div>
                                </div>



                            </div>



                            <div class="text-center mt-5 mb-2">
                                <input type="submit" class="btn btn-success text-center " value="ایجاد تیکت جدید">
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

    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>


    <!-- Persian Data Picker -->
    <script src="https://unpkg.com/persian-date@latest/dist/persian-date.min.js"></script>
    <script src="https://unpkg.com/persian-datepicker@latest/dist/js/persian-datepicker.min.js"></script>


    <script>


        // persian datePicker
        $(document).ready(function() {
            $(".example1").pDatepicker({
                // initialValueType: "gregorian",
                format: 'YYYY-MM-DD',
                //  onSelect: "year",
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

        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        ClassicEditor
            .create(document.querySelector('#editor1'), {


                cloudServices: {

                },

            })
            .then( editor => {
                const toolbarContainer = document.querySelector( '.document-editor__toolbar' );

                toolbarContainer.appendChild( editor.ui.view.toolbar.element );

                window.editor = editor;
            } )

            .catch(function (error) {
                console.error(error)
            })




    </script>

@endsection
