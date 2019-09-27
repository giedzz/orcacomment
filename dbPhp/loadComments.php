<?php
include 'dbh.php';


$queryAllComments = "SELECT * FROM comments";
$statement = $connect->prepare($queryAllComments);
$statement->execute();
$resultComments = $statement->fetchAll();
$rowCount = count($resultComments);

$query = "SELECT * FROM comments WHERE parent_id='0' ORDER BY id DESC";

$statement = $connect->prepare($query);

$statement->execute();


$resultComments = $statement->fetchAll();

if (count($resultComments) > 0) {
    echo '<h1 class="mt-3 mb-3">' . $rowCount . ' Comments</h1>';
    foreach ($resultComments as $row) {
        echo '<div class="media mt-3" id="reply' . $row['id'] . '">';
        echo '<div class="media-body">';
        echo '<h5 class="mt-0">' . $row['name'] . " <small class='date'>" . date('j M Y', strtotime($row['date'])) . "</small>
        <small class='float-right reply' id='" . $row['id'] . "'>
        <i class='material-icons' style='vertical-align: text-bottom;'>replay</i>Reply</small></h5>";
        echo $row['comment'];
        echo '</div>';
        echo '</div>';
        echo '<div style="display: none;" id="form' . $row['id'] . '"><form class="col-8 mx-auto comment-submit-form replyForm" method="POST"  id="replyComment' . $row['id'] . '" novalidate>
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
                <input type="hidden" name="commentId" id="commentId" value="' . $row['id'] . '"/>
                <input type="button" name="submit" class="btn btn-secondary" value="Submit" onclick="submitForm(\'replyComment' . $row['id'] . '\')">
            </div>
        </form></div>';
        $query = "
        SELECT * FROM comments WHERE parent_id = '" . $row['id'] . "' ORDER BY id DESC
        ";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();

        if (count($result) > 0) {
            foreach ($result as $row) {
                echo '<div class="media mt-3 ml-5">';
                echo '<div class="media-body">';
                echo '<h5 class="mt-0">' . $row['name'] . ' <small class="date">' . date('j M Y', strtotime($row['date'])) . '</small></h5>';
                echo $row['comment'];
                echo '</div>';
                echo '</div>';
            }
        }
    }
} else { }
