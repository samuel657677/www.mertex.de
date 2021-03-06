<?php 
/**
Collapse Shorcodes
*/

/**
 * Collapse
 */

function dnp_collapse($params, $content = null){
	extract(shortcode_atts(array(
		'id'=>'',
		'class'=>'',
 		), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<div class="accordion '.$class.'" id="'.$id.'">';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('collapse', 'dnp_collapse');


function dnp_citem($params, $content = null){
	extract(shortcode_atts(array(
		'id'=>'',
		'title'=>'Collapse title',
		'parent' => ''
 		), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = ' <div class="accordion-group">';
	$result .= ' <div class="accordion-heading">';
	$result .= '<a class="accordion-toggle" data-toggle="collapse" data-parent="#'.$parent.'" href="#'.$id.'">';
	$result .= $title;
	$result .= '</a>';
	$result .= '</div>';
	$result .= '<div id="'.$id.'" class="accordion-body collapse">';
	$result .= '<div class="accordion-inner">';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	$result .= '</div>'; 
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('citem', 'dnp_citem');


