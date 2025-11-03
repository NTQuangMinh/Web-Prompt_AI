@extends('layouts.user')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/user_main_page.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection

@section('title', 'Hồ sơ người dùng')

@section('content')
<div class="profile-container">
    <div class="header" style="background-image: url('{{ asset('img/bg.jpg') }}');">
        <img src="{{ asset('img/anh_user_1.jpeg') }}" alt="Avatar" class="avatar">
    </div>
    <div class="profile-info">
        <h2>{{ $user->name }}</h2>
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
        <p class="bio">{{ $user->bio }}</p>
    </div>
    <div class="tabs">
        <div class="tab active">🔁 Bài viết</div>
        <div class="tab">❤️ Yêu thích</div>
        <div class="tab">🔖 Đã Lưu</div>
    </div>
    <div class="write-container">
        @foreach($posts as $post)
            <div class="write-item">
                <h3>"{{ $post['title'] }}"</h3>
                <span>{{ $post['likes'] }} ❤️ • {{ $post['comments'] }} comments</span>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    const followBtn = document.getElementById("follow-btn");
    let isFollowing = false;
    followBtn.addEventListener("click", function() {
        isFollowing = !isFollowing;
        if (isFollowing) {
            followBtn.innerHTML = '<i class="fa-solid fa-user-check"></i> Đã follow';
            followBtn.classList.add("followed");
        } else {
            followBtn.innerHTML = 'Theo dõi';
            followBtn.classList.remove("followed");
        }
    });
    const tabs = document.querySelectorAll(".tabs .tab");
    tabs.forEach(tab => {
        tab.addEventListener("click", function() {
            tabs.forEach(t => t.classList.remove("active"));
            this.classList.add("active");
        });
    });
});
</script>
@endsection