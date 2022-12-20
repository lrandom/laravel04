<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller implements ICrud
{
    public function list()
    {
        // TODO: Implement list() method.
        $list = User::all();
        return view('admin.user.list', compact('list'));
    }

    public function create()
    {
        // TODO: Implement create() method.
        return view('admin.user.create');
    }

    public function doCreate(Request $request)
    {
        // TODO: Implement doAdd() method.
        $data = $request->all();
        unset($data['_token']);
        $data['password'] = Hash::make($data['password']);
        try {
            User::create($data);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
        return redirect()->back()->with('success', 'Thêm mới thành công');
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $obj = User::find($id);
        return view('admin.user.edit', compact('obj'));
    }

    public function doEdit($id,Request $request)
    {
        // TODO: Implement doEdit() method.
        $data = $request->all();
        unset($data['_token']);
        $data['password'] = Hash::make($data['password']);
        try {
            User::where('id', $id)->update($data);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
        return redirect()->back()->with('success', 'Sửa thành công');
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        User::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }

}
