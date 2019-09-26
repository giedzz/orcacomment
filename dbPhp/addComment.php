<?php
include './dbh.php';

$error = '';
$formName = '';
$formComment = '';
$formEmail = '';
$parent = $_POST['commentId'];
$date = date("Y-m-d");

if (empty($_POST["name"])) {
    $error .= '<p> class="text-danger"> Name is required</p>';
} else {
    $formName = $_POST["name"];
}

if (empty($_POST["comment"])) {
    $error .= '<p> class="text-danger"> Comment is required</p>';
} else {
    $formComment = $_POST["comment"];
}

if (empty($_POST["email"])) {
    $error .= '<p> class="text-danger"> Email is required</p>';
} else {
    $formEmail = $_POST["email"];
}
if ($error == "") {
    $query = "INSERT INTO comments (id,parent_id, name, email, comment, date) VALUES (NULL,'$parent', '$formName', '$formEmail', '$formComment', '$date')";
    if (mysqli_query($conn, $query)) {
        $error = '<div class="col-8 mx-auto text-center">
        <label class="text-success"> Comment Added </label>
    </div>';
    } else {
        $error = "Error: <br>" . mysqli_error($conn);
    }
}

$data = array(
    'error' => $error
);


echo json_encode($data);
?>
