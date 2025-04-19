<?php
include 'connection.php';

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
 <div class="container my-5">
 <table class="table table-bordered table-hover">
  <thead class="table-light table-striped">
  <div data-bs-theme="dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Age</th>
      <th scope="col">Birthday</th>
      <th scope="col">Mobile</th>
      <th scope="col">Action</th>
    </tr>
</div>
  </thead>
  <tbody>
  <?php
$sql = "SELECT * FROM `list`";
$result = mysqli_query($con, $sql);



while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $fname = $row['Fname'];
    $lname = $row['Lname'];
    $age = $row['Age'];
    $bday = $row['Birthday'];
    $num = $row['Mobile'];

    echo '<tr>
        <th scope="row">' .$id.'</th>
        <td>' . $fname . '</td>
        <td>' . $lname . '</td>
        <td>' . $age . '</td>
        <td>' . $bday . '</td>
        <td>' . $num . '</td>
        <td> 
    <a href="update.php?updateid=' . $id. '" class= "btn btn-dark"> Update </a> 
    <a href="delete.php?deletedid='.$id.'" class= "btn btn-danger"> Delete </a> 
     
      
    </td>
    </tr>';
}
?>
  
     <div class="container-1">
    <a href="index.php" style ="text-decoration:none; font-size:25px;"> Add Students </a>
    
  </div>
  </tbody>
</table>
 </div>
</body>
</html>