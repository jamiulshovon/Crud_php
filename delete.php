<?php
require "config.php"; 

if(isset($_GET["id"])){
    $id = $_GET['id'];

    $sql_del = "DELETE FROM clients WHERE id = {$id}";
    $res = $conn->query($sql_del);

   if($res){
    echo '<div class="alert alert-success">Client deleted successfully.</div>';
} else {
    echo '<div class="alert alert-danger">Error deleting client: '.$conn->error.'</div>';
}
} else {
    echo "ID not provided!";
}
?>
