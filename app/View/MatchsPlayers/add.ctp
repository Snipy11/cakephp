<div class="matchsPlayers form">
<?php echo $this->Form->create('MatchsPlayer'); ?>
	<fieldset>
		<legend><?php echo __('Add Matchs Player'); ?></legend>
	<?php
		echo $this->Form->input('player_id');
		echo $this->Form->input('match_id');
		echo $this->Form->input('eval');
		echo $this->Form->input('goals');
		echo $this->Form->input('yellow_cards');
		echo $this->Form->input('red_card');
		echo $this->Form->input('assists');
		echo $this->Form->input('own_goals');
		echo $this->Form->input('play_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Matchs Players'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
	</ul>
</div>
