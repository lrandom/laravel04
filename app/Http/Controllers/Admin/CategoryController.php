<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller implements ICrud
{
    public function list()
    {
        // TODO: Implement list() method.
        $list = Category::all();
        return view('admin.category.list', compact('list'));
    }

    public function create()
    {
        // TODO: Implement create() method.
        $categories = Category::all();
        return view('admin.category.create', compact('categories'));
    }

    public function doCreate(Request $request)
    {
        // TODO: Implement doAdd() method.
        Storage::disk('public')->move($request->file('image')
            ->store('images'),
            'images/' . $request->file('image')->getClientOriginalName());
        $data = $request->all();
        unset($data['_token']);
        try {
            Category::create($data);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
        return redirect()->back()->with('success', 'Thêm mới thành công');
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $obj = Category::find($id);
        $categories = Category::where('id', '<>', $id)->get();
        return view('admin.category.edit', compact('obj', 'categories'));
    }

    public function doEdit($id, Request $request)
    {
        // TODO: Implement doEdit() method.
        $data = $request->all();
        unset($data['_token']);

        try {
            Category::where('id', $id)->update($data);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
        return redirect()->back()->with('success', 'Sửa thành công');
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        Category::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }

}
