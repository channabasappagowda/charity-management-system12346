<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About - Charity Management System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    /* General Styles */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      line-height: 1.6;
      color: white; /* Change body text color to white */
      background-image: url('health.jpg'); /* Add health.jpg as background image */
      background-size: cover; /* Ensure the background image covers the entire page */
      background-position: center; /* Center the background image */
      background-repeat: no-repeat; /* Prevent the background image from repeating */
    }
    
    header {
      background-color: rgba(244, 67, 54, 0.8); /* Slightly transparent background to improve readability */
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
    
    /* About Page Styles */
    .about-container {
      padding: 2rem;
      max-width: 1200px;
      margin: 0 auto;
      background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background for readability */
      border-radius: 10px;
    }
    
    .about-us {
      text-align: center;
      margin-bottom: 2rem;
    }
    
    .about-us h1 {
      font-size: 2.5rem;
      color: #f44336;
    }
    
    .about-us p {
      margin: 1rem 0;
      font-size: 1.1rem;
    }
    
    .mission-vision {
      display: flex;
      justify-content: space-between;
      gap: 2rem;
      margin: 2rem 0;
    }
    
    .mission,
    .vision {
      flex: 1;
      padding: 1rem;
      background: #f9f9f9;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      display: flex; /* Enable flexbox */
      flex-direction: column; /* Stack content vertically */
      justify-content: center; /* Center content vertically */
      align-items: center; /* Center content horizontally */
      text-align: center; /* Optional: Ensure text is centered */
    }
    
    .mission h2,
    .vision h2 {
      font-size: 1.5rem;
      color: #f44336;
    }
    
    .mission p,
    .vision p {
      color: black; /* Change the description text color to black */
    }
    
    .core-values {
      margin: 2rem 0;
    }
    
    .core-values h2 {
      text-align: center;
      font-size: 1.8rem;
      color: #f44336;
    }
    
    .core-values ul {
      list-style: none;
      padding: 0;
      margin: 1rem 0;
    }
    
    .core-values li {
      margin: 1rem 0;
      font-size: 1.1rem;
    }
    
    .core-values strong {
      color: #f44336;
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
    <img src="logo2.png" alt="" width="100px" height="100px">
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
  </header>

  <main class="about-container">
    <section class="about-us">
      <h1><i class="fa-solid fa-circle-info"></i>&nbsp;&nbsp;&nbsp;About Us</h1>
      <p>
        Welcome to <strong>Charity</strong>, a platform dedicated to supporting noble causes 
        and uplifting communities in need. Our mission is to bridge the gap between 
        generous donors and impactful campaigns, ensuring resources reach where they are needed most.
      </p>
      <p>
        Founded in 2024, we have grown into a trusted charity management system, connecting 
        donors and volunteers with campaigns that make a real difference. We believe in the 
        power of collective action to bring about positive change.
      </p>
    </section>

    <section class="mission-vision">
      <div class="mission">
        <h2><i class="fa-solid fa-hand-back-fist"></i>&nbsp;&nbsp;&nbsp;Our Mission</h2>
        <p>To empower communities by providing resources, opportunities, and support to those in need.</p>
      </div>
      <div class="vision">
        <h2><i class="fa-regular fa-eye"></i>&nbsp;&nbsp;&nbsp;Our Vision</h2>
        <p>A world where every individual has access to basic needs, education, and opportunities to thrive.</p>
      </div>
    </section>

    <section class="core-values">
      <h2><i class="fa-solid fa-hand-holding-hand"></i>&nbsp;&nbsp;&nbsp;Our Core Values</h2>
      <ul>
        <li><strong>Compassion:</strong> Putting humanity first in everything we do.</li>
        <li><strong>Transparency:</strong> Building trust through accountability and honesty.</li>
        <li><strong>Innovation:</strong> Finding creative solutions to complex challenges.</li>
        <li><strong>Collaboration:</strong> Partnering with communities, organizations, and individuals for greater impact.</li>
      </ul>
    </section>
  </main>

  <footer>
    <p>&copy; 2024 Charity. All Rights Reserved.</p>
  </footer>
</body>
</html>