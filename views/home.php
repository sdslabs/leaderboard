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

<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="/">Leaderboard</a>
			<div class="nav-collapse" id="main-menu">
				<ul class="nav pull-right" id="main-menu-left">
					<li><a href="/login/github">Login using Github</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

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
						<th><?=$s?></th>		
						<?endforeach;?>
					</tr>
				</thead>
				<tbody>
					<?foreach($scores_formatted as $person=>$score):?>
					<tr>
						<th><?=$person?></th>
						<?foreach($services as $s):?>
						<td><?=@$score[$s]?$score[$s]:"N/A"?></td>
						<?endforeach;?>
					</tr>
					<?endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</section>
