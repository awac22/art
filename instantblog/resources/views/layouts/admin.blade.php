<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{ asset('../../favicon.ico') }}">
        <title>@lang('admin.adminpanel')</title>
        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
        <link href="{{ asset('/instanticon/style.css') }}" rel="stylesheet">
        <link href="{{ asset('/quill/dist/quill.snow.css') }}" rel="stylesheet">
    </head>
    <body>
        @include('layouts.adminnav')
        <div class="container-fluid">
        @if ($flash = session('message'))
        <div class="row">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-2">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ $flash }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </main>
        </div>
        @elseif ($flash = session('error'))
        <div class="row">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-2">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ $flash }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </main>
        </div>
        @endif
		
        <div class="row">
            @include('layouts.adminsidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
			        <div class="row">
							<div class="col-md-12">
							 	<div class="col-md-12 mt-3  mb-3  mt-md-0"></br></br>
								<select style="color:#000;background:#fff;font-size:20px;width:300px" name="admin" onchange="admin(this.value);" class="admin_change btn btn-outline-light"> 
									<option value="">Select Admin</option>
												<option value="https://anywhereanycity.com/home/login/admin?e=<?php echo Auth::user()->email; ?>">Home</option>
												<option value="https://anywhereanycity.com/awactv?e=<?php echo Auth::user()->email; ?>">AWACTV</option>
												<option value="https://awacradio.anywhereanycity.com/?e=<?php echo Auth::user()->email; ?>">AWACRADIO</option>
												<option value="https://anywhereanycity.com/art/?e=<?php echo Auth::user()->email; ?>">Art</option>
												<option value="https://anywhereanycity.com/gallery/?e=<?php echo Auth::user()->email; ?>">Gallery</option>
												<option value="https://events.anywhereanycity.com/?e=<?php echo Auth::user()->email; ?>">Events</option>
												<option value="https://anywhereanycity.com/fashion/?e=<?php echo Auth::user()->email; ?>">Fashion</option>
												<option value="https://anywhereanycity.com/marketplace/?e=<?php echo Auth::user()->email; ?>">Marketplace</option>
												<option value="https://anywhereanycity.com/network/?e=<?php echo Auth::user()->email; ?>">Network</option>
												<option value="https://anywhereanycity.com/support/?e=<?php echo Auth::user()->email; ?>">Support</option>
												
								</select></br></br>
							</div> 
							
							
							</div>
					</div> 
                @yield('content')
            </main>
          </div>
        </div>

        @include('layouts.adminfooter')
        
        @stack('scripts')
		
<script type="text/javascript">		
	 
	 function admin( value){
		 
		  location.href = value;
	 }
	 
	 


</script> 
    </body>
</html>