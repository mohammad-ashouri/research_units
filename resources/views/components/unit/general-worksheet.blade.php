@props(['unitInfo'])
<div class="mx-auto lg:mr-72">
    <h1 class="text-2xl font-bold mb-4">کاربرگ اطلاعات کلی واحدهای پژوهشی حوزوی</h1>
    <div class="bg-white rounded shadow p-6">
        <form action="{{ route('ResearchUnitInformation.store') }}" method="post">
            @csrf
            <div class="bg-white rounded shadow flex flex-col p-4">
                {{--                نام واحد پژوهشی--}}
                <div>
                    <h1 class="text-xl font-bold mb-4">نام واحد پژوهشی</h1>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <!-- نام فعلی -->
                        <div>
                            <label for="current_name"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام فعلی*
                            </label>
                            <input id="current_name" type="text" name="current_name" value="{{ old('current_name') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="نام فعلی را وارد کنید" required>
                        </div>

                        <!-- نام سابق -->
                        <div>
                            <label for="previous_name"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام سابق
                            </label>
                            <input id="previous_name" type="text" name="previous_name"
                                   value="{{ old('previous_name') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="نام سابق را وارد کنید">
                        </div>

                        <!-- نام عربی -->
                        <div>
                            <label for="arabic_name"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام عربی
                            </label>
                            <input id="arabic_name" type="text" name="arabic_name" value="{{ old('arabic_name') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="نام عربی را وارد کنید">
                        </div>

                        <!-- نام لاتین -->
                        <div>
                            <label for="latin_name"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام لاتین
                            </label>
                            <input id="latin_name" type="text" name="latin_name" value="{{ old('latin_name') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="نام لاتین را وارد کنید">
                        </div>
                    </div>
                </div>
                <hr>
                {{--                اطلاعات مؤسس--}}
                <div class="mt-2">
                    <h1 class="text-xl font-bold mb-4">اطلاعات مؤسس</h1>
                    <div class="grid gap-6 mb-6 md:grid-cols-1">
                        <!-- نوع مؤسس -->
                        <div>
                            <label for="founder_type"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نوع مؤسس*
                            </label>
                            <select id="founder_type" name="founder_type"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                <option value="" disabled selected>انتخاب کنید</option>
                                <option value="شخص حقیقی">شخص حقیقی</option>
                                <option value="شخص حقوقی">شخص حقوقی</option>
                                <option value="شخص حقوقی / یک نفر">شخص حقوقی / یک نفر</option>
                                <option value="شخص حقوقی / هیأت مؤسس">شخص حقوقی / هیأت مؤسس</option>
                            </select>
                        </div>

                        <!-- نام مؤسس -->
                        <div>
                            <label for="founder_name"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام مؤسس (حقیقی/
                                حقوقی)*
                            </label>
                            <input id="founder_name" type="text" name="founder_name" value="{{ old('founder_name') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="نام مؤسس (حقیقی/ حقوقی) را به صورت کامل وارد کنید" required>
                        </div>
                    </div>
                </div>
                <hr>
                {{--                اطلاعات مجوز--}}
                <div class="mt-2" x-data="{
                            hasPermission: false,
                            licensingAuthority: false,
                            resetFields() {
                                this.licensingAuthority = false;
                                document.getElementById('license_type').value = '';
                                document.getElementById('license_date').value = '';
                                document.getElementById('license_issuer').value = '';
                                document.getElementById('issuer_name').value = '';
                                document.getElementById('organizational_affiliation').value = '';
                            }
                        }">
                    <h1 class="text-xl font-bold mb-4">اطلاعات مجوز</h1>
                    <div class="grid gap-6 mb-6 md:grid-cols-1">
                        <!-- وضعیت مجوز -->
                        <div>
                            <label for="license_status"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">وضعیت مجوز
                            </label>
                            <select id="license_status" name="license_status"
                                    @change="hasPermission = ($event.target.value === 'مجوز دارد' || $event.target.value === 'متقاضی مجوز است'); if (!hasPermission) resetFields();"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                <option value="" disabled selected>انتخاب کنید</option>
                                <option value="مجوز دارد">مجوز دارد</option>
                                <option value="مجوز ندارد">مجوز ندارد</option>
                                <option value="متقاضی مجوز است">متقاضی مجوز است</option>
                            </select>
                        </div>

                        <!-- نوع مجوز و تاریخ مجوز -->
                        <div class="grid gap-6 md:grid-cols-2" x-show="hasPermission" x-transition>
                            <!-- نوع مجوز -->
                            <div>
                                <label for="license_type"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نوع مجوز:
                                </label>
                                <select id="license_type" name="license_type"
                                        @change="licensingAuthority = ($event.target.value === 'سایر')"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        :required="hasPermission">
                                    <option value="" disabled selected>انتخاب کنید</option>
                                    <option value="اصولی">اصولی</option>
                                    <option value="قطعی">قطعی</option>
                                </select>
                            </div>

                            <!-- تاریخ مجوز -->
                            <div>
                                <label for="license_date"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">تاریخ مجوز:
                                </label>
                                <input id="license_date" type="text" name="license_date"
                                       value="{{ old('license_date') }}"
                                       :required="hasPermission"
                                       class="delivery_date bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="تاریخ مجوز را وارد کنید">
                            </div>
                        </div>

                        <!-- مرجع صدور مجوز -->
                        <div x-show="hasPermission" x-transition>
                            <label for="license_issuer"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">مرجع صدور مجوز:
                            </label>
                            <select id="license_issuer" name="license_issuer"
                                    @change="licensingAuthority = ($event.target.value === 'سایر')"
                                    :required="hasPermission"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" disabled selected>انتخاب کنید</option>
                                <option value="مرکز مدیریت حوزه های علمیه">مرکز مدیریت حوزه های علمیه</option>
                                <option value="وزارت علوم و تحقیقات و فناوری">وزارت علوم و تحقیقات و فناوری</option>
                                <option value="سایر">سایر</option>
                            </select>
                        </div>

                        <!-- نام مرجع صدور مجوز -->
                        <div x-show="licensingAuthority" x-transition>
                            <label for="issuer_name"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام مرجع صدور
                                مجوز:
                            </label>
                            <input id="issuer_name" type="text" name="issuer_name" value="{{ old('issuer_name') }}"
                                   :required="licensingAuthority"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="نام مرجع صدور مجوز را وارد کنید">
                        </div>

                        <!-- وابستگی سازمانی -->
                        <div x-show="hasPermission" x-transition>
                            <label for="organizational_affiliation"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">وابستگی سازمانی:
                            </label>
                            <select id="organizational_affiliation" name="organizational_affiliation"
                                    :required="hasPermission"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" disabled selected>انتخاب کنید</option>
                                <option value="حوزوی وابسته">حوزوی وابسته</option>
                                <option value="حوزوی غیر وابسته">حوزوی غیر وابسته</option>
                                <option value="غیرحوزوی">غیرحوزوی</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                {{--                اطلاعات ثبت--}}
                <div class="mt-2" x-data="{
                                registrationNumber: false,
                                resetFields() {
                                    document.getElementById('registration_authority').value = '';
                                }
                            }">
                    <h1 class="text-xl font-bold mb-4">اطلاعات ثبت</h1>
                    <div class="grid gap-6 mb-6 md:grid-cols-1">
                        <!-- وضعیت شماره ثبت -->
                        <div>
                            <label for="registration_status"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">وضعیت شماره ثبت
                            </label>
                            <select id="registration_status" name="registration_status"
                                    @change="registrationNumber = ($event.target.value === 'دارد'); if (!registrationNumber) resetFields();"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                <option value="" disabled selected>انتخاب کنید</option>
                                <option value="دارد">دارد</option>
                                <option value="ندارد">ندارد</option>
                            </select>
                        </div>

                        <!-- نام مرجع ثبت کننده -->
                        <div x-show="registrationNumber" x-transition>
                            <label for="registration_authority"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام مرجع ثبت
                                کننده:
                            </label>
                            <input id="registration_authority" type="text" name="registration_authority"
                                   value="{{ old('registration_authority') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="نام مرجع ثبت کننده را به صورت کامل وارد کنید"
                                   :required="registrationNumber"
                            >
                        </div>
                    </div>
                </div>
                <hr>
                {{--                اطلاعات واحد--}}
                <div class="mt-2">
                    <h1 class="text-xl font-bold mb-4">اطلاعات واحد</h1>
                    <div class="grid gap-6 mb-6 md:grid-cols-1">
                        {{--                       سطح / نوع واحد --}}
                        <div x-data="{ unitType: false }">
                            <div>
                                <label for="unitType"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">سطح / نوع
                                    واحد
                                </label>
                                <select name="unitType"
                                        id="unitType"
                                        @change="unitType = ($event.target.value === 'سایر')"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                                    <option value="" disabled selected>انتخاب کنید</option>
                                    <option value="گروه پژوهشی">گروه پژوهشی</option>
                                    <option value="مرکز پژوهشی">مرکز پژوهشی</option>
                                    <option value="پژوهشکده">پژوهشکده</option>
                                    <option value="موسسه پژوهشی">موسسه پژوهشی</option>
                                    <option value="پژوهشگاه">پژوهشگاه</option>
                                    <option value="سایر">سایر</option>
                                </select>
                            </div>

                            <div class="mt-2" x-show="unitType" x-transition>
                                <input type="text" name="unitTypeName" value="{{ old('unitTypeName') }}"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="سطح / نوع واحد را به صورت کامل وارد کنید"
                                       :required="unitType"
                                >
                            </div>
                        </div>
                        {{--                        موضوع و زمینه فعالیت--}}
                        <div>
                            <label for="activity_field"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">موضوع و زمینه
                                فعالیت
                            </label>
                            <input type="text" name="activity_field" id="activity_field"
                                   value="{{ old('activity_field') }}" required
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="موضوع و زمینه فعالیت را به صورت کامل وارد کنید">
                        </div>
                        {{--                        ماهیت واحد--}}
                        <div x-data="{ unitNature: false }">
                            <div>
                                <label for="unit_nature"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ماهیت
                                    واحد</label>
                                <select name="unit_nature"
                                        @change="unitNature = ($event.target.value === 'سایر')"
                                        id="unit_nature"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                    <option value="" disabled selected>انتخاب کنید</option>
                                    <option value="پژوهشی">پژوهشی</option>
                                    <option value="آموزشی- پژوهشی">آموزشی- پژوهشی</option>
                                    <option value="فرهنگی- پژوهشی">فرهنگی- پژوهشی</option>
                                    <option value="پژوهشی-اطلاع رسانی">پژوهشی-اطلاع رسانی</option>
                                    <option value="سایر">سایر</option>
                                </select>
                            </div>

                            <div class="mt-2" x-show="unitNature" x-transition>
                                <label for="unit_nature_text"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ماهیت
                                    واحد:</label>
                                <input type="text" name="unit_nature_text" id="unit_nature_text"
                                       value="{{ old('unit_nature_text') }}"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="ماهیت واحد را به صورت کامل وارد کنید"
                                       :required="unitNature"
                                >
                            </div>
                        </div>
                        {{--                        نوع تحقیقات--}}
                        <div>
                            <label for="researchTypes"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نوع
                                تحقیقات</label>
                            <div x-data="{
                                    researchTypes: @json(old('researchTypes', [])),
                                    researchTypePercentages: @json(old('researchTypePercentages', []))
                                }" class="grid grid-cols-3 gap-4">

                                <!-- چک‌باکس برای تحقیق بنیادی -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="researchTypes[]"
                                        value="بنیادی"
                                        x-model="researchTypes"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="researchTypes"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">بنیادی</label>
                                    <input
                                        x-transition
                                        type="number"
                                        name="researchTypePercentages[بنیادی]"
                                        placeholder="به درصد وارد کنید"
                                        x-show="researchTypes.includes('بنیادی')"
                                        x-model="researchTypePercentages['بنیادی']"
                                        x-effect="if (!researchTypes.includes('بنیادی')) delete researchTypePercentages['بنیادی']"
                                        x-bind:required="researchTypes.includes('بنیادی')"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        min="0" max="100">
                                </div>

                                <!-- چک‌باکس برای تحقیق توسعه ای -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="researchTypes[]"
                                        value="توسعه ای"
                                        x-model="researchTypes"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="researchTypes"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">توسعه
                                        ای</label>
                                    <input
                                        x-transition
                                        type="number"
                                        name="researchTypePercentages[توسعه ای]"
                                        placeholder="به درصد وارد کنید"
                                        x-show="researchTypes.includes('توسعه ای')"
                                        x-model="researchTypePercentages['توسعه ای']"
                                        x-bind:required="researchTypes.includes('توسعه ای')"
                                        x-effect="if (!researchTypes.includes('توسعه ای')) delete researchTypePercentages['توسعه ای']"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        min="0" max="100">
                                </div>

                                <!-- چک‌باکس برای تحقیق کاربردی -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="researchTypes[]"
                                        value="کاربردی"
                                        x-model="researchTypes"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="researchTypes"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">کاربردی</label>
                                    <input
                                        x-transition
                                        type="number"
                                        name="researchTypePercentages[کاربردی]"
                                        placeholder="به درصد وارد کنید"
                                        x-show="researchTypes.includes('کاربردی')"
                                        x-model="researchTypePercentages['کاربردی']"
                                        x-bind:required="researchTypes.includes('کاربردی')"
                                        x-effect="if (!researchTypes.includes('کاربردی')) delete researchTypePercentages['کاربردی']"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        min="0" max="100">
                                </div>

                            </div>
                        </div>
                        {{--                        معاونت‌های فعال واحد پژوهشی--}}
                        <div>
                            <label for="active_assistants"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">معاونت‌های فعال
                                واحد پژوهشی</label>
                            <div x-data="{
                                        activeAssistants: @json(old('activeAssistants', [])),
                                        otherActiveAssistants: '{{ old('otherActiveAssistants', '') }}'
                                    }" class="grid grid-cols-4 gap-4">

                                <!-- چک‌باکس برای پژوهش -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        id="assistant_research"
                                        name="activeAssistants[]"
                                        value="پژوهش"
                                        x-model="activeAssistants"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="assistant_research"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        پژوهش
                                    </label>
                                </div>

                                <!-- چک‌باکس برای آموزش -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        id="assistant_education"
                                        name="activeAssistants[]"
                                        value="آموزش"
                                        x-model="activeAssistants"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="assistant_education"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        آموزش
                                    </label>
                                </div>

                                <!-- چک‌باکس برای فرهنگی -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        id="assistant_cultural"
                                        name="activeAssistants[]"
                                        value="فرهنگی"
                                        x-model="activeAssistants"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="assistant_cultural"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        فرهنگی
                                    </label>
                                </div>

                                <!-- چک‌باکس برای امور مالی -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        id="assistant_finance"
                                        name="activeAssistants[]"
                                        value="امور مالی"
                                        x-model="activeAssistants"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="assistant_finance"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        امور مالی
                                    </label>
                                </div>

                                <!-- چک‌باکس برای سایر -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        id="assistant_other"
                                        name="activeAssistants[]"
                                        value="سایر"
                                        x-model="activeAssistants"
                                        @change="if (!activeAssistants.includes('سایر')) otherActiveAssistants = ''"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="assistant_other"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        سایر
                                    </label>
                                    <input
                                        x-transition
                                        type="text"
                                        name="otherActiveAssistants"
                                        id="assistant_otherActiveAssistants"
                                        placeholder="معاونت‌های فعال واحد پژوهشی را وارد کنید"
                                        x-bind:required="activeAssistants.includes('سایر')"
                                        x-show="activeAssistants.includes('سایر')"
                                        x-model="otherActiveAssistants"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>
                        </div>
                        {{--                        وضعیت نشریات در اختیار--}}
                        <div>
                            <label for="publication_status"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">وضعیت نشریات در
                                اختیار
                            </label>
                            <div x-data="{
                                    publicationStatus: @json(old('publicationStatus', [])),
                                    otherPublicationStatus: '{{ old('otherPublicationStatus', '') }}'
                                }" class="grid grid-cols-4 gap-4">
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="publicationStatus[]"
                                        value="پژوهشی"
                                        x-model="publicationStatus"
                                        id="research"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="research"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        پژوهشی
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="publicationStatus[]"
                                        value="ترویجی"
                                        x-model="publicationStatus"
                                        id="promotional"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="promotional"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        ترویجی
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="publicationStatus[]"
                                        value="تخصصی"
                                        x-model="publicationStatus"
                                        id="specialized"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="specialized"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        تخصصی
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="publicationStatus[]"
                                        value="سایر"
                                        x-model="publicationStatus"
                                        @change="if (!publicationStatus.includes('سایر')) otherPublicationStatus = ''"
                                        id="otherPublicationStatus"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="otherPublicationStatus"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        سایر
                                    </label>
                                    <input
                                        x-transition
                                        type="text"
                                        placeholder="وضعیت نشریات در اختیار را وارد کنید"
                                        name="otherPublicationStatus"
                                        x-bind:required="publicationStatus.includes('سایر')"
                                        x-show="publicationStatus.includes('سایر')"
                                        x-model="otherPublicationStatus"
                                        id="otherPublicationStatusInput"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>
                        </div>
                        {{--                        نتایج/خروجی فعالیت‌های پژوهشی--}}
                        <div>
                            <label for="researchActivitiesOutput"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نتایج/خروجی
                                فعالیت‌های پژوهشی</label>
                            <div x-data="{
                                        researchActivitiesOutput: @json(old('researchActivitiesOutput', [])),
                                        otherPublicationsAvailable: {
                                            'کتاب': '{{ old('otherPublicationsAvailable')['کتاب'] ?? '' }}',
                                            'مقالات': '{{ old('otherPublicationsAvailable')['مقالات'] ?? '' }}',
                                            'همایش علمی': '{{ old('otherPublicationsAvailable')['همایش علمی'] ?? '' }}'
                                        }
                                    }" class="grid grid-cols-3 gap-4">

                                <!-- چک‌باکس برای کتاب -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        id="book"
                                        name="researchActivitiesOutput[]"
                                        value="کتاب"
                                        x-model="researchActivitiesOutput"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="book" class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        کتاب
                                    </label>
                                    <input
                                        x-transition
                                        type="text"
                                        placeholder="تعداد کتاب را وارد کنید"
                                        name="otherPublicationsAvailable[کتاب]"
                                        x-bind:required="researchActivitiesOutput.includes('کتاب')"
                                        x-show="researchActivitiesOutput.includes('کتاب')"
                                        x-model="otherPublicationsAvailable['کتاب']"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <!-- چک‌باکس برای مقالات -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        id="article"
                                        name="researchActivitiesOutput[]"
                                        value="مقالات"
                                        x-model="researchActivitiesOutput"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="article" class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        مقالات
                                    </label>
                                    <input
                                        x-transition
                                        type="text"
                                        placeholder="تعداد مقالات را وارد کنید"
                                        name="otherPublicationsAvailable[مقالات]"
                                        x-bind:required="researchActivitiesOutput.includes('مقالات')"
                                        x-show="researchActivitiesOutput.includes('مقالات')"
                                        x-model="otherPublicationsAvailable['مقالات']"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <!-- چک‌باکس برای همایش علمی -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        id="conference"
                                        name="researchActivitiesOutput[]"
                                        value="همایش علمی"
                                        x-model="researchActivitiesOutput"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="conference"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        همایش علمی
                                    </label>
                                    <input
                                        x-transition
                                        type="text"
                                        placeholder="تعداد همایش علمی را وارد کنید"
                                        name="otherPublicationsAvailable[همایش علمی]"
                                        x-bind:required="researchActivitiesOutput.includes('همایش علمی')"
                                        x-show="researchActivitiesOutput.includes('همایش علمی')"
                                        x-model="otherPublicationsAvailable['همایش علمی']"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                            </div>
                        </div>
                        {{--                        پژوهشکده‌های فعال (نام پژوهشکده‌ها)--}}
                        <div x-data="{ inputs: [''] }" class="space-y-4">
                            <label for="research_institute"
                                   class="block text-sm font-medium text-gray-900 dark:text-white">پژوهشکده‌های فعال
                                (نام
                                پژوهشکده‌ها)</label>

                            <div class="flex flex-col space-y-1">
                                <template x-for="(input, index) in inputs" :key="index">
                                    <div class="flex items-center mb-2">
                                        <input
                                            type="text"
                                            :name="'research_institutes[' + index + ']'"
                                            x-model="inputs[index]"
                                            placeholder="نام پژوهشکده فعال وارد کنید"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                </template>
                            </div>

                            <div class="flex items-center justify-center mt-4">
                                <button
                                    type="button"
                                    @click="inputs.push('')"
                                    class="px-4 py-2 text-white bg-green-500 rounded-lg focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    +
                                </button>
                            </div>
                        </div>
                        {{--                        گروه‌های پژوهشی فعال (نام گروه‌ها)--}}
                        <div x-data="{ inputs: [''] }" class="space-y-4">
                            <label for="research_group"
                                   class="block text-sm font-medium text-gray-900 dark:text-white">گروه‌های پژوهشی فعال
                                (نام
                                گروه‌ها)</label>

                            <div class="flex flex-col space-y-1">
                                <template x-for="(input, index) in inputs" :key="index">
                                    <div class="flex items-center mb-2">
                                        <input
                                            type="text"
                                            :name="'research_groups[' + index + ']'"
                                            x-model="inputs[index]"
                                            placeholder="نام گروه پژوهشی فعال وارد کنید"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                </template>
                            </div>

                            <div class="flex items-center justify-center mt-4">
                                <button
                                    type="button"
                                    @click="inputs.push('')"
                                    class="px-4 py-2 text-white bg-green-500 rounded-lg focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    +
                                </button>
                            </div>
                        </div>
                        {{--                        وضعیت پژوهشگران--}}
                        <div>
                            <label for=""
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                وضعیت پژوهشگران
                            </label>
                            <div x-data="{
        researchActivitiesOutput: @json(old('researchActivitiesOutput', [])),
        researchActivitiesCount: @json(old('researchActivitiesCount', []))
    }" class="grid grid-cols-3 gap-4">
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="researchActivitiesOutput[]"
                                        value="تمام وقت"
                                        x-model="researchActivitiesOutput"
                                        id="fullTime"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="fullTime"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">تمام
                                        وقت</label>
                                    <input
                                        x-transition
                                        type="number"
                                        placeholder="تعداد افراد تمام وقت را وارد کنید"
                                        name="researchActivitiesCount[fullTime]"
                                        x-show="researchActivitiesOutput.includes('تمام وقت')"
                                        x-model="researchActivitiesCount.fullTime"
                                        id="fullTimeCount"
                                        x-bind:required="researchActivitiesOutput.includes('تمام وقت')"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="researchActivitiesOutput[]"
                                        value="پاره وقت"
                                        x-model="researchActivitiesOutput"
                                        id="partTime"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="partTime"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">پاره
                                        وقت</label>
                                    <input
                                        x-transition
                                        type="number"
                                        placeholder="تعداد افراد پاره وقت را وارد کنید"
                                        name="researchActivitiesCount[partTime]"
                                        x-show="researchActivitiesOutput.includes('پاره وقت')"
                                        x-model="researchActivitiesCount.partTime"
                                        id="partTimeCount"
                                        x-bind:required="researchActivitiesOutput.includes('پاره وقت')"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="researchActivitiesOutput[]"
                                        value="ساعتی"
                                        x-model="researchActivitiesOutput"
                                        id="hourly"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="hourly"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">ساعتی</label>
                                    <input
                                        x-transition
                                        type="number"
                                        placeholder="تعداد افراد ساعتی را وارد کنید"
                                        name="researchActivitiesCount[hourly]"
                                        x-show="researchActivitiesOutput.includes('ساعتی')"
                                        x-model="researchActivitiesCount.hourly"
                                        id="hourlyCount"
                                        x-bind:required="researchActivitiesOutput.includes('ساعتی')"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="researchActivitiesOutput[]"
                                        value="پروژه ای"
                                        x-model="researchActivitiesOutput"
                                        id="projectBased"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="projectBased"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">پروژه
                                        ای</label>
                                    <input
                                        x-transition
                                        type="number"
                                        placeholder="تعداد افراد پروژه ای را وارد کنید"
                                        name="researchActivitiesCount[projectBased]"
                                        x-show="researchActivitiesOutput.includes('پروژه ای')"
                                        x-model="researchActivitiesCount.projectBased"
                                        id="projectBasedCount"
                                        x-bind:required="researchActivitiesOutput.includes('پروژه ای')"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="researchActivitiesOutput[]"
                                        value="سایر"
                                        x-model="researchActivitiesOutput"
                                        id="other"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="other" class="text-sm font-medium text-gray-900 dark:text-white mr-2">سایر
                                        افراد</label>
                                    <input
                                        x-transition
                                        type="number"
                                        placeholder="تعداد سایر افراد را وارد کنید"
                                        name="researchActivitiesCount[other]"
                                        x-show="researchActivitiesOutput.includes('سایر')"
                                        x-model="researchActivitiesCount.other"
                                        id="otherCount"
                                        x-bind:required="researchActivitiesOutput.includes('سایر')"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="researchActivitiesOutput[]"
                                        value="کادر/پرسنل (غیرپژوهشگر)"
                                        x-model="researchActivitiesOutput"
                                        id="nonResearcherStaff"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="nonResearcherStaff"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">کادر/پرسنل
                                        (غیرپژوهشگر)</label>
                                    <input
                                        x-transition
                                        type="number"
                                        placeholder="تعداد کادر/پرسنل (غیرپژوهشگر) را وارد کنید"
                                        name="researchActivitiesCount[nonResearcherStaff]"
                                        x-show="researchActivitiesOutput.includes('کادر/پرسنل (غیرپژوهشگر)')"
                                        x-model="researchActivitiesCount.nonResearcherStaff"
                                        id="nonResearcherStaffCount"
                                        x-bind:required="researchActivitiesOutput.includes('کادر/پرسنل (غیرپژوهشگر)')"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>
                        </div>
                        {{--                        منابع مالی واحد--}}
                        <div>
                            <label for="financial_resources"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                منابع مالی واحد
                            </label>
                            <div x-data="{
                                financialResources: @json(old('financialResources', [])),
                                otherFinancialResource: '{{ old('otherFinancialResource', '') }}'
                            }" class="grid grid-cols-4 gap-4">
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="financialResources[]"
                                        value="مؤسس"
                                        x-model="financialResources"
                                        id="founder"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="founder" class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        مؤسس
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="financialResources[]"
                                        value="خیرین"
                                        x-model="financialResources"
                                        id="donors"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="donors" class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        خیرین
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="financialResources[]"
                                        value="بودجه دولتی"
                                        x-model="financialResources"
                                        id="governmentBudget"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="governmentBudget"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        بودجه دولتی
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="financialResources[]"
                                        value="وقف یا اوقاف"
                                        x-model="financialResources"
                                        id="waqf"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="waqf" class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        وقف یا اوقاف
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="financialResources[]"
                                        value="فعالیت های پژوهشی"
                                        x-model="financialResources"
                                        id="researchActivities"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="researchActivities"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        فعالیت های پژوهشی
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="financialResources[]"
                                        value="سایر"
                                        x-model="financialResources"
                                        @change="if (!financialResources.includes('سایر')) otherFinancialResource = ''"
                                        id="otherFinancialResource"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="otherFinancialResource"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        سایر
                                    </label>
                                    <input
                                        x-transition
                                        type="text"
                                        placeholder="سایر منابع مالی واحد را وارد کنید"
                                        name="otherFinancialResource"
                                        x-bind:required="financialResources.includes('سایر')"
                                        x-show="financialResources.includes('سایر')"
                                        x-model="otherFinancialResource"
                                        id="otherFinancialResource"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                            </div>
                        </div>
                        {{--                        ساختار و تشکیلات--}}
                        <div>
                            <label for="structure_and_organization"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                ساختار و تشکیلات
                            </label>
                            <div x-data="{
                                financialResources: @json(old('financialResources', []))
                            }" class="grid grid-cols-4 gap-4">

                                <!-- مؤسس/هیأت مؤسس -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="financialResources[]"
                                        value="مؤسس/هیأت مؤسس"
                                        x-model="financialResources"
                                        id="founder"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="founder" class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        مؤسس/هیأت مؤسس
                                    </label>
                                </div>

                                <!-- هیأت امنا -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="financialResources[]"
                                        value="هیأت امنا"
                                        x-model="financialResources"
                                        id="board_of_trustees"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="board_of_trustees"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        هیأت امنا
                                    </label>
                                </div>

                                <!-- رئیس -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="financialResources[]"
                                        value="رئیس"
                                        x-model="financialResources"
                                        id="president"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="president"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        رئیس
                                    </label>
                                </div>

                                <!-- شورای پژوهش -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="financialResources[]"
                                        value="شورای پژوهش"
                                        x-model="financialResources"
                                        id="research_council"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="research_council"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        شورای پژوهش
                                    </label>
                                </div>
                            </div>
                        </div>
                        {{--                        وضعیت ملکی محل استقرار واحد پژوهشی--}}
                        <div>
                            <label for="building_status"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                وضعیت ملکی محل استقرار واحد پژوهشی:
                            </label>
                            <div x-data="{
            buildingStatus: @json(old('buildingStatus', [])),
            otherBuildingStatus: '{{ old('otherBuildingStatus', '') }}'
        }" class="grid grid-cols-4 gap-4">

                                <!-- ملکی -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="buildingStatus[]"
                                        value="ملکی"
                                        x-model="buildingStatus"
                                        id="property_status"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="property_status"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        ملکی
                                    </label>
                                </div>

                                <!-- استیجاری -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="buildingStatus[]"
                                        value="استیجاری"
                                        x-model="buildingStatus"
                                        id="rental_status"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="rental_status"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        استیجاری
                                    </label>
                                </div>

                                <!-- در اختیار -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="buildingStatus[]"
                                        value="در اختیار"
                                        x-model="buildingStatus"
                                        id="in_use_status"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="in_use_status"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        در اختیار
                                    </label>
                                </div>

                                <!-- وقف -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="buildingStatus[]"
                                        value="وقفی"
                                        x-model="buildingStatus"
                                        id="waqf_status"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="waqf_status"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        وقف
                                    </label>
                                </div>

                                <!-- سازمانی -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="buildingStatus[]"
                                        value="سازمانی"
                                        x-model="buildingStatus"
                                        id="organizational_status"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="organizational_status"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        سازمانی
                                    </label>
                                </div>

                                <!-- سایر -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="buildingStatus[]"
                                        value="سایر"
                                        x-model="buildingStatus"
                                        @change="if (!buildingStatus.includes('سایر')) otherBuildingStatus = ''"
                                        id="other_building_status"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="other_building_status"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        سایر
                                    </label>
                                    <input
                                        x-transition
                                        type="text"
                                        placeholder="وضعیت ملکی دیگر را وارد کنید"
                                        name="otherBuildingStatus"
                                        x-bind:required="buildingStatus.includes('سایر')"
                                        x-show="buildingStatus.includes('سایر')"
                                        x-model="otherBuildingStatus"
                                        id="other_building_status_input"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                            </div>
                        </div>
                        {{--                        وضعیت کتابخانه--}}
                        <div>
                            <label for="library_status"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                وضعیت کتابخانه
                            </label>
                            <div x-data="{
            libraryStatus: @json(old('libraryStatus', []))
        }" class="grid grid-cols-4 gap-4">

                                <!-- تخصصی -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="libraryStatus[]"
                                        value="تخصصی"
                                        x-model="libraryStatus"
                                        id="specialized_library"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="specialized_library"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        تخصصی
                                    </label>
                                </div>

                                <!-- عمومی -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="libraryStatus[]"
                                        value="عمومی"
                                        x-model="libraryStatus"
                                        id="public_library"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="public_library"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        عمومی
                                    </label>
                                </div>

                                <!-- دیجیتال -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="libraryStatus[]"
                                        value="دیجیتال"
                                        x-model="libraryStatus"
                                        id="digital_library"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="digital_library"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        دیجیتال
                                    </label>
                                </div>

                            </div>
                        </div>
                        {{--                        امکانات ساختمانی--}}
                        <div>
                            <label for="building_facilities"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                امکانات ساختمانی
                            </label>
                            <div x-data="{
            buildingFacilities: @json(old('buildingFacilities', [])),
            otherBuildingFacilities: '{{ old('otherBuildingFacilities', '') }}'
        }" class="grid grid-cols-4 gap-4">

                                <!-- سالن جلسات -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="buildingFacilities[]"
                                        value="سالن جلسات"
                                        x-model="buildingFacilities"
                                        id="meeting_room"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="meeting_room"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        سالن جلسات
                                    </label>
                                </div>

                                <!-- اتاق رئیس -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="buildingFacilities[]"
                                        value="اتاق رئیس"
                                        x-model="buildingFacilities"
                                        id="president_room"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="president_room"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        اتاق رئیس
                                    </label>
                                </div>

                                <!-- اتاق مدیران گروه ها -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="buildingFacilities[]"
                                        value="اتاق مدیران گروه ها"
                                        x-model="buildingFacilities"
                                        id="group_managers_room"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="group_managers_room"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        اتاق مدیران گروه ها
                                    </label>
                                </div>

                                <!-- اتاق پژوهشگران -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="buildingFacilities[]"
                                        value="اتاق پژوهشگران"
                                        x-model="buildingFacilities"
                                        id="researchers_room"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="researchers_room"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        اتاق پژوهشگران
                                    </label>
                                </div>

                                <!-- سایر -->
                                <div class="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="buildingFacilities[]"
                                        value="سایر"
                                        x-model="buildingFacilities"
                                        @change="if (!buildingFacilities.includes('سایر')) otherBuildingFacilities = ''"
                                        id="other_building_facility"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <label for="other_building_facility"
                                           class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                        سایر
                                    </label>
                                    <input
                                        x-transition
                                        type="text"
                                        placeholder="امکانات ساختمانی دیگر را وارد کنید"
                                        name="otherBuildingFacilities"
                                        x-bind:required="buildingFacilities.includes('سایر')"
                                        x-show="buildingFacilities.includes('سایر')"
                                        x-model="otherBuildingFacilities"
                                        id="other_building_facility_input"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                {{--                اطلاعات شعبه--}}
                <div class="mt-2" x-data="{ hasPermission: false, licensingAuthority: false }">
                    <h1 class="text-xl font-bold mb-4">اطلاعات شعبه</h1>
                    <div class="grid gap-6 mb-6 md:grid-cols-1">
                        <!-- وضعیت مجوز -->
                        <div>
                            <label for="license_status"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">وضعیت مجوز شعبه
                            </label>
                            <select id="license_status" name="license_status"
                                    @change="hasPermission = ($event.target.value === 'دارد'); licensingAuthority = hasPermission"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                <option value="" disabled selected>انتخاب کنید</option>
                                <option value="دارد">دارد</option>
                                <option value="ندارد">ندارد</option>
                            </select>
                        </div>

                        <!-- نام کشور محل استقرار شعبه -->
                        <div x-show="licensingAuthority" x-transition>
                            <label for="country_name"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام کشور محل
                                استقرار شعبه
                            </label>
                            <input id="country_name" type="text" name="country_name" value="{{ old('country_name') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   x-bind:required="licensingAuthority"
                                   placeholder="نام کشور را وارد کنید">
                        </div>

                        <!-- نام استان محل استقرار شعبه -->
                        <div x-show="licensingAuthority" x-transition>
                            <label for="province_name"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام استان محل
                                استقرار شعبه
                            </label>
                            <input id="province_name" type="text" name="province_name"
                                   value="{{ old('province_name') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   x-bind:required="licensingAuthority"
                                   placeholder="نام استان را وارد کنید" required>
                        </div>

                        <!-- نشانی شعبه -->
                        <div x-show="licensingAuthority" x-transition>
                            <label for="branch_address"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نشانی شعبه
                            </label>
                            <input id="branch_address" type="text" name="branch_address"
                                   value="{{ old('branch_address') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   x-bind:required="licensingAuthority"
                                   placeholder="نشانی شعبه را وارد کنید" required>
                        </div>

                    </div>
                </div>
                <hr>
                {{--                راه های ارتباطی--}}
                <div class="mt-2">
                    <h1 class="text-xl font-bold mb-4">راه های ارتباطی</h1>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <!-- صندوق پستی -->
                        <div>
                            <label for="postal_box"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">صندوق پستی
                            </label>
                            <input id="postal_box" type="text" name="postal_box" value="{{ old('postal_box') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="صندوق پستی را وارد کنید">
                        </div>

                        <!-- ایمیل -->
                        <div>
                            <label for="email"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ایمیل
                            </label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="ایمیل را وارد کنید">
                        </div>

                        <!-- دورنگار -->
                        <div>
                            <label for="fax"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">دورنگار
                            </label>
                            <input id="fax" type="text" name="fax" value="{{ old('fax') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="دورنگار را وارد کنید">
                        </div>

                        <!-- پایگاه اینترنتی -->
                        <div>
                            <label for="website"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">پایگاه اینترنتی
                            </label>
                            <input id="website" type="url" name="website" value="{{ old('website') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="پایگاه اینترنتی را وارد کنید">
                        </div>

                        <!-- کدپستی -->
                        <div>
                            <label for="postal_code"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">کدپستی
                            </label>
                            <input id="postal_code" type="text" name="postal_code" value="{{ old('postal_code') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="کدپستی را وارد کنید">
                        </div>

                        <!-- تلفن ثابت/همراه -->
                        <div>
                            <label for="phone"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">تلفن ثابت/همراه
                            </label>
                            <input id="phone" type="text" name="phone" value="{{ old('phone') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="تلفن ثابت/همراه را وارد کنید">
                        </div>

                        <!-- نشانی واحد/مرکزی -->
                        <div>
                            <label for="phone"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نشانی واحد/مرکزی
                            </label>
                            <input id="address" type="text" name="address" value="{{ old('address') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder=" نشانی واحد/مرکزی را وارد کنید">
                        </div>
                    </div>
                </div>
                <hr>
                {{--                فضای مجازی در اختیار--}}
                <div class="mt-2">
                    <h1 class="text-xl font-bold mb-4">فضای مجازی در اختیار</h1>
                    <div x-data="{
                    socialMediaOptions: ['ایتا', 'سروش', 'آی گپ', 'بله'],
                    selectedSocialMediaOptions: @json(old('selectedSocialMediaOptions', [])),
                    socialMediaIds: @json(old('socialMediaIds', []))
                }" class="grid grid-cols-3 gap-4">
                        <template x-for="option in socialMediaOptions" :key="option">
                            <div class="flex items-center">
                                <!-- Checkbox -->
                                <input
                                    type="checkbox"
                                    :name="`selectedSocialMediaOptions[]`"
                                    :value="option"
                                    x-model="selectedSocialMediaOptions"
                                    :id="`checkbox_${option}`"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <label :for="`checkbox_${option}`"
                                       class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                    <span x-text="option"></span>
                                </label>
                                <!-- Input for ID -->
                                <input
                                    x-transition
                                    type="text"
                                    placeholder="آیدی را وارد کنید"
                                    :name="`socialMediaIds[${option}]`"
                                    x-show="selectedSocialMediaOptions.includes(option)"
                                    x-model="socialMediaIds[option]"
                                    :id="`id_${option}`"
                                    :required="selectedSocialMediaOptions.includes(option)"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </template>
                    </div>
                </div>
            </div>
            <div class="text-left mt-3">
                <button type="submit"
                        class="px-4 py-2 mr-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300 GetPersonEquipmentsReport">
                    ارسال کاربرگ
                </button>
            </div>
        </form>
    </div>
</div>
