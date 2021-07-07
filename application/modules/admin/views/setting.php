<div class="content-page">
  <!-- Start content -->

  <div class="content">
    <div class="container-fluid">
      <h1>SETTING</h1>
      <div class="row">
        <div class="col-sm-12">
          <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">Setting Alamat Kampus</h4>
            <hr>

            <!-- <label>Provinsi</label>
            <select class="form-control select2" data-toggle="select2">

              <optgroup label="Pilih Provinsi">
                <option value="AK">Alaska</option>
                <option value="HI">Hawaii</option>
              </optgroup> -->

            </select>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Provinsi</label>
                  <select name="provinsi" class="form-control"></select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Kota</label>
                  <select name="kota" class="form-control"></select>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>


  <footer class="footer text-right">
    2016 - 2019 © Adminto. Coderthemes.com
  </footer>

</div>

<script>
  $(document).ready(function() {
    //provinsi
    $.ajax({
      type: "POST",
      url: "<?= base_url('api/api_rajaongkir/provinsi') ?>",
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
        url: "<?= base_url('api/api_rajaongkir/kota') ?>",
        data: 'id_provinsi=' + id_provinsi_terpilih,
        success: function(hasil_kota) {
          // console.log(hasil_kota);
          $("select[name=kota").html(hasil_kota);
        }
      });

    });
  });
</script>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->