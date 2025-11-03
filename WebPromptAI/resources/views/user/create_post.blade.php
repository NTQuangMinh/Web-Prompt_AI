@extends('layouts.user')

@section('title', 'Tạo bài viết - Giao diện mới')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/create_post.css') }}">
@endsection

@section('content')
<button type="button" class="close-btn" title="Hủy bài viết mới" onclick="confirmCancel()">×</button>
<div class="form-card">
    <div class="user-info">
        <img class="avatar" src="https://i.pravatar.cc/40?img=12" alt="avatar">
        <div class="name">John Doe</div>
        <div class="topic-container">
            <input type="text" class="topic-input" placeholder="Chọn chủ đề...">
            <div class="topic-dropdown"></div>
            <div class="selected-topics"></div>
        </div>
    </div>
    <form method="POST" action="{{ route('user.posts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-content">
            <div class="collapsible-group">
                <div class="collapsible-header">
                    <span>Title</span>
                    <span class="indicator">+</span>
                </div>
                <div class="collapsible-content">
                    <input type="text" name="title" placeholder="Nhập tiêu đề cho bài viết của bạn...">
                </div>
            </div>
            <div class="collapsible-group">
                <div class="collapsible-header">
                    <span>Description</span>
                    <span class="indicator">+</span>
                </div>
                <div class="collapsible-content">
                    <textarea name="description" placeholder="Thêm mô tả ngắn gọn..."></textarea>
                </div>
            </div>
            <div class="collapsible-group">
                <div class="collapsible-header">
                    <span>Content</span>
                    <span class="indicator">+</span>
                </div>
                <div class="collapsible-content content-fields">
                    <label>1. Instruction</label>
                    <input type="text" name="instruction" placeholder="Thêm hướng dẫn...">
                    <label>2. Requirement</label>
                    <input type="text" name="requirement" placeholder="Thêm yêu cầu...">
                </div>
            </div>
            <div class="collapsible-group" id="upload-section">
                <div class="collapsible-header">
                    <span>+ Upload Image</span>
                    <span class="indicator">+</span>
                </div>
                <div class="collapsible-content">
                    <button class="upload-btn-main" type="button" onclick="document.getElementById('fileInput').click()">Chọn ảnh từ thiết bị</button>
                    <input type="file" name="image" id="fileInput" accept="image/*" hidden>
                    <div id="image-preview"></div>
                </div>
            </div>
        </div>
        <div class="form-footer">
            <div class="right-buttons">
                <button type="button" class="cancel-btn" onclick="confirmCancel()">Cancel</button>
                <button type="submit" class="submit-btn" onclick="handleSubmit()">Upload</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const collapsibleGroups = document.querySelectorAll('.collapsible-group');
    collapsibleGroups.forEach(group => {
        const header = group.querySelector('.collapsible-header');
        header.addEventListener('click', function() {
            const wasActive = group.classList.contains('active');
            collapsibleGroups.forEach(g => g.classList.remove('active'));
            if (!wasActive) {
                group.classList.add('active');
            }
        });
    });
    const fileInput = document.getElementById('fileInput');
    const imagePreview = document.getElementById('image-preview');
    const uploadSection = document.getElementById('upload-section');
    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.innerHTML = `<img src="${e.target.result}" alt="Image preview"/>`;
                imagePreview.style.display = 'block';
                if (!uploadSection.classList.contains('active')) {
                    uploadSection.querySelector('.collapsible-header').click();
                }
            };
            reader.readAsDataURL(file);
        }
    });
    const topicInput = document.querySelector(".topic-input");
    const topicDropdown = document.querySelector(".topic-dropdown");
    const selectedTopics = document.querySelector(".selected-topics");
    const topics = @json($topics);
    let chosen = [];
    function renderDropdown(filter = "") {
        topicDropdown.innerHTML = "";
        topics.filter(t => t.toLowerCase().includes(filter.toLowerCase()) && !chosen.includes(t)).forEach(t => {
            const div = document.createElement("div");
            div.textContent = t;
            div.onclick = () => selectTopic(t);
            topicDropdown.appendChild(div);
        });
    }
    function selectTopic(topic) {
        if (chosen.length >= 3) {
            alert("Chỉ được chọn tối đa 3 chủ đề!");
            return;
        }
        chosen.push(topic);
        renderSelected();
        renderDropdown(topicInput.value);
    }
    function removeTopic(topic) {
        chosen = chosen.filter(t => t !== topic);
        renderSelected();
        renderDropdown(topicInput.value);
    }
    function renderSelected() {
        selectedTopics.innerHTML = "";
        chosen.forEach(t => {
            const tag = document.createElement("div");
            tag.className = "tag";
            tag.innerHTML = `#${t} <button type="button" onclick="removeTopic('${t}')">×</button>`;
            const hiddenInput = document.createElement("input");
            hiddenInput.type = "hidden";
            hiddenInput.name = "topics[]";
            hiddenInput.value = t;
            tag.appendChild(hiddenInput);
            selectedTopics.appendChild(tag);
        });
    }
    topicInput.addEventListener("focus", () => {
        renderDropdown();
        topicDropdown.classList.add("show");
    });
    topicInput.addEventListener("blur", () => {
        setTimeout(() => topicDropdown.classList.remove("show"), 150);
    });
    topicInput.addEventListener("input", () => renderDropdown(topicInput.value));
});
function confirmCancel() {
    if (confirm("Bạn có chắc chắn muốn hủy bài viết này không?")) {
        history.back();
    }
}
function handleSubmit() {
    if (chosen.length === 0) {
        alert("Vui lòng chọn ít nhất 1 chủ đề trước khi đăng bài!");
        return false;
    }
    return true;
}
</script>
@endsection