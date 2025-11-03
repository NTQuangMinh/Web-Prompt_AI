<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $user = (object) [
            'name' => 'An Trương',
            'bio' => 'Chào mừng bạn đến với trang cá nhân của mình! Hãy theo dõi để xem những prompt thú vị nhé! 😊',
            'following_count' => 116,
            'followers_count' => 8
        ];
        $posts = [
            ['title' => '“Giải thích ngắn gọn cho tôi biết API là gì và cho ví dụ thực tế dễ hiểu.”', 'likes' => '13,5K', 'comments' => '810'],
            ['title' => '“Viết caption TikTok ngắn, vui nhộn về việc học code khuya nhưng vẫn tỉnh táo, kèm 3 hashtag phù hợp.”', 'likes' => '3,9K', 'comments' => '714'],
            ['title' => '“Viết bài blog 300 từ về ‘Cách duy trì động lực học lập trình’, giọng văn tích cực và gần gũi.”', 'likes' => '9,8K', 'comments' => '809'],
            ['title' => '“Tạo hình ảnh poster game hành động với nhân vật chính mặc áo giáp tương lai, phông nền là thành phố đổ nát.”', 'likes' => '20K', 'comments' => '809'],
            // ... Lặp lại 8 cái nữa từ file gốc (copy đầy đủ nếu cần)
        ];
        return view('user.profile', compact('user', 'posts'));
    }
}