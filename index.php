<?php
require 'config.php';
$sql_all="select * from clients";
$res_all = $conn->query($sql_all);
if (!$res_all) {
    die("Data For all Users Not Arrived"." ".$conn->connect_error);   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <title>PHP_CRUD</title>
</head>
<body>
    <div class="conatainer my-5">
        <h2>List of Client Details</h2>
        <a class="btn btn-primary" href="create.php" role="button">New Client</a>
        <table class="table table-success table-striped-columns">
        <thead>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Creation_Time</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
       <?php
                while($row = $res_all->fetch_assoc()){
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['creation_time']}</td>
                        <td>
                            <a class='btn btn-success btn-sm' href='update.php?id={$row['id']}'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='delete.php?id={$row['id']}'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
        </tbody>

        </table>

    </div>
</body>
</html>

