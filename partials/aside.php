<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="img/user2-160x160.jpg" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>Alexander Pierce</p>
						<a href="#">
							<i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <?php
					$menues = App::IsCanAccess($_SESSION['userdata']['id_user']);
                    foreach($menues as $menu){
						if($menu['has_child'] > 0){
							$submenu = App::subMenu($menu['id_menu']);
							echo"
							<li class=treeview>
								<a href=\"#\" class=\"\">
									<i class=\"$menu[icon]\"></i>
									<span>$menu[nama_menu]</span>
									<i class=\"fa fa-angle-left pull-right\"></i>
								</a>
								$submenu
							</li>";	
						}else{
							echo"
							<li>
								<a href=\"$menu[source]\" class=\"\">
									<i class=\"$menu[icon]\"></i>
									<span>$menu[nama_menu]</span>
								</a>

							</li>";	
						}
                    }
                    ?>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>