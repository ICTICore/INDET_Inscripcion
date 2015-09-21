<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DatoPersonals Controller
 *
 * @property \App\Model\Table\DatoPersonalsTable $DatoPersonals
 */
class DatoPersonalsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
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
    public function view($id = null)
    {
        $datoPersonal = $this->DatoPersonals->get($id, [
            'contain' => ['Usuarios']
        ]);
        $this->set('datoPersonal', $datoPersonal);
        $this->set('_serialize', ['datoPersonal']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
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
        $this->set(compact('datoPersonal'));
        $this->set('_serialize', ['datoPersonal']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dato Personal id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
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
        $this->set(compact('datoPersonal'));
        $this->set('_serialize', ['datoPersonal']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dato Personal id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
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
