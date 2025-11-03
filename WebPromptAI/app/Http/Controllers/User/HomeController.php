<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $cards = [
            [
                'user' => 'Nguyễn Mai',
                'avatar' => 'https://i.pravatar.cc/40?img=1',
                'title' => 'Viết nội dung quảng cáo',
                'description' => 'Tạo quảng cáo ngắn hấp dẫn cho sản phẩm thời trang nữ cao cấp.'
            ],
            [
                'user' => 'Trần Long',
                'avatar' => 'https://i.pravatar.cc/40?img=2',
                'title' => 'Sinh ý tưởng video TikTok',
                'description' => 'Tạo 5 ý tưởng video ngắn về review công nghệ cho người mới bắt đầu.'
            ],
            [
                'user' => 'Lê Anh',
                'avatar' => 'https://i.pravatar.cc/40?img=3',
                'title' => 'Viết caption mạng xã hội',
                'description' => 'Tạo caption hấp dẫn cho bức ảnh du lịch tại Bali.'
            ],
            [
                'user' => 'Phạm Huy',
                'avatar' => 'https://i.pravatar.cc/40?img=4',
                'title' => 'Lên kế hoạch học tập',
                'description' => 'Tạo lịch học 7 ngày cho người muốn học lập trình web từ cơ bản đến nâng cao.'
            ],
        ];
        $hotTopics = [
            'Prompt tạo ảnh phong cách anime',
            'Prompt phân tích văn bản bằng GPT',
            'Prompt viết bài SEO tự động',
            'Prompt vẽ concept nhân vật fantasy',
            'Prompt tạo website bằng HTML'
        ];
        return view('user.home', compact('cards', 'hotTopics'));
    }
}