@extends('layout.user')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="til text-center">
                <h4>ĐĂNG NHẬP</h4>
            </div>
            <div class="bord">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group mb-3 text-center">
                        <button type="submit" class="btn btn-primary">ĐĂNG NHẬP</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
