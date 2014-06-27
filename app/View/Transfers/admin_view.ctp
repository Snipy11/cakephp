<div class="transfers view">
<h2><?php echo __('Transfer'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transfer['Player']['id'], array('controller' => 'players', 'action' => 'view', $transfer['Player']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('From User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transfer['FromUser']['username'], array('controller' => 'users', 'action' => 'view', $transfer['FromUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('To User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transfer['ToUser']['username'], array('controller' => 'users', 'action' => 'view', $transfer['ToUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Create'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['create']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Validate'); ?></dt>
		<dd>
			<?php echo h($transfer['Transfer']['validate']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transfer'), array('action' => 'edit', $transfer['Transfer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transfer'), array('action' => 'delete', $transfer['Transfer']['id']), array(), __('Are you sure you want to delete # %s?', $transfer['Transfer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transfers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transfer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New From User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
