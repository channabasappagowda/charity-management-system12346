<?php
  // Start the session if needed
  session_start();
  include "conn.php";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("SELECT * FROM sign WHERE email = ? AND password = ? AND role = ?");
    $stmt->bind_param("sss", $email, $password, $role);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        // Set session variables
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $row['role'];

        // Redirect based on role
        if ($role == 'user') {
            header("Location: index.php"); // Redirect to user homepage
        } else if ($role == 'admin') {
            header("Location: details.php"); // Redirect to admin dashboard
        }
        exit();
    } else {
        echo "<script>alert('Invalid email, password, or role.'); window.location.href='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Charity Management System</title>
  <link rel="stylesheet" href="style2.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
  <header>
    <img src="logo2.png" alt="" width="100px" height="100px">
    <h1>Raising Hope Charity Management Foundation&#174;</h1>
  </header>

  <!-- Moving Text -->
  <marquee behavior="scroll" direction="left" style="background: #f44336; color: white; font-size: 1.5rem; padding: 0.5rem 0;">
    Every Single Rupee Makes The Page of the Book.
  </marquee>

  <section class="login">
    <h1><i class="fa-solid fa-gears"></i>&nbsp;&nbsp;&nbsp;Login</h1>
    <p>Welcome back! Please log in to your account.</p>

    <?php
      if (isset($error_message)) {
        echo "<p style='color: red; text-align: center;'>$error_message</p>";
      }
    ?>

    <div class="login-form">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="email"><i class="fa-solid fa-paper-plane">&nbsp;&nbsp;&nbsp;</i>Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password"><i class="fa-solid fa-key"></i>&nbsp;&nbsp;&nbsp;Password</label>
        <input type="password" id="password" name="password" required>

        <label for="role"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;&nbsp;Login as</label>
        <select id="role" name="role" required>
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      
        <button type="submit" class="btn"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;&nbsp;&nbsp;Login</button>
      </form>
    </div>
    <p>Don't have an account? <a href="signup.php"><i class="fa-solid fa-user"></i>Sign up here</a></p>
  </section>

  <footer>
    <p>&copy; 2024 Charity. All Rights Reserved.</p>
  </footer>
</body>
</html>

<style>
  /* Additional Styles for Login and Signup Pages */
  body {
    background-image: url('kids.png'); /* Replace with the path to your image */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }

  .login, .signup {
    padding: 3rem 2rem;
    max-width: 500px;
    margin: 2rem auto;
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .login h1, .signup h1 {
    font-size: 2.5rem; /* Increased size */
    color: #f44336;
    text-align: center;
  }

  header {
    background-color: #f44336;
    color: white;
    padding: 1.5rem 0; /* Increased padding */
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 1.5rem 2rem; /* Increased padding */
  }

  header h1 {
    font-size: 2.5rem; /* Increased size */
    text-align: center;
  }

  h1 {
    font-size: 2.2rem; /* Increased size */
    align-items: center;
    justify-content: center;
  }

  .login p, .signup p {
    text-align: center;
    font-size: 1.25rem; /* Increased size */
  }

  .login-form, .signup-form {
    margin-top: 1rem;
  }

  .login-form label, .signup-form label {
    display: block;
    margin: 0.8rem 0; /* Increased margin */
    font-size: 1.2rem; /* Increased size */
  }

  .login-form input, .signup-form input, .login-form select, .signup-form select {
    width: 100%;
    padding: 1rem; /* Increased padding */
    margin: 0.8rem 0; /* Increased margin */
    border-radius: 5px;
    border: 1px solid #ddd;
    font-size: 1.2rem; /* Increased size */
  }

  /* Updated Styles for Login Button */
  .login-form button {
    background: #f44336; /* Initial color */
    color: white;
    padding: 1rem 1.8rem; /* Increased padding */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    font-size: 1.2rem; /* Increased size */
    transition: background-color 0.3s ease; /* Smooth transition for background color */
  }

  .login-form button:hover {
    background: #d32f2f; /* Darker red on hover */
  }

  /* Optional: Focus state for accessibility */
  .login-form button:focus {
    outline: none;
    box-shadow: 0 0 5px rgba(244, 67, 54, 0.8); /* Focused button glow */
  }

  a {
    color: #f44336;
    text-decoration: none;
    font-size: 1.2rem; /* Increased size */
  }

  a:hover {
    text-decoration: underline;
  }
</style>
