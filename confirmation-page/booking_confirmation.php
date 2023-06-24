<!DOCTYPE html>
<html>

<head>
  <title>Booking Confirmation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    /* body,
    html {
      height: 100%;
      margin: 0;
      padding: 0;
    } */
    
    body {
      background-image: url('image/landscape-1383950_640.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      /* height: 100vh; */
      margin: 0;
      padding: 0;
    }
    
    h1 {
      font-family: 'Apple Chancery', cursive;
      padding: 20px;
      color: #063970;
      font-weight: bold;
    }
    
    section {
      /*box properties */
      background-color: rgba(255, 255, 255, 0.7);
      /* forth parameter defines the transparency or shadow effect matching with the bg image */
      border-radius: 20px;
      padding: 20px;
      margin: 20px;
    }
  </style>
</head>

<body>
  <section>
    <div class="container">
      <h1 class="font-italic text-center">Booking Confirmation</h1>
      <div id="bookingDetails">
        <!-- Booking details will be dynamically populated here -->
        
      </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="script.js"></script>
</body>

</html>
