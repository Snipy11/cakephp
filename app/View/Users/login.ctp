<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Entrez votre nom d\'utilisateur et votre mot de passe'); ?>
        </legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login'));
echo $this->Html->link(__('Pas encore inscrit ?'), array('action' => 'add'));
 ?>

</div>