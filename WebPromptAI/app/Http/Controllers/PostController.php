<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->get('search', '');
        $selectedStatus = $request->get('status', '');
        $posts = Post::query()
            ->when($search, fn($q, $s) => $q->where('prompt_id', 'like', "%$s%"))
            ->when($selectedStatus, fn($q, $st) => $q->where('status', $st))
            ->get();
        return view('manager.post.index', compact('posts', 'search', 'selectedStatus'));
    }
}