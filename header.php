<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Argo
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html style="margin-top: 0 !important" class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html style="margin-top: 0 !important" class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html style="margin-top: 0 !important" class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <!--<![endif]-->
<html style="margin-top: 0 !important" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri() ?>/assets/js/html5shiv.js"></script>
  
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-spy="scroll" data-target=".navbar">
<?php 
	if(is_home()|| is_front_page()):
		 argo_title_menu(); 
	  endif; 
	argo_navbar();
	
?>
<script type="text/javascript">
    var language;
    jQuery(document).ready(function(){          
        language = window.navigator.userLanguage || window.navigator.language; 
        if(language.search("en")>=0){  //English
            jQuery('.sel_lan').val("English_lan");                      
            jQuery('.sel_lan_mobile').val("English_lan_mobile"); 
            <?php include(get_template_directory ()."/header-en.php"); ?> 
        }else if(language.search("de")>=0){ //German
            jQuery('.sel_lan').val("German_lan");
            jQuery('.sel_lan_mobile').val("German_lan_mobile");
            <?php include(get_template_directory ()."/header-de.php"); ?>
        }
        
        jQuery('.sel_lan').on('change', function() {                          
            switch(jQuery('.sel_lan').val()){     
                case 'English_lan':                                          
                    <?php include(get_template_directory ()."/header-en.php"); ?>                                                  
                    jQuery('#telephone_img').html('<img src="<?php echo get_template_directory_uri(); ?>/assets/img/telephone.png" alt="telephone" width="242" height="43" />');
                    jQuery('#question_email_img').html('<img src="<?php echo get_template_directory_uri(); ?>/assets/img/question_email.png" alt="question_email" width="368" height="75" />');
                    jQuery('#marketing_email_img').html('<img src="<?php echo get_template_directory_uri(); ?>/assets/img/marketing_email.png" alt="marketing_email" width="360" height="50" />');
                    jQuery('#require_email_img').html('<img src="<?php echo get_template_directory_uri(); ?>/assets/img/require_email.png" alt="require_email" width="315" height="47" />');
                    break;
                case 'German_lan':
                    jQuery('#telephone_img').html('<img src="<?php echo get_template_directory_uri(); ?>/assets/img/telephone-de.png" alt="telephone" width="242" height="43" />');  
                    jQuery('#question_email_img').html('<img src="<?php echo get_template_directory_uri(); ?>/assets/img/question_email-de.png" alt="question_email" width="368" height="75" />');
                    jQuery('#marketing_email_img').html('<img src="<?php echo get_template_directory_uri(); ?>/assets/img/marketing_email-de.png" alt="marketing_email" width="360" height="50" />');
                    jQuery('#require_email_img').html('<img src="<?php echo get_template_directory_uri(); ?>/assets/img/require_email-de.png" alt="require_email" width="315" height="47" />');
                    <?php include(get_template_directory ()."/header-de.php"); ?>
                    break;                         
            }                     
        });
        jQuery('.sel_lan_mobile').on('change', function() {                        
            switch(jQuery('.sel_lan_mobile').val()){     
                case 'English_lan_mobile':   
                    <?php include(get_template_directory ()."/header-en.php"); ?>
                    language = "en";
                    break;
                case 'German_lan_mobile':    
                    <?php include(get_template_directory ()."/header-de.php"); ?>
                    break;                         
            }                 
        });
                    
        
        jQuery('.disclaimer_text').on("click",function(){
            if(language == "en") {
                location.href = "<?php echo site_url()."/disclaimer/"; ?>";
            }else{
                location.href = "<?php echo site_url()."/disclaimer-de/"; ?>";
            }
        });
    })
</script>                                                                
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/validationEngine.jquery.css">
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.validationEngine-de.js" type="text/javascript" charset="utf-8">    </script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">    </script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#send_btn').on("click",function(){  
            jQuery(".comment_form").validationEngine();   
            if(jQuery('#permission_check').is(":checked")){    
                if(language == "en"){
                    jQuery(".comment_form").attr('action',"<?php echo site_url()."/contact-submit-en/"; ?>");
                }else if(language == "de"){
                    jQuery(".comment_form").attr('action',"<?php echo site_url()."/contact-submit-de/"; ?>");
                }                                                                                   
            }else{
                if(language == "en"){
                    alert("Please confirm that you agree with our privacy statement");
                }else if(language == "de"){
                    alert("Bitte bestätigen Sie die Datenschutzerklärung");
                }
            }
        });
    });
</script>