<div class="body-delete " id={{ "deleteModal-$calendar->id" }}>
    <form action="{{ route('admin.calendar.destroy', $calendar->id) }}" method="post" class="form-destroy" id="form-user-delete">
        @csrf
        @method('DELETE')
        <div class="form-header">
            <h3>Xóa nhân viên</h3>
        </div>
        <div class="form-body">
            <p>Bạn muốn xóa lịch làm từ ngày <b> {{  date('d-m-Y', strtotime($calendar->start_date)) }}</b> đến  <b>{{ date('d-m-Y', strtotime( $calendar->end_date)) }}</b> phải không?
            </p>
        </div>
        <div class="form-footer">
            <a onclick="closeModal('{{ $calendar->id }}')" class="btn btn-dark">Quay lại</a>
            <button type="submit" class="btn btn-primary">Xác
                nhận</button>
        </div>
    </form>
</div>
