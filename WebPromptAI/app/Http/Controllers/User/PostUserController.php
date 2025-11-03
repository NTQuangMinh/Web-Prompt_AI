<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostUserController extends Controller
{
    public function create(): View
    {
        $topics = ["Công nghệ", "AI", "Học tập", "Thiết kế", "Phần mềm", "Kinh doanh", "Marketing", "Thủ thuật", "Đời sống", "Sáng tạo"];
        return view('user.create-post', compact('topics'));
    }

    public function store(Request $request)
    {
        // Validation đơn giản (giữ logic form gốc)
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        // Store logic (thêm vào DB nếu cần, nhưng giữ đơn giản)
        return redirect()->route('user.profile')->with('success', 'Bài viết đã tạo!');
    }
}