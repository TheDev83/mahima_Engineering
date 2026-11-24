<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Dynamic Title -->
  <title><?php echo isset($title) ? $title : "Default Title"; ?> | Mahima Engg</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./style/index.css">
  <link rel="stylesheet" href="./style/capabilities.css">
  <link rel="stylesheet" href="./style/contact.css">
  <link rel="stylesheet" href="./style/about.css">
  <link rel="stylesheet" href="./style/quote.css">
  <link rel="stylesheet" href="./style/footer.css">
  
</head>

<body>

<div class="row">
    <div class="col-md-12 bg-danger text-white p-3 text-end pe-5 f-banner rounded-top">
        <i class="fa-solid fa-phone">
            <a href="tel:+919583225188" class="text-white text-decoration-none fs-6">
                +91 9583225188
            </a>
        </i>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="./images/mEE.png" width="40" height="40" class="me-2">
                <span class="fw-bold fs-5">Mahima Engineering</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link nav-name" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link nav-name" href="capabilities.php">Capabilities</a></li>
                    <!-- <li class="nav-item"><a class="nav-link nav-name" href="about.php">About</a></li> -->
                    <li class="nav-item"><a class="nav-link nav-name" href="contact.php">Contact Us</a></li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-color px-4" href="quote.php">Get a Quote</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!-- PAGE CONTENT -->
<div class="container mt-4">
    <?php
        if (isset($content)) {
            echo $content;
        }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
