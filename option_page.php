<?php

include "controls.php";
global $wpdb,$table_prefix;

if($_POST['redirect_to']!='')
	{
		$newoptions['p404_redirect_to']=$_POST['redirect_to'];
		$newoptions['p404_status']=$_POST['p404_status'];
		update_my_options($newoptions);
		option_msg('Options Saved!');
		
	}
	
$options= get_my_options();
?>

<?
if(there_is_cache()!='') 
info_option_msg("You have a cache plugin installed <b>'" . there_is_cache() . "'</b>, you have to clear cache after any changes to get the changes reflected immediately! ");
?>

<div class="wrap">
<h2>All 404 Redirect to Homepage</h2>
<form method="POST">
	
	<br/><br/>
	404 Redirection Status: 
	<?php
		$drop = new dropdown('p404_status');
		$drop->add('Enabled','1');	
		$drop->add('Disabled','2');
		$drop->dropdown_print();
		$drop->select($options['p404_status']);
	?>
	<br/><br/>
	
	Redirect all 404 pages to: 
	<input type="text" name="redirect_to" id="redirect_to" size="30" value="<?=$options['p404_redirect_to']?>">		
	
	
	
<br/><br/><br/>
<input  class="button-primary" type="submit" value="  Update Options  " name="Save_Options"></form>  

</div>