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
		</div>
	</div>
</section>