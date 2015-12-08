<?php
/**
 * Argo menu
 */

function argo_title_menu() {
	$logo_type = ot_get_option('logo_type','text');
    $logo_image = ot_get_option('logo_image_big',get_template_directory_uri().'/assets/img/195x195.gif');
	?>
<header id="header">      
<div class="header-holder">
	<div class="container hidden-phone" style="width:100%">
		<div class="brow">
			<div class="logo_container">
				<a href="#" class="nav-item clearfix">
					<h1 class="logo <?php echo $logo_type; ?>"><?php echo ($logo_type=='text')?ot_get_option('logo_text','argo'):"<img src='$logo_image' alt='Logo' />"; ?></h1>
				</a>
			</div>          
            <select class="sel_lan" style="position:absolute;z-index:1001;right:1%;top:1%;">
                <option value="German_lan">Deutsch</option> 
                <option value="English_lan">English</option> 
            </select> 
		</div>
        <div class="top_navigation">
	<?php

	$title_menu = ot_get_option('nav_items',false);
	$mobile_menu = '';
	if($title_menu && !(is_string($title_menu))){
		$menu_id = array();
		$i = 0;
		foreach ($title_menu as $menu_item) {

			$page_mn = get_page( $menu_item['page_select'] );
			
			$mn_class = isset($menu_item['brick'])?$menu_item['brick'].' ':'';
			$mn_class .= isset($menu_item['brick_color'])?$menu_item['brick_color'].' ':'';
			$mn_class .= isset($menu_item['brick_offset'])?$menu_item['brick_offset'].' ':'';
			$mn_icon = isset($menu_item['nav_icon'])?$menu_item['nav_icon']:'';
			$link ='';
			$title = isset($menu_item['custom_title'])?$menu_item['custom_title']:'';
			$is_external = '';
			switch ($menu_item['link_type']) {
				case 'page':
					if(!$page_mn) continue;
					$link = site_url('/#').$page_mn->post_name;
					$title = (empty($title))?$page_mn->post_title:$title;
					break;
				case 'page_external':
					if(!$page_mn) continue;
					$link = get_permalink($menu_item['page_select']);
					$is_external = 'external';
					$title = (empty($title))?$page_mn->post_title:$title;
					break;
				default:
					$link = $menu_item['custom_link'];
					$is_external = 'external';
					break;
			}
			$line = 0;
			if($menu_item['brick_type']=='nav_item'){
				?>
				<div class="<?php echo $mn_class; ?>">
					<a href="<?php echo $link;  ?>" class="nav-item <?php echo $is_external; ?>">
						<div class="nav-hover"></div>
						<i class="<?php echo $mn_icon; ?>"></i>
						<span class="<?php $unspace_title = explode(' ',$title); echo $unspace_title[0]."_title"; ?>"><?php echo $title; ?></span>
					</a>
				</div>
				<?php

				if($i==0){
				$logo_html = ($logo_type=='text')?ot_get_option('logo_text','argo'):"<img src='$logo_image' alt='Logo' />"; 
				$mobile_menu .= '<div class="logo_mobile" style="width:100%; overflow: hidden;"><div class="brick1 logo_container">
									<a href="#" class="nav-item clearfix">
										<div class="nav-hover"></div>
										<h1 class="logo '.$logo_type.'">'.$logo_html.'</h1>
									</a>
								</div>';
                $mobile_menu .= '<select class="sel_lan_mobile">
                                    <option value="German_lan_mobile">Deutsch</option>
                                    <option value="English_lan_mobile">English</option>  
                                 </select></div>';
				 $i++;
						}
				$odd= (in_array($i,array(1,4,5,8,9,12,13)))?'odd':'';
                $unspace_title = explode(' ',$page_mn->post_title);
				$mobile_menu .= '<div class="brick1 '.$odd.'">
									<a href="'.$link.'" class="nav-item '.$is_external.'">
										<div class="nav-hover"></div>
										<i class="'.$mn_icon.'"></i>
										<span class="'.$unspace_title[0].'_title">'.$page_mn->post_title.'</span>
									</a>
								</div>';

			    $i++;

			}
			else if($menu_item['brick_type']=='flip_images'){
				$img1= (isset($menu_item['img_1']))?$menu_item['img_1']:'http://placehold.it/195x195';
					$img2= (isset($menu_item['img_2']))?$menu_item['img_2']:'http://placehold.it/195x195';
				?>

				<div class="brick1 thumb <?php echo $menu_item['brick_offset']; ?>">
					<div class="nav-item <?php echo $menu_item['img_direction']; ?>">
						<img alt="" src="<?php echo $img1; ?>" class="img1">
						<img alt="" src="<?php echo $img2; ?>" class="img2">
					</div>
				</div>
				<?php
			}
			else {
				?>
				<div class="<?php echo $mn_class; ?> slogan transparent text-right">
					<div class="inner">
						<?php echo $menu_item['slogan_text']; ?>
					</div>
					
				</div>
				<?php
			}
		}
	}
	
	?>
	</div>  <!-- end hidden-phone -->      
    </div>      
	<div class="container visible-phone">
		<?php echo $mobile_menu; ?>		
	</div>
    <div id="welcome_to_mertex">
        <div style="border-bottom: 1px solid;margin-bottom:30px;">
            <h1 class="welcome_h1">WELCOME TO MERTEX!</h1>
        </div>
        <div style=" width:48%; float:left;" id="welcome_left">
            <p>We provide you with customized lighting solutions for your company – efficient high-quality products at fair prices.</p>
            <p>We work hand in hand with our customers and always start out by listening closely to their concerns.</p>
            <p>As a contract manufacturer or Original Design Manufacturer (ODM) we will fully comply with your requests and ideas.
                <br /> This already starts in the planning phase, when we base our designs on your drawings and sketches. 
                <br />You will receive a working prototype that you can transfer into mass production one-to-one. 
                <br />Do you have any special technical requirements? We look forward to meeting all your needs!</p>
        </div>
        <div style="margin-left:4% ;width: 48%; float:left;" id="welcome_right">
            <p>Our lamps can be found in all kinds of industries: In the lighting of manufacturing halls, but also with furniture and kitchen manufacturers as well as wholesalers. 
                <br />That way our wide range of products reaches retailers as well. Our company also manufactures in China like so many others. 
                <br />The big difference is that we comply fully and to the letter with German quality standards and offer you great value for your money. 
                <br />Furthermore, we manufacture our LED lighting in our very own factory utilizing our own know-how.</p>
            <p style="color:#d1ff95;font-style:oblique;">Feel free to contact us with any questions!</p>
        </div>                                            
    </div>
	</div>
</header> <!-- End header -->
	<?php
}

