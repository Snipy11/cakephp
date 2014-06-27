<div class="matchsPlayers view">
<h2><?php echo __('Matchs Player'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($matchsPlayer['MatchsPlayer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player'); ?></dt>
		<dd>
			<?php echo $this->Html->link($matchsPlayer['Player']['id'], array('controller' => 'players', 'action' => 'view', $matchsPlayer['Player']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Match'); ?></dt>
		<dd>
			<?php echo $this->Html->link($matchsPlayer['Match']['name'], array('controller' => 'matches', 'action' => 'view', $matchsPlayer['Match']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Eval'); ?></dt>
		<dd>
			<?php echo h($matchsPlayer['MatchsPlayer']['eval']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Goals'); ?></dt>
		<dd>
			<?php echo h($matchsPlayer['MatchsPlayer']['goals']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Yellow Cards'); ?></dt>
		<dd>
			<?php echo h($matchsPlayer['MatchsPlayer']['yellow_cards']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Red Card'); ?></dt>
		<dd>
			<?php echo h($matchsPlayer['MatchsPlayer']['red_card']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Assists'); ?></dt>
		<dd>
			<?php echo h($matchsPlayer['MatchsPlayer']['assists']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Own Goals'); ?></dt>
		<dd>
			<?php echo h($matchsPlayer['MatchsPlayer']['own_goals']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Play Time'); ?></dt>
		<dd>
			<?php echo h($matchsPlayer['MatchsPlayer']['play_time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Matchs Player'), array('action' => 'edit', $matchsPlayer['MatchsPlayer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Matchs Player'), array('action' => 'delete', $matchsPlayer['MatchsPlayer']['id']), array(), __('Are you sure you want to delete # %s?', $matchsPlayer['MatchsPlayer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Matchs Players'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Matchs Player'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
	</ul>
</div>
