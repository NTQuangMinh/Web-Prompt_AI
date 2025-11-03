<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CheckPostController extends Controller
{
    public function show($id): View
    {
        $posts = Post::where('prompt_id', $id)->get();
        $componentList = $posts->map(fn($p) => [
            'name' => $p->component_name,
            'content' => $p->content,
            'order' => $p->order
        ])->sortBy('order');
        $post = $posts->first();
        return view('manager.check-post.show', compact('post', 'componentList'));
    }
}