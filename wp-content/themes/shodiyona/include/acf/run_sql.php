<?php
class run_sql extends acf_field_text {

	function __construct()
	{
		// vars
		$this->name = 'run_sql';
		$this->label = __("Run sql");
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
		echo '<div class="run-sql-message hidden"></div>';
		parent::create_field($field);
		?>
		<button type="button" class="run-sql-file acf-button">Run sql file "shodiyona.sql"</button>
		<script>
			(function($) {
				var runSqlInput = $('input[name="<?php echo $field['name'] ?>"]');
				runSqlInput.addClass('hidden');
				$('.run-sql-file').on('click', function() {
					var btn = $(this);
					var message = $('.run-sql-message');
					var runSqlFile = runSqlInput.val();

					message.addClass('hidden');
					message.removeClass('updated');
					message.removeClass('error');
					message.html('');

					btn.prop('disabled', true);

					$.ajax({
						type: 'post',
						url: '/',
						data: {runsqlfile: runSqlFile},
						success: function(data) {
							btn.prop('disabled', false);
							message.removeClass('hidden');
							if(data.error) {
								message.addClass('error');
								message.html(data.error);
							} else {
								message.addClass('updated');
								message.html(data.message);
							}
						},
						dataType: 'json'
					});
					return false;
				});
			})(jQuery);
		</script>
		<?
	}

}

new run_sql();