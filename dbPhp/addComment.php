<?php
include './dbh.php';

$error = '';
$formName = '';
$formComment = '';
$formEmail = '';
$parent = $_POST['commentId'];
$date = date("Y-m-d");

if (empty($_POST["name"])) {
    $error .= '<p class="text-danger"> Name is required</p>';
} else {
    $formName = $_POST["name"];
}

if (empty($_POST["comment"])) {
    $error .= '<p class="text-danger"> Comment is required</p>';
} else {
    $formComment = $_POST["comment"];
}

if (empty($_POST["email"])) {
    $error .= '<p class="text-danger"> Email is required</p>';
} else {
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $error .= '<p class="text-danger"> Invalid email format, must contain</p>';
    }else{
        $formEmail = $_POST["email"];
    }
}


if ($error == "") {
    $query = "INSERT INTO comments (id,parent_id, name, email, comment, date) VALUES (NULL,'$parent', '$formName', '$formEmail', '$formComment', '$date')";
    if (mysqli_query($conn, $query)) {
         $error = ' ';
    } else {
        $error = "Error: <br>" . mysqli_error($conn);
    }
}

$data = array(
    'error' => $error
);


echo json_encode($data);
