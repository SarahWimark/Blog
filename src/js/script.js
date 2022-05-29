/* $(document).ready(function () {
  $("#postimage").on("change", getValue);

  function getValue() {
    value = $("#postimage").val();
    $.post("src/admin/post/create-post.php", { value: value }, function (data) {
      alert("done");
    });
  }
}); */

/* $(document).ready(function () {
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
 */

function showImage() {
  const div = document.getElementById("image");
  if (div.hasChildNodes()) {
    let imgages = div.getElementsByTagName("img");
    div.removeChild(imgages[0]);
  }
  let value = document.getElementById("postimage").value;
  const img = document.createElement("img");
  img.className = "create-post-image";
  img.src = `src/admin/uploads/${value}`;
  div.appendChild(img);
}
