<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        {{ env('APP_PERSIAN_NAME') }}
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{--    <link href="http://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">--}}
    {{--    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>--}}
    {{--    <script--}}
    {{--        src="https://code.jquery.com/jquery-3.7.1.js"--}}
    {{--        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="--}}
    {{--        crossorigin="anonymous"></script>--}}
    <script src="/build/plugins/jquery/dist/jquery.js"></script>
    <link href="/build/plugins/select2/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="/build/plugins/select2/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="/build/plugins/jquery-tags-input/dist/jquery.tagsinput.min.css">
    <script src="/build/plugins/jquery-tags-input/dist/jquery.tagsinput.min.js"></script>
    <script src="/build/plugins/persian-date/dist/persian-date.js"></script>
    <script src="/build/plugins/persian-datepicker/dist/js/persian-datepicker.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2({
                placeholder: 'یک گزینه را انتخاب کنید',
            });
            // tinymce.init({
            //     selector: '#body',
            //     plugins: 'table fullscreen autoresize',
            //     max_height: 1000,
            //     skin: false,
            //     content_css: false,
            // });
        });
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@component('components.loader-spinner') @endcomponent

<body class="flex flex-col min-h-screen mt-14">
<div id="loading_popup" class="hidden">
    <div class="loader_popup"></div>
    <p class="animate-pulse text-blue-700 text-xl mr-3">در حال پردازش اطلاعات...</p>
</div>

