<?php
/*
Template Name: Contact Submit De
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
						$msg .= '<tr><td>Unternehmen :</td><td>'.$_POST['company'].'</td></tr>';       
/*						$anrede = $_POST['anrede'];
						if($anrede == 'Frau'){
							$anrede = 'Woman';
						}else{
							$anrede = 'Man';
						}
						$msg .= '<tr><td>Salutation :</td><td>'.$anrede.'</td></tr>';
						$msg .= '<tr><td>Title :</td><td>'.$_POST['titel'].'</td></tr>';*/
						$msg .= '<tr><td>Vorname :</td><td>'.$_POST['first_name'].'</td></tr>';
						$msg .= '<tr><td>Nachname :</td><td>'.$_POST['last_name'].'</td></tr>';
						$msg .= '<tr><td>Straße / Hausnummer :</td><td>'.$_POST['street'].'&nbsp;'.$_POST['house_number'].'</td></tr>';
						$msg .= '<tr><td>Land :*</td><td>'.$_POST['country'].'</td></tr>';
						$msg .= '<tr><td>PLZ and Ort :</td><td>'.$_POST['city_code'].'&nbsp;'.$_POST['zipe_code'].'</td></tr>';
						$msg .= '<tr><td>E-Mail Adresse :</td><td>'.$_POST['email_address'].'</td></tr>';
						$msg .= '<tr><td>Telefonnummer :</td><td>'.$_POST['telephone_number'].'</td></tr>';
						$msg .= '<tr><td>Betreff :</td><td>'.$_POST['subject_line'].'</td></tr>';
						$msg .= '<tr><td>Ihre Nachricht :</td><td>'.$_POST['your_message'].'</td></tr>';
						$msg .= '</table>';
						$subject = $_POST['subject_line'];
						$message = $msg;
						$headers = array('Content-Type: text/html; charset=UTF-8');
						$headers[] = 'From: mertex <contact@mertex.de>';
						wp_mail( "contact@mertex.de", $subject, $message, $headers);

						$msg  = '<p>Sehr geehrte Damen und Herren,</p>';
						$msg .= '<p>vielen Dank für die Eingabe Ihrer Daten.</p>';
						$msg .= '<p>Wir werden uns nun schnellstens mit Ihnen in Verbindung setzen.</p>';
						$msg .= '<p>Mit freundlichen Grüßen</p>';
						$msg .= '<p>Mertex</p><br/>';                   
						$message = $msg;
						wp_mail( $to, $subject, $message, $headers);
                                                                                                                                                   
					}
					
					
					?>
                    <p>Vielen Dank für Ihre Eingabe.</p><p style="margin:0">Wir haben Ihnen eine Bestätigung an “<a href="mailto:<?php echo $_POST['email_address']; ?>"><?php echo $_POST['email_address']; ?></a>” gesendet.</p>
                    <p>Sollten Sie innerhalb der nächsten Stunde keine Email erhalten haben, können Sie uns auch eine Email direkt an <a href="mailto:info@mertex.de">info@mertex.de.</a></p>
                    <a onclick="window.history.back();" href="#this">Zurück</a>
          </div>         

	</div><!-- .container -->
    </div>
</html>
<?php           

?>