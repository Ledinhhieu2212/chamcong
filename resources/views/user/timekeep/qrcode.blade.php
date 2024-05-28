@extends('layout')

@section('css')
    @include('components.user.head')
    <title>{{ $title }}</title>
    <style>
        .result {
            background-color: green;
            color: #fff;
            padding: 20px;
        }

        #my-qr-reader {
            padding: 20px !important;
            border: 1.5px solid #b2b2b2 !important;
            border-radius: 8px;
        }

        #my-qr-reader img[alt="Info icon"] {
            display: none;
        }

        #my-qr-reader img[alt="Camera based scan"] {
            width: 100px !important;
            height: 100px !important;
        }
    </style>
    <style>
        .body-delete {
            width: 100%;
            height: 100%;
            display: none;
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background-color: rgb(51, 47, 47, 0.9);
            z-index: 1000000;
        }

        .form-destroy {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 500px;
            transform: translate(-50%, -50%);
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 2;
            overflow: hidden;
        }

        .form-header {
            border: 1px solid #ccc;
            padding: 10px;
        }

        .form-body {
            padding: 20px;
            height: 100px;
        }

        .form-footer {
            padding: 20px;
            text-align: right;
            width: 100%;
        }
    </style>
@endsection

@section('script')
    @include('components.user.script')
    <script src="{{ asset('assets/js/html5-qrcode.min.js') }}"></script>
    <script>
        function domReady(fn) {
            if (
                document.readyState === "complete" ||
                document.readyState === "interactive"
            ) {
                setTimeout(fn, 1000);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }

        // If found you qr code
        function onScanSuccess(decodeText, decodeResult) {
            document.getElementById('text').value = decodeText;
            document.getElementById('message').innerHTML = "Trạng thái: Xác nhận thành công! Vui lòng ấn Gửi";
        }
        const formatsToSupport = [
            Html5QrcodeSupportedFormats.QR_CODE,
        ];
        let htmlscanner = new Html5QrcodeScanner(
            "my-qr-reader", {
                fps: 10,
                qrbos: {
                    width: 100,
                    height: 100
                },
                supportedScanTypes: [
                    // Html5QrcodeScanType.SCAN_TYPE_FILE,
                    Html5QrcodeScanType.SCAN_TYPE_CAMERA
                ],
                formatsToSupport: formatsToSupport
            }
        );
        htmlscanner.render(onScanSuccess);


        function openModal() {
            var modal = document.getElementById("modal");
            modal.style.display = "block";
            document.body.style.overflow = "hidden"; // Disable scrolling on the body
        }
        // Function to close the modal and change CSS
        function closeModal() {
            var modal = document.getElementById("modal");
            modal.style.display = "none";
            document.body.style.overflow = "auto"; // Enable scrolling on the body
        }

        if ("geolocation" in navigator) {
            var options = {
                enableHighAccuracy: true, // Yêu cầu độ chính xác cao
                timeout: 2000, // Thời gian chờ tối đa là 10 giây
                maximumAge: 0 // Sử dụng dữ liệu mới nhất
            };
            navigator.geolocation.getCurrentPosition(hienToaDo, hienLoi, options);
        } else {
            console.log("Trình duyệt không hỗ trợ Geolocation.");
        }


        function hienToaDo(vitri) {
            vido = vitri.coords.latitude;
            kinhdo = vitri.coords.longitude;
            document.getElementById("address_latitude").value = vido;
            document.getElementById("address_longitude").value = kinhdo;
            // console.log("Vĩ độ" + vido);
            // console.log("Kinh độ" + kinhdo);
        }

        function hienLoi(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    console.log("Người dùng từ chối yêu cầu định vị.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    console.log("Thông tin vị trí không có sẵn.");
                    break;
                case error.TIMEOUT:
                    console.log("Yêu cầu lấy vị trí đã hết thời gian.");
                    break;
                case error.UNKNOWN_ERROR:
                    console.log("Đã xảy ra lỗi không xác định.");
                    break;
            }
        }
    </script>
@endsection


@section('navbar')
    @include('components.user.navbar')
@endsection

@section('sidebar')
    @include('components.user.sidebar')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
                            <li class="breadcrumb-item">Chấm công</li>
                            <li class="breadcrumb-item">{{ $title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content h-100">
            <div class="container-fluid">
                <div class="row text-center justify-center">
                    <div class="col-md-6">
                        <div class="section">
                            <div id="my-qr-reader">
                            </div>
                        </div>
                        <div id="message">Trạng thái:</div>

                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('user.timekeep.confirm') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Lựa chọn chấm công:</label>
                                <div class="row">
                                    <div class="col">
                                        <label for="">Chấm công đến:</label>
                                        <input type="radio" name="in_out" checked value="1" class="form-control">
                                    </div>

                                    <div class="col">
                                        <label for="">Chấm công về:</label>
                                        <input type="radio" name="in_out" value="0" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row justify-content-around">
                                    <div class="col-md-4">
                                        <input type="hidden" name="address_latitude" id="address_latitude" readonly
                                            class="form-control" placeholder="Vĩ độ">
                                        @if ($errors->has('address_latitude'))
                                            <span class="error-message">* {{ $errors->first('address_latitude') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <input type="hidden" name="address_longitude" id="address_longitude" readonly
                                            class="form-control" placeholder="Kinh độ">
                                        @if ($errors->has('address_longitude'))
                                            <span class="error-message">* {{ $errors->first('address_longitude') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="qrcode" readonly id="text" class="form-control">
                            <button type="submit" class="btn btn-success">Gửi </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
