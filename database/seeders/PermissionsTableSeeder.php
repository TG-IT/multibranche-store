<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'invoice_product_create',
            ],
            [
                'id'    => 24,
                'title' => 'invoice_product_edit',
            ],
            [
                'id'    => 25,
                'title' => 'invoice_product_show',
            ],
            [
                'id'    => 26,
                'title' => 'invoice_product_delete',
            ],
            [
                'id'    => 27,
                'title' => 'invoice_product_access',
            ],
            [
                'id'    => 28,
                'title' => 'discount_create',
            ],
            [
                'id'    => 29,
                'title' => 'discount_edit',
            ],
            [
                'id'    => 30,
                'title' => 'discount_show',
            ],
            [
                'id'    => 31,
                'title' => 'discount_delete',
            ],
            [
                'id'    => 32,
                'title' => 'discount_access',
            ],
            [
                'id'    => 33,
                'title' => 'product_create',
            ],
            [
                'id'    => 34,
                'title' => 'product_edit',
            ],
            [
                'id'    => 35,
                'title' => 'product_show',
            ],
            [
                'id'    => 36,
                'title' => 'product_delete',
            ],
            [
                'id'    => 37,
                'title' => 'product_access',
            ],
            [
                'id'    => 38,
                'title' => 'branch_create',
            ],
            [
                'id'    => 39,
                'title' => 'branch_edit',
            ],
            [
                'id'    => 40,
                'title' => 'branch_show',
            ],
            [
                'id'    => 41,
                'title' => 'branch_delete',
            ],
            [
                'id'    => 42,
                'title' => 'branch_access',
            ],
            [
                'id'    => 43,
                'title' => 'order_create',
            ],
            [
                'id'    => 44,
                'title' => 'order_edit',
            ],
            [
                'id'    => 45,
                'title' => 'order_show',
            ],
            [
                'id'    => 46,
                'title' => 'order_delete',
            ],
            [
                'id'    => 47,
                'title' => 'order_access',
            ],
            [
                'id'    => 48,
                'title' => 'product_return_create',
            ],
            [
                'id'    => 49,
                'title' => 'product_return_edit',
            ],
            [
                'id'    => 50,
                'title' => 'product_return_show',
            ],
            [
                'id'    => 51,
                'title' => 'product_return_delete',
            ],
            [
                'id'    => 52,
                'title' => 'product_return_access',
            ],
            [
                'id'    => 53,
                'title' => 'expanse_create',
            ],
            [
                'id'    => 54,
                'title' => 'expanse_edit',
            ],
            [
                'id'    => 55,
                'title' => 'expanse_show',
            ],
            [
                'id'    => 56,
                'title' => 'expanse_delete',
            ],
            [
                'id'    => 57,
                'title' => 'expanse_access',
            ],
            [
                'id'    => 58,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 59,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 60,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 61,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 62,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 63,
                'title' => 'order_product_create',
            ],
            [
                'id'    => 64,
                'title' => 'order_product_edit',
            ],
            [
                'id'    => 65,
                'title' => 'order_product_show',
            ],
            [
                'id'    => 66,
                'title' => 'order_product_delete',
            ],
            [
                'id'    => 67,
                'title' => 'order_product_access',
            ],
            [
                'id'    => 68,
                'title' => 'supplier_create',
            ],
            [
                'id'    => 69,
                'title' => 'supplier_edit',
            ],
            [
                'id'    => 70,
                'title' => 'supplier_show',
            ],
            [
                'id'    => 71,
                'title' => 'supplier_delete',
            ],
            [
                'id'    => 72,
                'title' => 'supplier_access',
            ],
            [
                'id'    => 73,
                'title' => 'sync_log_create',
            ],
            [
                'id'    => 74,
                'title' => 'sync_log_edit',
            ],
            [
                'id'    => 75,
                'title' => 'sync_log_show',
            ],
            [
                'id'    => 76,
                'title' => 'sync_log_delete',
            ],
            [
                'id'    => 77,
                'title' => 'sync_log_access',
            ],
            [
                'id'    => 78,
                'title' => 'applied_discount_create',
            ],
            [
                'id'    => 79,
                'title' => 'applied_discount_edit',
            ],
            [
                'id'    => 80,
                'title' => 'applied_discount_show',
            ],
            [
                'id'    => 81,
                'title' => 'applied_discount_delete',
            ],
            [
                'id'    => 82,
                'title' => 'applied_discount_access',
            ],
            [
                'id'    => 83,
                'title' => 'invoice_create',
            ],
            [
                'id'    => 84,
                'title' => 'invoice_edit',
            ],
            [
                'id'    => 85,
                'title' => 'invoice_show',
            ],
            [
                'id'    => 86,
                'title' => 'invoice_delete',
            ],
            [
                'id'    => 87,
                'title' => 'invoice_access',
            ],
            [
                'id'    => 88,
                'title' => 'customer_create',
            ],
            [
                'id'    => 89,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 90,
                'title' => 'customer_show',
            ],
            [
                'id'    => 91,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 92,
                'title' => 'customer_access',
            ],
            [
                'id'    => 93,
                'title' => 'developer_item_access',
            ],
            [
                'id'    => 94,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 95,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 96,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 97,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 98,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 99,
                'title' => 'product_managment_access',
            ],
            [
                'id'    => 100,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 101,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
