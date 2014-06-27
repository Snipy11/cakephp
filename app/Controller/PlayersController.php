<?php
App::uses('AppController', 'Controller');
/**
 * Players Controller
 *
 * @property Player $Player
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PlayersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Player->recursive = 0;
		$this->set('players', $this->Paginator->paginate('Player'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Player->exists($id)) {
			throw new NotFoundException(__('Ce joueur n\'existe pas'));
		}
	
		$options = array('conditions' => array('Player.' . $this->Player->primaryKey => $id));
		$player = $this->Player->find('first', $options);
		if($player['Player']['user_id'] == $this->Auth->user('id'))
			$this->set('myPlayer', TRUE);
		else
			$this->set('myPlayer', FALSE);

		$this->set('sellInProgress', $this->Player->sellInProgress($id));
		$this->set('player', $player);
	}

	
	/**
 * free method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function free($id = null) {
		if (!$this->Player->exists($id)) {
			throw new NotFoundException(__('Ce joueur n\'existe pas'));
		}
		else{
		
			$options = array('conditions' => array('Player.' . $this->Player->primaryKey => $id));
			$player = $this->Player->find('first', $options);
		
			// Verify it's the user's player
			if($player['Player']['user_id'] == $this->Auth->user('id'))
			{
				// Change the status (free) + user_id =0
				$this->Player->id = $id;
				$this->Player->set(array(
						'free'=> TRUE,
						'user_id' => 0
						));
				$this->Player->save();
				$this->set('myPlayer', FALSE);
			}
			else{
				$this->Session->setFlash(__('Ce joueur ne vous appartient pas.'));
			}
		}
			$this->set('player', $player);
			$this->render('view');
	}
		
/**
 * invest method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function invest($id = null) {
		if (!$this->Player->exists($id)) {
			throw new NotFoundException(__('Ce joueur n\'existe pas'));
		}
		
		$options = array('conditions' => array('Player.' . $this->Player->primaryKey => $id));
		$player = $this->Player->find('first', $options);
		
		
		// Verify the Player is free
		if($player['Player']['free'] !=  TRUE)
		{
			$this->Session->setFlash(__('Ce joueur possede actuellement un agent.'));
		}
		else
		{
		    //$this->Session->write('Auth.User.money', '400'); // A SUPPRIMER
			//Verify the user has enough money	
			if($this->Auth->user('money') >= $player['Player']['price'])
			{
				
				// Change the status (free) + user_id to the player
				$this->Player->id = $id;
				$this->Player->saveField('free', FALSE);
				$this->Player->saveField('user_id', $this->Auth->user('id'));
				
				// Soustract the player's price to the money's user		
				$signe = '-';
				$new_money = $this->Player->User->changeMoney($this->Auth->user('id'), $player['Player']['price'], $signe);
				$this->Session->write('Auth.User.money', ($new_money));

				// Add the transfer
				
				$this->Player->Transfer->create();
				//$this->Player->Transfer->set('id', 1); // A modifier
				$this->Player->Transfer->set('player_id', $id);
				$this->Player->Transfer->set('amount', $player['Player']['price']);
				$this->Player->Transfer->set('validate', TRUE);
				$this->Player->Transfer->set('from_user_id', '0'); // A corriger
				$this->Player->Transfer->set('to_user_id', $this->Auth->user('id'));
				$this->Player->Transfer->set('create', date("Y-m-d H:i:s"));

				if ($this->Player->Transfer->save())
				{
					$player['Player']['free'] = FALSE;
					$this->set('myPlayer', TRUE);
					$this->set('sellInProgress', FALSE);
					$this->Session->setFlash(__('Vous avez investi dans ce joueur.'));
					//return $this->redirect(array('action' => 'index'));
				} 
				else 
				{
					$this->Session->setFlash(__('The transfer could not be saved. Please, try again.'));
				}
			
			}
			else{
				$this->Session->setFlash(__('Vous n\'avez pas suffisament d\'argent pour investir dans ce joueur'));
			}
		}
		$this->set('money', $this->Auth->user('money'));
		$this->set('player', $player);
		$this->render('view');

	}
	
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Player->create();
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('The player has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player could not be saved. Please, try again.'));
			}
		}
		$teams = $this->Player->Team->find('list');
		$this->set(compact('teams'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Player->exists($id)) {
			throw new NotFoundException(__('Invalid player'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('The player has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Player.' . $this->Player->primaryKey => $id));
			$this->request->data = $this->Player->find('first', $options);
		}
		$teams = $this->Player->Team->find('list');
		$this->set(compact('teams'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Player->delete()) {
			$this->Session->setFlash(__('The player has been deleted.'));
		} else {
			$this->Session->setFlash(__('The player could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
