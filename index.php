<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $bday = $_POST['bday'];
    $num = $_POST['num'];

    $sql = "INSERT INTO `list` (Fname, Lname, Age, Birthday, Mobile) 
            VALUES ('$fname', '$lname', '$age', '$bday', '$num')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        header ('location:read.php');
    } else {
        die("❌ Error: " . mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container1 mt-5 "> <h1> PHP CRUD </h1>
  <div class="my-5">
<div class="container">
          </div>
      </div>
   </div>
   <div class="card" style= "width: 540px;">
<div class="card-header"><a class= "list" style ="font-size:25px;" href="read.php"> List of students</a> </div>
   <div class="card" style="width: 500px;">
    <form method="post" action="">
      <div class="mb-3">
        <label class="form-label">First Name</label>
        <input type="text" class="form-control" placeholder="Enter your first name" name="fname" autocomplete="off" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" class="form-control" placeholder="Enter your last name" name="lname" autocomplete="off" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Age</label>
        <input type="number" class="form-control" placeholder="Enter your age" name="age" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Birthday</label>
        <input type="date" class="form-control" name="bday" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Mobile</label>
        <input type="text" class="form-control" placeholder="Enter your mobile number" name="num" required>
      </div>

      <div class="mb-3">
        <button type="submit" class="btn btn-primary btn-lg" name="submit">Submit</button>
      </div>
    </form>
  </div>
   </div>
   

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
