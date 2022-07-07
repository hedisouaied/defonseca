<div class="main-menu">
	<header class="header">
		<a href="index.html" class="logo">Zeiss</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">
			<ul class="menu js__accordion">
				<li class="current">
					<a class="waves-effect" href="index.html"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-image"></i><span>Banner Management</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('banner.index')}}">All Banners</a></li>
						<li><a href="{{route('banner.create')}}">Add Banner</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-sitemap"></i><span>Category Management</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('category.index')}}">All Categories</a></li>
						<li><a href="{{route('category.create')}}">Add Category</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-briefcase"></i><span>Products Management</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{route('product.index')}}">All Products</a></li>
						<li><a href="{{route('product.create')}}">Add Products</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
			</ul>
			<!-- /.menu js__accordion -->
		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->
