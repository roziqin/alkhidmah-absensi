	
    <input type="hidden" id="defaultForm-role" name="ip-role" value="<?php echo $_SESSION['role']; ?>">
	<div class="container-fluid p-0 fadeIn animated">
		<div class="row header-content pt-3 pb-0 info-color text-white">
			<div class="col-md-12">
				<h2 class=" border-bottom border-white mb-0 pb-2">User</h2>
			</div>
			<div class="col-md-12 pl-0 pr-0 ">
				<ul class="nav">
				    <li class="nav-item">
				      <a class="nav-link waves-light active show" id="user">User</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link waves-light" id="peserta">Peserta</a>
				    </li>
				</ul>
			</div>
		</div>
	</div>
	<main class="pt-4 user pl-3 pr-3 mr-0">
		<div class="main-wrapper">
		    <div class="container-fluid">
				<div class="row mt-2">
					<div class="col-md-12 container__load fadeIn animated">

					</div>
				</div>
		    </div>
		</div>
	</main>


	<?php include 'partials/footer.php'; ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('.nav-link').click(function(){
			var menu = $(this).attr('id');
			if(menu == "user"){
				$('.container__load').load('components/content/user.content.php');						
			}else if(menu == "peserta"){
				$('.container__load').load('components/content/peserta.content.php');						
			}
		});

		$('.container__load').load('components/content/user.content.php');
	});
</script>