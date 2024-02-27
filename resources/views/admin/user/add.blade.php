@extends('admin.user.index')


@section('crud')
    <form method="POST" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Họ và tên</label>
                    <input type="text" name="fullname" class="form-control" />
                </div>
            </div>
            <div class="col-md-3">

                <div class="form-group">
                    <label for="">Tài khoản</label>
                    <input type="text" name="username" class="form-control" />
                </div>
            </div>

            <div class="col-md-3">

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" />
                </div>
            </div>
            <div class="col-md-3">

                <div class="form-group">
                    <label for="">Công việc</label>
                    <select class="form-control" name="position_id">
                        @foreach ($positons as $positon)
                            <option value="{{ $positon->id }}">
                                {{ $positon->job }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Nhập lại mật khẩu</label>
                    <input type="password" name="re_password" class="form-control" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Ảnh đại diện</label>
                    <input type="file" name="image" class="form-control" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Thêm mới nhân viên</button>
                </div>
            </div>
        </div>
    </form>
@endsection
