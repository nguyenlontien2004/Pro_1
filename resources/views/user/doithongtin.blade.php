@extends('layout.user')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <div class="boxpp2">
                    <div class="user-info">
                        <h5>Tên User</h5>
                        <nav>
                            <ul class="nav flex-column">
                                <li class="nav-items">
                                    <a href="#" class="nav-link text-dark">Quên Mật Khẩu</a>
                                </li>
                                <li class="nav-items">
                                    <a href="#" class="nav-link text-dark">Đăng Xuất</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="boxx">
                    <div class="tt3 text-center">
                        <h4>Thay đổi thông tin người dùng</h4>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3">
                            <label for="name">Ảnh đại diện:</label>
                            <img src="#" alt="">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Họ Và Tên</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $user->name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control"
                                value="{{ $user->email }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Mật khẩu</label>
                            <input type="password" name="password" id="password" class="form-control"
                                value="{{ $user->password }}" disabled>
                        </div>
                    </div>
                    <div class="nut text-center">
                        <button class="btn btn-primary">Thay đổi thông tin</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
