<?php include '../modals/user.modal.php'; ?>

    <button class="btn btn-primary btn-tambah-user" data-toggle="modal" data-target="#modaluser">Tambah User <i class="fas fa-box-open ml-1"></i></button>
    <table id="table-user" class="table table-striped table-bordered fadeInLeft slow animated" style="width:100%">
        <thead>
            <tr>
                <th>nama</th>
                <th>username</th>
                <th>role</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>nama</th>
                <th>username</th>
                <th>role</th>
                <th></th>
            </tr>
        </tfoot>
    </table>



    <script type="text/javascript">
      
    $(document).ready(function() {
        $('.btn-tambah-user').on('click',function(){
            $("#modaluser #defaultForm-id").val('');
            $("#modaluser #defaultForm-nama").val('');
            $("#modaluser #defaultForm-user").val('');
            $("#modaluser #defaultForm-password").val('');
            $("#modaluser #defaultForm-roles").val('');
            $("#modaluser #submit-user").removeClass('hidden');
            $("#modaluser #update-user").addClass('hidden');
            $('#modaluser h4.modal-title').text('Tambah User');
        });

        $('#table-user').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": 
            {
                "url": "api/datatable.api.php?ket=user", // URL file untuk proses select datanya
                "type": "POST"
            },
            "deferRender": true,
            "columns": [
                { "data": "name" },
                { "data": "username" },
                { "data": "display_name" },

                { "width": "180px", "render": function(data, type, full){
                     return '<a class="btn-floating btn-sm btn-default mr-2 btn-edit" data-toggle="modal" data-target="#modaluser" data-id="' + full['id'] + '" title="Edit"><i class="fas fa-pen"></i></a> <a class="btn-floating btn-sm btn-danger btn-remove" data-id="' + full['id'] + '" title="Delete"><i class="fas fa-trash"></i></a>';
                    
                  }
                },
            ],
            "drawCallback": function( settings ) {
              $('.btn-edit').on('click',function(){
                  var id = $(this).data('id');
                  console.log(id)
                  $.ajax({
                      type:'POST',
                      url:'api/view.api.php?func=edituser',
                      dataType: "json",
                      data:{id:id},
                      success:function(data){
                      $("#modaluser #update-user").removeClass('hidden');
                      $("#modaluser #submit-user").addClass('hidden');
                      $('#modaluser h4.modal-title').text('Edit User');
                          $("#modaluser label").addClass("active");
                          $("#modaluser #defaultForm-id").val(data[0].id);
                          $("#modaluser #defaultForm-nama").val(data[0].name);
                          $("#modaluser #defaultForm-user").val(data[0].username);
                          $("#modaluser #defaultForm-password").val('');
                          $("#modaluser #defaultForm-roles").val(data[0].role);

                      }
                  });
              });

              $('.btn-remove').on('click', function(){
                  var id = $(this).data('id');
                  $.confirm({
                      title: 'Konfirmasi Hapus user',
                      content: 'Apakah yakin menghapus user ini?',
                      buttons: {
                          confirm: {
                              text: 'Ya',
                              btnClass: 'col-md-6 btn btn-primary',
                              action: function(){
                                  console.log(id);
                                  
                                  $.ajax({
                                    type: 'POST',
                                    url: "controllers/user.ctrl.php?ket=remove-user",
                                    dataType: "json",
                                    data:{id:id},
                                    success: function(data) {
                                      if (data[0]=="ok") {
                                        $('#table-user').DataTable().ajax.reload();
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