@props(['units'])
<div class="mx-auto lg:mr-72">
    <h1 class="text-2xl font-bold mb-4">کاربرگ اطلاعات کلی واحدهای پژوهشی حوزوی</h1>
    <div class="bg-white rounded shadow p-6">
        <div class="bg-white rounded shadow flex flex-col p-4">
            <div>
                <h1 class="text-xl font-bold mb-4">نام واحد پژوهشی</h1>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="first_name"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام فعلی
                        </label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="نام فعلی را وارد کنید" required>
                    </div>
                    <div>
                        <label for="first_name"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام سابق
                        </label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="نام سابق را وارد کنید" required>
                    </div>
                    <div>
                        <label for="first_name"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام عربی
                        </label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="نام عربی را وارد کنید" required>
                    </div>
                    <div>
                        <label for="first_name"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام لاتین
                        </label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="نام لاتین را وارد کنید" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mt-2">
                <h1 class="text-xl font-bold mb-4">اطلاعات مؤسس</h1>
                <div class="grid gap-6 mb-6 md:grid-cols-1">
                    <div>
                        <label for="first_name"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">مؤسس
                        </label>
                        <select name="building"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                            <option value="" disabled selected>انتخاب کنید</option>
                            <option value="شخص حقیقی">شخص حقیقی</option>
                            <option value="شخص حقوقی">شخص حقوقی</option>
                            <option value="شخص حقوقی / یک نفر">شخص حقوقی / یک نفر</option>
                            <option value="شخص حقوقی / هیأت مؤسس">شخص حقوقی / هیأت مؤسس</option>
                        </select>
                    </div>
                    <div>
                        <label for="first_name"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام مؤسس (حقیقی/
                            حقوقی):
                        </label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="نام مؤسس (حقیقی/ حقوقی) را به صورت کامل وارد کنید" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mt-2" x-data="{ hasPermission: false,licensingAuthority:false  }">
                <h1 class="text-xl font-bold mb-4">اطلاعات مجوز</h1>
                <div class="grid gap-6 mb-6 md:grid-cols-1">
                    <div>
                        <label for="first_name"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">وضعیت مجوز
                        </label>
                        <select name="building"
                                @change="hasPermission = ($event.target.value === 'مجوز دارد' || $event.target.value === 'متقاضی مجوز است')"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                            <option value="" disabled selected>انتخاب کنید</option>
                            <option value="مجوز دارد">مجوز دارد</option>
                            <option value="مجوز ندارد">مجوز ندارد</option>
                            <option value="متقاضی مجوز است">متقاضی مجوز است</option>
                        </select>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2" x-show="hasPermission" x-transition>
                        <div>
                            <label for="first_name"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نوع مجوز:
                            </label>
                            <select name="building"
                                    @change="licensingAuthority = ($event.target.value === 'سایر')"
                                    class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                <option value="" disabled selected>انتخاب کنید</option>
                                <option value="اصولی">اصولی</option>
                                <option value="قطعی">قطعی</option>
                            </select>
                        </div>
                        <div>
                            <label for="first_name"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نوع مجوز:
                            </label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}"
                                   class="delivery_date bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="نام مؤسس (حقیقی/ حقوقی) را به صورت کامل وارد کنید" required>
                        </div>
                    </div>
                    <div x-show="hasPermission" x-transition>
                        <label for="first_name"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">مرجع صدور مجوز:
                        </label>
                        <select name="building"
                                @change="licensingAuthority = ($event.target.value === 'سایر')"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                            <option value="" disabled selected>انتخاب کنید</option>
                            <option value="مرکز مدیریت حوزه های علمیه">مرکز مدیریت حوزه های علمیه</option>
                            <option value="وزارت علوم و تحقیقات و فناوری">وزارت علوم و تحقیقات و فناوری</option>
                            <option value="سایر">سایر</option>
                        </select>
                    </div>
                    <div x-show="licensingAuthority" x-transition>
                        <label for="first_name"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام مرجع صدور مجوز:
                        </label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="نام مرجع صدور مجوز را به صورت کامل وارد کنید" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mt-2" >
                <h1 class="text-xl font-bold mb-4">اطلاعات واحد</h1>
                <div class="grid gap-6 mb-6 md:grid-cols-1">
                    <div>
                        <label for="first_name"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">وضعیت مجوز
                        </label>
                        <select name="building"
                                @change="hasPermission = ($event.target.value === 'مجوز دارد' || $event.target.value === 'متقاضی مجوز است')"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                            <option value="" disabled selected>انتخاب کنید</option>
                            <option value="مجوز دارد">مجوز دارد</option>
                            <option value="مجوز ندارد">مجوز ندارد</option>
                            <option value="متقاضی مجوز است">متقاضی مجوز است</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

