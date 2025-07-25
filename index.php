<?php
session_start(); // Start the session

// Set the page title dynamically (you can set this based on the page's content)
$pageTitle = "Raising Hope Charity - Home"; // Set a default title here or dynamically based on the page

// Handle Logout Request
if (isset($_POST['logout'])) {
    session_destroy(); // Destroy the session
    header("Location: login.php"); // Redirect to login page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($pageTitle); ?></title> <!-- Escaping the page title for security -->
  <style>
    /* General Styles */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      line-height: 1.6;
      color: #333;
    }

    header {
      background-color: #f44336;
      color: white;
      padding: 1rem 0;
      text-align: center;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
    }

    header .logo {
      font-size: 1.5rem;
      font-weight: bold;
    }

    header h1 {
      margin: 0; /* Remove margin to bring it closer */
      padding-left: 10px; /* Adjust this value to bring the heading closer to the logo */
      font-size: 2.5rem;
    }

    header nav ul {
      list-style: none;
      padding: 0;
      display: flex;
      gap: 1rem;
    }

    header nav ul li {
      display: inline-block;
    }

    header nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    header nav ul li a:hover {
      text-decoration: underline;
    }

    header .logout-btn {
      background-color: #d32f2f;
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      font-size: 1rem;
      cursor: pointer;
      border-radius: 5px;
    }

    header .logout-btn:hover {
      background-color: #b71c1c;
    }

    .hero {
      text-align: center;
      padding: 2rem;
      background-image: url('coins.jpg'); /* Using coins.jpg as the background image */
      background-size: cover; /* Ensures the image covers the entire div */
      background-position: center; /* Centers the image */
      background-repeat: no-repeat; /* Prevents the image from repeating */
      color: white; /* Ensures that the text stands out */
    }

    .hero h1 {
      margin-bottom: 1rem;
      font-size: 2.5rem;
    }

    .hero p {
      margin-bottom: 1.5rem;
    }

    .hero .btn {
      background: #f44336;
      color: white;
      padding: 0.7rem 1.5rem;
      text-decoration: none;
      font-size: 1rem;
      border-radius: 5px;
    }

    .hero .btn:hover {
      background: #d32f2f;
    }

    .campaigns {
      padding: 2rem;
      background: #f9f9f9;
    }

    .campaigns h2 {
      text-align: center;
      margin-bottom: 2rem;
    }

    .campaign-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1rem;
    }

    .campaign {
      background: white;
      padding: 1rem;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .campaign h3 {
      margin-bottom: 0.5rem;
      font-size: 1.2rem;
      color: #f44336;
    }

    footer {
      text-align: center;
      padding: 1rem;
      background: #333;
      color: white;
    }
  </style>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <header>
    <img src="logo2.png" alt="Rising Hope Charity" width="100px" height="100px">
    <h1>Raising Hope Charity&#174;</h1>
    <nav>
      <ul>
        <li><a href="index.php"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;&nbsp;Home</a></li>
        <li><a href="about.php"><i class="fa-solid fa-address-card"></i>&nbsp;&nbsp;&nbsp;About</a></li>
        <li><a href="donate.php"><i class="fa-solid fa-hand-holding-dollar"></i>&nbsp;&nbsp;&nbsp;Donate</a></li>
        <li><a href="donation_request.php"><i class="fa-solid fa-bell-concierge"></i>&nbsp;&nbsp;&nbsp;Request-Donation</a></li>
        <li><a href="contact.php"><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;&nbsp;Contact</a></li>
      </ul>
    </nav>
    <!-- Logout Button -->
    <form method="post" style="margin: 0;">
      <button class="logout-btn" name="logout"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;&nbsp;&nbsp;Logout</button>
    </form>
  </header>

  <section class="hero">
    <h1>Making the World a Better Place</h1>
    <p>Join us in supporting noble causes and bringing change to communities in need.</p>
    <a href="donate.php" class="btn">Donate Now</a>
  </section>

  <section class="campaigns">
    <h2>Featured Campaigns</h2>
    <div class="campaign-grid">
      <div class="campaign">
        <h3><i class="fa-solid fa-bowl-food"></i>&nbsp;&nbsp;&nbsp;Food for All</h3>
        <p>Providing meals to underprivileged families.</p>
      </div>
      <div class="campaign">
        <h3><i class="fa-solid fa-book"></i>&nbsp;&nbsp;&nbsp;Education for Kids</h3>
        <p>Ensuring education for children in rural areas.</p>
      </div>
      <div class="campaign">
        <h3><i class="fa-solid fa-kit-medical"></i>&nbsp;&nbsp;&nbsp;Healthcare Support</h3>
        <p>Offering free medical care to those in need.</p>
      </div>
    </div>
  </section>

  <footer>
    <p>&copy; 2024 Charity. All Rights Reserved.</p>
  </footer>
</body>
</html>