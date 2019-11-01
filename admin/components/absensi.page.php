
	<input type="hidden" id="defaultForm-ordertype" name="ip-ordertype" value="<?php echo $_SESSION['order_type']; ?>">
    <input type="hidden" id="defaultForm-role" name="ip-role" value="<?php echo $_SESSION['role']; ?>">
	<main class="transaksi p-0 mr-0">
		<div class="main-wrapper">
		    <div class="container-fluid">
				<div class="row">
					<div class="col-md-9 pl-0 pr-0">
						<span class="pt-3 float-right mr-3" id="datetime"></span>
						<div class="clear"></div>
						<div class="row p-3 row-jumlah justify-content-md-center">
					    	<div class="col-md-6 mt-2">
					    		<h3 class="text-center mb-5">Silaturahmi Koordinator<br>Al Khidmah Malang Raya</h3>
					    		<div class="align-items-center">
	                                <div class="text-center"><img src="../assets/img/logo-alkhidmah.jpg" width="150px" class="m-lr-auto"></div>
	                            </div>
						    		<input type="hidden" id="barang_id" class="form-control" value="<?php echo $_GET['id']; ?>" name="barang_id">  	
						    		<div class="md-form mb-3">
									  	<input type="text" id="barcode" class="form-control" name="barcode" >
									  	<label for="barcode" class="active">No Barcode Peserta</label>
								  	</div>
						    </div>
					    </div>

					</div>

					<div class="col-md-3 position-relative box-right">
						<div class="row">
							<div class="col-md-12 position-fixed info-color text-white col-right"></div>
							<div class="col-md-12">
								<h3 class="text-white pt-3 float-left">Data Peserta</h3>
								<div class="clear"></div>
								<!-- Search form -->
								<div class="form-inline md-form form-sm mt-2 mb-3 pt-4 pb-3 form-search info-color-dark">
									<h5 class="text-white" style="width: 100%;">Nama: <span id="txt-nama"></span></h5>
									<h5 class="text-white" style="width: 100%;">Alamat: <span id="txt-alamat"></span></h5>
								</div>
							</div>
							
						</div>
					</div>
				</div>
		    </div>
		</div>
	</main>

	<?php include 'partials/footer.php'; ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('input[name=barcode]').focus();
		setInterval(function(){ 
			$('#datetime').empty(); 
			$('#datetime').append(moment(new Date()).format('ddd MMM DD YYYY | HH:mm:ss '));
		
		}, 1000);

		$('#barcode').bind("enterKey",function(e){
			var barcode = $(this).val();

			console.log("tes");
			$.ajax({
                type: 'POST',
		        url: "controllers/absensi.ctrl.php?ket=cek-peserta",
                dataType: "json",
                data:{barcode:barcode},
                success: function(data) {
                	console.log(data.status)
                	
                	if (data.status=='ok') {
						$('#txt-nama').empty(); 
						$('#txt-nama').append(data.nama);
						$('#txt-alamat').empty(); 
						$('#txt-alamat').append(data.alamat);
						$('#barcode').val(''); 
						$('input[name=barcode]').focus();

                	} else {
                		$.confirm({
		                      title: 'Error',
		                      content: 'Data Peserta Tidak ditemukan',
		                      buttons: {
		                          confirm: {
		                              text: 'Ok',
		                              btnClass: 'col-md-12 btn btn-primary',
		                              action: function(){
		                                  
		                                  
		                              }
		                          }
		                      }
		                  });
                	}
                	
                  //$('.container__load').load(data);
                }
            });
		});
		

		$('#barcode').keyup(function(e){
			if(e.keyCode == 13) {
				$(this).trigger("enterKey");
			}
		});

	});
</script>