$(document).ready(function() {
  $(document).on("click", ".reply", function() {
    var commentId = $(this).attr("id");
    formCommentId = "form" + commentId;
    if (document.getElementById(formCommentId).style.display == "none") {
      document.getElementById(formCommentId).style.display = "block";
      document.getElementById(commentId).style.textDecoration = "underline";
    } else {
      document.getElementById(formCommentId).style.display = "none";
      document.getElementById(commentId).style.textDecoration = "";
    }
  });
});
function submitForm(formID) {
    console.log(formID);
    formData = $('#'+formID).serialize();
    console.log(formData);
    $.ajax({
        url: "./dbPhp/addComment.php",
        method: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data) {
          if (data.error != "") {
            $('#'+formID)[0].reset();
            $("#commentMessage").html(data.error);
            $("#comments").load("./dbPhp/loadComments.php");
          }
        }
      });
  }
