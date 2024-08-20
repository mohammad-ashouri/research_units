import './bootstrap';
import '@fortawesome/fontawesome-free/css/all.css';
import Swal from 'sweetalert2';

window.Swal = Swal;

function swalFire(title = null, text, icon, confirmButtonText) {
    Swal.fire({
        title: title, text: text, icon: icon, confirmButtonText: confirmButtonText,
    });
}

function loaderSpinner() {
    $('#loader').toggleClass('hidden');
}

if (typeof $ !== 'undefined') {
$('.license_issuance_date').persianDatepicker({
    "format": "LLLL",
    initialValue:false,
    "inputDelay": 800,
    "observer": false,
    "calendar": {
        "persian": {
            "locale": "fa",
            "showHint": false,
            "leapYearMode": "algorithmic"
        },
        "gregorian": {
            "locale": "en",
            "showHint": false
        }
    },
    "navigator": {
        "enabled": true,
        "scroll": {
            "enabled": true
        },
        "text": {
            "btnNextText": "<",
            "btnPrevText": ">"
        }
    },
    "toolbox": {
        "enabled": true,
        "calendarSwitch": {
            "enabled": false,
            "format": "MMMM"
        },
        "todayButton": {
            "enabled": true,
            "text": {
                "fa": "امروز",
                "en": "Today"
            }
        },
        "submitButton": {
            "enabled": false,
            "text": {
                "fa": "تایید",
                "en": "Submit"
            }
        },
        "text": {
            "btnToday": "امروز"
        }
    },
    "timePicker": {
        "enabled": false,
        "step": 1,
        "hour": {
            "enabled": false,
            "step": null
        },
        "minute": {
            "enabled": false,
            "step": null
        },
        "second": {
            "enabled": false,
            "step": null
        },
        "meridian": {
            "enabled": false
        }
    },
    "dayPicker": {
        "enabled": true,
        "titleFormat": "YYYY MMMM"
    },
    "monthPicker": {
        "enabled": true,
        "titleFormat": "YYYY"
    },
    "yearPicker": {
        "enabled": true,
        "titleFormat": "YYYY"
    }
});

}

//Check Login Form
$('#loginForm').submit(function (e) {
    e.preventDefault();
    loaderSpinner();
    let form = $(this);
    let url = form.attr('action');
    let data = form.serialize();

    $.ajax({
        type: 'POST', url: url, data: data, headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }, success: function (response) {
            if (response.success) {
                localStorage.setItem('selectedTab', 1);
                window.location.href = response.redirect;
            } else {
                if (response.errors.username) {
                    swalFire('خطای نام کاربری', response.errors.username[0], 'error', 'تلاش مجدد');
                    reloadCaptcha();
                    captcha.value = '';
                }

                if (response.errors.password) {
                    swalFire('خطای رمز عبور', response.errors.password[0], 'error', 'تلاش مجدد');
                    reloadCaptcha();
                    captcha.value = '';
                }

                if (response.errors.captcha) {
                    swalFire('کد امنیتی نامعتبر', response.errors.captcha[0], 'error', 'تلاش مجدد');
                    reloadCaptcha();
                    captcha.value = '';
                }
                if (response.errors.loginError) {
                    swalFire('نام کاربری یا رمز عبور نامعتبر', response.errors.loginError[0], 'error', 'تلاش مجدد');
                    reloadCaptcha();
                    captcha.value = '';
                }
                loaderSpinner();
            }
        }, error: function (xhr, textStatus, errorThrown) {
            if (xhr.responseJSON['YouAreLocked']) {
                swalFire('دسترسی غیرمجاز', 'آی پی شما به دلیل تعداد درخواست های زیاد بلاک شده است. لطفا یک ساعت دیگر مجددا تلاش کنید.', 'error', 'تایید');
                const fields = [username, password, captcha];
                fields.forEach(field => {
                    field.disabled = true;
                    field.value = null;
                    field.style.backgroundColor = 'gray';
                });
            } else {
                swalFire('خطای ناشناخته', 'ارتباط با سرور برقرار نشد.', 'error', 'تلاش مجدد');
                console.clear();
            }
            loaderSpinner();

        }
    });
});
