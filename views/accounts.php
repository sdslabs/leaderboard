<?php
global $SERVICES;
?>
<section id="accounts">
	<div class="container">
		<div class="row">
			<h2>Login to : </h2>
			<ul>
			<?foreach($SERVICES as $s):?>
				<li><a href="/login/<?=$s?>"><?=ucwords($s);?></a></li>
			<?endforeach;?>
			</ul>
			<p>Any new login will delete your previous authentication with that service.</p>
		</div>
	</div>
</section>
