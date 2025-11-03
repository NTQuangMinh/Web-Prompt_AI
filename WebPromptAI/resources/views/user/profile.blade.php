@extends('layouts.user')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="profile-container">
    <div class="header" style="background-image: url('{{ asset('img/bg.jpg') }}');">
        <img src="{{ $user->avatar ?? asset('img/anh_user_1.jpeg') }}" alt="Avatar" class="avatar">
    </div>
    <div class="profile-info">
        <h2>{{ $user->fullname }}</h2>
        <div class="buttons">
            <button id="follow-btn" class="add-btn">Theo dõi</button>
            <form action="{{ route('user.profile.edit') }}">
                <input type="submit" value="Sửa hồ sơ" class="edit-btn">
            </form>
            <form action="{{ route('user.posts.create') }}">
                <input type="submit" value="📝 Viết bài" class="add-btn">
            </form>
        </div>
        <div class="stats">
            <span><strong>{{ $user->following_count }}</strong> Đã follow</span>
            <span><strong>{{ $user->followers_count }}</strong> Follower</span>
        </div>
        <p class="bio">{{ $user->description }}</p>
    </div>
    <div class="tabs">
        <div class="tab active">🔁 Bài viết</div>
        <div class="tab">❤️ Yêu thích</div>
        <div class="tab">🔖 Đã Lưu</div>
    </div>
    <div class="write-container">
        @foreach($posts as $post)
            <div class="write-item">
                <h3>"{{ $post->title }}"</h3>
                <span>{{ $post->likes_count }}K ❤️ • {{ $post->comments_count }} comments</span>
            </div>
        @endforeach
    </div>
</div>
@endsection