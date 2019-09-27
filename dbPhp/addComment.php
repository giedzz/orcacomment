<?php
include './dbh.php';


$id = NULL;
$error = '';
$formName = '';
$formComment = '';
$formEmail = '';
$parent = $_POST['commentId'];
$date = date("Y-m-d");

if (empty(filter_var($_POST["name"], FILTER_SANITIZE_STRING))) {
    $error .= '<p class="text-danger"> Name is required</p>';
} else {
    $formName = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $formName = preg_replace('/[^\pL\s]+/u', '', $formName);
}

if (empty(htmlspecialchars($_POST["comment"]))) {
    $error .= '<p class="text-danger"> Comment is required</p>';
} else {
    $formComment = (htmlspecialchars($_POST["comment"]));
}

if (empty($_POST["email"])) {
    $error .= '<p class="text-danger"> Email is required</p>';
} else {
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $error .= '<p class="text-danger"> Invalid email format</p>';
    }else{
        $formEmail = $_POST["email"];
    }
}


if ($error == "") {


    $query = "INSERT INTO comments (id,parent_id, name, email, comment, date) VALUES (:id, :parent, :formName, :formEmail, :formComment, :date)";
    $statement = $connect -> prepare($query);
    $statement -> execute(
        array(
            ':id' => $id,
            ':parent' => $parent,
            ':formName' => $formName,
            ':formEmail' => $formEmail,
            ':formComment' => $formComment,
            ':date' => $date
        )
    );
     $error = ' ';
}

$data = array(
    'error' => $error
);


echo json_encode($data);
