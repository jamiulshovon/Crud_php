<?php
require "config.php";
$error ='';
$success = '';
$id="";
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
   $sql_id = "SELECT * FROM clients WHERE id = {$id}";
   $res = $conn->query($sql_id);
    $row=$res->fetch_assoc();
    $name=$row['name'];
    $email =$row['email'];
    $phone =$row['phone'];
    $address =$row['address'];

  if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql_edit ="UPDATE clients 
             SET name='{$name}', email='{$email}', phone='{$phone}', address='{$address}' 
             WHERE id={$id}";
    $resUpdate=$conn->query($sql_edit);
    if($resUpdate == TRUE){
        $success="Data Updated";
    }
    else{
        $error="Data Not Updated";
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>update Client</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container my-5">
    <h2>Update Client</h2>
    <?php if(!empty($error)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $error ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if(!empty($success)): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $success ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>


    <form method="post">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?= $name ?>">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= $email ?>">
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="<?= $phone ?>">
        </div>
        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control" rows="3"><?= $address ?></textarea>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update Client</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
</body>
</html>