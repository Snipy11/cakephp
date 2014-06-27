<div class="matches view">
<h2><?php echo __('Match'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($match['Match']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($match['Match']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Home Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($match['HomeTeam']['name'], array('controller' => 'teams', 'action' => 'view', $match['HomeTeam']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Visitor Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($match['VisitorTeam']['name'], array('controller' => 'teams', 'action' => 'view', $match['VisitorTeam']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Day'); ?></dt>
		<dd>
			<?php echo h($match['Match']['day']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Home Score'); ?></dt>
		<dd>
			<?php echo h($match['Match']['home_score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Visitor Score'); ?></dt>
		<dd>
			<?php echo h($match['Match']['visitor_score']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stadium'); ?></dt>
		<dd>
			<?php echo h($match['Match']['stadium']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Home Score Pen'); ?></dt>
		<dd>
			<?php echo h($match['Match']['home_score_pen']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Visitor Score Pen'); ?></dt>
		<dd>
			<?php echo h($match['Match']['visitor_score_pen']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Level'); ?></dt>
		<dd>
			<?php echo h($match['Match']['level']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Match'), array('action' => 'edit', $match['Match']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Match'), array('action' => 'delete', $match['Match']['id']), array(), __('Are you sure you want to delete # %s?', $match['Match']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Home Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
