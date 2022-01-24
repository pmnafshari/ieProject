<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/userPanel" class="brand-link">

        <span class="brand-text font-weight-light">پنل کاربری</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-2 pb-2 mb-1 d-flex">
                @if(\Illuminate\Support\Facades\Auth::user()->file != null)
                    <div class="image">
                        <img src="{{\Illuminate\Support\Facades\Auth::user()->file}}" class="img-circle elevation-2 fa fa-user" alt="User Image">
                    </div>
                @else
                    <div class="image">
                        <img src="/admin/dist/img/avatar5.png" class="img-circle elevation-2 fa fa-user" alt="User Image">
                    </div>
                @endif

                <div class="info">
                    <a href="#" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->firstname}} {{\Illuminate\Support\Facades\Auth::user()->lastname}}</a>
                </div>
            </div>



            <!-- Sidebar Menu -->
            <nav class="mt-2 small">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item has-treeview ">
                        <a href="{{route('booking.index')}}" class="nav-link  ml-4 pr-2" >
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                داشبورد
                            </p>
                        </a>
                    </li>

                    {{--orders--}}
                    <li class="nav-item has-treeview ">
                        <a href="" class="nav-link  ml-4 pr-2">
                            <i class="nav-icon fa fa-list-ul"></i>
                            <p>
                                رزرو
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item pr-4 ">
                                <a href="{{route('booking.index')}}" class="nav-link ml-4  ">
                                    <i class="fa fa-circle  " ></i>
                                    <p class=" text-break">رزرو خدمات</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{--orders--}}
                    <li class="nav-item has-treeview ">
                        <a href="" class="nav-link  ml-4 pr-2">
                            <i class="nav-icon fa fa-list-ul"></i>
                            <p>
                                سفارشات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item pr-4 ">
                                <a href="{{route('reserve.index',\Illuminate\Support\Facades\Auth::id())}}" class="nav-link ml-4  ">
                                    <i class="fa fa-circle  " ></i>
                                    <p class=" text-break">رزرو های پرداخت شده</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item pr-4 ">
                                <a href="{{route('booking.delete.clock',\Illuminate\Support\Facades\Auth::user())}}" class="nav-link ml-4  ">
                                    <i class="fa fa-circle  " ></i>
                                    <p class=" text-break">رزروهای درانتظارپرداخت</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{--partners--}}
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link  ml-4 pr-2">
                            <i class="nav-icon fa fa-suitcase"></i>
                            <p>
                                پروفایل
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item pr-4">
                                <a href="{{route('profile')}}" class="nav-link ml-4">
                                    <i class="fa fa-circle "></i>
                                    <p>پروفایل</p>
                                </a>
                            </li>


                        </ul>
                    </li>





                    <li class="nav-item has-treeview  ">
                        <a href="#" class="nav-link ml-4 pr-2">
                            <i class="nav-icon fa fa-ticket"></i>
                            <p>
                                تیکتینگ
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item pr-4">
                                <a href="{{route('publicTicket')}}" class="nav-link ml-4">
                                    <i class="fa fa-circle "></i>
                                    <p>تیکت های عمومی</p>
                                </a>
                            </li>

                            <li class="nav-item pr-4 ">
                                <a href="{{route('clientTicketList')}}" class="nav-link  ml-4 ">
                                    <i class="fa fa-circle  " ></i>
                                    <p class="">لیست تیکت های شخصی</p>
                                </a>
                            </li>

                            <li class="nav-item pr-4">
                                <a href="{{route('clientTicketCreate')}}" class="nav-link ml-4">
                                    <i class="fa fa-circle "></i>
                                    <p>ارسال تیکت خصوصی</p>
                                </a>
                            </li>

                        </ul>
                    </li>




                    <li class="nav-item has-treeview ">
                        @auth()
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="nav-link bg-transparent border-0 text-white ml-4 pr-2">
                                    <i class="nav-icon fa fa-sign-out"></i>
                                    <p>
                                        خروج
                                    </p>
                                </button>
                            </form>
                        @endauth
                    </li>




                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>

    </div>
</aside>
