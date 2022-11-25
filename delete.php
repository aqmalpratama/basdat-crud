<?php
include_once("config.php");

$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM mahasiswa_main WHERE id=$id");
echo '<script>alert("Data deleted successfully")</script>';
echo '<script>window.location.href = "index.php"</script>';
