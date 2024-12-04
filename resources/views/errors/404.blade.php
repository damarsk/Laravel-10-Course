<!-- resources/views/errors/404.blade.php -->
<!doctype html>
<html lang="en">

<head>
    <title>Page Not Found</title>
    <!-- Add any stylesheets here -->
    <style>
        .container {
            height: 100vh;
        }

        hr {
            width: 50%;
            border: 1px solid #ccc;
        }
    </style>
    <link rel="stylesheet" href="{{asset('bootstrap-5/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('font-awesome/css/all.min.css')}}">
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center flex-column">
        <h1>Oops! The Page you're looking for isn't here.</h1>
        <p>Maybe the page was moved or deleted, or perhaps you just typed the wrong address.</p>
        <hr>
        <p>Page will redirected to Homepage in <span id="countdown">5</span>s</p>
    </div>
</body>
<script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('jquery/jquery.js') }}"></script>
<script>
    $(document).ready(function () {
        console.log("Website is ready");
        let countdown = 5; // Waktu hitungan mundur dalam detik
        const spanElement = document.getElementById('countdown');

        // Fungsi yang akan dipanggil setiap detik
        const timer = setInterval(function () {
            spanElement.textContent = countdown; // Update teks dalam span
            countdown--; // Kurangi waktu setiap detik

            if (countdown < 0) {
                clearInterval(timer); // Hentikan timer
                window.location.href = "{{ url("/") }}"; // Redirect ke index.html
            }
        }, 1000); // 1000ms = 1 detik
    });
</script>

</html>