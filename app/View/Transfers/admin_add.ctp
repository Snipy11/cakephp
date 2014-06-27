<div class="transfers form">
<?php echo $this->Form->create('Transfer'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Transfer'); ?></legend>
	<?php
		echo $this->Form->input('player_id');
		echo $this->Form->input('from_user_id');
		echo $this->Form->input('to_user_id');
		echo $this->Form->input('create');
		echo $this->Form->input('amount');
		echo $this->Form->input('validate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Transfers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New From User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
