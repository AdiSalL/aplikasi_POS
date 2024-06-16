<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = function (e) {
      $("#img-placeholder").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
$("#profile_user").change(function () {
  readURL(this);
});

</script>
