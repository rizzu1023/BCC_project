<!DOCTYPE HTML>
<html>
<head>
<title>Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="{{asset('assets/Admin/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="{{asset('assets/Admin/css/style.css')}}" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="{{asset('assets/Admin/css/font-awesome.css')}}" rel="stylesheet">
<!-- //font-awesome icons CSS -->

 <!-- side nav css file -->
 <link href="{{asset('assets/Admin/css/SidebarNav.min.css')}}" media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->

 <!-- js-->
{{--<script src="{{asset('assets/Admin/js/jquery-1.11.1.min.js')}}"></script>--}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{asset('assets/Admin/js/modernizr.custom.js')}}"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts-->

<!-- Metis Menu -->
<script src="{{asset('assets/Admin/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/Admin/js/custom.js')}}"></script>
<link href="{{asset('assets/Admin/css/custom.css')}}" rel="stylesheet">

<link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/all.min.css">

@yield('css')


</head>


<body class="c-app">


    @include('Admin.layouts.sidebar')


	<div class="c-wrapper">


{{--	<header class="c-header c-header-fixed navbar">--}}
    @include('Admin.layouts.topbar')
{{--	</header>--}}


	<div class="c-body">
	<main class="c-main">
		<div class="container-fluid">
    @yield('content')
		</div>
	</main>
	</div>

    </div>




{{--    <script src="{{asset('assets/Admin/js/SidebarNav.min.js')}}" type='text/javascript'></script>--}}
{{--	<script>--}}
{{--      $('.sidebar-menu').SidebarNav()--}}
{{--    </script>--}}
	<!-- //side nav js -->

	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="{{asset('assets/Admin/js/classie.js')}}"></script>
{{--		<script>--}}
{{--			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),--}}
{{--				showLeftPush = document.getElementById( 'showLeftPush' ),--}}
{{--				body = document.body;--}}
{{--			showLeftPush.onclick = function() {--}}
{{--				classie.toggle( this, 'active' );--}}
{{--				classie.toggle( body, 'cbp-spmenu-push-toright' );--}}
{{--				classie.toggle( menuLeft, 'cbp-spmenu-open' );--}}
{{--				disableOther( 'showLeftPush' );--}}
{{--			};--}}
{{--			function disableOther( button ) {--}}
{{--				if( button !== 'showLeftPush' ) {--}}
{{--					classie.toggle( showLeftPush, 'disabled' );--}}
{{--				}--}}
{{--			}--}}
{{--		</script>--}}


{{--	<script src="{{asset('js/app.js')}}"></script>--}}


	<!--scrolling js-->
	<script src="{{asset('assets/Admin/js/jquery.nicescroll.js')}}"></script>
	<script src="{{asset('assets/Admin/js/scripts.js')}}"></script>
	<!--//scrolling js-->

	<!-- Bootstrap Core JavaScript -->
   <script src="{{asset('assets/Admin/js/bootstrap.js')}}"> </script>

	@yield('script')

    <script>
        $('#rizzu').on('click',function(){
           // $('.c-sidebar').toggle();
            if( $(".c-sidebar").css('margin-left') == '0px'){
                $('.c-sidebar').css('margin-left','-257px');
            }
            else {
                $('.c-sidebar').css('margin-left', '0px');
            }

        });

        $('.c-wrapper').on('click',function(){
            if( $(".c-sidebar").css('margin-left') == '0px'){
                $('.c-sidebar').css('margin-left','-257px');
            }

        });
    </script>


	<script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
</body>
</html>
