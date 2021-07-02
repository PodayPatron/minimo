<?php
/**
 * Tabs html template.
 */
?>
<div id="<?php echo esc_attr( $args['id'] ); ?>">
	<div class="nz-tabs-head">
		<ul class="nz-tabs-menu">
			<li class="active"><a href="#">Overview</a></li>
			<li><a href="#">Curriculum</a></li>
			<li><a href="#">Instructor</a></li>
			<li><a href="#">Reviews</a></li>
		</ul>
	</div>
	<div class="nz-tabs-content">
		<div class="active">
			<h3>Overview</h3>
			<p>It is capital of India</p>
		</div>
		<div>
			<h3>Curriculum</h3>
			<p>It is capital of China</p>
		</div>
		<div>
			<h3>Instructor</h3>
			<p>It is capital of Israel</p>
		</div>
		<div>
			<h3>Reviews</h3>
			<?php comments_template(); ?>
		</div>
	</div>
</div>
