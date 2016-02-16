<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;
use Cake\Core\Configure;
/**
 * DatoPersonals Controller
 *
 * @property \App\Model\Table\DatoPersonalsTable $DatoPersonals
 */
class DatoPersonalsController extends AppController {

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Upload');
    }
    
    /**
     * Editar method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function editar($id = null) {
        $datoPersonal['DatoPersonal'] = $this->DatoPersonals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            debug($this->request->data);
        }
         //Cargo los datos de los estados
        $this->loadModel('Mxestados');
        $result_mxestados = $this->Mxestados
                ->find()
                ->order(['Mxestados.nombre' => 'ASC']);
        $mxestados = array();
        $mxestados[0] = 'Selecciona un estado';
        foreach ($result_mxestados as $estado) {
            $mxestados[$estado->id] = $estado->nombre;
        }
        $this->set('mxestados', $mxestados);
        
        $user_dato = $this->DatoPersonals->Users->get($datoPersonal['DatoPersonal']->user_id);
        $this->set('user_dato', $user_dato);
        
        $ruta_upload = Configure::read('Uploads.fotografias_avatar.path');
        $this->set('ruta_upload',$ruta_upload);
        
        $users = $this->DatoPersonals->Users->find('list', ['limit' => 200]);       
        $this->set(compact('datoPersonal', 'users'));
        $this->set('_serialize', ['datoPersonal']);
    }
    
    
    /**
     * Agregar method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function agregar($id = null) {
        
        //Verifico si ya existen datos con el ID
        $user_prueba = $this->DatoPersonals->find()->where(['user_id' => $id])->first();
        if($user_prueba){
            return $this->redirect(['action' => 'editar',$user_prueba->id]);
        }
        
        $datoPersonal = $this->DatoPersonals->newEntity();
        if ($this->request->is('post')) {
            //debug($this->request->data);
            
            $this->loadModel('Users');
            $new_user = $this->request->data['User'];
            $edit_user = $this->Users->get($new_user['id']);
            $edit_user->first_name = $new_user['first_name'];
            $edit_user->middle_name = $new_user['middle_name'];
            $edit_user->last_name = $new_user['last_name'];
            $edit_user->email = $new_user['email'];

            if ($this->Users->save($edit_user)) {
                $identificador_foto = Text::uuid() . '-' . str_replace(" ", "_", $this->request->data['DatoPersonal']['fotografia_file']['name']);
                $this->Upload->upload_image($this->request->data['DatoPersonal']['fotografia_file'],$identificador_foto);
                $datos_personales = $this->request->data['DatoPersonal'];
                $datos_personales['fotografia_file'] = $identificador_foto;
                $new_dato = $this->DatoPersonals->newEntity($datos_personales);
                if ($this->DatoPersonals->save($new_dato)) {
                    $this->Flash->success(__('Los datos fueron guardados con éxito'));
                    return $this->redirect(['action' => 'editar',$new_dato->id]);
                }
            } else {
                $this->Flash->error(__('Error al guardar los datos'));
            }
            
             
             
        }
        //Cargo los datos de los estados
        $this->loadModel('Mxestados');
        $result_mxestados = $this->Mxestados
                ->find()
                ->order(['Mxestados.nombre' => 'ASC']);
        $mxestados = array();
        $mxestados[0] = 'Selecciona un estado';
        foreach ($result_mxestados as $estado) {
            $mxestados[$estado->id] = $estado->nombre;
        }

        $this->set('mxestados', $mxestados);

        $users = $this->DatoPersonals->Users->find('list', ['limit' => 200]);
        $user_dato = $this->DatoPersonals->Users->get($id);

        $this->set('user_dato', $user_dato);
        $this->set(compact('datoPersonal', 'users'));
        $this->set('_serialize', ['datoPersonal']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $this->set('datoPersonals', $this->paginate($this->DatoPersonals));
        $this->set('_serialize', ['datoPersonals']);
    }

    /**
     * View method
     *
     * @param string|null $id Dato Personal id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $datoPersonal = $this->DatoPersonals->get($id, [
            'contain' => ['Users', 'Usuarios']
        ]);
        $this->set('datoPersonal', $datoPersonal);
        $this->set('_serialize', ['datoPersonal']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $datoPersonal = $this->DatoPersonals->newEntity();
        if ($this->request->is('post')) {
            $datoPersonal = $this->DatoPersonals->patchEntity($datoPersonal, $this->request->data);
            if ($this->DatoPersonals->save($datoPersonal)) {
                $this->Flash->success(__('The dato personal has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The dato personal could not be saved. Please, try again.'));
            }
        }
        $users = $this->DatoPersonals->Users->find('list', ['limit' => 200]);
        $this->set(compact('datoPersonal', 'users'));
        $this->set('_serialize', ['datoPersonal']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dato Personal id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $datoPersonal = $this->DatoPersonals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $datoPersonal = $this->DatoPersonals->patchEntity($datoPersonal, $this->request->data);
            if ($this->DatoPersonals->save($datoPersonal)) {
                $this->Flash->success(__('The dato personal has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The dato personal could not be saved. Please, try again.'));
            }
        }
        $users = $this->DatoPersonals->Users->find('list', ['limit' => 200]);
        $this->set(compact('datoPersonal', 'users'));
        $this->set('_serialize', ['datoPersonal']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dato Personal id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $datoPersonal = $this->DatoPersonals->get($id);
        if ($this->DatoPersonals->delete($datoPersonal)) {
            $this->Flash->success(__('The dato personal has been deleted.'));
        } else {
            $this->Flash->error(__('The dato personal could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