function argo_navbar(){
	$logo_type = ot_get_option('logo_type','text');
    $logo_image = ot_get_option('logo_image_small',get_template_directory_uri().'/assets/img/100x45.gif');
    $title_menu = ot_get_option('nav_items',false);
	if($title_menu  && !is_string($title_menu)){
 ?>

	<div id="navbar" class="navbar">
  <div class="navbar-inner">
    <div class="container">
      <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="<?php echo site_url('/'); ?>" class="external brand <?php echo $logo_type; ?>"><?php echo ($logo_type=='text')?ot_get_option('logo_text','argo'):"<img src='$logo_image' alt='Logo' />"; ?></a>
       <?php if(is_home()){?>
      <div class="nav-collapse collapse">
        <ul class="nav">
		<?php 
		foreach ($title_menu as $menu_item) :
			$page_mn = get_page( $menu_item['page_select'] );
		    if(!$page_mn) continue;
			$mn_icon = isset($menu_item['nav_icon'])?$menu_item['nav_icon']:'';
			$link ='';
			$is_external = '';
			switch ($menu_item['link_type']) {
				case 'page':
				   if(is_home()) $link = '#'.$page_mn->post_name;
				   else $link = site_url('/#').$page_mn->post_name;
					break;
				case 'page_external':
					$link = get_permalink($menu_item['page_select']);
					$is_external = 'external';
					break;
				default:
					$link = $menu_item['custom_link'];
					$is_external = 'external';
					break;
			}
			if(!is_home() )$is_external = 'external';
			$line = 0;
			if($menu_item['brick_type']=='nav_item'){
				?>
			  <li class="">
	            <a href="<?php echo $link;  ?>" class="<?php echo $is_external; ?>"><i class="<?php echo $mn_icon; ?>"></i><span class="<?php $unspace_title = explode(' ',$page_mn->post_title); echo $unspace_title[0]."_title"; ?>"><?php echo $page_mn->post_title; ?></span></a>
	          </li>
         <?php 
         	}
         endforeach; ?>
        </ul>
      </div>
      <?php }?>
    </div>
  </div>
</div> <!-- end navbar -->

 <?php 
    }
}
?>