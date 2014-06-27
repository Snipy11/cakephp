<?php
App::uses('AppController', 'Controller');
/**
 * MatchsPlayers Controller
 *
 * @property MatchsPlayer $MatchsPlayer
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MatchsPlayersController extends AppController {

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
		$this->MatchsPlayer->recursive = 0;
		$this->set('matchsPlayers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MatchsPlayer->exists($id)) {
			throw new NotFoundException(__('Invalid matchs player'));
		}
		$options = array('conditions' => array('MatchsPlayer.' . $this->MatchsPlayer->primaryKey => $id));
		$this->set('matchsPlayer', $this->MatchsPlayer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MatchsPlayer->create();
			if ($this->MatchsPlayer->save($this->request->data)) {
				$this->Session->setFlash(__('The matchs player has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The matchs player could not be saved. Please, try again.'));
			}
		}
		$players = $this->MatchsPlayer->Player->find('list');
		$matches = $this->MatchsPlayer->Match->find('list');
		$this->set(compact('players', 'matches'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MatchsPlayer->exists($id)) {
			throw new NotFoundException(__('Invalid matchs player'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MatchsPlayer->save($this->request->data)) {
				$this->Session->setFlash(__('The matchs player has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The matchs player could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MatchsPlayer.' . $this->MatchsPlayer->primaryKey => $id));
			$this->request->data = $this->MatchsPlayer->find('first', $options);
		}
		$players = $this->MatchsPlayer->Player->find('list');
		$matches = $this->MatchsPlayer->Match->find('list');
		$this->set(compact('players', 'matches'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->MatchsPlayer->id = $id;
		if (!$this->MatchsPlayer->exists()) {
			throw new NotFoundException(__('Invalid matchs player'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MatchsPlayer->delete()) {
			$this->Session->setFlash(__('The matchs player has been deleted.'));
		} else {
			$this->Session->setFlash(__('The matchs player could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->MatchsPlayer->recursive = 0;
		$this->set('matchsPlayers', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->MatchsPlayer->exists($id)) {
			throw new NotFoundException(__('Invalid matchs player'));
		}
		$options = array('conditions' => array('MatchsPlayer.' . $this->MatchsPlayer->primaryKey => $id));
		$this->set('matchsPlayer', $this->MatchsPlayer->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->MatchsPlayer->create();
			if ($this->MatchsPlayer->save($this->request->data)) {
				$this->Session->setFlash(__('The matchs player has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The matchs player could not be saved. Please, try again.'));
			}
		}
		$players = $this->MatchsPlayer->Player->find('list');
		$matches = $this->MatchsPlayer->Match->find('list');
		$this->set(compact('players', 'matches'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->MatchsPlayer->exists($id)) {
			throw new NotFoundException(__('Invalid matchs player'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MatchsPlayer->save($this->request->data)) {
				$this->Session->setFlash(__('The matchs player has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The matchs player could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MatchsPlayer.' . $this->MatchsPlayer->primaryKey => $id));
			$this->request->data = $this->MatchsPlayer->find('first', $options);
		}
		$players = $this->MatchsPlayer->Player->find('list');
		$matches = $this->MatchsPlayer->Match->find('list');
		$this->set(compact('players', 'matches'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->MatchsPlayer->id = $id;
		if (!$this->MatchsPlayer->exists()) {
			throw new NotFoundException(__('Invalid matchs player'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MatchsPlayer->delete()) {
			$this->Session->setFlash(__('The matchs player has been deleted.'));
		} else {
			$this->Session->setFlash(__('The matchs player could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
