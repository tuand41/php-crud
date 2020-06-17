<?php 
session_start();
$conn = new mysqli('localhost', 'root', '', 'crudphp') or die(mysql_error($conn));
$result = $conn->query("select * from person") or die($conn->error);

$id = 0;
$name = isset($_POST['name']) ? $_POST['name'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';

if(isset($_POST['save'])){

    $conn->query("INSERT INTO person(name, address) VALUES('$name', '$address')") or die($conn->error);

    $_SESSION['message'] = "insert success";
    $_SESSION['type'] = "primary";
    header('location: index.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM person WHERE id = '$id'") or die($conn->error());

    $_SESSION['message'] = "delete success";
    $_SESSION['type'] = "danger";
    header('location: index.php');
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $value = $conn->query("SELECT * FROM person WHERE id = '$id' LIMIT 1");
    $row = $value->fetch_assoc();
    $name = $row['name'];
    $address = $row['address'];

}

if(isset($_POST['update'])){
    $id = $_POST['id'];

    $conn->query("UPDATE person SET name = '$name', address = '$address' WHERE id = '$id'") or die($conn->error);

    $_SESSION['message'] = "update success";
    $_SESSION['type'] = "success";
    header('location: index.php');
}
?>
