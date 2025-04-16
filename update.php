<?php
include 'connection.php';

if (!isset($_GET['updateid'])) {
    die("Missing updateid in URL.");
}

$id = $_GET['updateid'];
$sql = "SELECT * FROM `list` WHERE id = $id";
$result = mysqli_query($con, $sql);

if (!$result || mysqli_num_rows($result) === 0) {
    die("No record found for id = $id");
}

$row = mysqli_fetch_assoc($result);

// Extract current values
$fname = $row['Fname'];
$lname = $row['Lname'];
$age   = $row['Age'];
$bday  = $row['Birthday'];
$num   = $row['Mobile'];

// Handle form submission
if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age   = $_POST['age'];
    $bday  = $_POST['bday'];
    $num   = $_POST['num'];

    $sql = "UPDATE `list` SET 
                Fname = '$fname', 
                Lname = '$lname', 
                Age = '$age', 
                Birthday = '$bday', 
                Mobile = '$num' 
            WHERE id = $id";

    $update_result = mysqli_query($con, $sql);

    if ($update_result) {
        header("Location: read.php");
        exit();
    } else {
        die("Update failed: " . mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Update Record</title>
</head>
<body>
  <div class="container mt-5">
    <h2>Update Student Record</h2>
    <form method="post">
      <div class="mb-3">
        <label class="form-label">First Name</label>
        <input type="text" class="form-control" name="fname" value="<?= htmlspecialchars($fname) ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" class="form-control" name="lname" value="<?= htmlspecialchars($lname) ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Age</label>
        <input type="number" class="form-control" name="age" value="<?= htmlspecialchars($age) ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Birthday</label>
        <input type="text" class="form-control" name="bday" value="<?= htmlspecialchars($bday) ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Mobile</label>
        <input type="text" class="form-control" name="num" value="<?= htmlspecialchars($num) ?>" required>
      </div>

      <button type="submit" class="btn btn-primary" name="update">Update</button>
      <a href="read.php" class="btn btn-secondary">Back</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
