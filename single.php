<?php 
if (in_category('store')){

get_template_part('templates/content', 'product');
		// get_template_part('templates/content', 'single');

} else {
	get_template_part('templates/content', 'single');
}
?>
