		
    <?php if (Session::get_flash('error_flash')): ?>
		<script type="text/javascript">
			$(document).ready(function() {	
				show_notification('error', "<?php echo Session::get_flash('error_flash'); ?>" );	
			});				
		</script>
	<?php endif; ?>
	
    <?php if (Session::get_flash('success_flash')): ?>
		<script type="text/javascript">
			$(document).ready(function() {	
				show_notification('success',"<?php echo Session::get_flash('success_flash'); ?>");	
			});			
		</script>
	<?php endif; ?>
