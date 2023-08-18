		<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="indexweb.php"><img src="img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">

						<ul class="nav navbar-nav menu_nav ml-auto">
							<li>
								<?php 
			if (@$_SESSION['email']=='admin555@gmail.com') {
 								?>
							<li style="padding: 10px;">
					<a href="productshow.php" class="" style="margin-right: 20px;">Admin</a>
							</li>
						<?php } ?>
							</li>

							<li>
								<li style="padding: 10px;">
					<a href="profile.php" class="" style="margin-right: 20px;">Profile</a>
							</li>
							</li>
							<li class="nav-item active"><a class="nav-link" href="indexweb.php">Home</a></li>

							<li><ul class="dropdown-menu">
									<li class="nav-item"><a class="btn primary-btn" href="profile.php">Profile</a></li>
								</ul></li>

								<li class="nav-item"><a class="nav-link" href="Logout.php">Logout</a></li>

						<?php if(@!$_SESSION['email']){ ?>

								<li class="nav-item"><a class="nav-link" href="Login.php">Login</a></li>

						<?php } ?>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>