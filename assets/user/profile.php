<?php
include("/xampp/htdocs/BeyondWords/assets/generalPHP/configureDB.php");
include("/xampp/htdocs/BeyondWords/assets/shared/header.php");
include("/xampp/htdocs/BeyondWords/assets/shared/nav.php");


if(isset($_GET["profile"])){
    $userID = $_GET["profile"];
    $select = "SELECT * FROM `users` WHERE id = $userID";
    $selectQuery = mysqli_query($connect, $select);
    $userRow = mysqli_fetch_assoc($selectQuery);
}

if(isset($_POST["update"])){
    $userID = $_GET["profile"];
    $userName = $_POST["userName"];
    $age = $_POST["age"];
    $phone = $_POST["phone"];
    $altPhone = $_POST["altPhone"];
    $address = $_POST["address"];
    $altAddress = $_POST["altAddress"];
    $password = $_POST["password"];
    $update = "UPDATE `users` SET userName ='$userName', age = '$age', phone = '$phone', altPhone = '$altPhone', address = '$address', altAddress = '$altAddress', password = '$password' WHERE id = $userID";
    $updateQuery = mysqli_query($connect, $update);
    $message = "Profile updated successfully";
    echo '<div class="alert alert-success alert-dismissible fade show col-4 m-auto" role="alert">
    '.$message.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
?>


<div class="container">
<h1 class="my-5 text-center">My Profile</h1>
<div class="col-6 m-auto">
<form method="POST">
  <div class="form-group">
    <label for="userName">Name:</label>
    <input type="text" value="<?php echo $userRow["userName"]; ?>" class="form-control" name="userName" id="userName">
  </div>
  <div class="form-group">
    <label for="age">Age:</label>
    <select class="form-control" name="age" id="age">
    <option selected="true" hidden value="<?php echo $userRow["age"]; ?>"><?php echo $userRow["age"]; ?></option>
    <?php
        for($a = 16; $a <= 99; $a++){?>
        <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
    <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="text" value="<?php echo $userRow["phone"]; ?>" class="form-control" id="phone" name="phone">
  </div>
  <div class="form-group">
    <label for="altPhone">Alternative Phone:</label>
    <input type="text" value="<?php echo $userRow["altPhone"]; ?>" class="form-control" id="altPhone" name="altPhone">
  </div>
  <div class="form-group">
    <label for="address">Address:</label>
    <input type="text" value="<?php echo $userRow["address"]; ?>" class="form-control" id="address" name="address">
  </div>
  <div class="form-group">
    <label for="altAddress">Alternative Address:</label>
    <input type="text" value="<?php echo $userRow["altAddress"]; ?>" class="form-control" id="altAddress" name="altAddress">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="text" disabled value="<?php echo $userRow["email"]; ?>" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="text" value="<?php echo $userRow["password"]; ?>" class="form-control" id="password" minlength="6" name="password">
  </div>

  <button type="submit" id="update" name="update" class="btn btn-primary">Update</button>
</form>
</div>
</div>



<?php
include("/xampp/htdocs/BeyondWords/assets/shared/footer.php");
?>