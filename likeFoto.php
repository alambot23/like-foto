<?php
include_once "core/function.php";

$fotoId = $_GET["fotoId"];
$userId = $_SESSION["login"]["userId"];
// dd($userId);

$query = "SELECT * FROM likefoto WHERE fotoId = '$fotoId' AND userId = '$userId'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);
$likeId = $row["likeId"];
// dd($likeId);

if (empty($row) === false) {

    $query = "DELETE FROM likefoto WHERE likeId = '$likeId'";
    mysqli_query($conn, $query);
    // dd($query);
    mysqli_affected_rows($conn);

} else {

    $tanggal = date('Y-m-d');
    $query = "INSERT INTO likefoto VALUES (NULL, '$fotoId', '$userId' , '$tanggal')";
    // dd($query);
    mysqli_query($conn, $query);

    mysqli_affected_rows($conn);

}

header("Location: /index.php");