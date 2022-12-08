
$(".add-more").on("click", function () {
    var nasabah = $(".nasabahid").html();
    var tr =
        "<tr>" +
        '<td><select class="form-control" id="nasabah_id" name="idnasabah[]" >' +
        nasabah +
        "</select></td>" +
        '<td><button type="button" name="remove" class="btn btn-danger delete">Hapus</button></td>' +
        "</tr>";
    $(".add-more-product").append(tr);

     $(document).ready(function () {
         $(".form_control").select2({
             theme: "bootstrap4",
         });
     });
});

$(".add-more-product").delegate(".delete", "click", function () {
    $(this).parent().parent().remove();

});

 $(document).ready(function () {
     $(".form_control").select2({
         theme: "bootstrap4",
     });
 });


