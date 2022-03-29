
<!--begin::Quick Actions Panel-->
		<div id="kt_quick_actions" class="offcanvas offcanvas-right p-10">

			<!--begin::Header-->
			<div class="offcanvas-header d-flex align-items-center justify-content-between pb-10">
				<h3 class="font-weight-bold m-0">Atajos
					{{-- <small class="text-muted font-size-sm ml-2">finance &amp; reports</small> --}}
				</h3>
				<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_actions_close">
					<i class="ki ki-close icon-xs text-muted"></i>
				</a>
			</div>

			<!--end::Header-->

			<!--begin::Content-->
			<div class="offcanvas-content pr-5 mr-n5">
				<div class="row gutter-b">

					<!--begin::Item-->
					<div class="col-6">
						<a href="{{ route('users.index') }}" class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5">
							<span class="menu-icon"><i class="fa fa-user text-primary icon-2x"></i></span>
							<span class="d-block font-weight-bold font-size-h6 mt-2">Relaciones</span>
						</a>
					</div>
					<!--end::Item-->

					<!--begin::Item-->
					<div class="col-6">
						<a href="#" class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5">
							<span class="menu-icon"><i class="fa fa-exchange-alt text-primary icon-2x"></i></span>
							<span class="d-block font-weight-bold font-size-h6 mt-2">Transacciones</span>
						</a>
					</div>
					<!--end::Item-->
				</div>
				<div class="row">

					<!--begin::Item-->
					<div class="col-6">
						<a href="#" class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5">
							{{--<span class="svg-icon svg-icon-3x svg-icon-primary m-0">

								<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Euro.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M4.3618034,10.2763932 L4.8618034,9.2763932 C4.94649941,9.10700119 5.11963097,9 5.30901699,9 L15.190983,9 C15.4671254,9 15.690983,9.22385763 15.690983,9.5 C15.690983,9.57762255 15.6729105,9.65417908 15.6381966,9.7236068 L15.1381966,10.7236068 C15.0535006,10.8929988 14.880369,11 14.690983,11 L4.80901699,11 C4.53287462,11 4.30901699,10.7761424 4.30901699,10.5 C4.30901699,10.4223775 4.32708954,10.3458209 4.3618034,10.2763932 Z M14.6381966,13.7236068 L14.1381966,14.7236068 C14.0535006,14.8929988 13.880369,15 13.690983,15 L4.80901699,15 C4.53287462,15 4.30901699,14.7761424 4.30901699,14.5 C4.30901699,14.4223775 4.32708954,14.3458209 4.3618034,14.2763932 L4.8618034,13.2763932 C4.94649941,13.1070012 5.11963097,13 5.30901699,13 L14.190983,13 C14.4671254,13 14.690983,13.2238576 14.690983,13.5 C14.690983,13.5776225 14.6729105,13.6541791 14.6381966,13.7236068 Z" fill="#000000" opacity="0.3" />
										<path d="M17.369,7.618 C16.976998,7.08599734 16.4660031,6.69750122 15.836,6.4525 C15.2059968,6.20749878 14.590003,6.085 13.988,6.085 C13.2179962,6.085 12.5180032,6.2249986 11.888,6.505 C11.2579969,6.7850014 10.7155023,7.16999755 10.2605,7.66 C9.80549773,8.15000245 9.45550123,8.72399671 9.2105,9.382 C8.96549878,10.0400033 8.843,10.7539961 8.843,11.524 C8.843,12.3360041 8.96199881,13.0779966 9.2,13.75 C9.43800119,14.4220034 9.7774978,14.9994976 10.2185,15.4825 C10.6595022,15.9655024 11.1879969,16.3399987 11.804,16.606 C12.4200031,16.8720013 13.1129962,17.005 13.883,17.005 C14.681004,17.005 15.3879969,16.8475016 16.004,16.5325 C16.6200031,16.2174984 17.1169981,15.8010026 17.495,15.283 L19.616,16.774 C18.9579967,17.6000041 18.1530048,18.2404977 17.201,18.6955 C16.2489952,19.1505023 15.1360064,19.378 13.862,19.378 C12.6999942,19.378 11.6325049,19.1855019 10.6595,18.8005 C9.68649514,18.4154981 8.8500035,17.8765035 8.15,17.1835 C7.4499965,16.4904965 6.90400196,15.6645048 6.512,14.7055 C6.11999804,13.7464952 5.924,12.6860058 5.924,11.524 C5.924,10.333994 6.13049794,9.25950479 6.5435,8.3005 C6.95650207,7.34149521 7.5234964,6.52600336 8.2445,5.854 C8.96550361,5.18199664 9.8159951,4.66400182 10.796,4.3 C11.7760049,3.93599818 12.8399943,3.754 13.988,3.754 C14.4640024,3.754 14.9609974,3.79949954 15.479,3.8905 C15.9970026,3.98150045 16.4939976,4.12149906 16.97,4.3105 C17.4460024,4.49950095 17.8939979,4.7339986 18.314,5.014 C18.7340021,5.2940014 19.0909985,5.62999804 19.385,6.022 L17.369,7.618 Z" fill="#000000" />
									</g>
								</svg>

								<!--end::Svg Icon-->
							</span>--}}
							<span class="menu-icon"><i class="fa fa-shopping-cart text-primary icon-2x"></i></span>
							<span class="d-block font-weight-bold font-size-h6 mt-2">Ordenes</span>
						</a>
					</div>
					<!--end::Item-->
					
					<!--begin::Item-->
					<div class="col-6">
						<a href="#" class="btn btn-block btn-light btn-hover-primary text-dark-50 text-center py-10 px-5">
							<span class="menu-icon"><i class="fa fa-piggy-bank text-primary icon-2x"></i></span>
							<span class="d-block font-weight-bold font-size-h6 mt-2">Cuentas</span>
						</a>
					</div>
					<!--end::Item-->

				</div>
				
			</div>

			<!--end::Content-->
		</div>

		<!--end::Quick Actions Panel-->