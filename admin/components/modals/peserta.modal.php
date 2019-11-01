<!-------------- Modal tambah peserta -------------->

<div class="modal fade" id="modalpeserta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Tambah Peserta</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" class="form-peserta">
        <div class="modal-body mx-3">
            <input type="hidden" id="defaultForm-id" name="ip-id">
            <div class="md-form mb-0">
              <input type="text" id="defaultForm-nama" class="form-control validate mb-3" name="ip-nama">
              <label for="defaultForm-nama">Nama Peserta</label>
            </div>
            <div class="md-form mb-0">
              <input type="text" id="defaultForm-barcode" class="form-control validate mb-3" name="ip-barcode">
              <label for="defaultForm-barcode">No Barcode Peserta</label>
            </div>
            <div class="md-form mb-0">
              <input type="text" id="defaultForm-alamat" class="form-control validate mb-3" name="ip-alamat">
              <label for="defaultForm-alamat">Alamat Peserta</label>
            </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button class="btn btn-primary" id="submit-peserta" data-dismiss="modal" aria-label="Close">Proses</button>
          <button class="btn btn-primary" id="update-peserta" data-dismiss="modal" aria-label="Close">Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-------------- End modal tambah peserta -------------->



  <script type="text/javascript">
    $(document).ready(function(){

      $('.mdb-select').materialSelect();

      $("#submit-peserta").click(function(){
        var data = $('#modalpeserta .form-peserta').serialize();
        $.ajax({
          type: 'POST',
          url: "controllers/peserta.ctrl.php?ket=submit-peserta",
          data: data,
          success: function() {
            console.log("sukses")
            $('#table-peserta').DataTable().ajax.reload();
            $("#modalpeserta #defaultForm-nama").val('');
            $("#modalpeserta #defaultForm-alamat").val('');
            $("#modalpeserta #defaultForm-barcode").val('');
          }
        });
      });   


      $("#update-peserta").click(function(){
        var data = $('#modalpeserta .form-peserta').serialize();
        $.ajax({
          type: 'POST',
          url: "controllers/peserta.ctrl.php?ket=update-peserta",
          data: data,
          success: function() {
            console.log("sukses edit")
            $('#table-peserta').DataTable().ajax.reload();
            $("#modalpeserta #defaultForm-nama").val('');
            $("#modalpeserta #defaultForm-alamat").val('');
            $("#modalpeserta #defaultForm-barcode").val('');
          }
        });
      }); 
      
    });
  </script> 