<?php
App::uses('AppController', 'Controller');
/**
 * Reclamos Controller
 *
 * @property Reclamo $Reclamo
 */
class ReclamosController extends AppController {
	var $helpers = array('Time');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->autoRender = false;
		echo json_encode($this->Reclamo->find("all"));
	}

	public function getLastUpdate(){
		$this->autoRender = false;
		$max = "";
		$info = $this->Reclamo->query('SHOW TABLE STATUS WHERE name IN ("categorias","categoria_usuario","colegio")');
		foreach($info as $val){
			if(strcmp($val["TABLES"]["Create_time"], $max) > 0)
				$max = $val["TABLES"]["Create_time"];
			if($val["TABLES"]["Update_time"] && strcmp($val["TABLES"]["Update_time"], $max) > 0)
				$max = $val["TABLES"]["Update_time"];
		}
		echo json_encode(new DateTime($max));
	}

	public function getData(){
		$this->autoRender = false;
		$data = array(
			"colegios" => $this->Reclamo->Colegio->find("list"),
			"categorias" => $this->Reclamo->Categoria->find("list"),
			"categoria_usuarios" => $this->Reclamo->Usuario->CategoriaUsuario->find("list"),
			"comunas" => $this->Reclamo->Colegio->Comuna->find("list"),
			"region" => $this->Reclamo->Colegio->
			);
		echo json_encode($data);
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Reclamo->exists($id)) {
			throw new NotFoundException(__('Invalid reclamo'));
		}
		$options = array('conditions' => array('Reclamo.' . $this->Reclamo->primaryKey => $id));
		$this->set('reclamo', $this->Reclamo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->autoRender = false;	
		if ($this->request->is('post')) {

			/*
			{
			  textoDenuncia: String
			  titulo: String
			  nombre: String
			  mail: String
			  telefono: String
			  categoria_usuario: int //Id categoria usuario
			  categoria: int  //Id de categoria
			  colegio: int    //Id de colegio
			}
			*/

			$data = json_decode($this->request->data["denuncia"]);
			$reclamo = array(
				"Reclamo" => array(
						"texto" => $data["textoDenuncia"],
						"titulo" => $data["titulo"],
						"fecha" =>  date("Y-m-d H:i:s"),
						"Usuario" => array(
								"nombre" => $data["nombre"],
								"correo" => $data["mail"],
								"telefono" => $data["telefono"],
								"id_categoria" => $data["categoria_usuario"],
							),
						"id_categoria" => $data["categoria"],
						"id_colegio" => $data["colegio"]
					)
				);

			$this->Reclamo->create();
			if ($this->Reclamo->saveAssociated($reclamo, array('deep' => true))) {
				// $this->Session->setFlash(__('The reclamo has been saved'));
				// $this->redirect(array('action' => 'index'));
				$response = array(	
					"status" => "OK",
					);

				echo json_encode($response);
				return;

			} else {
				$response = array(
					"status" => "ERROR",
					"errors" => $this->Reclamo->validationErrors
					);

				echo json_encode($response);
				return;

				// debug($reclamo);
				// debug($this->Reclamo->validationErrors);
				// $this->Session->setFlash(__('The reclamo could not be saved. Please, try again.'));
			}
		}
		$response = array(
			"status" => "ERROR"
			);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Reclamo->exists($id)) {
			throw new NotFoundException(__('Invalid reclamo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Reclamo->save($this->request->data)) {
				$this->Session->setFlash(__('The reclamo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reclamo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Reclamo.' . $this->Reclamo->primaryKey => $id));
			$this->request->data = $this->Reclamo->find('first', $options);
		}
		$usuarios = $this->Reclamo->Usuario->find('list');
		$categorias = $this->Reclamo->Categorium->find('list');
		$colegios = $this->Reclamo->Colegio->find('list');
		$this->set(compact('usuarios', 'categorias', 'colegios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Reclamo->id = $id;
		if (!$this->Reclamo->exists()) {
			throw new NotFoundException(__('Invalid reclamo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Reclamo->delete()) {
			$this->Session->setFlash(__('Reclamo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Reclamo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