<header class="w-full fixed top-0 right-0 bg-cu-light py-5 md:px-2 lg:px-0">
    <div class="flex items-center lg:mx-2 mx-5">
        <div>
            <style>
                ::-webkit-scrollbar {
                    width: 12px;
                }

                ::-webkit-scrollbar-thumb {
                    background-color: #4A90E2;
                    border-radius: 6px;
                }

                ::-webkit-scrollbar-thumb:hover {
                    background-color: #357ABD;
                    border-radius: 10px;
                }

                li.active {
                    /* overflow: hidden; */
                    position: relative;

                    /* width: 100px; */
                    /* height: 100px; */
                }

                li.active a {
                    transition: 0.5s;
                    background: #f0f6fb;
                    color: rgb(27, 27, 27);
                    /* border-radius: 20px; */
                    border-top-right-radius: 50px;
                    border-bottom-right-radius: 50px;

                }

                li.active a:focus {
                    background: #f0f6fb;

                }

                li.active a svg {
                    color: rgb(34, 34, 34);
                }


                li.active:before,
                li.active:after {
                    content: "";
                    display: block;
                    width: 60px;
                    height: 60px;
                    position: absolute;
                    border-radius: 50%;
                }

                li.active:before {
                    bottom: -52px;
                    left: 0px;
                    box-shadow: -30px 26px 0px 0px #f0f6fb;
                    transform: rotateX(180deg);

                }

                li.active:after {
                    top: -52px;
                    left: 0px;
                    box-shadow: -30px 26px 0px 0px #f0f6fb;
                }

                .menu {
                    height: 100vh;
                    max-height: calc(100vh - 8%);
                    position: fixed;
                    top: 8%;
                    right: 0;
                    overflow-y: auto;
                }

                /* .mr-350 {
                    transition: .5s;
                    margin-right: -350px;
                } */
                .drawer-side {
                    position: fixed !important;
                }
            </style>

            <aside data-theme="wireframe" class="bg-cu-light ">
                <div class="drawer lg:drawer-open">
                    <input id="my-drawer-2" type="checkbox" class="drawer-toggle"/>
                    <div class="drawer-content flex flex-col items-center justify-center">
                        <!-- Page content here -->
                        <label for="my-drawer-2" class="cursor-pointer inline lg:hidden drawer-button"
                               id="toggle-menu-n">
                            <svg viewBox="0 0 100 80" width="30" height="40">
                                <rect width="100" height="20" rx="10"></rect>
                                <rect y="30" width="100" height="20" rx="10"></rect>
                                <rect y="60" width="100" height="20" rx="10"></rect>
                            </svg>
                        </label>

                    </div>
                    <div class="drawer-side">
                        <label for="my-drawer-2" class="drawer-overlay"></label>
                        @php
                            $userInfo=\Illuminate\Support\Facades\DB::table('users')
                                    ->where('username', session('username'))
                                    ->first();
                        @endphp
                        <ul id="menu"
                            class="menu pr-8 pl-0 w-72 bg-cu-blue text-transparent pt-5 overflow-x-hidden rounded-se-3xl block">

                            <div class="ml-7 mb-6 text-center mt-5">
                                <div class="avatar flex justify-center ">
                                    @if($userInfo->user_image)
                                        @php
                                            $src=substr($userInfo->user_image,6);
                                            $src='storage'.$src;
                                        @endphp
                                        <div style="background: url({{ $src }}) no-repeat; background-size: cover;"
                                             class="w-16 h-16 rounded-full">
                                        </div>
                                    @else
                                        <div id="user_icon" class="w-16 h-16 rounded-full">
                                        </div>
                                    @endif

                                </div>
                                <p class="pt-2 text-cu-light">
                                    {{ $userInfo->username.' | '. $userInfo->first_name . ' '. $userInfo->last_name }}
                                </p>
                                <p class="pt-1 text-cu-light">
                                    {{ $userInfo->subject }}
                                </p>
                            </div>
                            <li class="menu-item" id="dashboard">
                                <a href="{{ route('dashboard') }}"
                                   class="flex items-center text-cu-light rounded-s-full dark:text-white hover:bg-gray-100 light:hover:bg-gray-700 group">
                                    <i style="font-size: 24px" class="las la-home"></i>
                                    <span class="">صفحه اصلی</span>
                                </a>
                            </li>
                            @php
                                $menus = session('menus');
                            @endphp

                            @foreach ($menus as $menu)
                                <li>
                                    @if (isset($menu['childs']) && count($menu['childs']) > 0)
                                        @can($menu['permission'])
                                            <details id="{{ 'details-' . $menu['title'] }}">
                                                <summary
                                                    class="flex items-center my-1 text-cu-light rounded-s-full dark:text-white hover:bg-gray-100 light:hover:bg-gray-700 group">
                                                    <i style="font-size: 24px" class="{{$menu['icon']}}"></i>
                                                    {{ $menu['title'] }}
                                                </summary>
                                                <ul class="text-white w-full mr-2">
                                                    @foreach ($menu['childs'] as $child)
                                                        @if(isset($child['permission']))
                                                            @can($child['permission'])
                                                                <li class="menu-item mr-8" id="{{ $child['title'] }}">
                                                                    <a href="{{ $child['link'] }}"
                                                                       class="flex items-center my-1 text-cu-light rounded-s-full dark:text-white hover:bg-gray-100 light:hover:bg-gray-700 group">
                                                                        <i style="font-size: 24px"
                                                                           class="{{$child['icon']}}"></i>
                                                                        {{ $child['title'] }}</a>
                                                                </li>
                                                            @endcan
                                                        @endif
                                                    @endforeach
                                                </ul>
                                                @endcan
                                                @else
                                                    @if(isset($menu['permission']))
                                                        @can($menu['permission'])
                                                            <li class="menu-item" id="menu{{ $menu['link'] }}">
                                                                <a href="{{ $menu['link'] }}"
                                                                   class="flex items-center my-1 text-cu-light rounded-s-full dark:text-white hover:bg-gray-100 light:hover:bg-gray-700 group">
                                                                    <i style="font-size: 24px"
                                                                       class="{{$menu['icon']}}"></i>
                                                                    <span class=" ">
                                                            {{ $menu['title'] }}
                                                        </span>
                                                                </a>
                                                            </li>
                                                        @endcan
                                                    @endif
                                                @endif
                                            </details>
                                </li>
                            @endforeach

                            <li class="menu-item" id="changePassword">
                                <a href="{{ route('Profile') }}"
                                   class="flex items-center my-1 text-cu-light rounded-s-full dark:text-white hover:bg-gray-100 light:hover:bg-gray-700 group">
                                    <i style="font-size: 24px" class="las la-key"></i>
                                    <span class=" mr-3 ">پروفایل</span>
                                </a>
                            </li>
                            <li class="menu-item logout" id="logout">
                                <a href="{{ route('logout') }}"
                                   class="flex items-center my-1 text-cu-light rounded-s-full dark:text-white hover:bg-gray-100 light:hover:bg-gray-700 group">
                                    <i style="font-size: 24px" class="las la-sign-out-alt"></i>
                                    <span class="">خروج</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <script>
                    if (window.location.pathname === '/dashboard') {
                        const lis = document.querySelectorAll('li');
                        lis.forEach(li => li.classList.remove('active'));
                        dashboard.classList.add('active');
                    }

                    // Get all the menu items
                    const menuItems = document.querySelectorAll('.menu-item');

                    // Function to handle click on menu items
                    function handleMenuItemClick(event) {
                        // Remove the active class from all menu items
                        menuItems.forEach(item => item.classList.remove('active'));

                        // Add the active class to the clicked menu item
                        event.currentTarget.classList.add('active');

                        // Save the selected menu item ID to the sessionStorage
                        sessionStorage.setItem('selectedMenuItem', event.currentTarget.id);
                    }

                    // Add event listeners to each menu item
                    menuItems.forEach(item => {
                        item.addEventListener('click', handleMenuItemClick);
                    });

                    // On page load, check if there's a selected menu item in the sessionStorage and set it as active
                    document.addEventListener('DOMContentLoaded', () => {
                        const selectedMenuItem = sessionStorage.getItem('selectedMenuItem');
                        if (selectedMenuItem) {
                            const menuItem = document.getElementById(selectedMenuItem);
                            if (menuItem) {
                                menuItem.classList.add('active');
                            }
                        }
                    });

                    // Function to handle click on child menu items
                    function handleChildMenuItemClick(event) {
                        const detailsElement = event.currentTarget.closest('details');
                        if (detailsElement) {
                            // Set the 'open' attribute for the details element
                            detailsElement.setAttribute('open', true);
                        }

                        // Remove the active class from all child menu items
                        const childMenuItems = document.querySelectorAll('.menu-item');
                        childMenuItems.forEach(item => item.classList.remove('active'));

                        // Add the active class to the clicked child menu item
                        event.currentTarget.classList.add('active');

                        // Save the selected child menu item ID to the sessionStorage
                        sessionStorage.setItem('selectedChildMenuItem', event.currentTarget.id);
                    }

                    // Add event listeners to each child menu item
                    const childMenuItems = document.querySelectorAll('.menu-item');
                    childMenuItems.forEach(item => {
                        item.addEventListener('click', handleChildMenuItemClick);
                    });

                    // On page load, check if there's a selected child menu item in the sessionStorage and set it as active
                    document.addEventListener('DOMContentLoaded', () => {
                        const selectedChildMenuItem = sessionStorage.getItem('selectedChildMenuItem');
                        if (selectedChildMenuItem) {
                            const childMenuItem = document.getElementById(selectedChildMenuItem);
                            if (childMenuItem) {
                                childMenuItem.classList.add('active');

                                const detailsElement = childMenuItem.closest('details');
                                if (detailsElement) {
                                    // Set the 'open' attribute for the details element
                                    detailsElement.setAttribute('open', true);
                                }
                            }
                        }
                    });


                    function handleLogout() {
                        // Clear the selected menu item and child menu item from sessionStorage
                        sessionStorage.removeItem('selectedMenuItem');
                        sessionStorage.removeItem('selectedChildMenuItem');
                    }

                    // Add event listener to the "خروج" (Logout) menu item
                    const logoutMenuItem = document.getElementById('logout');
                    logoutMenuItem.addEventListener('click', handleLogout);

                </script>


            </aside>

        </div>
        <div class="flex justify-center w-full lg:w-auto">
            <h3 class=" text-gray-700 text-center font-bold text-lg">
                    <span class="text-cu-blblack">
                        {{ env('APP_PERSIAN_NAME') }}
                    </span>
            </h3>
        </div>
    </div>
</header>

<!-- Main Content -->

<div class="flex-1 flex overflow-x-scroll">
    @yield('content')
</div>

<footer class="bg-gray-800 text-gray-300 py-4 px-8">
    <div class="max-w-4xl mx-auto text-center">
        <span>{{ env('COPYRIGHT_TEXT') }}</span>
    </div>
</footer>

<!-- Show other images modal -->
<div id="other-images-modal-container" onclick="closeModal()"
     class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="other-images-modal-container bg-white rounded-lg p-4 max-w-3xl">
        <img id="modal-image" src="" alt="تصویر مودال" class="w-full">
    </div>
</div>

<script>
    function openModal(imageUrl) {
        const modal = document.querySelector('.other-images-modal-container');
        modal.querySelector('img').src = imageUrl;
        modal.parentElement.classList.remove('hidden');
    }

    function closeModal(imageUrl) {
        const modal = document.querySelector('.other-images-modal-container');
        modal.querySelector('img').src = imageUrl;
        modal.parentElement.classList.add('hidden');
    }

    function loaderSpinner() {
        $('#loader').toggleClass('hidden');
    }
</script>
</body>

</html>
