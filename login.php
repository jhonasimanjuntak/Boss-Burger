<?php
// session_start();
if (!empty($_SESSION['username_decafe'])) {
    header('location:home');
}
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>BossBurger - Sistem Pemesanan dan Pembelian Burger</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="assets/css/login.css" rel="stylesheet">

    <style>
        /* Gaya untuk form login */
        body {
            background-color: #f8f9fa;
            /* Ganti warna latar belakang */
        }

        .form-signin {
            max-width: 400px;
            /* Lebar maksimum form */
            padding: 2rem;
            /* Padding lebih besar */
            background-color: #fff;
            /* Warna latar belakang form */
            border-radius: 10px;
            /* Sudut bulat pada form */
            box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.1);
            /* Efek bayangan untuk form */
        }

        .form-signin h1 {
            font-size: 1.5rem;
            /* Ukuran huruf yang lebih besar */
            margin-bottom: 1.5rem;
            /* Ruang di bawah judul */
            color: #333;
            /* Warna teks yang lebih gelap */
        }

        .form-floating input[type="email"],
        .form-floating input[type="password"] {
            border-radius: 8px;
            /* Sudut bulat untuk input fields */
            margin-bottom: 1rem;
            /* Ruang antar input fields */
        }

        .form-floating label {
            color: #555;
            /* Warna label yang lebih gelap */
        }

        .form-check-label {
            color: #555;
            /* Warna teks checkbox yang lebih gelap */
        }

        .btn-success {
            background-color: #28a745;
            /* Warna tombol */
            border-color: #28a745;
            /* Warna border tombol */
        }

        .btn-success:hover {
            background-color: #218838;
            /* Warna tombol saat hover */
            border-color: #1e7e34;
            /* Warna border tombol saat hover */
        }

        .btn-success:focus {
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
            /* Efek shadow saat tombol difokuskan */
        }

        .register-link {
            border-bottom: none;
        }
    </style>

    <link href="sign-in.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path
                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path
                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
            <path
                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path
                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
        </symbol>
    </svg>

    <main class="form-signin w-100 m-auto">
        <form class="needs-validation" novalidate action="proses/proses_login.php" method="post">
            <img src="https://pkmdemak3.demakkab.go.id/wp-content/uploads/2022/09/cropped-logo-puskesmas-terbaru-sesuai-permenkes-tahun-1-3.png"
                alt="" class="mx-auto d-block mb-3" style="max-width: 100px; max-height: 100px;">

            <h1 class="h3 mb-2 fw-normal text-center">Boss Burger</h1>

            <div class="form-floating">
                <input name="username" type="email" class="form-control" id="floatingInput"
                    placeholder="name@example.com" required>
                <label for="floatingInput">Email address</label>
                <div class="invalid-feedback">
                    Please choose a email.
                </div>
            </div>

            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password"
                    required>
                <label for="floatingPassword">Password</label>
                <div class="invalid-feedback">
                    Please choose a password.
                </div>
            </div>

            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me!
                </label>
            </div>
            <button class="btn btn-success w-100 py-2" type="submit" name="submit_validate" value="abc">Login</button>
                <form class="needs-validation" novalidate action="proses/proses_login.php" method="post">
            <p class="text-center mt-3 mb-0">
                Belum punya akun? <a href="register.php" style="text-decoration: none;">Register</a>
            </p>

<p> Email : admin@admin.com
Password : password </p>

            <body class="d-flex align-items-center py-4 bg-body-tertiary">
            </body>
        </form>
    </main>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>

</body>

</html>