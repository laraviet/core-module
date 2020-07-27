<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Entities\Label;

class LabelTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $module = 'core';
        Label::where('module', $module)->delete();

        $labels = [
            ["key" => "home", "vi" => ["value" => "Trang chủ"], "en" => ["value" => "Home"]],
            ["key" => "name", "vi" => ["value" => "Tên"], "en" => ["value" => "Name"]],
            ["key" => "email", "vi" => ["value" => "Email"], "en" => ["value" => "Email"]],
            ["key" => "avatar", "vi" => ["value" => "Avatar"], "en" => ["value" => "Avatar"]],
            ["key" => "action", "vi" => ["value" => "Hành động"], "en" => ["value" => "Action"]],
            ["key" => "search", "vi" => ["value" => "Tìm kiếm"], "en" => ["value" => "Search"]],
            ["key" => "user", "vi" => ["value" => "Người dùng"], "en" => ["value" => "User"]],
            ["key" => "create", "vi" => ["value" => "Tạo mới"], "en" => ["value" => "Create"]],
            ["key" => "create_new", "vi" => ["value" => "Tạo mới"], "en" => ["value" => "Create New"]],
            ["key" => "create_success", "vi" => ["value" => "được tạo mới thành công"], "en" => ["value" => "Create Success"]],
            ["key" => "add", "vi" => ["value" => "Thêm mới"], "en" => ["value" => "Add"]],
            ["key" => "add_new", "vi" => ["value" => "Thêm mới"], "en" => ["value" => "Add New"]],
            ["key" => "edit", "vi" => ["value" => "Sửa"], "en" => ["value" => "Edit"]],
            ["key" => "update", "vi" => ["value" => "Cập nhật"], "en" => ["value" => "Update"]],
            ["key" => "update_success", "vi" => ["value" => "được cập nhật thành công"], "en" => ["value" => "Update Success"]],
            ["key" => "delete", "vi" => ["value" => "Xóa"], "en" => ["value" => "Delete"]],
            ["key" => "delete_confirm", "vi" => ["value" => "Bạn có thực sự muốn xóa item này không?"], "en" => ["value" => "Are you sure want to delete this item?"]],
            ["key" => "delete_success", "vi" => ["value" => "được xóa thành công"], "en" => ["value" => "delete success"]],
            ["key" => "label", "vi" => ["value" => "Nhãn"], "en" => ["value" => "Label"]],
            ["key" => "password", "vi" => ["value" => "Mật khẩu"], "en" => ["value" => "Pasword"]],
            ["key" => "remember_me", "vi" => ["value" => "Lưu đăng nhập"], "en" => ["value" => "Remember Me"]],
            ["key" => "login", "vi" => ["value" => "Đăng nhập"], "en" => ["value" => "Login"]],
            ["key" => "register", "vi" => ["value" => "Đăng ký"], "en" => ["value" => "Register"]],
            ["key" => "signup_now", "vi" => ["value" => "Đăng ký ngay"], "en" => ["value" => "Signup Now"]],
            ["key" => "confirm_password", "vi" => ["value" => "Xác nhận mật khẩu"], "en" => ["value" => "Confirm Password"]],
            ["key" => "enter", "vi" => ["value" => "Thêm"], "en" => ["value" => "Enter"]],
            ["key" => "logout", "vi" => ["value" => "Đăng xuất"], "en" => ["value" => "Logout"]],
            ["key" => "problem_msg", "vi" => ["value" => "Có một vài vấn đề với form nhập liệu của bạn."], "en" => ["value" => "There is some problems with your forms."]],
            ["key" => "detail", "vi" => ["value" => "Chi tiết"], "en" => ["value" => "Detail"]],
            ["key" => "contact", "vi" => ["value" => "Liên hệ"], "en" => ["value" => "Contact"]],
            ["key" => "key", "vi" => ["value" => "Key"], "en" => ["value" => "Key"]],
            ["key" => "value", "vi" => ["value" => "Giá trị"], "en" => ["value" => "Value"]],
            ["key" => "complete", "vi" => ["value" => "Hoàn thành"], "en" => ["value" => "Complete"]],
            ["key" => "no_account", "vi" => ["value" => "Chưa có tài khoản?"], "en" => ["value" => "Don't have an account?"]],
            ["key" => "has_account", "vi" => ["value" => "Đã có tài khoản?"], "en" => ["value" => "Already have an account?"]],
            ["key" => "forgot_pwd", "vi" => ["value" => "Quên mật khẩu?"], "en" => ["value" => "Forgot your password?"]],
            ["key" => "reset_pwd", "vi" => ["value" => "Đặt lại mật khẩu."], "en" => ["value" => "Reset Password"]],
            ["key" => "send_reset_pwd_email", "vi" => ["value" => "Gửi link đặt lại mật khẩu"], "en" => ["value" => "Send Password Reset Link"]],
            ["key" => "role", "vi" => ["value" => "Vai trò"], "en" => ["value" => "Role"]],
            ["key" => "permission", "vi" => ["value" => "Quyền"], "en" => ["value" => "Permission"]],
            ["key" => "user_management", "vi" => ["value" => "Quản lý người dùng"], "en" => ["value" => "User Management"]],
            ["key" => "status", "vi" => ["value" => "Trạng thái"], "en" => ["value" => "Status"]],
            ["key" => "parent", "vi" => ["value" => "Parent"], "en" => ["value" => "Parent"]],
            ["key" => "description", "vi" => ["value" => "Mô tả"], "en" => ["value" => "Description"]],
            ["key" => "active", "vi" => ["value" => "Active"], "en" => ["value" => "Active"]],
            ["key" => "inactive", "vi" => ["value" => "Inactive"], "en" => ["value" => "Inactive"]],
            ["key" => "thumbnail", "vi" => ["value" => "Thumbnail"], "en" => ["value" => "Thumbnail"]],
            ["key" => "ecommerce", "vi" => ["value" => "Ecommerce"], "en" => ["value" => "Ecommerce"]],
        ];

        foreach ($labels as $label) {
            $label['module'] = $module;
            Label::create($label);
        }

        $this->enableForeignKeys();
    }
}
