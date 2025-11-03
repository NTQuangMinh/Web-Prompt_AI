@extends('layouts.user')

@section('title', 'Trang chủ')

@section('content')
<div class="left-sidebar">
    <i class="fa-regular fa-heart"></i>
    <a href="{{ route('user.posts.create') }}" class="sidebar-btn" title="Tạo bài viết mới">
        <i class="fa-solid fa-plus"></i>
    </a>
    <i class="fa-regular fa-comment"></i>
</div>

<div class="right-sidebar">
    <div class="border-top"></div>
    <div class="border-bottom"></div>
    <h3>Bảng tin hot 🔥</h3>
    @foreach($hotTopics as $item)
        <div class="item">{{ $item }}</div>
    @endforeach
</div>

<div class="main-content">
    @foreach($cards as $card)
        <div class="card">
            <div class="card-header">
                <div class="user-info">
                    <img src="{{ $card['avatar'] }}" alt="{{ $card['user'] }}" style="width:35px; height:35px; border-radius:50%;">
                    <strong>{{ $card['user'] }}</strong>
                </div>
                <button class="report-btn"><i class="fa-solid fa-flag"></i> Báo cáo</button>
            </div>
            <h4>{{ $card['title'] }}</h4>
            <p>{{ $card['description'] }}</p>
            <div class="card-buttons">
                <button><i class="fa-regular fa-heart"></i> Thích</button>
                <button><i class="fa-regular fa-comment"></i> Bình luận</button>
                <button><i class="fa-regular fa-bookmark"></i> Lưu</button>
            </div>
        </div>
    @endforeach
</div>
@endsection