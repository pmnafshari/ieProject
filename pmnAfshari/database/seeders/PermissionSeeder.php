<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::query()->insert([
            /*branch */
            ['title'=>'create_branch',
            'label'=>'ایجاد شاخه ی خدمت'],

            ['title'=>'read_branch',
                'label'=>'مشاهده شاخه ی خدمت'],

            ['title'=>'update_branch',
                'label'=>'ویرایش شاخه ی خدمت'],

            ['title'=>'delete_branch',
                'label'=>'حذف شاخه ی خدمت'],

            /*service */
            ['title'=>'create_service',
                'label'=>'ایجاد خدمت'],

            ['title'=>'read_service',
                'label'=>'مشاهده خدمت'],

            ['title'=>'update_service',
                'label'=>'ویرایش خدمت'],

            ['title'=>'delete_service',
                'label'=>'حذف خدمت'],

 /*partner */
            ['title'=>'create_partner',
                'label'=>'ایجاد همکار'],

            ['title'=>'read_partner',
                'label'=>'مشاهده همکار'],

            ['title'=>'update_partner',
                'label'=>'ویرایش همکار'],

            ['title'=>'delete_partner',
                'label'=>'حذف همکار'],


 /*provider */
            ['title'=>'create_provider',
                'label'=>'ایجاد ارایه دهنده'],

            ['title'=>'read_provider',
                'label'=>'مشاهده ارایه دهنده'],

            ['title'=>'update_provider',
                'label'=>'ویرایش ارایه دهنده'],

            ['title'=>'delete_provider',
                'label'=>'حذف ارایه دهنده'],


 /* user*/
            ['title'=>'create_user',
                'label'=>'ایجاد کاربر'],

            ['title'=>'read_user',
                'label'=>'مشاهده کاربر'],

            ['title'=>'update_user',
                'label'=>'ویرایش کاربر'],

            ['title'=>'delete_user',
                'label'=>'حذف کاربر'],

 /* discount*/
            ['title'=>'create_discount',
                'label'=>'ایجاد کاربر'],

            ['title'=>'read_discount',
                'label'=>'مشاهده کاربر'],

            ['title'=>'update_discount',
                'label'=>'ویرایش کاربر'],

            ['title'=>'delete_discount',
                'label'=>'حذف کاربر'],


        ]);
    }
}
