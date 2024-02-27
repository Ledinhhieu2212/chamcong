@extends('admin.qrcode.index')


@section('crud')
    <div class="row p-3 justify-content-center">
        <div class="col-md-12 text-center" >
            <div class="" id="printableArea">
                <div class="">
                    {{  QrCode::size(200)->generate($text) }}
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <a href="{{ route('admin.qrcode.create') }}" class="btn btn-secondary">Thoát</a>
            <button onclick="printElement('printableArea')" class="btn btn-info">In mã Qr</button>
        </div>
    </div>
@endsection
