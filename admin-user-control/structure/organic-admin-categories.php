<?php

add_action('admin_init','register_section_one_settings');

function register_section_one_settings()
{
	register_setting('organic_options','select_wp_category','validate_section_one_settings');	
}


function display_section_one()
{
	
}

function organic_choose_category()
{
	?>
	<p>Choose three categories!<p>
	<?php
	$args = array(
		'hide_empty'=>false,

		);
	$categories = get_categories($args);
	$array_options = [];
	foreach ($categories as $category)
	{
		//print_r($category);
		echo '<p><input type="checkbox" name="'.$category->slug.'" value="'.$category->slug.'">'.$category->name.'</p>';
		
	}
	
	$cat_option = get_option('cat_for_display');
	if (count($cat_option) === 3)
	{
		echo "<ul>Uspesno ste odabrali sledece kategorije: ";
		foreach($cat_option as $option)
		{
			echo "<li>" . $option . "</li>";
		}
		echo "</ul>";
	}

}	

function save_section_one()
{
	$counter = 0;
	$args = array(
		'hide_empty'=>false,
		);
	$categories = get_categories($args);
	$arr_category_into_options = array();
	foreach ($categories as $category)
	{

		$cat_slug = $category->slug;		
		if (isset( $_REQUEST[$cat_slug] ) )
	    {
	    	array_push($arr_category_into_options, $_REQUEST[$cat_slug]);
	    	if (count($arr_category_into_options) === 3) 
	    	{
	    		update_option('cat_for_display', $arr_category_into_options );
	    	}

	    }
	    
	}
	
}

add_action('admin_init', 'save_section_one');
