@extends('home.homelayouts.master')
@section('content')


	<section class="contact-details">
		<div class="container pt-110 pb-70">
			<div class="row">
				<div class="col-xl-7 col-lg-6">
					<div class="sec-title">
						<span class="sub-title before-none">Send us email</span>
						<h2>Feel free to write</h2>
					</div>
					<!-- Contact Form -->
					<form id="contact_form" name="contact_form" action="{{ route('contact.store') }}" method="post">
						@csrf
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-3">
									<input name="form_name" class="form-control" type="text" placeholder="Enter Name">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="mb-3">
									<input name="form_email" class="form-control required email" type="email"
										placeholder="Enter Email">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-3">
									<input name="form_subject" class="form-control required" type="text"
										placeholder="Enter Subject">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="mb-3">
									<input name="form_phone" class="form-control" type="text" placeholder="Enter Phone">
								</div>
							</div>
						</div>
						<div class="mb-3">
							<textarea name="form_message" class="form-control required" rows="7"
								placeholder="Enter Message"></textarea>
						</div>
						<div class="mb-5">
							<input name="form_botcheck" class="form-control" type="hidden" value="" />
							<button type="submit" class="theme-btn btn-style-one" data-loading-text="Please wait..."><span
									class="btn-title">Send
									message</span></button>
							<button type="reset" class="theme-btn btn-style-one bg-theme-color5"><span
									class="btn-title">Reset</span></button>
						</div>
					</form>
					<!-- Contact Form Validation-->
				</div>
				<div class="col-xl-5 col-lg-6">
					<div class="contact-details__right">
						<div class="sec-title">
							<span class="sub-title before-none">Need any help?</span>
							<h2>Get in touch with us</h2>
							<div class="text">{{ $setting->slug }}</div>
						</div>
						<ul class="list-unstyled contact-details__info">
							<li>
								<div class="icon">
									<span class="lnr-icon-phone-plus"></span>
								</div>
								<div class="text">
									<h6 class="mb-1">Have any question?</h6>
									<a href="{{ $setting->phone_no }}">{{ $setting->phone_no }}</a>
								</div>
							</li>
							<li>
								<div class="icon">
									<span class="lnr-icon-envelope1"></span>
								</div>
								<div class="text">
									<h6 class="mb-1">Write email</h6>
									<a href=""><span class="__cf_email__">{{ $setting->email }}</span></a>
								</div>
							</li>
							<li>
								<div class="icon">
									<span class="lnr-icon-location"></span>
								</div>
								<div class="text">
									<h6 class="mb-1">Visit anytime</h6>
									<span>{{$setting->address}}</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Contact Details End-->

	<!-- Map Section-->
	<section class="map-section">
		<iframe class="map w-100"
			src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Chhatrapati%20Shahu%20Ji%20Maharaj%20University,%20Kanpur+(CSJMU%20Campus)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
			width="100%" height="600" frameborder="0" style="border:0" allowfullscreen>
		</iframe>

	</section>
	<!--End Map Section-->


	</div><!-- End Page Wrapper -->

	<script>
		(function ($) {
			$("#contact_form").validate({
				submitHandler: function (form) {
					var form_btn = $(form).find('button[type="submit"]');
					var form_result_div = '#form-result';
					$(form_result_div).remove();
					form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
					var form_btn_old_msg = form_btn.html();
					form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
					$(form).ajaxSubmit({
						dataType: 'json',
						success: function (data) {
							if (data.status == 'true') {
								$(form).find('.form-control').val('');
							}
							form_btn.prop('disabled', false).html(form_btn_old_msg);
							$(form_result_div).html(data.message).fadeIn('slow');
							setTimeout(function () { $(form_result_div).fadeOut('slow') }, 6000);
						}
					});
				}
			});
		})(jQuery);
	</script>
@endsection