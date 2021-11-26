		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
					<i class='font-32 text-primary lni lni-dashboard'></i>
				<div>
					<a href="{{route('admin')}}">
						<h4 class="logo-text">Dashboard</h4>
					</a>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a class="has-arrow" href="#">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Banner Management</div>
					</a>
					<ul>
						<li> <a href="{{ route('banner.index') }}"><i class="bx bx-right-arrow-alt"></i>All Banner</a>
						</li>
						<li> <a href="{{route('banner.create')}}"><i class="bx bx-right-arrow-alt"></i>Add Banner</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="#">
						<div class="parent-icon"><i class='bx bx-list-ol'></i>
						</div>
						<div class="menu-title">Category Management</div>
					</a>
					<ul>
						<li> <a href="{{ route('category.index')}}"><i class="bx bx-right-arrow-alt"></i>All Category</a>
						</li>
						<li> <a href="{{ route('category.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
						</li>
					</ul>
				</li>	
				<li>
					<a class="has-arrow" href="#">
						<div class="parent-icon"><i class='bx bx-badge-check'></i>
						</div>
						<div class="menu-title">Brand Management</div>
					</a>
					<ul>
						<li> <a href="{{ route('brand.index')}}"><i class="bx bx-right-arrow-alt"></i>All Brand</a>
						</li>
						<li> <a href="{{ route('brand.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Brand</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="#">
						<div class="parent-icon"><i class='bx bx-shopping-bag'></i>
						</div>
						<div class="menu-title">Product Management</div>
					</a>
					<ul>
						<li> <a href="component-alerts.html"><i class="bx bx-right-arrow-alt"></i>Alerts</a>
						</li>
						<li> <a href="component-accordions.html"><i class="bx bx-right-arrow-alt"></i>Accordions</a>
						</li>
					</ul>
				</li>				
				<li>
					<a class="has-arrow" href="#">
						<div class="parent-icon"><i class='bx bx-cart-alt'></i>
						</div>
						<div class="menu-title">Cart Management</div>
					</a>
					<ul>
						<li> <a href="component-alerts.html"><i class="bx bx-right-arrow-alt"></i>Alerts</a>
						</li>
						<li> <a href="component-accordions.html"><i class="bx bx-right-arrow-alt"></i>Accordions</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">
						<div class="parent-icon"><i class='bx bx-box'></i>
						</div>
						<div class="menu-title">Order Management</div>
					</a>
				</li>
				<li>
					<a class="has-arrow" href="#">
						<div class="parent-icon"><i class='bx bx-bookmarks'></i>
						</div>
						<div class="menu-title">Post Category</div>
					</a>
					<ul>
						<li> <a href="component-alerts.html"><i class="bx bx-right-arrow-alt"></i>Alerts</a>
						</li>
						<li> <a href="component-accordions.html"><i class="bx bx-right-arrow-alt"></i>Accordions</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="#">
						<div class="parent-icon"><i class='bx bx-tag'></i>
						</div>
						<div class="menu-title">Post Tags</div>
					</a>
					<ul>
						<li> <a href="component-alerts.html"><i class="bx bx-right-arrow-alt"></i>Alerts</a>
						</li>
						<li> <a href="component-accordions.html"><i class="bx bx-right-arrow-alt"></i>Accordions</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="#">
						<div class="parent-icon"><i class='bx bx-receipt'></i>
						</div>
						<div class="menu-title">Post Management</div>
					</a>
					<ul>
						<li> <a href="component-alerts.html"><i class="bx bx-right-arrow-alt"></i>Alerts</a>
						</li>
						<li> <a href="component-accordions.html"><i class="bx bx-right-arrow-alt"></i>Accordions</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="#">
						<div class="parent-icon"><i class='bx bx-comment-error'></i>
						</div>
						<div class="menu-title">Review Management</div>
					</a>
					<ul>
						<li> <a href="component-alerts.html"><i class="bx bx-right-arrow-alt"></i>Alerts</a>
						</li>
						<li> <a href="component-accordions.html"><i class="bx bx-right-arrow-alt"></i>Accordions</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="#">
						<div class="parent-icon"><i class='bx bx-credit-card-front'></i>
						</div>
						<div class="menu-title">Coupon Management</div>
					</a>
					<ul>
						<li> <a href="component-alerts.html"><i class="bx bx-right-arrow-alt"></i>Alerts</a>
						</li>
						<li> <a href="component-accordions.html"><i class="bx bx-right-arrow-alt"></i>Accordions</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="#">
						<div class="parent-icon"><i class='bx bx-comment'></i>
						</div>
						<div class="menu-title">Comment Management</div>
					</a>
					<ul>
						<li> <a href="component-alerts.html"><i class="bx bx-right-arrow-alt"></i>Alerts</a>
						</li>
						<li> <a href="component-accordions.html"><i class="bx bx-right-arrow-alt"></i>Accordions</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="#">
						<div class="parent-icon"><i class='lni lni-users'></i>
						</div>
						<div class="menu-title">User Management</div>
					</a>
					<ul>
						<li> <a href="component-alerts.html"><i class="bx bx-right-arrow-alt"></i>Alerts</a>
						</li>
						<li> <a href="component-accordions.html"><i class="bx bx-right-arrow-alt"></i>Accordions</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">
						<div class="parent-icon"><i class='bx bx-cog'></i>
						</div>
						<div class="menu-title">Settings</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>