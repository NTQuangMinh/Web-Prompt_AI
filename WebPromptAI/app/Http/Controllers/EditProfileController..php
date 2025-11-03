<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class EditProfileController extends Controller
{
    public function edit(): View
    {
        $user = (object) [
            'name' => 'An Trương',
            'tiktok_id' => 'antruong_2709',
            'bio' => ''
        ];
        return view('user.edit-profile', compact('user'));
    }

    public function update(Request $request)
    {
        // Update logic (giữ đơn giản)
        $request->validate([
            'name' => 'required',
            'bio' => 'nullable|max:80',
        ]);
        return redirect()->route('user.profile')->with('success', 'Hồ sơ đã cập nhật!');
    }
}