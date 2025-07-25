<?php
// Include database connection
include "conn.php";

// Get record details from the URL
$id = $_GET['id'];
$type = $_GET['type'];

// Fetch the record based on the type
if ($type == 'donation') {
    $query = "SELECT * FROM donations WHERE id = ?";
} elseif ($type == 'request') {
    $query = "SELECT * FROM donation_requests WHERE id = ?";
} elseif ($type == 'message') {
    $query = "SELECT * FROM contact_messages WHERE id = ?";
}

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Handle form submission for updating
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    if ($type == 'donation') {
        $campaign = $_POST['campaign'];
        $amount = $_POST['amount'];
        $updateQuery = "UPDATE donations SET name = ?, email = ?, campaign = ?, amount = ? WHERE id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("sssdi", $name, $email, $campaign, $amount, $id);
    } elseif ($type == 'request') {
        $category = $_POST['category'];
        $description = $_POST['description'];
        $updateQuery = "UPDATE donation_requests SET name = ?, email = ?, category = ?, description = ? WHERE id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ssssi", $name, $email, $category, $description, $id);
    } elseif ($type == 'message') {
        $message = $_POST['message'];
        $updateQuery = "UPDATE contact_messages SET name = ?, email = ?, message = ? WHERE id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("sssi", $name, $email, $message, $id);
    }

    $stmt->execute();
    header("Location: details.php"); // Redirect to the details page
    exit();
}

// Handle record deletion
if (isset($_GET['delete'])) {
    if ($type == 'donation') {
        $deleteQuery = "DELETE FROM donations WHERE id = ?";
    } elseif ($type == 'request') {
        $deleteQuery = "DELETE FROM donation_requests WHERE id = ?";
    } elseif ($type == 'message') {
        $deleteQuery = "DELETE FROM contact_messages WHERE id = ?";
    }

    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: details.php"); // Redirect to the details page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit - Charity Management System</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('sack.jpg'); /* Background image */
            background-size: cover;
            background-position: center;
            color: #555;
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

        header img {
            margin-right: 20px;
        }

        header h1 {
            color: white; /* Set text color to white */
            text-align: center;
            font-size: 2.5rem;
            margin-top: 0;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            padding: 2rem;
            background-color: #fff;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 30px; /* Space from the header */
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="email"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #e53935;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #d32f2f;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .back-btn, .update-btn {
            background-color: #e53935;
            padding: 10px 20px;
            color: white;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none; /* Remove underline for link */
        }

        .back-btn:hover, .update-btn:hover {
            background-color: #d32f2f;
        }

        .back-btn-container {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
        }

        h1 {
            color: #333;
            text-align: center;
            font-size: 2.5rem;
            margin-top: 0;
        }
    </style>
</head>
<body>

<header>
    <img src="logo2.png" alt="Logo" width="100px" height="100px">
    <h1>Raising Hope Charity Management Foundation&#174;</h1>
</header>

<div class="container">
    <h1>Edit</h1>

    <form action="edit.php?id=<?php echo $id; ?>&type=<?php echo $type; ?>" method="POST">

        <!-- Dynamic fields based on type -->
        <?php if ($type == 'donation') { ?>
            <div class="form-group">
                <label for="name">Donor Name:</label>
                <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="campaign">Campaign Name:</label>
                <input type="text" name="campaign" id="campaign" value="<?php echo htmlspecialchars($row['campaign']); ?>" required>
            </div>
            <div class="form-group">
                <label for="amount">Donation Amount ($):</label>
                <input type="number" name="amount" id="amount" value="<?php echo htmlspecialchars($row['amount']); ?>" required>
            </div>
        <?php } elseif ($type == 'request') { ?>
            <div class="form-group">
                <label for="name">Requestor Name:</label>
                <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="category">Request Category:</label>
                <input type="text" name="category" id="category" value="<?php echo htmlspecialchars($row['category']); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Request Description:</label>
                <textarea name="description" id="description" required><?php echo htmlspecialchars($row['description']); ?></textarea>
            </div>
        <?php } elseif ($type == 'message') { ?>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea name="message" id="message" required><?php echo htmlspecialchars($row['message']); ?></textarea>
            </div>
        <?php } ?>

        <div class="btn-container">
            <button type="submit" class="update-btn">Update</button>
            <a href="details.php" class="back-btn">Back</a>
        </div>
    </form>
</div>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>