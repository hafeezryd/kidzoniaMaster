<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style>
		body {
			background-image : url("images/color-back.png");
		}
		.half{
			margin-top: 100px;
			box-shadow: -1px 1px 60px 10px  grey;
			background: rga(0,0,0,.4);
			border: 2px;
		}
	</style>
    </head>
    
    <body>
        <div class="container">
            <div class="row">
				<div class="col-md-7 col-sm-12 col-xs-7">
					<img src="{{asset('/images/1.png')}}" style="width:70%;margin: 20px;align: center">
				</div>
				<form method="POST" class= "col-md-5 col-sm-12 col-xs-7 half" action="loginaction.php">
                			    
					<label class="label ">User Name </label>
					<input class="form-control" type="text" name="userid" placeholder="">
					<label class="label ">Password</label>
					<input class="form-control" type="password" name="password" placeholder="">
					<br><br>
					<input type="submit" value="Login" class="btn btn-block bg-info"  >	
					<br><br>
												
				
				</form>
			</div>
		</div>
	</body>
	</html>