<?php
/*
Template Name: Contact Submit En
*/
                     
?>                                      

<html>

<div id="content" class="site-content">

    <div>                          
        <a href="<?php echo site_url(); ?>">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png"/>
        </a>                                                                                    
    </div>
    
	<div class="container">                                 
        <div>
					<?php  
					
				
					if(isset($_POST['email_address']))
					{                                
						$to =  $_POST['email_address'];
						$msg = '<table>';
						$msg .= '<tr><td>Company :</td><td>'.$_POST['company'].'</td></tr>';       
/*						$anrede = $_POST['anrede'];
						if($anrede == 'Frau'){
							$anrede = 'Woman';
						}else{
							$anrede = 'Man';
						}
						$msg .= '<tr><td>Salutation :</td><td>'.$anrede.'</td></tr>';
						$msg .= '<tr><td>Title :</td><td>'.$_POST['titel'].'</td></tr>';*/
						$msg .= '<tr><td>First Name :</td><td>'.$_POST['first_name'].'</td></tr>';
						$msg .= '<tr><td>Last Name :</td><td>'.$_POST['last_name'].'</td></tr>';
						$msg .= '<tr><td>Street / House number :</td><td>'.$_POST['street'].'&nbsp;'.$_POST['house_number'].'</td></tr>';
						$msg .= '<tr><td>Country :</td><td>'.$_POST['country'].'</td></tr>';
						$msg .= '<tr><td>City and zip code :</td><td>'.$_POST['city_code'].'&nbsp;'.$_POST['zipe_code'].'</td></tr>';
						$msg .= '<tr><td>Email address :</td><td>'.$_POST['email_address'].'</td></tr>';
						$msg .= '<tr><td>Telephone number :</td><td>'.$_POST['telephone_number'].'</td></tr>';
						$msg .= '<tr><td>Subject line :</td><td>'.$_POST['subject_line'].'</td></tr>';
						$msg .= '<tr><td>Your message :</td><td>'.$_POST['your_message'].'</td></tr>';
						$msg .= '</table>';
						$subject = $_POST['subject_line'];
						$message = $msg;
						$headers = array('Content-Type: text/html; charset=UTF-8');
						$headers[] = 'From: mertex <contact@mertex.de>';
						wp_mail( "contact@mertex.de", $subject, $message, $headers);

						$msg  = '<p>Dear Sir or Madam:</p>';
						$msg .= '<p>Thank you for the information you submitted to us.</p>';
						$msg .= '<p>We will contact you as soon as possible.</p>';
						$msg .= '<p>Sincerely,</p>';
						$msg .= '<p>Mertex</p><br/>';                   
						$message = $msg;
						wp_mail( $to, $subject, $message, $headers);
                                                                                                                                                   
					}
					
					
					?>
					<p>Thank you very much for your input.</p><p style="margin:0">We have sent a confirmation e-mail to “<a href="mailto:<?php echo $_POST['email_address']; ?>"><?php echo $_POST['email_address']; ?></a>”</p>
					<p>If you do not receive an e-mail within the next hour, you can e-mail us directly at <a href="mailto:info@mertex.de">info@mertex.de.</a></p>
					<a onclick="window.history.back();" href="#this">Back</a> 
          </div>         

	</div><!-- .container -->
    </div>
</html>
<?php           

?>