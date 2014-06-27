<div class="matches form">
<?php echo $this->Form->create('Match'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Match'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('home_team_id');
		echo $this->Form->input('visitor_team_id');
		echo $this->Form->input('day');
		echo $this->Form->input('home_score');
		echo $this->Form->input('visitor_score');
		echo $this->Form->input('stadium');
		echo $this->Form->input('home_score_pen');
		echo $this->Form->input('visitor_score_pen');
		echo $this->Form->input('level');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Matches'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Home Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
