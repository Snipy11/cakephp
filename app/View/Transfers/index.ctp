<div class="transfers index">
	<h2><?php echo __('Transfers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('player_id'); ?></th>
			<th><?php echo $this->Paginator->sort('from_user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('to_user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('create'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th><?php echo $this->Paginator->sort('validate'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($transfers as $transfer): ?>
	<tr>
		<td><?php echo h($transfer['Transfer']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transfer['Player']['id'], array('controller' => 'players', 'action' => 'view', $transfer['Player']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transfer['FromUser']['username'], array('controller' => 'users', 'action' => 'view', $transfer['FromUser']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transfer['ToUser']['username'], array('controller' => 'users', 'action' => 'view', $transfer['ToUser']['id'])); ?>
		</td>
		<td><?php echo h($transfer['Transfer']['create']); ?>&nbsp;</td>
		<td><?php echo h($transfer['Transfer']['amount']); ?>&nbsp;</td>
		<td><?php echo h($transfer['Transfer']['validate']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transfer['Transfer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transfer['Transfer']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transfer['Transfer']['id']), array(), __('Are you sure you want to delete # %s?', $transfer['Transfer']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Transfer'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New From User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
