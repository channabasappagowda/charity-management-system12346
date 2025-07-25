<?php
// Include the database connection
include "conn.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $campaign = trim($_POST['campaign']);
    $amount = trim($_POST['amount']);

    // Validate inputs
    if (empty($name) || empty($email) || empty($campaign) || empty($amount)) {
        echo "<script>alert('All fields are required!'); window.location.href='donate.php';</script>";
        exit();
    }

    // Insert the donation details into the database
    $stmt = $conn->prepare("INSERT INTO donations (name, email, campaign, amount) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssd", $name, $email, $campaign, $amount);

    if ($stmt->execute()) {
        echo "<script>alert('Thank you for your generous donation!'); window.location.href='donate.php';</script>";
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
    <title>Donate - Charity Management System</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-image: url('bred.jpg'); /* Background image */
            background-size: cover; /* Ensure it covers the page */
            background-position: center; /* Centers the image */
            background-attachment: fixed; /* Keeps the background fixed while scrolling */
        }

        header {
            background-color: #f44336; /* Fully opaque background */
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

        /* Donate Page Styles */
        .donate-container {
            padding: 2rem;
            max-width: 600px;
            margin: 2rem auto;
        }

        /* Make Donation Section */
        .make-donation {
            padding: 2rem;
            background: #fff; /* White background for form section */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .donate-form h1 {
            text-align: center;
            color: #f44336;
            margin-bottom: 1rem;
        }

        .donate-form p {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        input, 
        select {
            width: 100%;
            padding: 0.8rem;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input:focus, 
        select:focus {
            outline: none;
            border-color: #f44336;
        }

        .btn {
            display: block;
            width: 100%;
            background: #f44336;
            color: white;
            font-size: 1.1rem;
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
        <section class="make-donation">
            <div class="donate-form">
                <h1><i class="fa-solid fa-hand-holding-dollar"></i>&nbsp;&nbsp;&nbsp;Make a Donation</h1>
                <p>Your contribution can make a significant difference. Please fill out the form below to donate.</p>
                <form action="donate.php" method="post">
                    <div class="form-group">
                        <label for="name"><i class="fa-solid fa-pen-nib"></i>&nbsp;&nbsp;&nbsp;Full Name:</label>
                        <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                    </div>

                    <div class="form-group">
                        <label for="email"><i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;&nbsp;Email Address:</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <div class="form-group">
                        <label for="campaign"><i class="fa-regular fa-hand-point-right"></i>&nbsp;&nbsp;&nbsp;Select Campaign:</label>
                        <select id="campaign" name="campaign" required>
                            <option value="" disabled selected>Select a campaign</option>
                            <option value="food">Food for All</option>
                            <option value="education">Education for Kids</option>
                            <option value="healthcare">Healthcare Support</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="amount"><i class="fa-solid fa-sack-dollar"></i>&nbsp;&nbsp;&nbsp;Donation Amount ($):</label>
                        <input type="number" id="amount" name="amount" min="1" placeholder="Enter amount" required>
                    </div>

                    <button type="submit" class="btn"><i class="fa-solid fa-circle-check"></i>&nbsp;&nbsp;&nbsp;Donate Now</button>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Charity. All Rights Reserved.</p>
    </footer>
</body>
</html>