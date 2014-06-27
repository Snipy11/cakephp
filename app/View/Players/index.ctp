<div class="players index">
	<h2><?php echo __('Players'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('firstname'); ?></th>
			<th><?php echo $this->Paginator->sort('lastname'); ?></th>
			<th><?php echo $this->Paginator->sort('team_id'); ?></th>
			<th><?php echo $this->Paginator->sort('free'); ?></th>
			<th><?php echo $this->Paginator->sort('valuable'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($players as $player): ?>
	<tr>
		<td><?php echo h($player['Player']['id']); ?>&nbsp;</td>
		<td><?php echo h($player['Player']['firstname']); ?>&nbsp;</td>
		<td><?php echo h($player['Player']['lastname']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($player['Team']['name'], array('controller' => 'teams', 'action' => 'view', $player['Team']['id'])); ?>
		</td>
		<td>
			<?php 
				if($player['Player']['free'] == TRUE){
				    echo $this->Form->postLink(__('Investir'), array('action' => 'invest', $player['Player']['id']), array(), __('Etes vous sûr de vouloir investir dans  %s %s?', $player['Player']['firstname'], $player['Player']['lastname']));
				}
				else{
					echo __('Indisponible'); 
				}
			?>
			&nbsp;
		</td>
		<td><?php echo h($player['Player']['valuable']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $player['Player']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $player['Player']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $player['Player']['id']), array(), __('Are you sure you want to delete # %s?', $player['Player']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Player'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
