<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller implements ICrud
{
    public function list()
    {
        // TODO: Implement list() method.
        $list = Post::all();
        return view('admin.post.list', compact('list'));
    }

    public function create()
    {
        // TODO: Implement create() method.
        $categories = Post::all();
        return view('admin.post.create', compact('categories'));
    }

    public function doCreate(Request $request)
    {
        // TODO: Implement doAdd() method.
        $data = $request->all();
        unset($data['_token']);
        try {
            Post::create($data);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
        return redirect()->back()->with('success', 'Thêm mới thành công');
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $obj = Post::find($id);
        $categories = Post::where('id', '<>', $id)->get();
        return view('admin.post.edit', compact('obj', 'categories'));
    }

    public function doEdit($id, Request $request)
    {
        // TODO: Implement doEdit() method.
        $data = $request->all();
        unset($data['_token']);

        try {
            Post::where('id', $id)->update($data);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
        return redirect()->back()->with('success', 'Sửa thành công');
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        Post::where('id', $id)->delete();
        Post::orderBy('created_at', 'desc')->limit(12)->get();
        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
