@extends('layouts.manager')

@section('title', 'Quản lý tài khoản')

@section('content')
<fieldset class="account-fieldset">
    <legend>Quản lý tài khoản</legend>
    <div class="top-bar">
        <div class="stats">Tổng số tài khoản: <strong>{{ count($accounts) }}</strong></div>
        <div class="search-box">
            <form method="get">
                <input type="text" name="search" placeholder="Tìm kiếm tài khoản..." value="{{ $search }}">
                <select name="type">
                    <option value="">Tất cả</option>
                    <option value="admin" {{ $selectedType == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $selectedType == 'user' ? 'selected' : '' }}>User</option>
                </select>
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
    <div class="table-wrapper">
        <table>
            <thead><tr><th>ID</th><th>Username</th><th>Email</th><th>Fullname</th><th>Role</th><th>Thao tác</th></tr></thead>
            <tbody>
                @foreach($accounts as $index => $acc)
                    <tr style="background-color: {{ $index % 2 == 0 ? '#ffffffff' : '#dcdbdbff' }};">
                        <td>{{ $acc->account_id }}</td>
                        <td>{{ $acc->username }}</td>
                        <td>{{ $acc->email }}</td>
                        <td>{{ $acc->fullname }}</td>
                        <td>{{ $acc->role->role_name }}</td>
                        <td class="actions">
                            <button class="btn-edit"><i class="fa-solid fa-magnifying-glass"></i> Kiểm tra</button>
                            <button class="btn-delete"><i class="fa-solid fa-trash"></i> Xóa</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</fieldset>
@endsection