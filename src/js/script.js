/* $(document).ready(function () {
  $("#postimage").on("change", getValue);

  function getValue() {
    value = $("#postimage").val();
    $.post("src/admin/post/create-post.php", { value: value }, function (data) {
      alert("done");
    });
  }
}); */

$(document).ready(function () {
  $("#postimage").change(function () {
    var url = "/src/admin/post/create-post.php"; //URL where you want to send data
    var postData = { value: $(this).value };
    $.ajax({
      type: "POST",
      url: url,
      data: postData,
      dataType: "json",
      success: function (data) {
        $("#image").html(data); //
      },
      error: function (e) {
        console.log(e.message);
      },
    });
  });
});
