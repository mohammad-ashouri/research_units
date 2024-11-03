<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //catalogs
        Permission::create(['name' => 'دسترسی به منوی مقادیر اولیه']);
        Permission::create(['name' => 'دسترسی به منوی اطلاعات واحد']);
        Permission::create(['name' => 'دسترسی به منوی کاربرگ اطلاعات واحد']);
        Permission::create(['name' => 'دسترسی به منوی کاربرگ اطلاعات کلی']);

        Permission::create(['name' => 'لیست نقش ها']);
        Permission::create(['name' => 'ایجاد نقش']);
        Permission::create(['name' => 'ویرایش نقش']);
        Permission::create(['name' => 'نمایش جزئیات نقش']);
        Permission::create(['name' => 'حذف نقش']);
        Permission::create(['name' => 'دسترسی به منوی نقش های کاربری']);

        Permission::create(['name' => 'لیست دسترسی ها']);
        Permission::create(['name' => 'ایجاد دسترسی']);
        Permission::create(['name' => 'ویرایش دسترسی']);
        Permission::create(['name' => 'نمایش جزئیات دسترسی']);
        Permission::create(['name' => 'حذف دسترسی']);
        Permission::create(['name' => 'دسترسی به منوی دسترسی ها']);

        //Users Manager
        Permission::create(['name' => 'لیست کاربران']);
        Permission::create(['name' => 'ایجاد کاربر']);
        Permission::create(['name' => 'ویرایش کاربر']);
        Permission::create(['name' => 'تغییر وضعیت کاربر']);
        Permission::create(['name' => 'تغییر وضعیت نیازمند به تغییر رمز عبور']);
        Permission::create(['name' => 'بازنشانی رمز عبور کاربر']);
        Permission::create(['name' => 'جستجوی کاربر']);
        Permission::create(['name' => 'دسترسی به منوی مدیریت کاربران']);

        //Users Manager
        Permission::create(['name' => 'لیست بکاپ دیتابیس']);
        Permission::create(['name' => 'ایجاد بکاپ دیتابیس']);
        Permission::create(['name' => 'دسترسی به منوی بکاپ دیتابیس']);

        //Website settings

        Permission::create(['name' => 'telescope']);

        $superAdminRole = Role::create(['name' => 'ادمین کل']);
        $technicalLiaisonRole = Role::create(['name' => 'رابط فنی']);
        $superAdminRole->givePermissionTo([
            'telescope',
            'لیست نقش ها',
            'ایجاد نقش',
            'ویرایش نقش',
            'نمایش جزئیات نقش',
            'حذف نقش',
            'لیست دسترسی ها',
            'ایجاد دسترسی',
            'ویرایش دسترسی',
            'نمایش جزئیات دسترسی',
            'حذف دسترسی',
            'لیست کاربران',
            'ایجاد کاربر',
            'ویرایش کاربر',
            'تغییر وضعیت کاربر',
            'تغییر وضعیت نیازمند به تغییر رمز عبور',
            'بازنشانی رمز عبور کاربر',
            'جستجوی کاربر',
            'لیست بکاپ دیتابیس',
            'ایجاد بکاپ دیتابیس',
            'دسترسی به منوی مدیریت کاربران',
            'دسترسی به منوی دسترسی ها',
            'دسترسی به منوی نقش های کاربری',
            'دسترسی به منوی بکاپ دیتابیس',
            'دسترسی به منوی اطلاعات واحد',
        ]);
        $technicalLiaisonRole->givePermissionTo([
            'دسترسی به منوی کاربرگ اطلاعات کلی',
            'دسترسی به منوی کاربرگ اطلاعات واحد',
            'دسترسی به منوی اطلاعات واحد',
        ]);

        $role = Role::where('name', 'ادمین کل')->first();
        $user = User::whereId(1)->first();
        $user->assignRole([$role->id]);

        $role = Role::where('name', 'رابط فنی')->first();
        $user = User::whereId(2)->first();
        $user->assignRole([$role->id]);
    }
}
