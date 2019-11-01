<?php include '../modals/peserta.modal.php'; ?>

    <button class="btn btn-primary btn-tambah-peserta" data-toggle="modal" data-target="#modalpeserta">Tambah Peserta <i class="fas fa-box-open ml-1"></i></button>
    <table id="table-peserta" class="table table-striped table-bordered fadeInLeft slow animated" style="width:100%">
        <thead>
            <tr>
                <th>nama</th>
                <th>alamat</th>
                <th>barcode</th>
                <th></th>
            </tr>
        </thead>
    </table>



    <script type="text/javascript">
      
    $(document).ready(function() {
        $('.btn-tambah-peserta').on('click',function(){
            $("#modalpeserta #defaultForm-id").val('');
            $("#modalpeserta #defaultForm-nama").val('');
            $("#modalpeserta #defaultForm-alamat").val('');
            $("#modalpeserta #defaultForm-barcode").val('');
            $("#modalpeserta #submit-peserta").removeClass('hidden');
            $("#modalpeserta #update-peserta").addClass('hidden');
            $('#modalpeserta h4.modal-title').text('Tambah Peserta');
        });

        $('#table-peserta').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": 
            {
                "url": "api/datatable.api.php?ket=peserta", // URL file untuk proses select datanya
                "type": "POST"
            },
            "deferRender": true,
            "columns": [
                { "data": "peserta_nama" },
                { "data": "peserta_alamat" },
                { "data": "peserta_barcode" },

                { "width": "180px", "render": function(data, type, full){
                    
                   return '<a class="btn-floating btn-sm btn-default mr-2 btn-edit" data-toggle="modal" data-target="#modalpeserta" data-id="' + full['peserta_id'] + '" title="Edit"><i class="fas fa-pen"></i></a> <a class="btn-floating btn-sm btn-danger btn-remove" data-id="' + full['peserta_id'] + '" title="Delete"><i class="fas fa-trash"></i></a>';
                  }
                  
                },
            ],
            "drawCallback": function( settings ) {
              $('.btn-edit').on('click',function(){
                  var id = $(this).data('id');
                  console.log(id)
                  $.ajax({
                      type:'POST',
                      url:'api/view.api.php?func=editpeserta',
                      dataType: "json",
                      data:{id:id},
                      success:function(data){
                      $("#modalpeserta #update-peserta").removeClass('hidden');
                      $("#modalpeserta #submit-peserta").addClass('hidden');
                      $('#modalpeserta h4.modal-title').text('Edit Peserta');
                          $("#modalpeserta label").addClass("active");
                          $("#modalpeserta #defaultForm-id").val(data[0].peserta_id);
                          $("#modalpeserta #defaultForm-nama").val(data[0].peserta_nama);
                          $("#modalpeserta #defaultForm-alamat").val(data[0].peserta_alamat);
                          $("#modalpeserta #defaultForm-barcode").val(data[0].peserta_barcode);

                      }
                  });
              });

              $('.btn-remove').on('click', function(){
                  var id = $(this).data('id');
                  $.confirm({
                      title: 'Konfirmasi Hapus peserta',
                      content: 'Apakah yakin menghapus peserta ini?',
                      buttons: {
                          confirm: {
                              text: 'Ya',
                              btnClass: 'col-md-6 btn btn-primary',
                              action: function(){
                                  console.log(id);
                                  
                                  $.ajax({
                                    type: 'POST',
                                    url: "controllers/peserta.ctrl.php?ket=remove-peserta",
                                    dataType: "json",
                                    data:{id:id},
                                    success: function(data) {
                                      if (data[0]=="ok") {
                                        $('#table-peserta').DataTable().ajax.reload();
                                      } else {
                                        alert('Produk gagal dihapus')
                                      }
                                    }
                                  });
                                  
                              }
                          },
                          cancel: {
                              text: 'Tidak',
                              btnClass: 'col-md-6 btn btn-danger text-white',
                              action: function(){
                                  console.log("tidak")
                                 
                              }
                              
                          }
                      }
                  });
              });
              
            }
        } );

      
    } );
    </script>