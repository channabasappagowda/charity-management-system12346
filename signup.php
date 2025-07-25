<?php
  // Start the session
  include "conn.php";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role= trim($_POST['role']);

    // Validate inputs
    if (empty($name) || empty($email) || empty($password) || empty($role) ) {
        echo "<script>alert('All fields are required!'); window.location.href='signup.php';</script>";
        exit();
    } else if (strlen($password) < 6) {
        echo "<script>alert('Password must be at least 6 characters long!'); window.location.href='signup.php';</script>";
        exit();
    }

    // Check if the username already exists
    $stmt = $conn->prepare("SELECT * FROM sign WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('user already exists. Please choose another!')</script>";
    } else {
        // Insert user into the database
        $stmt = $conn->prepare("INSERT INTO sign (name,email, password,role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name , $email,  $password, $role);

        if ($stmt->execute()) {
            echo "<script>alert('Registered Successfully !!!'); window.location.href='login.php';</script>";
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Charity Management System</title>
  <link rel="stylesheet" href="style2.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <header>
  <img src="logo2.png" alt="" width="100px" height="100px">
  <h1>Raising Hope Charity Management Foundation&#174;</h1>
  </header>

  <section class="signup">
    <h1><i class="fa-solid fa-circle-user"></i>&nbsp;&nbsp;&nbsp;Create Account</h1>
    <p>Join us today and make a difference in the world!</p>

    <?php
      if (isset($error_message)) {
        echo "<p style='color: red; text-align: center;'>$error_message</p>";
      }
    ?>

    <div class="signup-form">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="name"><i class="fa-solid fa-pen-nib"></i>&nbsp;&nbsp;&nbsp;Full Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email"><i class="fa-solid fa-paper-plane">&nbsp;&nbsp;&nbsp;</i>Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password"><i class="fa-solid fa-key"></i>&nbsp;&nbsp;&nbsp;Password</label>
        <input type="password" id="password" name="password" required>

        <label for="role"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;&nbsp;Sign up as</label>
        <select id="role" name="role" required>
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>

        <button type="submit" class="btn"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;&nbsp;Sign Up</button>
      </form>
    </div>

    <p>Already have an account? <a href="login.php"><i class="fa-solid fa-arrow-rotate-left"></i>Login here</a></p>
  </section>

  <footer>
    <p>&copy; 2024 Charity. All Rights Reserved.</p>
  </footer>
</body>
</html>

<style>
  /* Styles for Sign Up Page with Larger and Precise Text */

  body {
  background-image: url('hands.jpg'); /* Replace with the path to your image */
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}
  .login, .signup {
    padding: 3rem 2rem;
    max-width: 550px;
    margin: 2rem auto;
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .login h1, .signup h1 {
    font-size: 2.5rem; /* Increased font size */
    color: #f44336;
    text-align: center;
  }

  header {
    background-color: #f44336;
    color: white;
    padding: 1.5rem 0;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 1.5rem 2rem;
  }

  header h1 {
    font-size: 2.5rem; /* Increased font size */
  }

  h1 {
    font-size: 2.2rem; /* Increased font size */
    align-items: center;
    justify-content: center;
  }

  .login p, .signup p {
    text-align: center;
    font-size: 1.25rem; /* Larger text */
  }

  .login-form, .signup-form {
    margin-top: 1rem;
  }

  .login-form label, .signup-form label {
    display: block;
    margin: 1rem 0; /* Increased margin */
    font-size: 1.3rem; /* Larger font size */
  }

  .login-form input, .signup-form input, .login-form select, .signup-form select {
    width: 100%;
    padding: 1rem; /* Increased padding */
    margin: 0.8rem 0; /* Increased margin */
    border-radius: 5px;
    border: 1px solid #ddd;
    font-size: 1.3rem; /* Larger font size */
  }

  .login-form button, .signup-form button {
    background: #f44336;
    color: white;
    padding: 1rem 2rem; /* Increased padding */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    font-size: 1.3rem; /* Larger font size */
  }

  .login-form button:hover, .signup-form button:hover {
    background: #d32f2f;
  }

  a {
    color: #f44336;
    text-decoration: none;
    font-size: 1.3rem; /* Larger font size */
  }

  a:hover {
    text-decoration: underline;
  }
</style>