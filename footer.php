<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Argo
 */
 if(is_home()){
?>

<footer id="footer">
	<div class="container" style="opacity:0.5;">
        <img style="float:left;width:150px;" src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png"/>
		<div style="float:left;margin-left:25px;margin-top:18px;">&copy; MERTEX 2015</div>
        <div class="disclaimer_text" style="float:right;margin-top:18px;text-align: center;">Site notice, disclaimer and privacy statement</div>
	</div>
	<a href="#" id="btn_up">UP</a>
</footer>
<div class="rotate_container">
	<ul class="rotate_wrapper">
      <li class="rotate_item"><span></span></li>
      <li class="rotate_item delay1"><span></span></li>
      <li class="rotate_item delay2"><span></span></li>
      <li class="rotate_item delay3"><span></span></li>
      <li class="rotate_item delay4"><span></span></li>
    </ul>
</div>
<?php } wp_footer(); ?>

</body>
</html>