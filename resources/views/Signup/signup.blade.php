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
            <form id="loginForm" class="w-full" method="post" action="{{ route('signup.register') }}">
                @csrf
                <div class="sign-in-htm">
                    <div class="group justify-center  grid grid-cols-2 space-x-2">
                        <div>
                            <label for="current_name" class="label mb-1">نام فعلی</label>
                            <input name="current_name" id="current_name" type="text" placeholder="نام فعلی را وارد کنید"
                                   class="input">
                        </div>
                        <div>
                            <label for="previous_name" class="label mb-1">نام سابق</label>
                            <input name="previous_name" id="previous_name" type="text"
                                   placeholder="نام سابق را وارد کنید"
                                   class="input">
                        </div>
                        <div>
                            <label for="arabic_name" class="label mb-1">نام عربی</label>
                            <input name="arabic_name" id="arabic_name" type="text" placeholder="نام عربی را وارد کنید"
                                   class="input">
                        </div>
                        <div>
                            <label for="latin_name" class="label mb-1">نام لاتین</label>
                            <input name="latin_name" id="latin_name" type="text" placeholder="نام لاتین را وارد کنید"
                                   class="input">
                        </div>
                        <div>
                            <label for="arabic_name" class="label mb-1">نام عربی</label>
                            <input name="arabic_name" id="arabic_name" type="text" placeholder="نام عربی را وارد کنید"
                                   class="input">
                        </div>
                        <div>
                            <label for="latin_name" class="label mb-1">نام لاتین</label>
                            <input name="latin_name" id="latin_name" type="text" placeholder="نام لاتین را وارد کنید"
                                   class="input">
                        </div>
                    </div>
                    <div class="group flex justify-center space-x-5">
                        <img id="captchaImg" src="/captcha" alt="Captcha" class="w-32 h-10 mt-2 rounded">
                        <button type="button" onclick="reloadCaptcha()" title="تازه سازی کلمه امنیتی"
                                class="h-10 p-1 bg-gray-300 hover:bg-gray-400 rounded mt-2">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                        <input name="captcha" id="captcha" placeholder="کد امنیتی را وارد کنید" type="text"
                               class="input">
                    </div>
                    <div class="group">
                        <button class="button" type="submit">ثبت نام در سامانه</button>
                    </div>
                    <div class="justify-center text-center">
                        <a href="{{ route('login') }}">
                            <button class="button" type="button">حساب کاربری دارید؟ <br>ورود به سیستم</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
