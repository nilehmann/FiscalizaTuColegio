<?php
App::uses('AppController', 'Controller');
/**
 * CategoriaUsuarios Controller
 *
 * @property CategoriaUsuario $CategoriaUsuario
 */
class CategoriaUsuariosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->autoRender = false;	
		echo json_encode($this->CategoriaUsuario->find("list"));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CategoriaUsuario->exists($id)) {
			throw new NotFoundException(__('Invalid categoria usuario'));
		}
		$options = array('conditions' => array('CategoriaUsuario.' . $this->CategoriaUsuario->primaryKey => $id));
		$this->set('categoriaUsuario', $this->CategoriaUsuario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CategoriaUsuario->create();
			if ($this->CategoriaUsuario->save($this->request->data)) {
				$this->Session->setFlash(__('The categoria usuario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categoria usuario could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CategoriaUsuario->exists($id)) {
			throw new NotFoundException(__('Invalid categoria usuario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CategoriaUsuario->save($this->request->data)) {
				$this->Session->setFlash(__('The categoria usuario has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categoria usuario could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CategoriaUsuario.' . $this->CategoriaUsuario->primaryKey => $id));
			$this->request->data = $this->CategoriaUsuario->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CategoriaUsuario->id = $id;
		if (!$this->CategoriaUsuario->exists()) {
			throw new NotFoundException(__('Invalid categoria usuario'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CategoriaUsuario->delete()) {
			$this->Session->setFlash(__('Categoria usuario deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Categoria usuario was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
