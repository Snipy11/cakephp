<div class="matchsPlayers index">
	<h2><?php echo __('Matchs Players'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('player_id'); ?></th>
			<th><?php echo $this->Paginator->sort('match_id'); ?></th>
			<th><?php echo $this->Paginator->sort('eval'); ?></th>
			<th><?php echo $this->Paginator->sort('goals'); ?></th>
			<th><?php echo $this->Paginator->sort('yellow_cards'); ?></th>
			<th><?php echo $this->Paginator->sort('red_card'); ?></th>
			<th><?php echo $this->Paginator->sort('assists'); ?></th>
			<th><?php echo $this->Paginator->sort('own_goals'); ?></th>
			<th><?php echo $this->Paginator->sort('play_time'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($matchsPlayers as $matchsPlayer): ?>
	<tr>
		<td><?php echo h($matchsPlayer['MatchsPlayer']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($matchsPlayer['Player']['id'], array('controller' => 'players', 'action' => 'view', $matchsPlayer['Player']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($matchsPlayer['Match']['name'], array('controller' => 'matches', 'action' => 'view', $matchsPlayer['Match']['id'])); ?>
		</td>
		<td><?php echo h($matchsPlayer['MatchsPlayer']['eval']); ?>&nbsp;</td>
		<td><?php echo h($matchsPlayer['MatchsPlayer']['goals']); ?>&nbsp;</td>
		<td><?php echo h($matchsPlayer['MatchsPlayer']['yellow_cards']); ?>&nbsp;</td>
		<td><?php echo h($matchsPlayer['MatchsPlayer']['red_card']); ?>&nbsp;</td>
		<td><?php echo h($matchsPlayer['MatchsPlayer']['assists']); ?>&nbsp;</td>
		<td><?php echo h($matchsPlayer['MatchsPlayer']['own_goals']); ?>&nbsp;</td>
		<td><?php echo h($matchsPlayer['MatchsPlayer']['play_time']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $matchsPlayer['MatchsPlayer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $matchsPlayer['MatchsPlayer']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $matchsPlayer['MatchsPlayer']['id']), array(), __('Are you sure you want to delete # %s?', $matchsPlayer['MatchsPlayer']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Matchs Player'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
	</ul>
</div>
