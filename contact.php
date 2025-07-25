<?php
// Include database connection if you want to store contact messages in the database
include "conn.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Validate inputs
    if (empty($name) || empty($email) || empty($message)) {
        echo "<script>alert('All fields are required!'); window.location.href='contact.php';</script>";
        exit();
    }


    $stmt = $conn->prepare("INSERT INTO contact_messages (name,email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "<script>alert('Thank you '); window.location.href='contact.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - Charity Management System</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    /* General Styles */
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        line-height: 1.6;
        color: #333;
        background-image: url('rural.jpg'); /* Background image */
        background-size: cover; /* Ensure it covers the entire page */
        background-position: center; /* Center the background image */
        background-attachment: fixed; /* Fix the background image while scrolling */
    }
    
    header {
        background-color: #f44336; /* Solid red background */
        color: white;
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
    
    /* Contact Page Styles */
    .contact-container {
        max-width: 900px;
        margin: 2rem auto;
        padding: 1rem;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
    }
    
    .contact-info, .contact-form {
        background: rgba(249, 249, 249, 0.9); /* Light white background for forms */
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .contact-info h1, .contact-form h2 {
        color: #f44336;
        margin-bottom: 1rem;
    }
    
    .contact-info p, .contact-info a, label {
        font-size: 1rem;
        margin-bottom: 0.5rem;
        color: #333;
    }
    
    .contact-info a {
        text-decoration: none;
        color: #f44336;
    }
    
    .contact-info a:hover {
        text-decoration: underline;
    }
    
    .form-group {
        margin-bottom: 1rem;
    }
    
    input, textarea {
        width: 100%;
        padding: 0.8rem;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    
    textarea {
        resize: vertical;
        height: 150px; /* Set height for textarea */
    }
    
    input:focus, textarea:focus {
        outline: none;
        border-color: #f44336;
    }
    
    .btn {
        display: inline-block;
        width: 100%;
        background: #f44336;
        color: white;
        font-size: 1rem;
        padding: 0.8rem;
        border: none;
        border-radius: 5px;
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
    
    /* Increase icon size */
    .contact-info a i {
        font-size: 2rem; /* Increase the size of the icons */
        margin-right: 10px; /* Add space between icons */
    }

    .contact-info a:hover i {
        color: #d32f2f; /* Optional: change color on hover */
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .contact-container {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
    }
  </style>
</head>
<body>
  <header>
    <img src="logo2.png" alt="" width="100px" height="100px">
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

  <main class="contact-container">
    <section class="contact-info">
      <h1>Contact Us</h1>
      <p>We'd love to hear from you! If you have any questions, feedback, or need support, please fill out the form or use the details below to reach us.</p>
      <div class="info">
        <p><strong>Address:</strong> Vidyanagara, Davangere, 577005</p>
        <p><strong>Email:</strong> <a href="mailto:harshithks95356@gmail.com">harshithks95356@gmail.com</a></p>
        <p><strong>Phone:</strong> +91 9008909935</p>
        <p><strong>Working Hours:</strong> Mon - Fri, 9:00 AM - 5:00 PM</p>
        <p><strong>Reach Us Through:</strong></p>
        <p>
          <a href="https://youtube.com" target="_blank"><i class="fa-brands fa-youtube"></i>&nbsp;&nbsp;&nbsp;</a>
          <a href="https://m.me" target="_blank"><i class="fa-brands fa-facebook-messenger"></i>&nbsp;&nbsp;&nbsp;</a>
          <a href="https://twitter.com" target="_blank"><i class="fa-brands fa-square-x-twitter"></i>&nbsp;&nbsp;&nbsp;</a>
          <a href="https://instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i>&nbsp;&nbsp;&nbsp;</a>
          <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-facebook"></i></a>
        </p>
      </div>
    </section>

    <section class="contact-form">
      <h2>Any suggestions?</h2>
      <form action="contact.php" method="post">
        <div class="form-group">
          <label for="name"><i class="fa-solid fa-pen-nib"></i>&nbsp;&nbsp;&nbsp;Your Name:</label>
          <input type="text" id="name" name="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
          <label for="email"><i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;&nbsp;Your Email:</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
          <label for="message"><i class="fa-solid fa-message"></i>&nbsp;&nbsp;&nbsp;Your Message:</label>
          <textarea id="message" name="message" rows="5" placeholder="Write your message here..." required></textarea>
        </div>
        <button type="submit" class="btn">Send Message</button>
      </form>
    </section>
  </main>

  <footer>
    <p>&copy; 2024 Charity. All Rights Reserved.</p>
  </footer>
</body>
</html