<!DOCTYPE HTML>
<head>
    <title>Store Website</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="{{asset('frontend')}}/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('frontend')}}/css/menu.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="{{asset('frontend')}}/js/jquerymain.js"></script>
    <script src="{{asset('frontend')}}/js/script.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/js/nav.js"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/js/move-top.js"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/js/easing.js"></script>
    <script type="text/javascript" src="{{asset('frontend')}}/js/nav-hover.js"></script>

    <link href="{{asset('frontend')}}/css/flexslider.css" rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!--if toastr.min.css add to the top line it may not work-->
    <script type="text/javascript">
        $(document).ready(function($){
            $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
        });
    </script>

</head>
<body>
<div class="wrap">
@include('layouts.inc.header_top')
@yield('slider')
    <div class="main">
        @yield('content')
    </div>
</div>
@include('layouts.inc.footer')
<script type="text/javascript">
    $(document).ready(function() {
        /*
        var defaults = {
              containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
         };
        */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.flexslider.js"></script>
<script src="{{asset('frontend')}}/js/sweetalert.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
{{--<script>--}}
{{--    Swal.fire({--}}
{{--        position: 'top-end',--}}
{{--        icon: 'success',--}}
{{--        title: 'Your work has been saved',--}}
{{--        showConfirmButton: false,--}}
{{--        timer: 1500--}}

{{--    })--}}
{{--</script>--}}
<script type="text/javascript">
    $(function(){
        SyntaxHighlighter.all();
    });
    $(window).load(function(){
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });
</script>
</body>
</html>

