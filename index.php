<?php
include './dbPhp/dbh.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" href="img/favicon.png" type="image/x-icon"/>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <title>Orca Comment</title>
</head>

<body>
    <div class="container-fluid">
        <div class="col-10 mx-auto">
            <hr>
            <h1 class="text-center">Comment form</h1>
            <hr>
        </div>
        <div id="commentFormContainer">
            <form class="col-8 mx-auto comment-submit-form mainCommentForm" method="POST" id="commentForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="email" class="font-weight-bold col-lg-2 text-center">Email*</label>
                            <input id="email" type="email" name="email" class="form-control col-lg-10" required="required" data-error="Please enter your email.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="name" class="font-weight-bold col-lg-2 text-center" style="">Name*</label>
                            <input id="name" type="text" name="name" class="form-control col-lg-10" required="required" data-error="Please enter your name.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="comment" class="font-weight-bold col-lg-1 text-center">Comment*</label>
                            <textarea id="comment" name="comment" class="form-control col-lg-11" rows="3" required="required" data-error="Please enter comment."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-1"></div>
                    <input type="hidden" name="commentId" id="commentId" value="0" />
                    <div class="col-lg-11 pl-0">
                        <input type="button" name="submit" class="btn btn-secondary" value="Submit" onclick="submitForm('commentForm')">
                    </div>
                </div>
        </div>
        </form>
        <span id="commentMessage" class="text-center"></span>


        <div id="comments" class="col-md-8 mx-auto">
            <?php
            include './dbPhp/loadComments.php';
            ?>
        </div>
    </div>

    <script src="./js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>