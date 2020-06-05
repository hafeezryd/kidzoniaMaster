<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/loader.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
	<style>
		body {
			background-image : url("images/color-back.png");
			background-repeat:no-repeat;
		   background-size:cover;
		}
		.half{
			margin-top: 100px;
			box-shadow: -1px 1px 60px 10px  grey;
			background: rga(0,0,0,.4);
			/* border: 2px; */
		}
	</style>
	<script src="{{ url('js/application.js') }}"></script>
    </head>
    <body>
	@include('components.loader')
    <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-7">
                    <img src="{{asset('/images/1.png')}}" style="width:70%;margin: 20px;align: center">
                </div>
                
    @yield('content')

    </body>
</html>