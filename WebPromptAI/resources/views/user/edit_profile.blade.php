@extends('layouts.user')

@section('title', 'Sửa hồ sơ')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/edit_profile.css') }}">
@endsection

@section('content')
<div class="overlay" id="overlay">
    <div class="modal">
        <div class="modal-header">
            <h2>Sửa hồ sơ</h2>
            <button class="close-btn" onclick="confirmCancel()">✕</button>
        </div>
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <label>Ảnh hồ sơ</label>
                <div class="avatar-section">
                    <div class="avatar-container">
                        <img id="avatarPreview" src="{{ asset('img/anh_user_1.jpeg') }}" alt="Avatar">
                        <label for="avatar" class="edit-icon">✎</label>
                        <input type="file" name="avatar" id="avatar" accept="image/*">
                    </div>
                </div>
                <label for="tiktok_id">User ID</label>
                <input type="text" id="tiktok_id" name="tiktok_id" value="{{ $user->tiktok_id }}" required>
                <label for="name">Tên</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}">
                <label for="bio">Tiểu sử</label>
                <textarea id="bio" name="bio" maxlength="80" placeholder="Giới thiệu ngắn...">{{ $user->bio }}</textarea>
                <small style="color:#777;">{{ strlen($user->bio ?? '') }}/80</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="cancel" onclick="confirmCancel()">Hủy</button>
                <button type="submit" class="save">Lưu</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
function confirmCancel() {
    const confirmExit = confirm("Bạn có chắc muốn hủy chỉnh sửa và quay lại trang hồ sơ?");
    if (confirmExit) {
        window.location.href = "{{ route('user.profile') }}";
    }
}
const bio = document.getElementById('bio');
const small = document.querySelector('small');
bio.addEventListener('input', () => {
    small.textContent = `${bio.value.length}/80`;
});
document.getElementById('avatar').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        document.getElementById('avatarPreview').src = URL.createObjectURL(file);
    }
});
</script>
@endsection