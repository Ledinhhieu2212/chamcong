<div class="body-delete " id={{ "deleteModal-$user->remember_token" }}>
    <form action="{{ route('admin.user.destroy', $user->id) }}" method="post" class="form-destroy" id="form-user-delete">
        @csrf
        @method('DELETE')
        <div class="form-header">
            <h3>Xóa nhân viên</h3>
        </div>
        <div class="form-body">
            <p>Bạn muốn xóa nhân viên {{ $user->fullname }} phải không?
            </p>
        </div>
        <div class="form-footer">
            <a onclick="closeModal('{{ $user->remember_token }}')" class="btn btn-dark">Quay lại</a>
            <button type="submit" class="btn btn-primary">Xác
                nhận</button>
        </div>
    </form>
</div>
