<section>
	<div class="container"><div class="row">
<form action="/login/<?=$service?>/callback" method="GET">
  	<label>Enter username for <?=$service?>
		<input type="text" name="username">
	</label>
	<input class="btn" type="submit" value="Save">
	<br>
	<p><?=@$hint;?></p>
</form>
</div></div>
</section>