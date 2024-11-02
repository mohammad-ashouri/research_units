<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_PERSIAN_NAME') }}</title>
    <link rel="stylesheet" href="/build/plugins/persian-datepicker/dist/css/persian-datepicker.css"/>
    <script src="/build/plugins/jquery/dist/jquery.js"></script>
    <script src="/build/plugins/persian-date/dist/persian-date.js"></script>
    <script src="/build/plugins/persian-datepicker/dist/js/persian-datepicker.js"></script>
    @vite(['resources/css/login.css','resources/js/login.js'])
</head>
@component('components.loader-spinner') @endcomponent

<body class="min-h-screen overflow-x-auto overflow-y-auto">
<div class="login-wrap overflow-x-auto overflow-y-auto">
    <div class="login-html text-center">
        <input type="checkbox" name="tab" class="sign-in cursor-none" checked>
        <label class="tab cursor-default">ثبت نام در {{ env('APP_PERSIAN_NAME') }}</label>
        <div class="login-form text-right flex justify-center items-center">
            <div id="modal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-10">
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">توجه</h2>
                    <p class="text-gray-600">لطفا این فرم توسط رابط فنی واحد پژوهشی تکمیل گردد</p>
                    <div class="text-center">
                    <button onclick="document.getElementById('modal').classList.add('hidden')"
                            class="mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">بستن
                    </button>
                    </div>
                </div>
            </div>
            <form id="signupForm" class="w-full" method="post" action="{{ route('signup.register') }}">
                @csrf
                <div class="sign-in-htm">
                    <div class="group justify-center grid lg:grid-cols-2 gap-4">
                        <div>
                            <label for="first_name" class="label mb-1">نام</label>
                            <input name="first_name" id="first_name" type="text" required placeholder="نام را وارد کنید"
                                   class="input" value="{{ old('first_name') }}">
                        </div>
                        <div>
                            <label for="last_name" class="label mb-1">نام خانوادگی</label>
                            <input name="last_name" id="last_name" type="text" required
                                   placeholder="نام خانوادگی را وارد کنید"
                                   class="input" value="{{ old('last_name') }}">
                        </div>
                        <div>
                            <label for="national_code" class="label mb-1">کد ملی</label>
                            <input name="national_code" id="national_code" required type="text" placeholder="کد ملی را وارد کنید"
                                   class="input" value="{{ old('national_code') }}">
                        </div>
                        <div>
                            <label for="mobile" class="label mb-1">شماره همراه</label>
                            <input name="mobile" id="mobile" type="text" required placeholder="شماره همراه را به صورت 11 رقمی وارد کنید"
                                   class="input" value="{{ old('mobile') }}">
                        </div>
                        <div>
                            <label for="unit_name" class="label mb-1">نام کامل واحد پژوهشی</label>
                            <input name="unit_name" id="unit_name" type="text" required placeholder="نام کامل واحد پژوهشی را وارد کنید"
                                   class="input" value="{{ old('unit_name') }}">
                        </div>
                        <div>
                            <label for="email" class="label mb-1">ایمیل</label>
                            <input name="email" id="email" type="email" required placeholder="ایمیل واحد پژوهشی را وارد کنید"
                                   class="input" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="group flex justify-center">
                        <img id="captchaImg" src="/captcha" alt="Captcha" class="w-32 h-10 mt-2 rounded">
                        <button type="button" onclick="reloadCaptcha()" title="تازه سازی کلمه امنیتی"
                                class="h-10 p-1 bg-gray-300 hover:bg-gray-400 rounded mt-2">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                        <input name="captcha" id="captcha" required placeholder="کد امنیتی را وارد کنید" type="text"
                               class="input">
                    </div>
                    <div class="group">
                        <button class="button" type="submit">ثبت نام در سامانه</button>
                    </div>
                    <div class="justify-center text-center">
                        <a class="space-x-2" href="{{ route('login') }}">
                            <button class="button" type="button">حساب کاربری دارید؟ ورود به سیستم</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
