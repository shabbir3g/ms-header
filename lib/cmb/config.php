<?php  


	function amader_meta(){

		$team = new_cmb2_box([
			'title'		=> 'Header Logo',
			'id'		=> 'header-lgoo',
			'object_types'	=> ['headerlogo']
		]);

		
		$team -> add_field([
			'name'			=> 'Normal Logo',
			'id'			=> 'nr-logo',
			'type'			=> 'file'
		]);
		$team -> add_field([
			'name'			=> 'Hover Logo',
			'id'			=> 'hv-logo',
			'type'			=> 'file'
		]);
		$team -> add_field([
			'name'			=> 'Logo Link',
			'id'			=> 'link-logo',
			'type'			=> 'text_url'
		]);

		
	}
	add_action('cmb2_init','amader_meta');









?>