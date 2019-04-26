<nav class="navbar navbar-default navbar-fixed-top">
	<div class="brand">
		<a href="index.html"><img src="{{ asset('admin/assets/img/logo-dark.png') }}" alt="Klorofil Logo" class="img-responsive logo"></a>
	</div>
	
	<div class="container-fluid">
		<div class="navbar-btn">
			<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
		</div>
		<form class="navbar-form navbar-left" method="GET" action="/siswa">
			<div class="input-group">
				<input type="search" name="cari" class="form-control" placeholder="Search...">
				<span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
			</div>
		</form>
		<div id="navbar-menu">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
						<i class="lnr lnr-alarm"></i>
						<span class="badge bg-danger">5</span>
					</a>
					<ul class="dropdown-menu notifications">
						<li>
							<a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost</a>
						</li>
						<li>
							<a href="#" class="more">See all notifications</a>
						</li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('admin/assets/img/user.png') }}" class="img-circle" alt="Avatar"> <span>{{ auth()->user()->name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
							<li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
						</ul>
				</li>	
			</ul>
		</div>
	</div>
</nav>