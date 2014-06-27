<?php
App::uses('AppController', 'Controller');

/**
 * Transfers Controller
 *
 * @property Transfer $Transfer
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TransfersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Transfer->recursive = 0;
		$this->set('transfers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Transfer->exists($id)) {
			throw new NotFoundException(__('Invalid transfer'));
		}
		$options = array('conditions' => array('Transfer.' . $this->Transfer->primaryKey => $id));
		$this->set('transfer', $this->Transfer->find('first', $options));
	}
	
	
/**
 * sell method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function add($id_player = null) {
		if(!$this->Transfer->Player->exists($id_player))
		{
		throw new NotFoundException(__('Invalid Player'));
		}
			if ($this->request->is('post'))
			{
				$options = array('conditions' => array('Player.' . $this->Transfer->Player->primaryKey => $id_player));
				$player  = $this->Transfer->Player->find('first', $options);
				
				$this->Transfer->recursive = -1;
				$options = array('conditions' => array('Transfer.player_id' => $id_player, 'Transfer.validate' => FALSE, 'activ' => TRUE) );
				$count_transfer  = $this->Transfer->find('count', $options);
				
				// Verify the Player belongs to the User
				if ($player['Player']['user_id'] != $this->Auth->user('id')) {
					$this->Session->setFlash(__('Ce joueur ne vous appartient pas, vous ne pouvez pas le vendre.'));
				}
				// Verify the Player is not already on the transfer list
				else if($count_transfer != 0)
				{ 
					$this->Session->setFlash(__('Ce joueur est déjà sur la liste des transferts.'));
				}
				else
				{
						// Add the transfer		
						$this->Transfer->create();
						$this->Transfer->set(array(
						'player_id' => $id_player,
						'amount' => $this->request->data('amount'),
						'validate' => FALSE,
						'from_user_id' => $this->Auth->user('id'),
						'to_user_id' => 0,
						'activ' => TRUE,
						'create' => date("Y-m-d H:i:s")
						));

						if ($this->Transfer->save($this->request->data))
						{
							$this->Session->setFlash(__('Le joueur est mis sur la liste des transferts.'));
						} 
						else 
						{
							$this->Session->setFlash(__('The transfer could not be saved. Please, try again.'));
						}			
				}
				$this->set('player', $player);
				//$this->redirect(array(
				//'controller' => 'players',
				//'action' => 'view', $id_player
			//));	
			}
			else{
				$this->render();
			}
	}
	
/**
offer *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function offer($id_player = null) {
		if(!$this->Transfer->Player->exists($id_player))
		{
		throw new NotFoundException(__('Invalid Player'));
		}
			if ($this->request->is('post'))
			{
				$options = array('conditions' => array('Player.' . $this->Transfer->Player->primaryKey => $id_player));
				$player  = $this->Transfer->Player->find('first', $options);
				
				// Verify the Player don't belong to the User
				if ($player['Player']['user_id'] == $this->Auth->user('id')) {
					$this->Session->setFlash(__('Ce joueur vous appartient, vous ne pouvez pas faire une proposition.'));
				}
				// Verify the Player is not free
				else if($player['Player']['free'] == TRUE)
				{ 
					$this->Session->setFlash(__('Ce joueur est libre vous ne pouvez pas faire de proposition.'));
				}
				else
				{
						// Add the offer		
						$this->Transfer->create();
						$this->Transfer->set(array(
						'player_id' => $id_player,
						'amount' => $this->request->data('amount'),
						'validate' => FALSE,
						'from_user_id' => $player['Player']['user_id'],
						'to_user_id' => $this->Auth->user('id'),
						'activ' => TRUE,
						'offer' => TRUE,
						'create' => date("Y-m-d H:i:s")
						));

						if ($this->Transfer->save($this->request->data))
						{
							$this->Session->setFlash(__('La proposition a bien été envoyé à l\'agent du joueur.'));
						} 
						else 
						{
							$this->Session->setFlash(__('La proposition n\a pu être envoyée.'));
						}			
				}
				$this->set('player', $player);
				//$this->redirect(array(
				//'controller' => 'players',
				//'action' => 'view', $id_player
			//));	
			}
			else{
				$this->render();
			}
	}	

/**
 * cancel method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function cancel($id = null) {
		$this->Transfer->id = $id;
		if (!$this->Transfer->exists()) {
			throw new NotFoundException(__('Ce transfert n\existe pas.'));
		}
				
		// Verify the Player belongs to the User
		$options = array('conditions' => array('Player.' . $this->Transfer->Player->primaryKey => $this->Transfer->player_id));
		$player  = $this->Transfer->Player->find('first', $options);
		if ($player['Player']['user_id'] != $this->Auth->user('id')) {
			$this->Session->setFlash(__('Ce joueur ne vous appartient pas, vous ne pouvez pas le vendre.'));
		}
		
		if ($this->Transfer->saveField('activ', FALSE)) 
		{
			$this->Session->setFlash(__('Le transfert a bien été annulé.'));
		} else {
			$this->Session->setFlash(__('Le transfert n\'a pas pu être annulé.'));
		}
		return $this->redirect(array('controller' => 'Players', 'action' => 'view', $player['Player']['id']));
	}
	
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Transfer->exists($id)) {
			throw new NotFoundException(__('Invalid transfer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transfer->save($this->request->data)) {
				$this->Session->setFlash(__('The transfer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transfer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transfer.' . $this->Transfer->primaryKey => $id));
			$this->request->data = $this->Transfer->find('first', $options);
		}
		$players = $this->Transfer->Player->find('list');
		$fromUsers = $this->Transfer->FromUser->find('list');
		$toUsers = $this->Transfer->ToUser->find('list');
		$this->set(compact('players', 'fromUsers', 'toUsers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Transfer->id = $id;
		if (!$this->Transfer->exists()) {
			throw new NotFoundException(__('Invalid transfer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transfer->delete()) {
			$this->Session->setFlash(__('The transfer has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transfer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Transfer->recursive = 0;
		$this->set('transfers', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Transfer->exists($id)) {
			throw new NotFoundException(__('Invalid transfer'));
		}
		$options = array('conditions' => array('Transfer.' . $this->Transfer->primaryKey => $id));
		$this->set('transfer', $this->Transfer->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Transfer->create();
			if ($this->Transfer->save($this->request->data)) {
				$this->Session->setFlash(__('The transfer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transfer could not be saved. Please, try again.'));
			}
		}
		$players = $this->Transfer->Player->find('list');
		$fromUsers = $this->Transfer->FromUser->find('list');
		$toUsers = $this->Transfer->ToUser->find('list');
		$this->set(compact('players', 'fromUsers', 'toUsers'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Transfer->exists($id)) {
			throw new NotFoundException(__('Invalid transfer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transfer->save($this->request->data)) {
				$this->Session->setFlash(__('The transfer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transfer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transfer.' . $this->Transfer->primaryKey => $id));
			$this->request->data = $this->Transfer->find('first', $options);
		}
		$players = $this->Transfer->Player->find('list');
		$fromUsers = $this->Transfer->FromUser->find('list');
		$toUsers = $this->Transfer->ToUser->find('list');
		$this->set(compact('players', 'fromUsers', 'toUsers'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Transfer->id = $id;
		if (!$this->Transfer->exists()) {
			throw new NotFoundException(__('Invalid transfer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Transfer->delete()) {
			$this->Session->setFlash(__('The transfer has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transfer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
