<?php
App::uses('AppController', 'Controller');
/**
 * Colegios Controller
 *
 * @property Colegio $Colegio
 */
class ColegiosController extends AppController {

/**
 * add method
 *
 * @return void
 */
	public function index() {
		$this->autoRender = false;	
		echo json_encode($this->Colegio->find("list"));
	}
}
