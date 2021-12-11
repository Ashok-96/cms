

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <style>
    .form-control{
        font-family:fontawesome;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center p-3 ">
            <div class="col-lg-6 col-xs-8 card card-body border rounded p-3 shadow">
                <div class="justify-content-center"><h4> Contact Form </h4></div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'],ENT_NOQUOTES) ?>" method="post">
	                <div class="form-group">
	                    <input type="text" class="form-control" name="name"  placeholder="&#xf007; Name">
	                </div>
	                <div class="form-group">
	                   
	                    <input type="email" class="form-control" name="email"  placeholder="&#xf0e0; Email">
	                </div>
	                <div class="form-group">
	                    
	                    <input list="subject" name="subject" value="" class="form-control" placeholder="&#xf07b; Subject if other please  mention the subject">
            <datalist id="subject">
                <option value="Regarding openings">openings</option>
            <option value="Regarding Events">Events</option>
            <option value="Regarding Alumni Registration">Alumni</option>
            </datalist>
	                </div>
	                <div class="form-group">
	             
	                    <textarea class="form-control" name="message" placeholder="&#xf044; write here"></textarea>
	                </div>
	                <div class="form-group">
	                    <button class="btn btn-primary p-2 m-2" type="submit" name="submit" ><i class="fa fa-send" ></i> Send</button>
	                </div>
            	</form>
            </div>
        </div>
    </div>
</body>
<?php
if(isset($_POST['submit'])){
        $email=$_POST['email'];
		$otp=rand(111111,999999);
		$body=$otp." is your one-time-password";

		require 'smtp/PHPMailerAutoload.php';

		$mail=new PHPMailer(True);

		$mail->isSMTP();
		$mail->Host="smtp.gmail.com";
		$mail->Port=587;
		$mail->SMTPAuth=true;
		$mail->SMTPSecure="tls";
        
        $mail->Username = 'ssegscb@gmail.com';
        $mail->Password = 'sse31019';   

		$mail->setFrom("ssegscb@gmail.com","OTP");
		$mail->addAddress($email);

		$mail->isHTML(true);
		$mail->Subject="New OTP";
		$mail->Body=$body;

		if ($mail->send()) {
			echo "send_success";
		} else {
			echo "send_error";
		}

}
?>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</html>