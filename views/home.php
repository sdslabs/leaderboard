<?php
$scores_formatted=array();	//Keep final formatted scores here

//generate a list of unique service names
$services=array_map(function($row){
	return $row->service;
},$scores);
$services=array_unique($services);

//create a 2d table for user/scores
foreach($scores as $score)
	$scores_formatted[$score->userid][$score->service]=$score->score;
?>
<section id="scores">
	<div class="container">
		<div class="row">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>
							UserId
						</th>
						<?foreach($services as $s):?>
						<th>
							<img class="service-icon" src="public/img/<?=$s?>.png" title="<?=$s?>">
						</th>		
						<?endforeach;?>
					</tr>
				</thead>
				<tbody>
					<?foreach($scores_formatted as $person=>$score):?>
					<tr>
						<th><?=$person?></th>
						<?foreach($services as $s):?>
						<td><?=isset($score[$s])?$score[$s]:" - "?></td>
						<?endforeach;?>
					</tr>
					<?endforeach;?>
				</tbody>
			</table>
			<p>
				To know which service tracks what, go to our <a href="/page/about">about</a> page.
			</p>
		</div>
	</div>
</section>
