<header>
	<a href="#" data-activates="slide-out" class="btn btn-primary p-3 button-collapse"><i
    class="fas fa-bars"></i></a>

    <!-- Sidebar navigation -->
	<div id="slide-out" class="side-nav fixed wide slim">
		<ul class="custom-scrollbar smooth-scroll">

		    <!-- Logo -->
		    <li>
		    	<div class="logo-wrapper sn-ad-avatar-wrapper">
		        	<a href="#" class="grey-text"><img src="../assets/img/avatar-1.png"
		            class="rounded-circle"><span><?php echo $_SESSION['name']; ?></span></a>
		      	</div>
		    </li>
		    <!--/. Logo -->
		    <!-- Side navigation links -->
		    <li>
		      	<ul class="collapsible collapsible-accordion">
					<li class="menu-item">
				        <a class="waves-effect grey-text" href="?menu=absensi" data-toggle="tooltip" title="Absensi"><i class="sv-slim-icon fas fa-shopping-basket"></i>Absensi</a>
					</li>
			        <li class="menu-item">
				        <a class="waves-effect grey-text" href="?menu=laporan" data-toggle="tooltip" title="Laporan"><i class="sv-slim-icon fas fa-chart-bar"></i>Laporan</a>
			        </li>
					<li class="menu-item">
				        <a class="waves-effect grey-text" href="?menu=user" data-toggle="tooltip" title="User"><i class="sv-slim-icon fas fa-user-cog"></i>User</a>
			        </li>
			        <li class="menu-item">
			        	<a class="waves-effect grey-text" href="?logout=1" data-toggle="tooltip" title="Logout"><i class="sv-slim-icon fas fa-sign-out-alt"></i>Logout</a>
			        </li>
			    </ul>
			</li>
		</ul>
		<div class="sidenav-bg rgba-blue-strong"></div>
	</div>
</header>