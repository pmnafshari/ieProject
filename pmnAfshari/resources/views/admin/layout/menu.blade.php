   <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/adminpanel" class="brand-link"><span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>
{{--    <div class="aside-image-control ml-2">--}}
{{--        <img src="public/admin/karizIcon/kariz.png" class="rounded-circle" alt="">--}}
{{--    </div>--}}
<!-- Sidebar -->
    <div class="sidebar d-flex flex-column" style="direction: ltr">
        <div style="direction: rtl">

            <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-2 pb-2 mb-1 d-flex">
                @foreach(\App\Models\Account::all() as $account)
                @if($account->title != null)
                <div class="image">
                    <img src="{{$account->icon}}" class="img-circle elevation-2 fa fa-user" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"> {{$account->title}}</a>
                </div>

                @else
                <div class="info">
                    <a href="#" class="d-block">مهندسی اینترنت </a>
                </div>
                    @endif
                @endforeach
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2 small">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item has-treeview ">
                        <a href="/adminpanel" class="nav-link  ml-4 pr-2">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                داشبورد
                            </p>
                        </a>
                    </li>
{{--branches--}}
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link  ml-4 pr-2">
                            <i class="nav-icon fa fa-suitcase"></i>
                            <p>
                                شاخه خدمت
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item pr-4 ">
                                <a href="{{route('branch.create')}}" class="nav-link  ml-4">
                                    <i class="fa fa-circle  " ></i>
                                    <p class="">ایجاد شاخه خدمت</p>
                                </a>
                            </li>
                            <li class="nav-item pr-4">
                                <a href="{{route('branch.index')}}" class="nav-link ml-4">
                                    <i class="fa fa-circle "></i>
                                    <p>لیست شاخه خدمت</p>
                                </a>
                            </li>

                        </ul>
                    </li>

{{--   services--}}
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link  ml-4 pr-2">
                            <i class="nav-icon fa fa-suitcase"></i>
                            <p>
                                خدمات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item pr-4 ">
                                <a href="{{route('service.create')}}" class="nav-link  ml-4">
                                    <i class="fa fa-circle  " ></i>
                                    <p class="">ایجاد خدمت</p>
                                </a>
                            </li>
                            <li class="nav-item pr-4">
                                <a href="{{route('service.index')}}" class="nav-link ml-4">
                                    <i class="fa fa-circle "></i>
                                    <p> لیست خدمات</p>
                                </a>
                            </li>

                        </ul>
                    </li>


{{--discount--}}



                    </li>
{{--orders--}}
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link  ml-4 pr-2">
                            <i class="nav-icon fa fa-cart-plus"></i>
                            <p>
                                سفارشات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item pr-4 ">
                                <a href="{{route('order.index')}}" class="nav-link ml-4  ">
                                    <i class="fa fa-circle  " ></i>
                                    <p class=" text-break"> سفارشات تایید شده</p>
                                </a>
                            </li>
                        </ul>
                    </li>
{{--users--}}
                    <li class="nav-item has-treeview  ">
                        <a href="#" class="nav-link  ml-4 pr-2">
                            <i class="nav-icon fa fa-user-o"></i>
                            <p>
                                کاربران
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item pr-4">
                                <a href="{{route('user.create')}}" class="nav-link ml-4">
                                    <i class="fa fa-circle "></i>
                                    <p>ایجاد کاربر جدید</p>
                                </a>
                            </li>
                            <li class="nav-item pr-4 ">
                                <a href="{{route('user.list')}}" class="nav-link ml-4 ">
                                    <i class="fa fa-circle  " ></i>
                                    <p class="">لیست کاربران</p>
                                </a>
                            </li>



                        </ul>
                    </li>
{{--partners--}}


{{--providers--}}
                    <li class="nav-item has-treeview  ">
                        <a href="#" class="nav-link  ml-4  pr-2">
                            <i class="nav-icon fa fa-id-card"></i>
                            <p>
                                پروفایل ارائه‌دهنده
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item pr-4">
                                <a href="{{route('provider.create')}}" class="nav-link ml-4">
                                    <i class="fa fa-circle "></i>
                                    <p>ایجاد ارائه‌دهنده</p>
                                </a>
                            </li>
                            <li class="nav-item pr-4 ">
                                <a href="{{route('provider.index')}}" class="nav-link ml-4 ">
                                    <i class="fa fa-circle  " ></i>
                                    <p class="">لیست ارائه‌دهندگان</p>
                                </a>
                            </li>

                        </ul>
                    </li>



                    {{--tiketing--}}

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
                                <a href="{{route('create.ticket')}}" class="nav-link ml-4">
                                    <i class="fa fa-circle "></i>
                                    <p>ارسال تیکت عمومی</p>
                                </a>
                            </li>

                            <li class="nav-item pr-4 ">
                                <a href="{{route('ticket.index')}}" class="nav-link  ml-4 ">
                                    <i class="fa fa-circle  " ></i>
                                    <p class="">لیست تیکت های عمومی</p>
                                </a>
                            </li>

                            <li class="nav-item pr-4">
                                <a href="{{route('userTicketCreate')}}" class="nav-link ml-4">
                                    <i class="fa fa-circle "></i>
                                    <p>ارسال تیکت خصوصی</p>
                                </a>
                            </li>

                            <li class="nav-item pr-4 ">
                                <a href="{{route('userTicketList')}}" class="nav-link  ml-4 ">
                                    <i class="fa fa-circle  " ></i>
                                    <p class="">لیست تیکت های خصوصی </p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    {{--planing--}}
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link  ml-4 pr-2">
                            <i class="nav-icon fa fa-calendar"></i>
                            <p>
                                ساعت کاری
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item pr-4 ">
                                <a href="{{route('workTimeSet')}}" class="nav-link ml-4">
                                    <i class="fa fa-circle  " ></i>
                                    <p class="">ساعت کاری</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                   {{--reports--}}


{{--setting--}}
                    <li class="nav-item has-treeview  ">
                        <a href="#" class="nav-link  ml-4 pr-2">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                تنظیمات
                                <i class="right fa fa-angle-left "></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item pr-4">
                                <a href="{{route('admin.profile')}}" class="nav-link  ml-4 pr-2">
                                    <i class="nav-icon fa fa-user-circle"></i>
                                    پروفایل کاربری
                                </a>
                            </li>

                            <li class="nav-item pr-4">
                                <a href="{{route('rules.create')}}" class="nav-link ml-4">
                                    <i class="fa fa-circle "></i>
                                    <p>قوانین</p>
                                </a>
                            </li>
                            <li class="nav-item pr-4">
                                <a href="{{route('account.create')}}" class="nav-link ml-4">
                                    <i class="fa fa-circle "></i>
                                    <p>تنظیمات مجموعه</p>
                                </a>
                            </li>

                        </ul>
                    </li>
{{--support--}}



{{--logout--}}


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
