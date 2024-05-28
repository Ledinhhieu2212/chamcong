<div class="body-delete " id={{ "deleteModal-$position->id" }}>
    <form action="{{ route('admin.position.destroy', $position->id) }}" method="post" class="form-destroy"
        id="form-user-delete">
        @csrf
        @method('DELETE')
        <div class="form-header">
            <h3>Xóa nhân viên</h3>
        </div>
        <div class="form-body">
            <p>Bạn muốn xóa nhân viên {{ $position->job }} phải không?
            </p>
        </div>
        <div class="form-footer">
            <a onclick="closeModal('{{ $position->id }}')" class="btn btn-dark">Quay lại</a>
            <button type="submit" class="btn btn-primary">Xác
                nhận</button>
        </div>
    </form>
</div>
