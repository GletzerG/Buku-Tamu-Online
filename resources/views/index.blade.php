<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../images/logo1.png">
    <style>
        body {
            background: linear-gradient(135deg, #0066FF, #00CCFF);
            font-family: 'Poppins', sans-serif;
            overflow: scroll;
        }

        .box-area {
            transition: transform 0.3s ease;
        }

        .box-area:hover {
            transform: scale(1.03);
        }

        .left-box {
            background: linear-gradient(135deg, #0066FF, #00CCFF);
            border-radius: 20px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            padding: 30px;
            text-align: center;
        }

        .left-box img {
            max-width: 250px;
            animation: fadeIn 1.5s ease;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .right-box {
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }

        .header-text h2 {
            font-weight: bold;
            color: #0379C8;
        }

        .form-control {
            border-radius: 10px;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #0379C8;
            border: none;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #025ba1;
        }

        .btn-light {
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: none;
            background-color: #f7f7f7;
        }

        .btn-light img {
            width: 20px;
            margin-right: 10px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group input {
            height: 45px;
            padding-left: 20px;
            font-size: 16px;
        }

        .min-vh-100 {
            min-height: 100vh !important;
            background: #F0F4F8;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Alert Styles */
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            display: none;
            /* Hidden by default */
        }
    </style>
    <title>Buku Tamu Online</title>
</head>

<body>

    <!----------------------- Main Container -------------------------->
    <div class="container min-vh-100">

        <!----------------------- Login Container -------------------------->
        <div class="row box-area shadow-lg p-3 rounded-5">

            <!--------------------------- Left Box ----------------------------->
            <div class="col-md-6 d-flex justify-content-center align-items-center left-box">
                <div class="featured-image">
                    <img src="{{url('frontend/images/logo1.png') }}" class="img-fluid" alt="User Icon">
                </div>
            </div>

            <!-------------------------- Right Box ---------------------------->
            <div class="col-md-6 right-box">
                <div class="header-text mb-4 text-center">
                    <h2>Buku Tamu Online</h2>
                </div>

                <form action="{{ url('simpan-bukutamu') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="nama" class="form-control form-control-lg bg-light fs-6"
                            placeholder="Nama">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="instansi_kantor" class="form-control form-control-lg bg-light fs-6"
                            placeholder="Instansi/Kantor">
                    </div>
                    <div class="input-group mb-3">
                        <input type="date" name="tanggal" class="form-control form-control-lg bg-light fs-6"
                            placeholder="tanggal">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="ingin_bertemu" class="form-control form-control-lg bg-light fs-6"
                            placeholder="ingin bertemu">
                    </div>
                    <div class="input-group mb-3">
                        <input type="Keperluan" name="perlu" class="form-control form-control-lg bg-light fs-6"
                            placeholder="Keperluan">
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6" type="submit">Submit</button>
                    </div>
                </form>
                <div class="input-group">
                    <a href="{{ url('dashboard') }}" class="btn btn-lg btn-light w-100 fs-6">
                        <img src="{{url('frontend/images/Admin.png') }}" alt="Admin Icon">
                        <small>Dashboard Tamu</small>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    <div id="alert-message" class="alert" role="alert"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            const successMessage = "{{ session('status') }}";
            const errorMessages = @json($errors->all());

            function showAlert(color, message) {
                $('#alert-message').css({
                    "background-color": color,
                    "color": "white",
                    "padding": "10px",
                    "border-radius": "5px"
                }).text(message).fadeIn();

                setTimeout(() => {
                    $('#alert-message').fadeOut();
                }, 3000);
            }


            if (successMessage) {
                showAlert("green", successMessage);
            }


            if (errorMessages.length > 0) {
                errorMessages.forEach((msg) => {
                    showAlert("red", msg);
                });
            }
        });
    </script>

</body>

</html>