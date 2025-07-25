<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Request Donation - Charity Management System</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Arial:wght@400;700&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    /* General Styles */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      line-height: 1.6;
      color: #333;
      background-image: url('sack.jpg'); /* Background image */
      background-size: cover; /* Ensure it covers the page */
      background-position: center; /* Center the background image */
      background-attachment: fixed; /* Fix the background image so it doesn't scroll */
    }

    header {
      background-color: #f44336;
      color: white;
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

    header nav ul {
      list-style: none;
      padding: 0;
      display: flex;
      gap: 1rem;
    }

    header nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    header nav ul li a:hover {
      text-decoration: underline;
    }

    .donate-container {
      padding: 2rem;
      max-width: 600px;
      margin: 2rem auto;
      background: rgba(255, 255, 255, 0.9); /* Slight white background for readability */
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .donate-form h1 {
      color: #f44336;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    .form-group label {
      display: block;
      margin-bottom: 0.5rem;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
      width: 100%;
      padding: 0.5rem;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .btn {
      background: #f44336;
      color: white;
      padding: 0.7rem 1.5rem;
      text-decoration: none;
      font-size: 1rem;
      border-radius: 5px;
      border: none;
      cursor: pointer;
    }

    .btn:hover {
      background: #d32f2f;
    }

    footer {
      text-align: center;
      padding: 1rem;
      background: #333;
      color: white;
    }
  </style>
</head>
<body>
  <header>
    <img src="logo2.png" alt="Logo" width="100px" height="100px">
    <h1>Raising Hope Charity Management Foundation&#174;</h1>
    <nav>
      <ul>
        <li><a href="index.php"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;&nbsp;Home</a></li>
        <li><a href="about.php"><i class="fa-solid fa-address-card"></i>&nbsp;&nbsp;&nbsp;About</a></li>
        <li><a href="donate.php"><i class="fa-solid fa-hand-holding-dollar"></i>&nbsp;&nbsp;&nbsp;Donate</a></li>
        <li><a href="donation_request.php"><i class="fa-solid fa-bell-concierge"></i>&nbsp;&nbsp;&nbsp;Request-Donation</a></li>
        <li><a href="contact.php"><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;&nbsp;Contact</a></li>
      </ul>
    </nav>
  </header>

  <main class="donate-container">
    <section class="donate-form">
      <h1><i class="fa-solid fa-handshake-simple"></i>&nbsp;&nbsp;&nbsp;Request for Donation</h1>
      <p>If you're in need of assistance, please fill out the form below to request a donation. We'll review your request and reach out soon.</p>
      <form action="donation_request.php" method="post">
        <div class="form-group">
          <label for="name"><i class="fa-solid fa-pen-nib"></i>&nbsp;&nbsp;&nbsp;Full Name:</label>
          <input type="text" id="name" name="name" placeholder="Enter your full name" required>
        </div>

        <div class="form-group">
          <label for="email"><i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;&nbsp;Email Address:</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="form-group">
          <label for="phone"><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;&nbsp;Phone Number:</label>
          <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
        </div>

        <div class="form-group">
          <label for="category"><i class="fa-regular fa-hand-point-right"></i>&nbsp;&nbsp;&nbsp;Donation Request Category:</label>
          <select id="category" name="category" required>
            <option value="" disabled selected>Select a category</option>
            <option value="food">Food Assistance</option>
            <option value="education">Educational Support</option>
            <option value="healthcare">Healthcare Aid</option>
            <option value="other">Other</option>
          </select>
        </div>

        <div class="form-group">
          <label for="description"><i class="fa-solid fa-message"></i>&nbsp;&nbsp;&nbsp;Request Description:</label>
          <textarea id="description" name="description" rows="4" placeholder="Describe your need" required></textarea>
        </div>

        <button type="submit" class="btn"><i class="fa-solid fa-circle-check"></i>&nbsp;&nbsp;&nbsp;Submit Request</button>
      </form>
    </section>
  </main>

  <footer>
    <p>&copy; 2024 Charity. All Rights Reserved.</p>
  </footer>

  <?php
  // Include database connection
  include "conn.php";

  // Check if the form was submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Get form data
      $name = trim($_POST['name']);
      $email = trim($_POST['email']);
      $phone = trim($_POST['phone']);
      $category = trim($_POST['category']);
      $description = trim($_POST['description']);

      // Validate inputs
      if (empty($name) || empty($email) || empty($phone) || empty($category) || empty($description)) {
          echo "<script>alert('All fields are required!'); window.location.href='donation_request.php';</script>";
          exit();
      }

      // Insert donation request into the database
      $stmt = $conn->prepare("INSERT INTO donation_requests (name, email, phone, category, description) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("sssss", $name, $email, $phone, $category, $description);

      if ($stmt->execute()) {
          echo "<script>alert('Request submitted successfully. We will contact you soon!'); window.location.href='donation_request.php';</script>";
      } else {
          echo "Error: " . $stmt->error;
      }
  }
  ?>

</body>
</html>