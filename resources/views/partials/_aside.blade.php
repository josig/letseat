<!--begin::Aside-->
				<div class="aside aside-left d-flex flex-column flex-row-auto" id="kt_aside">

					<!--begin::Aside Menu-->
					<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

						<!--begin::Menu Container-->
						<div id="kt_aside_menu" class="aside-menu min-h-lg-800px" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">

							<!--begin::Menu Nav-->
							<ul class="menu-nav">
								<li class="menu-item menu-item-active" aria-haspopup="true">
									<a href="{{ route('index') }}" class="menu-link">
										<span class="menu-icon"><i class="fa fa-desktop text-primary"></i></span>
										<span class="menu-text">DASHBOARD</span>
									</a>
								</li>
								<li class="menu-section">
									<h4 class="menu-text">Secciones</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								@can('establishments.index')
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="menu-icon"><i class="fa fa-building text-primary"></i></span>
										<span class="menu-text">Establecimientos</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu" kt-hidden-height="120" style="">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="{{ route('establishments.index') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Listado de Establecimientos</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="{{ route('establishments.create') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Nuevo Establecimiento</span>
													<span class="menu-label">
														<span class="label label-danger label-inline">new</span>
													</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="{{ route('establishments.index') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Listado de Sedes</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="{{ route('branches.create') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Nueva sede</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								@endcan

								@can('users.index')
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="menu-icon"><i class="fa fa-user text-primary"></i></span>
										<span class="menu-text">Usuarios</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu" kt-hidden-height="120" style="">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="{{ route('users.index') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Listado de Usuarios</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="/metronic/demo5/crud/file-upload/dropzonejs.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Listado de Roles</span>
													<span class="menu-label">
														<span class="label label-danger label-inline">new</span>
													</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="/metronic/demo5/crud/file-upload/uppy.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Relaciones</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								@endcan

								@can('accounts.index')
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="menu-icon"><i class="fa fa-piggy-bank text-primary"></i></span>
										<span class="menu-text">Cuentas Corrientes</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu" kt-hidden-height="120" style="">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="{{ route('users.index') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Listado de Usuarios</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="/metronic/demo5/crud/file-upload/dropzonejs.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Listado de Roles</span>
													<span class="menu-label">
														<span class="label label-danger label-inline">new</span>
													</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="/metronic/demo5/crud/file-upload/uppy.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Relaciones</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								@endcan

								@can('orders.index')
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="menu-icon"><i class="fa fa-shopping-cart text-primary"></i></span>
										<span class="menu-text">Ordenes</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu" kt-hidden-height="120" style="">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="{{ route('users.index') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Listado de Usuarios</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="/metronic/demo5/crud/file-upload/dropzonejs.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Listado de Roles</span>
													<span class="menu-label">
														<span class="label label-danger label-inline">new</span>
													</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="/metronic/demo5/crud/file-upload/uppy.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Relaciones</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								@endcan
								
								@can('transactions.index')
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="menu-icon"><i class="fa fa-exchange-alt text-primary"></i></span>
										<span class="menu-text">Transacciones</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu" kt-hidden-height="120" style="">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="{{ route('transactions.index') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Listado de Transacciones</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="/metronic/demo5/crud/file-upload/dropzonejs.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Conceptos</span>
													{{--<span class="menu-label">
														<span class="label label-danger label-inline">new</span>
													</span>--}}
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="/metronic/demo5/crud/file-upload/uppy.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Métodos de pago</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="/metronic/demo5/crud/file-upload/uppy.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Documentos Comerciales</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								@endcan

								@can('products.index')
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="menu-icon"><i class="fa fa-boxes text-primary"></i></span>
										<span class="menu-text">Productos</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu" kt-hidden-height="120" style="">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="{{ route('users.index') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Listado de Usuarios</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="/metronic/demo5/crud/file-upload/dropzonejs.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Listado de Roles</span>
													<span class="menu-label">
														<span class="label label-danger label-inline">new</span>
													</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="/metronic/demo5/crud/file-upload/uppy.html" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Relaciones</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								@endcan
							</ul>

							<!--end::Menu Nav-->
						</div>

						<!--end::Menu Container-->
					</div>

					<!--end::Aside Menu-->
				</div>

				<!--end::Aside-->