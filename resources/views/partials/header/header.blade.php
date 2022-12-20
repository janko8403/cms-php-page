@if($page)
	<header class="{{($page->disable_header == 0) ? 'no-height' : ''}} {{($page->main_page == 1) ? 'main' : 'rest-page'}}" style="background: url({{ ($page->header_img) ? asset('storage/'.str_replace("public/","",$page->header_img)) : '' }})"}>

		@if($page->disable_header == 1)
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-10 offset-md-1">

					<div class="justify-content-header">

						@if($page->header_title)
						<h1 class="header">{{ $page->header_title }}</h1>
						@endif
						
						@if($page->header_desc)
						<h2 class="header">{{ $page->header_desc }}</h2>
						@endif

					</div>
					
				</div>
			</div>
		</div>
		@endif

		@if($page->arrow == 1)
		<a class="arrow-down mx-auto" href="#next"><img src="{{ asset('img/arw.svg') }}"></a>
		@endif
		
	</header>

	@if($page->buttons == 1)
	<div class="multiple-box">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-6 col-blue text-center">
					<a class="" href="{{ $page->left_button_link }}">{{ $page->left_button }} 
						<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
					</a>
				</div>
				<div class="col-12 col-md-6 col-yellow text-center">
					<a href="{{ $page->right_button_link }}">{{ $page->right_button }}
						<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
	@endif

	@if($page->button_yellow == 1)
	<div class="multiple-box multiple-yellow"></div>
	@endif

	@if($page->button_blue == 1)
	<div class="multiple-box multiple-blue"></div>
	@endif
@endif