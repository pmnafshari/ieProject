@extends('user.layout.master')
@section('links')
    <link rel="stylesheet" href="/admin/plugins/multipleSelect/multiple-select.min.css">
    <link rel="stylesheet" href="/admin/plugins/multipleSelect/multipleSelect-bootstrap.css">

    <!-- Persian Data Picker -->
    <link rel="stylesheet" href="/admin/dist/css/persian-datepicker.min.css">
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@latest/dist/css/persian-datepicker.min.css"/>


@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="row p-2 m-0 justify-content-start ">

                    <div class="col-4 col-md-3 col-xl-2 my-2">
                        <button onclick="location.href='{{route('publicTicket')}}';" class="btn btn-sm py-3 my-2 text-wrap h-100 w-100 btn-info ">تیکت های عمومی</button>
                    </div>

                    <div class="col-4 col-md-3 col-xl-2 my-2">
                        <button onclick="location.href='{{route('clientTicketList')}}';" class="btn btn-sm py-3 my-2 text-wrap h-100 w-100 btn-info ">لیست تیکت های شخصی</button>
                    </div>
                    <div class="col-4 col-md-3 col-xl-2 my-2">
                        <button onclick="location.href='{{route('clientTicketCreate')}}';" class="btn btn-sm py-3 my-2 text-wrap h-100 w-100 btn-info ">ارسال تیکت خصوصی</button>
                    </div>


                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">تیکت شماره  <span> {{$ticket->id}}</span></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">


                        <div class="row">


                            <div class="form-group  col-md-6">
                                <label for="IDTicketName">عنوان تیکت</label>
                                <input value=" {{$ticket->title}}" type="text" class="form-control bg-transparent border-top-0  border-left-0 border-right-0 rounded-0 shadow-none" id="IDTicketName" name="TicketName" aria-describedby="nameHelp" readonly >
                                <small id="nameHelp" class="form-text text-muted"></small>
                            </div>



                            <div class="form-group  col-md-6">
                                <label for="IDTicketName">date</label>
                                <input value="{{jdate($ticket->created_at)->format('%d / %B / %Y')}}" type="text" class="form-control bg-transparent border-top-0  border-left-0 border-right-0 rounded-0 shadow-none" id="IDTicketName" name="TicketName" aria-describedby="nameHelp" readonly >
                                <small id="nameHelp" class="form-text text-muted"></small>
                            </div>




                        </div>

                        <div class="row card  border border-dark rounded">

                            <div class="card-header">
                                <div class=" d-flex justify-content-between">
                                    <div>پیام ها</div>
                                </div>
                            </div>

                        @foreach($ticketTexts as $ticketText )
                            @if($ticketText->ticket_id == $ticket->id)




                                @if($ticketText->writeBy == 'admin')

                                        <div class="div-like-chat-reciever p-2 m-3 col-10 col-md-7 mr-auto">
                                            <div class="card m-0">
                                                <div class="card-header">
                                                    <div class=" d-flex justify-content-between">
                                                        <div>admin</div>  <div>{{jdate($ticketText->created_at)}}</div>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body small">
                                                    <p>
                                                        {!! $ticketText->text!!}
                                                    </p>
                                                </div>

                                            </div>
                                        </div>

                                @elseif($ticketText->writeBy == \Illuminate\Support\Facades\Auth::id())
                                            <!-- send box start-->
                                            <div class="div-like-chat-sender p-2 m-3 col-10 col-md-7 ">

                                                <div class="card m-0">
                                                    <div class="card-header">
                                                        <div class=" d-flex justify-content-between">
                                                            <div>شما</div><div>{{jdate($ticketText->created_at)}}</div>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body small">
                                                        <p>{!! $ticketText->text!!}</p>

                                                    </div>

                                                </div>
                                            </div>
                                            <!-- send box end-->

                                    @endif
                            @endif
                        @endforeach

                        </div>



                            <!-- recieve box start-->


                    <form action="{{route('clientTicketStore',$ticket)}}" method="post" class="row mt-5"  >
                        @csrf
                        @method('PATCH')
                        <div class="form-group col-12 ">
                            <div class="mb-3">
                                <label >افزودن پیغام جدید</label>

                                <div class="ck-editor-container-custom" >
                                    <div id="toolbar-container" class="border border-dark border-bottom-0 rounded"></div>
                                    <br><br>
                                    <!-- This container will become the editable. -->
                                    <div class="form-group col-12 ">
                                        <div class="mb-3">
                                            <label for="editor1"> متن تیکت</label>
                                            <textarea id="editor1" name="text"></textarea>
                                        </div>
                                    </div>

                                </div>



                            </div>
                        </div>


                        <div class="text-right  mb-2">
                            <input type="submit" class="btn btn-success text-center " value="افزودن پیام جدید در این تیکت">
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
