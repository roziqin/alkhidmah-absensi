<div class="row justify-content-md-center">
	<div class="col-md-10">
		<div class="row fadeInLeft slow animated">
			<div class="col-md-12">
				<table id="table-absensi" class="table table-striped table-bordered" style="width:100%">
			        <thead>
			            <tr>
                            <th>tanggal</th>
                            <th>waktu</th>
                            <th>no barcode</th>
                            <th>nama</th>
                            <th>alamat</th>
			            </tr>
			        </thead>
			    </table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

  $(document).ready(function(){
         	
      	$('.btn-tambah-kategori').on('click',function(){
            $("#modaltambahkategori #defaultForm-nama").val('');
            $("#modaltambahkategori #defaultForm-jenis").val('');
            $("#modaltambahkategori #submit-kategori").removeClass('hidden');
            $("#modaltambahkategori #update-kategori").addClass('hidden');
            $('#modaltambahkategori h4.modal-title').text('Tambah Kategori');
      	});
      	
        $('#table-absensi').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": 
            {
                "url": "api/datatable.api.php?ket=absensi", // URL file untuk proses select datanya
                "type": "POST"
            },
            "deferRender": true,
            "columns": [
                { "data": "absensi_tgl" },
                { "data": "absensi_waktu" },
                { "data": "peserta_barcode" },
                { "data": "peserta_nama" },
                { "data": "peserta_alamat" },
            ]
        });

 	
  });
</script>