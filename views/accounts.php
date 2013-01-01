<?php
global $SERVICES;
?>
<section id="accounts">
	<div class="container">
		<?if(isset($flash['message'])):?>
		<div class="row">
			<div class="span8">
				<div class="alert alert-success">
					<?=$flash['message']?>
				</div>
			</div>
		</div>
		<?endif;?>
		<div class="row">
			<?foreach($SERVICES as $s):?>
				<div class="box">
					<form class="form-inline">
						<img class="service-icon" src="/public/img/<?=$s?>.png">
						<a href="/login/<?=$s?>" class="btn">Login</a>
						<a class="refresh-btn btn btn-default" href="/update/<?=$s."/".$_SESSION['userid']?>">Refresh</a>
					</form>
				</div>
			<?endforeach;?>
		</div>
		<div class="row">
			<p>Any new login will delete your previous authentication with that service.</p>
		</div>
	</div>
	
</section>
