<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IEEE Student Branch - Home</title>
  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

  <style>
  .hero-section {
    background: url('path_to_your_hero_image.jpg') no-repeat center center;
    background-size: cover;
    height: 85vh;
  }

  .footer {
    background-color: #f8f9fa;
    padding: 10px;
    text-align: center;
  }
  </style>
</head>

<body>
  <!-- Hero Section -->
  <div class="hero-section d-flex justify-content-center align-items-center">
    @extends('public.slider')
  </div>

  <!-- About Section -->
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <h2>About Us</h2>
        <p>Learn more about what we do at the IEEE Student Branch, our mission,
          and our activities.</p>
      </div>
    </div>
  </div>

  <!-- News/Events Section -->
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <h2>Latest News and Events</h2>
        <!-- This can be dynamically filled with news items or events -->
        <ul>
          <li>Event One - Date</li>
          <li>Event Two - Date</li>
          <li>Event Three - Date</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Contact Section -->
  <div class="container mt-4 mb-5">
    <div class="row">
      <div class="col-md-12">
        <h2>Contact Us</h2>
        <p>Email: contact@ieeeexample.com</p>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <p>© 2024 IEEE Student Branch - University of South Bohemia</p>
  </div>

  <!-- Optional JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js">
  </script>
  <script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
  </script>
</body>

</html>