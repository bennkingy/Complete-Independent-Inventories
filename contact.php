<?php
$page = 'contact';
$postData = $statusMsg = '';
$status = 'error';

// Google reCAPTCHA API key configuration
$siteKey 	= '6LfEjJ8UAAAAAIX_4pghc3SmAPJZ8HNCzJHA9Inb' ;
$secretKey 	= '6LfEjJ8UAAAAAAGYX66Th_Dw337vVNFo_xSsB7ZH';

// If the form is submitted
if(isset($_POST['submit'])){
	$postData = $_POST;
	
	// Validate form fields
	if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])){
		
		// Validate reCAPTCHA box
		if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){

			// Verify the reCAPTCHA response
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
			
			// Decode json data
			$responseData = json_decode($verifyResponse);
			
			// If reCAPTCHA response is valid
			if($responseData->success){
				// Posted form data
				$name = !empty($_POST['name'])?$_POST['name']:'';
				$email = !empty($_POST['email'])?$_POST['email']:'';
				$message = !empty($_POST['message'])?$_POST['message']:'';
				
				// Send email notification to the site admin
				$to = 'completeinventories@live.co.uk;bennkingy@gmail.com';
				$subject = 'New contact form have been submitted';
				$htmlContent = "
					<h1>Contact request details</h1>
					<p><b>Name: </b>".$name."</p>
					<p><b>Email: </b>".$email."</p>
					<p><b>Message: </b>".$message."</p>
				";
				
				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				// More headers
				$headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";
				
				// Send email
				@mail($to,$subject,$htmlContent,$headers);
				
				$status = 'success';
				$statusMsg = 'Your contact request has submitted successfully.';
				$postData = '';
			}else{
				$statusMsg = 'Robot verification failed, please try again.';
			}
		}else{
			$statusMsg = 'Please check on the reCAPTCHA box.';
		}
	}else{
		$statusMsg = 'Please fill all the mandatory fields.';
	}
}
?>

<?php
include_once('assets/partials/header.php');
?>

<section id="google-map" class="section google-map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2487.6219688472834!2d-0.45313358418812055!3d51.42837057962212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876740a470b190f%3A0x4407c5f911a6d841!2sFeltham+Hill+Rd%2C+Ashford+TW15+1HE!5e0!3m2!1sen!2suk!4v1557943005957!5m2!1sen!2suk" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
	</section>
<!-- /#google-map -->
<section id="contact-us" class="section contact-us">
<div class="container">
<div class="row">
    <div class="col-md-4 wrapper-2">
        
        <h5 class="subpage-title"><i class="icon-phone"></i> Contact</h5>
        <address>
			Phone: (07) 951 894 098<br>
			<a href="mailto:completeinventories@live.co.uk">completeinventories@live.co.uk</a>
        </address>
    </div>
    <div class="col-md-8 wrapper-1">

        <form action="" method="post" class="contact-form">
        
           <h5 class="subpage-title">Get In Touch</h5>

	         <div class="row">
                <div class="col-md-6">
			      <input class="form-control" type="text" name="name" value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>" placeholder="Your name" required="" />
                </div>  
                <div class="col-md-6">
				  <input class="form-control"  type="email" name="email" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" placeholder="Your email" required="" />
                </div> 
                <div class="col-md-12">
				  <textarea class="form-control" name="message" placeholder="Type message..." required="" ><?php echo !empty($postData['message'])?$postData['message']:''; ?></textarea>
                </div> 
             </div> 
                <!-- Google reCAPTCHA box -->
                <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
                
                <!-- Submit button -->
                <input style="margin-top: 18px" class="btn brn-flat flat-color" type="submit" name="submit" value="SUBMIT">
                
                <!-- Status message -->
                <?php if(!empty($statusMsg)){ ?>
                    <p class="status-msg <?php echo $status; ?>"><?php echo $statusMsg; ?></p>
                <?php } ?>

		</form>
        <!-- /.contact-form -->

    </div>
</div>
<!-- /.row -->
</div>
<!-- /.container -->
</section>
<!-- /#contact-us -->
<?php
include_once('assets/partials/footer.php');
?>