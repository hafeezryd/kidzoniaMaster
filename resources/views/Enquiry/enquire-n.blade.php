

<html>
    <head>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="style.css">
        <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    
<body>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5><u><i>Nallaganda Branch</i></u></h5>
                    <img src="image/1.png" style="width:100%">
                    
                </div>
                <div class="col-md-8">
                    <form method="POST" action="action.php">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="text-left">Enquire</h3>    
                        </div>
                        <div class="col-md-6">
                            <span class="glyphicon glyphicon-pencil"></span>
                            
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <label class="label col-md-2 control-label">First Name </label>
                        <div class="col-md-10"> 
						
                            <input type="text"  class="form-control" name="childfname" id="childfname" placeholder="Child First Name" required>
							
                        </div>
                    </div>
                    <div class="row">
                        <label class="label col-md-2 control-label">Last Name </label>
                        <div class="col-md-10"> 
                            <input type="text" class="form-control" name="childlname" placeholder="Child Last Name" required>
                        </div>
                    </div>
                    <div class="row">
                        <label class="label col-md-2 control-label">Date of Birth </label>
                        <div class="col-md-4"> 
                            <input type="date" class="form-control" value ="<?php $today; ?>" id="dob" name="dob" placeholder="Date of Birth" required>
                        </div>
                        <div class="col-md-6"><label id="age" style="color: blue"> Age as on 31st March </label></label></div>
                    </div>    
                        
                                    
                
                    <div class="row">
                        <label class="label col-md-2 control-label">Gender </label>
                        <div class="col-md-10"> 
                            <input type="radio" name="gender" value = "male" required><small>Male</small>
                            <input type="radio" name="gender" value = "female" required><small>Female</small>
                        </div>
                                            
                    </div>
					<?php
    include("database.php");
	$locationid = 2;
    
        $sql = "select id,classname from classes where status='active' and locationid='$locationid'";
   //     $stmt = $conn->prepare($sql);
    //    $stmt->execute();
     //   $result = $stmt->get_result();
		$result = mysqli_query($conn,$sql);
        $classes="";
        while ($row=$result->fetch_assoc()){
            $classes .= '<option value="'.$row['id'].'">'.$row['classname'].'</option>';       
    }
?>
                    <div class="row">
                        <label class="Label col-md-2 control-label"> Class</label>
                        <div class="col-md-10">
                            <select name="class" class="form-control" required>
                                <option value="-1">Select</option>
                                <?php echo $classes; ?>
                            </select>
                        </div>
                    </div>
					<div class="row">
						<label class="label col-md-2 control-label">Address </label>
						<div class="col-md-10" >
							<textarea class="form-control" name="address" placeholder="Residential address" required></textarea>
						</div>
					</div>
                    <div class="row">
                        <label class="label col-md-2 control-label">Father Name</label>
                        <div class="col-md-4"> <input class="form-control" type="text" name="fname" placeholder="Father Name" required></div>
                        <label class="label col-md-2 control-label">Mother Name</label>
                        <div class="col-md-4"> <input  class="form-control" type="text" name="mname" placeholder="Mother Name" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <label class="label col-md-2 control-label">Mobile No</label>
                        <div class="col-md-4"> <input  class="form-control" type="text" name="fmobileno" placeholder="Father Mobile" required></div>
                        <label class="label col-md-2 control-label">Mobile No</label>
                        <div class="col-md-4"> <input type="text"  class="form-control" name="mmobileno" placeholder="Mother Mobile" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <label class=" label col-md-2 control-label">Email Id</label>
                        <div class="col-md-4"> <input  class="form-control" type="text" name="femailid" placeholder="Father Email" required></div>
                        <label class="label col-md-2 control-label">Email Id</label>
                        <div class="col-md-4"> <input  class="form-control" type="text" name="memailid" placeholder="Mother Email" required>
                        </div>   
                    </div>
                        
                    <div class="row">
                        <label class="label col-md-2 control-label">Occupation</label>
                        <div class="col-md-4"> <input   class="form-control" type="text" name="foccupation" placeholder="Father Occp" required></div>
                        <label class="label col-md-2 control-label">Occupation</label>
                        <div class="col-md-4"> <input   class="form-control" type="text" name="moccupation" placeholder="Mother Occp" required>
                    </div>       
                    </div>    
                    <div class="row">
                        <label class="label col-md-2 control-label">Organization</label>
                        <div class="col-md-4"> <input  class="form-control" type="text" name="forganization" placeholder="Father Org" required></div>
                        <label class="label col-md-2 control-label">Organization</label>
                        <div class="col-md-4"> <input  class="form-control" type="text" name="morganization" placeholder="Mother Org">
                        </div>               
                  
                    </div>
                    <div class="row">
						<input type="hidden" name="locationid" id="locationid" value="<?php echo $locationid; ?>" >
                        <input type="button"  class="btn btn-warning" value="Cancel">
                        <input type="submit" name="submit" class="btn btn-info">
                        
                        
                    </div>    
                </form>    
        </div>
        </div>
        </div>         
    </body>
    <script>
$(document).ready(function(){
	
    $("#dob").change(function(){
        //alert('change');
        var mdate = $("#dob").val().toString();
        var yearThen = parseInt(mdate.substring(0,4), 10);
        var monthThen = parseInt(mdate.substring(5,7), 10);
        var dayThen = parseInt(mdate.substring(8,10), 10);
        
        var today = new Date(2019,03,31);
        var birthday = new Date(yearThen, monthThen-1, dayThen);
        
        var differenceInMilisecond = today.valueOf() - birthday.valueOf();
        
        var year_age = Math.floor(differenceInMilisecond / 31536000000);
        var day_age = Math.floor((differenceInMilisecond % 31536000000) / 86400000);
        
        if ((today.getMonth() == birthday.getMonth()) && (today.getDate() == birthday.getDate())) {
            alert("Happy B'day!!!");
        }
        
        var month_age = Math.floor(day_age/30);
        
        day_age = day_age % 30;
        
        if (isNaN(year_age) || isNaN(month_age) || isNaN(day_age)) {
            $("#age").text("Invalid birthday - Please try again!");
        }
        else {
            $("#age").html("Age : <br/><div id=\"age\"><span>" + year_age + "</span> years <span>" + month_age + "</span> months <span>" + day_age + "</span> days old</div> ");
        }
    });
});
    </script>
</html>