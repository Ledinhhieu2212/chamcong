<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Đăng nhập</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>


<body class="overflow-hidden">


    <div class="row align-items-center justify-content-center" style="height: 100vh">
        <div class="col-md-6 p-4 ">
            <div class="webcam p-3 bg-primary rounded">
                <p class="text-center text-bold p-2">Vui lòng nhập tài khoản trước khi scanner mã qr!</p>
                <video width="100%" id="preview" class="rounded bg-danger"></video>
                <div class="status-scanner">
                    <h3></h3>
                </div>
            </div>

            <input type="file" id="fileInput" accept="image/*">

            <div class="p-3">

                <button id="startScanButton" class="btn btn-success">Mở webcam</button>
                <button id="stopScanButton" class="btn btn-danger" style="display: none;">Tắt
                    webcam</button>
            </div>
        </div>
        <div class="login-box">
            <div class="login-logo">
                <b>Đăng nhập chấm công mã QR</b>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <form class="m-t" method="POST" role="form" action="{{ route('scanner.post') }}">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="radio" name="time_work" value="in" />
                                    <label for="in">Đến</label>
                                </div>
                                <div class="col">
                                    <input type="radio" name="time_work" value="out"/>
                                    <label for="out">Về</label>
                                </div>
                            </div>
                        <div class="input-group">
                            <input type="text" name="email" class="form-control" placeholder="Email" />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('email'))
                            <span class="error-message">* {{ $errors->first('email') }}</span>
                        @endif
                        <div class="input-group my-2">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('password'))
                            <span class="error-message">* {{ $errors->first('password') }}</span>
                        @endif

                        <input type="hidden" name="qrcode" id="qrcode" readonly placeholder="Quét QrCode"
                            class="form-control">

                        <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>

                        <a href="{{ route('login') }}" class="w-100 my-2 btn btn-success">
                            Đăng nhập thường</a>

                    </form>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('auth/js/instascan.min.js') }}"></script>
    <script src="{{ asset('auth/js/vue.min.js') }}"></script>
    <script src="{{ asset('auth/js/adapter.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.0.0/dist/jsQR.min.js"></script>

    <script type="text/javascript">
        var startScanButton = document.getElementById('startScanButton');
        var stopScanButton = document.getElementById('stopScanButton');
        var previewVideo = document.getElementById('preview');
        var statusScanner = document.querySelector('.status-scanner h3');
        var instascanScanner = new Instascan.Scanner({
            video: previewVideo
        });

        instascanScanner.addListener('scan', function(c) {

            document.getElementById('qrcode').value = c;
            statusScanner.style.display = 'inline-block';
            statusScanner.textContent = 'QR Code đã được quét thành công!';
        });

        startScanButton.addEventListener('click', function() {
            startScanButton.style.display = 'none';
            stopScanButton.style.display = 'inline-block';
            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    instascanScanner.start(cameras[0]);
                } else {
                    alert('No cameras found.');
                }
            }).catch(function(error) {
                console.error(error);
            });
        });

        stopScanButton.addEventListener('click', function() {
            stopScanner();
        });

        function stopScanner() {
            instascanScanner.stop();
            startScanButton.innerText = 'Mở webcam';
            startScanButton.style.display = 'inline-block';
            stopScanButton.style.display = 'none';
            statusScanner.style.display = 'none';
        }
    </script>
    <script>
        document.getElementById('fileInput').addEventListener('change', handleFileSelect);

        function handleFileSelect(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const image = new Image();
                    image.src = e.target.result;

                    image.onload = function() {
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');
                        canvas.width = image.width;
                        canvas.height = image.height;
                        ctx.drawImage(image, 0, 0, image.width, image.height);

                        const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                        const code = jsQR(imageData.data, canvas.width, canvas.height);

                        if (code) {
                            // Đã đọc được mã QR code
                            const qrCodeValue = code.data;
                            document.getElementById('qrcode').value = qrCodeValue;
                            console.log('QR Code đã được đọc:', qrCodeValue);
                        } else {
                            // Không tìm thấy mã QR code trong hình ảnh
                            console.log('Không tìm thấy mã QR code trong hình ảnh.');
                        }
                    };
                };

                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>
