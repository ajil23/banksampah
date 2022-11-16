
$(".add-more").on("click", function () {
    var sampah = $(".sampahid").html();
    var tr =
        "<tr>" +
        '<td><select class="form-control form-controli sampahid" name="idsampah[]" >' +
        sampah +
        "</select></td>" +
        '<td><input type="number" class="form-control form-control berat"  name="berat[]"></td>' +
        '<td ><input type="text"  class="form-control form-control harga" readonly name="harga_satuan[]"></td>' +
        '<td><input type="text" class="form-control form-control sub_total" readonly name="sub_harga[]" ></td>' +
        '<td><button type="button" name="remove" class="btn btn-danger delete">Hapus</button></td>' +
        "</tr>";
    $(".add-more-product").append(tr);
});

$(".add-more-product").delegate(".delete", "click", function () {
    $(this).parent().parent().remove();
    total();
});

function total() {
    var totalSum = 0;
    $(".sub_total").each(function (i, e) {
        var inputVal = $(this).val() - 0;
        totalSum += inputVal;
    });
    $(".total").val(totalSum);
}

$(".add-more-product").delegate(".sampahid", "change", function () {
    var tr = $(this).parent().parent();
    var harga = tr.find('.sampahid option:selected').attr('harga');
    tr.find('.harga').val(harga);
    var harga = tr.find('.harga').val() - 0;
    var berat = tr.find('.berat').val() - 0;
    var sub_total = harga * berat;
    tr.find('.sub_total').val(sub_total);
    total();
});

$(".add-more-product").delegate(".berat","keyup", function () {
    var tr = $(this).parent().parent();
    var harga = tr.find(".harga").val() - 0;
    var berat = tr.find(".berat").val() - 0;
    var sub_total = harga * berat;
    tr.find(".sub_total").val(sub_total);
    total();
});
