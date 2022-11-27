// function autoCalcSetup() {
//     $("form[name=cart]").jAutoCalc("destroy");
//     $("form[name=cart] tr[name=line_items]").jAutoCalc({
//         keyEventsFire: true,
//         emptyAsZero: true,
//     });
//     $("form[name=cart]").jAutoCalc({ decimalPlaces: false });
// }
// function changes() {
//     var namaSampah = $("#namaSampah").val();
//     $.ajax({
//         type: "GET",
//         url: "/ajax",
//         data: "namaSampah=" + namaSampah,
//         success: function (data) {
//             $("#detail-harga").html(data);
//             console.log(data);
//         },
//     });
// }

// function tambah() {
//     var berat = $("#berat").val();
//     var jumlah = $("#jumlah").val();
//     var total = parseInt(jumlah) * parseInt(berat);
//     $("#total").val(total);
// }
// $("#kelompok").on("input", "#total", function () {
//     var totalSum = 0;
//     $("#kelompok #total").each(function () {
//         var inputVal = $(this).val();
//         if (inputVal != '') {
//             totalSum += parseFloat(inputVal);
//         }
//     });
//     $("#sub_total").val(totalSum);
// });

// autoCalcSetup();
// $("button[name=remove]").click(function (e) {
//     e.preventDefault();
//     var form = $(this).parents("form");
//     $(this).parents("tr").remove();
//     autoCalcSetup();
//     tambah();
// });
// $("button[name=add]").click(function (e) {
//     e.preventDefault();
//     var $table = $(this).parents("form");
//     var $top = $table.find("tr[name=line_items]").first();
//     var $new = $top.clone(true);
//     $new.jAutoCalc("destroy");
//     $new.insertBefore($top);
//     $new.find("input[type=text]").val("");
//     autoCalcSetup();
//     tambah();
// });
