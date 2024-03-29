<div class="matches index">
	<h2><?php echo __('Matches'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('home_team_id'); ?></th>
			<th><?php echo $this->Paginator->sort('visitor_team_id'); ?></th>
			<th><?php echo $this->Paginator->sort('day'); ?></th>
			<th><?php echo $this->Paginator->sort('home_score'); ?></th>
			<th><?php echo $this->Paginator->sort('visitor_score'); ?></th>
			<th><?php echo $this->Paginator->sort('stadium'); ?></th>
			<th><?php echo $this->Paginator->sort('home_score_pen'); ?></th>
			<th><?php echo $this->Paginator->sort('visitor_score_pen'); ?></th>
			<th><?php echo $this->Paginator->sort('level'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($matches as $match): ?>
	<tr>
		<td><?php echo h($match['Match']['id']); ?>&nbsp;</td>
		<td><?php echo h($match['Match']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($match['HomeTeam']['name'], array('controller' => 'teams', 'action' => 'view', $match['HomeTeam']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($match['VisitorTeam']['name'], array('controller' => 'teams', 'action' => 'view', $match['VisitorTeam']['id'])); ?>
		</td>
		<td><?php echo h($match['Match']['day']); ?>&nbsp;</td>
		<td><?php echo h($match['Match']['home_score']); ?>&nbsp;</td>
		<td><?php echo h($match['Match']['visitor_score']); ?>&nbsp;</td>
		<td><?php echo h($match['Match']['stadium']); ?>&nbsp;</td>
		<td><?php echo h($match['Match']['home_score_pen']); ?>&nbsp;</td>
		<td><?php echo h($match['Match']['visitor_score_pen']); ?>&nbsp;</td>
		<td><?php echo h($match['Match']['level']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $match['Match']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $match['Match']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $match['Match']['id']), array(), __('Are you sure you want to delete # %s?', $match['Match']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Match'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Home Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
