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
			<table id="hometable" class="table table-bordered table-striped tablesorter">
				<thead>
					<tr>
						<th>
							UserId
						</th>
						<?foreach($services as $s):?>
						<th>
							<?= if( $s != 'hackernews' ) { ?>
							<a href="<?=$s?>.com"><img class="service-icon" src="public/img/<?=$s?>.png" title="<?=$s?>"></a>
							<?= } else { ?>
							<a href="news.ycombinator.com"><img class="service-icon" src="public/img/<?=$s?>.png" title="<?=$s?>"></a>
							<?= } ?>
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
				Click on a logo to sort.
			</p>
		</div>
	</div>
</section>
<script src="/public/js/jquery.min.js"></script>
<script src="/public/js/jquery.tablesorter.min.js"></script>
<script>
	$(function(){ 
	  $("#hometable").tablesorter(); 
	});
</script>