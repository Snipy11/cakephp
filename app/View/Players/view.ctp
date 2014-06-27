<div class="players view">
<h2><?php echo __('Player'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($player['Player']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Firstname'); ?></dt>
		<dd>
			<?php echo h($player['Player']['firstname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
			<?php echo h($player['Player']['lastname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($player['Team']['name'], array('controller' => 'teams', 'action' => 'view', $player['Team']['id'])); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Agent'); ?></dt>
		<dd>
			<?php 
			if($player['Player']['free'] == TRUE)
			{
				echo $this->Form->postLink(__('Investir [ %s €]', $player['Player']['price']), array('action' => 'invest', $player['Player']['id']), array(), __('Etes vous sûr de vouloir investir dans  %s %s?', $player['Player']['firstname'], $player['Player']['lastname']));
			}	
			else{
				if($myPlayer == TRUE)
				{	if($sellInProgress != FALSE){
						echo $this->Html->link(__('Annuler la vente'), array('controller' => 'transfers', 'action' => 'cancel', $sellInProgress));
					}
					else{
						echo $this->Html->link(__('Mettre en vente'), array('controller' => 'transfers', 'action' => 'add', $player['Player']['id']));
						echo $this->Form->postLink(__(' / Libérer'), array('action' => 'free', $player['Player']['id']), array(), __('Etes vous sûr de vouloir libérer %s %s?', $player['Player']['firstname'], $player['Player']['lastname']));
					}
				}
				else{
					echo $this->Html->link(__('Faire une offre'), array('controller' => 'transfers', 'action' => 'offer', $player['Player']['id']));
				}
			}
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valuable'); ?></dt>
		<dd>
			<?php echo h($player['Player']['valuable']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Player'), array('action' => 'edit', $player['Player']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Player'), array('action' => 'delete', $player['Player']['id']), array(), __('Are you sure you want to delete # %s?', $player['Player']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
