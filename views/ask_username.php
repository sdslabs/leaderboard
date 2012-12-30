<section>
	<div class="container"><div class="row">
		<form action="/login/<?=$service?>/callback" method="GET">
		  	<label for="username">Enter username for <?=$service?></label>
			<div class="input-prepend input-append">
				<?if(isset($prepend)):?>
				<span class="add-on"><?=$prepend?></span>
				<?endif;?>
				<input class="span2" type="text" name="username">
				<?if(isset($append)):?>
				<span class="add-on"><?=$append?></span>
				<?endif;?>
			</div>
			<span class="help-block"><?=@$hint?></span>
			<div class="form-actions">
				<input type="submit" class="btn btn-primary" value="Save">
				<input type="reset" class="btn">
			</div>
		</form>
</div></div>
</section>