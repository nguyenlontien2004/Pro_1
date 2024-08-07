@extends('layout.user')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="til text-center">
                <h4>ĐỔI MẬT KHẨU</h4>
            </div>
            <div class="bord">
                <form action="{{ route('user.doim3k') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="old_password">MẬT KHẨU CŨ</label>
                        <input type="password" name="old_password" id="old_password" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="new_password">MẬT KHẨU MỚI</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_confirmation">Xác nhận mật khẩu</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                            required>
                    </div>

                    <div class="form-group mb-3 text-center">
                        <button type="submit" class="btn btn-primary">ĐỔI MẬT KHẨU</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
