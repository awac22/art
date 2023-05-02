@extends('layouts.master')
@section('bodyclass')
<body class="d-flex flex-column h-100">
   @endsection
   @section('content')
   <div id="se-pre-con" class="d-flex justify-content-center align-items-center">
      <div class="spinner-grow me-1 text-danger" role="status">
         <span class="visually-hidden">Loading...</span>
      </div>
      <div class="spinner-grow me-1 text-warning" role="status">
         <span class="visually-hidden">Loading...</span>
      </div>
      <div class="spinner-grow me-1 text-info" role="status">
         <span class="visually-hidden">Loading...</span>
      </div>
   </div>
   <div class="container-fluid">
      <div class="row navbg">
          <div class="col-md-2">
              <a class="navbar-brand" href="{{ url('/') }}">
				<img class="theme-btn light light-logo" src="{{ url('/images/' . $setting->site_logo) }}" alt="logo">
				<img class="theme-btn dark" src="{{ url('/images/' . $setting->site_logo_light) }}" alt="logo">
			</a>
           </div>		  
		 
		 <div class="col-md-10 second">

            <ul class="navbar-nav seccond">
               <li> 
                  <a href="https://anywhereanycity.com/home">Home</a>
               </li>
               <li> 
                  <a href="https://anywhereanycity.com/awactv/">AWACTV</a>
               </li>
               <li> 
                  <a href="https://awacradio.anywhereanycity.com/">AWACRADIO</a>
               </li>
			     <li> 
                  <a href="https://anywhereanycity.com/network/">Network</a>
               </li>
			     <li> 
                  <a href="https://events.anywhereanycity.com/">Events
                  </a>
               </li>
               <li style="border-top: 4px solid #fc3c68;"> 
                  <a href="https://anywhereanycity.com/art/">Art </a>
               </li>
			     <li> 
                  <a href="https://anywhereanycity.com/fashion/">Fashion</a>
               </li>
               <li> 
                  <a href="https://anywhereanycity.com/gallery/">Gallery</a>
               </li>
             
             
               <li> 
                  <a href="https://anywhereanycity.com/marketplace/">Marketplace</a>
               </li>
             
              
            </ul>
         </div>
      </div>
   </div>
   <div id="maincontent" class="container-fluid mt-5 d-none">
      <div class="row">
         <div class="grid" data-columns>
            @forelse($posts as $key => $post)      
            @include('public.post')
            @if (!empty($setting->between_ads))
            @if( ($key + 1) % 9 == 0 )
            <div class="card border-one betads embed-responsive">
               {!! $setting->between_ads !!}
            </div>
            @endif
            @endif
            @empty
            <div class="col-md-12">
               <h5 class="text-mode">@lang('messages.nopost')</h5>
            </div>
            @endforelse    
         </div>
      </div>
   </div>
   @endsection
   @section('extra')
   <div class="container-fluid mt-auto">
      <hr>
      <div class="row">
         <div class="col-md-12">
            {{ $posts->links() }}
         </div>
      </div>
      <footer class="blog-footer">
	    <ul class="list-inline">
            <li class="list-inline-item">
               <a class="text-mode" href="https://anywhereanycity.com/support/"><i class="icon-envelope verficon" title="Support"></i> &nbsp;&nbsp;Support</a>
            </li>
			            <li class="list-inline-item">
               <a class="text-mode" href="https://anywhereanycity.com/home/newsletter"><i class="icon-bell verficon" title="Subscribe Newsletter"></i> &nbsp;&nbsp;Subscribe Newsletter</a>
            </li>
            
         </ul>
	  
         @if (count($pages) > 0)
         <ul class="list-inline">
            @foreach ($pages as $page)    
            <li class="list-inline-item">
               <a class="text-mode" href="{{url('/page/' . $page->page_slug)}}">{{ $page->page_title }}</a>
            </li>
            @endforeach
         </ul>
         @endif
         @if (!empty($setting->footer))
         <div class="text-muted">{!! clean($setting->footer) !!}</div>
         @endif
      </footer>
   </div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	@auth
	      <script type="text/javascript">
			$(document).ready(function(){
				$.ajax({
					type: "POST",
					url: 'https://anywhereanycity.com/home/api/login',
					data: {email: 'string', password: 'string'},
					success: function(data){
					var emailid = data.email;
				    
                     if(emailid==0){
						 
						 logout();
						 
						 
					 }					
				
              
            }
        });
    });
	
	
		function logout( ){
		
		
		
		$.ajax({
            type: "POST",
            url: 'https://anywhereanycity.com/art/api/logouts',
            data: {email: 'string', password: 'string'},
            success: function(data){
				
				
				var status = data.email;
				
				if(status==0){
					
					window.location = 'https://anywhereanycity.com/art';
				}  
            }
        });
		
	}
</script>
	
	 @else
      <script type="text/javascript">
    $(document).ready(function(){
        
		<?php if(isset($_REQUEST['e'])){ ?>
	    $(document).ready(function(){
		    alogin('<?php echo $_REQUEST['e'];?>');
	      });
	   <?php 
	     }else
		 {
	    ?>
		
		$.ajax({
            type: "POST",
            url: 'https://anywhereanycity.com/home/api/login',
            data: {email: 'string', password: 'string'},
            success: function(data){
				var emailid = data.email;
				  
				login( emailid );
              
            }
        });
		
		 <?php } ?>
    });
	
		function login( emails ){
		
		
		
		$.ajax({
            type: "POST",
            url: 'https://anywhereanycity.com/art/api/logins',
            data: {email: emails, password: 'string'},
            success: function(data){
				
				
				var status = data.email;
				if(status){
					
					window.location = 'https://anywhereanycity.com/art';
				}  
            }
        });
		
	}
			function alogin( emails ){
		
		
		
		$.ajax({
            type: "POST",
            url: 'https://anywhereanycity.com/art/api/logins',
            data: {email: emails, password: 'string'},
            success: function(data){
				
				
				var status = data.email;
				
				if(status){
					
					window.location = 'https://anywhereanycity.com/art/admin';
				}  
            }
        });
		
	}
    </script>
  @endauth  
		 
	 
	 
   @endsection