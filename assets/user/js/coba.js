$(function() {
  $("input[name='option']").click(function() {
    if ($("#pilihan1").is(":checked")) {
      $("#ambilsendiri").hide();
      $("#kirimpaket").show();
    } else {
      $("#ambilsendiri").show();
      $("#kirimpaket").hide();
    }

  });
});
//provinsi

  $.ajax({
    type: "POST",
    url: base_url+'api/api_rajaongkir/provinsi',
    success: function(hasil_provinsi) {
      // console.log(hasil_provinsi);
      $("select[name=provinsi").html(hasil_provinsi);
    }
  });

  //kota
  $("select[name=provinsi]").on("change", function() {
    var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

    $.ajax({
      type: "POST",
      url: base_url+'api/api_rajaongkir/kota',
      data: 'id_provinsi=' + id_provinsi_terpilih,
      success: function(hasil_kota) {
        // console.log(hasil_kota);
        $("select[name=kota").html(hasil_kota);
      }
    });

  });
