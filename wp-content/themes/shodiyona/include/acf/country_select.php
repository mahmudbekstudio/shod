<?php
class select_country extends acf_field_text {

	function __construct()
	{
		// vars
		$this->name = 'select_country';
		$this->label = __("Select country");
		$this->category = __("Custom");
		$this->defaults = array(
			'default_value'	=>	'',
			'formatting' 	=>	'html',
			'maxlength'		=>	'',
			'placeholder'	=>	'',
			'prepend'		=>	'',
			'append'		=>	''
		);


		// do not delete!
		acf_field::__construct();
	}

	function create_field( $field )
	{
		parent::create_field($field);

		global $q_config, $countryList;
		echo '<select>';
		foreach($countryList as $key=>$val) {
			$name = is_string($key) ? $key : $val;
			echo '<option>' . $name . '</option>';
		}
		echo '</select>';
		print_r($field);
		$e = '';
		// return
		echo $e;
	}

}

new select_country();