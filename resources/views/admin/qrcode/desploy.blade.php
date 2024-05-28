<div class="body-delete " id={{ "deleteModal-$qrcode->id" }}>
    <form action="{{ route('admin.qrcode.destroy', $qrcode->id) }}" method="post" class="form-destroy" id="form-user-delete">
        @csrf
        @method('DELETE')
        <div class="form-header">
            <h3>Xóa nhân viên</h3>
        </div>
        <div class="form-body">
            <p>Bạn muốn xóa nhóm mã qr <b> {{ $qrcode->name }}</b> phải không?
            </p>
        </div>
        <div class="form-footer">
            <a onclick="closeModal('{{ $qrcode->id }}')" class="btn btn-dark">Quay lại</a>
            <button type="submit" class="btn btn-primary">Xác
                nhận</button>
        </div>
    </form>
</div>
