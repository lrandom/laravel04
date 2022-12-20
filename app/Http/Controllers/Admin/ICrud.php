<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

interface ICrud
{
    //list data
    public function list();

    //show giao diện thêm mới
    public function create();

    //thực hiện việc thêm
    public function doCreate(Request $request);

    //show giao diện sửa
    public function edit($id);

    //thực hiện việc sửa
    public function doEdit($id,Request $request);

    //thực hiện việc xoá
    public function delete($id);
}

?>
