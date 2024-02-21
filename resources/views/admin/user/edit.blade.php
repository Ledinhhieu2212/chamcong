@extends('admin.user.index')


@section('crud')
    <form action="{{ route('admin.user.update', $user->id) }}" class="form-horizontal" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                    <input type="text" name="fullname" class="form-control" value="{{ $user->fullname }}" />
                </div>
            </div>
            <div class="col-md-3">

                <div class="form-group">
                    <label for="">Tài khoản</label>
                    <input type="text" name="username" class="form-control" value="{{ $user->username }}" />
                </div>
            </div>

            <div class="col-md-3">

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" />
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
                    <input type="password" name="password" class="form-control"value="{{ $user->password }}" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Nhập lại mật khẩu</label>
                    <input type="password" name="re_password" class="form-control" value="{{ $user->password }}" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Ảnh đại diện</label>
                            <input type="file" name="image" class="form-control" value="{{ $user->image }}" />
                        </div>
                        <div class="col-md-6">
                            <img @if (file_exists(public_path("assets/img/$user->image"))) src="{{ asset("assets/img/$user->image") }}"
                            @else
                                src="{{ $user->image }}" @endif
                                class="image-avatar" width="130" height="130" alt="Ảnh avatar tài khoản" />
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Lưu lại</button>
                </div>
            </div>
        </div>
    </form>
@endsection
