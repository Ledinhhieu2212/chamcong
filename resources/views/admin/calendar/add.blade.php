<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <form action="{{ route('admin.calendar') }}"class="form-horizontal" method="POST">
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
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label class="control-label">Tên tài khoản</label>
                            <select name="username_select" id="" class="form-control">
                                @foreach ($accounts1 as $id => $accountName)
                                    <option class="form-control" value="{{ $id }}">{{ $accountName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label class=" control-label">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 col-sm-offset-10">
                            <button class="btn btn-primary" type="submit">Lưu lại</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
