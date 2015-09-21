<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DatoSindicals Controller
 *
 * @property \App\Model\Table\DatoSindicalsTable $DatoSindicals
 */
class DatoSindicalsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('datoSindicals', $this->paginate($this->DatoSindicals));
        $this->set('_serialize', ['datoSindicals']);
    }

    /**
     * View method
     *
     * @param string|null $id Dato Sindical id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $datoSindical = $this->DatoSindicals->get($id, [
            'contain' => ['Usuarios']
        ]);
        $this->set('datoSindical', $datoSindical);
        $this->set('_serialize', ['datoSindical']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $datoSindical = $this->DatoSindicals->newEntity();
        if ($this->request->is('post')) {
            $datoSindical = $this->DatoSindicals->patchEntity($datoSindical, $this->request->data);
            if ($this->DatoSindicals->save($datoSindical)) {
                $this->Flash->success(__('The dato sindical has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The dato sindical could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('datoSindical'));
        $this->set('_serialize', ['datoSindical']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dato Sindical id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $datoSindical = $this->DatoSindicals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $datoSindical = $this->DatoSindicals->patchEntity($datoSindical, $this->request->data);
            if ($this->DatoSindicals->save($datoSindical)) {
                $this->Flash->success(__('The dato sindical has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The dato sindical could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('datoSindical'));
        $this->set('_serialize', ['datoSindical']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dato Sindical id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $datoSindical = $this->DatoSindicals->get($id);
        if ($this->DatoSindicals->delete($datoSindical)) {
            $this->Flash->success(__('The dato sindical has been deleted.'));
        } else {
            $this->Flash->error(__('The dato sindical could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
