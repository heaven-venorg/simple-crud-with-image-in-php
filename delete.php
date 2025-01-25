<?php
// Include Once
include_once './config.php';

// Ambil ID;
$id = $_GET['id'];

// Ambil nama foto sebelumnya;
$data = mysqli_query($con, "SELECT gambar FROM users WHERE id = '$id'");
$dataimage = mysqli_fetch_assoc($data);
$oldimage = $dataimage['gambar'];

// Delete gambar lama;
$link = "image/". $oldimage;
unlink($link);

// Delete dari table users;
$result = mysqli_query($con, "DELETE FROM users WHERE id = '$id'");

// Redirect
header("Location:index.php");