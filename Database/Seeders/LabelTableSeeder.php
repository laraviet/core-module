<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;
use Modules\Core\Entities\Label;

class LabelTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

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
            ["key" => "home", "value" => "Trang chủ", "en" => [
                "value" => "Home",
            ]],
            ["key" => "name", "value" => "Tên", "en" => [
                "value" => "Name",
            ]],
            ["key" => "email", "value" => "Email", "en" => [
                "value" => "Email",
            ]],
            ["key" => "action", "value" => "Hành động", "en" => [
                "value" => "Action",
            ]],
            ["key" => "search", "value" => "Tìm kiếm", "en" => [
                "value" => "Search",
            ]],
            ["key" => "user", "value" => "Người dùng", "en" => [
                "value" => "User",
            ]],
            ["key" => "create", "value" => "Tạo mới", "en" => [
                "value" => "Create",
            ]],
            ["key" => "create_new", "value" => "Tạo mới", "en" => [
                "value" => "Create New",
            ]],
            ["key" => "create_success", "value" => "được tạo mới thành công", "en" => [
                "value" => "Create Success",
            ]],
            ["key" => "add", "value" => "Thêm mới", "en" => [
                "value" => "Add",
            ]],
            ["key" => "add_new", "value" => "Thêm mới", "en" => [
                "value" => "Add New",
            ]],
            ["key" => "edit", "value" => "Sửa", "en" => [
                "value" => "Edit",
            ]],
            ["key" => "update", "value" => "Cập nhật", "en" => [
                "value" => "Update",
            ]],
            ["key" => "update_success", "value" => "được cập nhật thành công", "en" => [
                "value" => "Update Success",
            ]],
            ["key" => "delete", "value" => "Xóa", "en" => [
                "value" => "Delete",
            ]],
            ["key" => "delete_confirm", "value" => "Bạn có thực sự muốn xóa item này không?", "en" => [
                "value" => "Are you sure want to delete this item?",
            ]],
            ["key" => "delete_success", "value" => "được xóa thành công", "en" => [
                "value" => "delete success",
            ]],
            ["key" => "label", "value" => "Nhãn", "en" => [
                "value" => "Label",
            ]],
            ["key" => "password", "value" => "Mật khẩu", "en" => [
                "value" => "Pasword",
            ]],
            ["key" => "remember_me", "value" => "Lưu đăng nhập", "en" => [
                "value" => "Remember Me",
            ]],
            ["key" => "login", "value" => "Đăng nhập", "en" => [
                "value" => "Login",
            ]],
            ["key" => "register", "value" => "Đăng ký", "en" => [
                "value" => "Register",
            ]],
            ["key" => "confirm_password", "value" => "Xác nhận mật khẩu", "en" => [
                "value" => "Confirm Password",
            ]],
            ["key" => "enter", "value" => "Thêm", "en" => [
                "value" => "Enter",
            ]],
            ["key" => "logout", "value" => "Đăng xuất", "en" => [
                "value" => "Logout",
            ]],
            ["key" => "problem_msg", "value" => "Có một vài vấn đề với form nhập liệu của bạn.", "en" => [
                "value" => "There is some problems with your forms.",
            ]],
            ["key" => "detail", "value" => "Chi tiết", "en" => [
                "value" => "Detail",
            ]],
            ["key" => "contact", "value" => "Liên hệ", "en" => [
                "value" => "Contact",
            ]],
            ["key" => "key", "value" => "Key", "en" => [
                "value" => "Key",
            ]],
            ["key" => "value", "value" => "Giá trị", "en" => [
                "value" => "Value",
            ]],
            ["key" => "complete", "value" => "Hoàn thành", "en" => [
                "value" => "Complete",
            ]],
        ];
        //


        foreach ($labels as $label) {
            $label['module'] = $module;
            Label::create($label);
        }

        $this->enableForeignKeys();
    }
}
