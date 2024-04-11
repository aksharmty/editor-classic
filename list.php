<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
<title>Free Article Submission - Adquash Articles</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
</head>
    <body>
<div class="section-home our-causes">

        <div class="container">
            <div class="row">          

                <div class="col-md-9 col-sm-6">
    <h2 class="title-style-1">Article List<span class="title-under"></span></h2>
    <div class="col-md-12"><?php
include "connect.php";
$sql = "SELECT * FROM tbl_ckeditor";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. "<br> - Title: " . $row["title"]. "<br> " . $row["content"]. "<br>";
  }
} else {
  echo "0 results";
}
?>
</div><div class="col-md-3"></div>