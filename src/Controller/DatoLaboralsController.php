<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DatoLaborals Controller
 *
 * @property \App\Model\Table\DatoLaboralsTable $DatoLaborals
 */
class DatoLaboralsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Estados', 'Municipios']
        ];
        $this->set('datoLaborals', $this->paginate($this->DatoLaborals));
        $this->set('_serialize', ['datoLaborals']);
    }

    /**
     * View method
     *
     * @param string|null $id Dato Laboral id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $datoLaboral = $this->DatoLaborals->get($id, [
            'contain' => ['Estados', 'Municipios', 'Usuarios']
        ]);
        $this->set('datoLaboral', $datoLaboral);
        $this->set('_serialize', ['datoLaboral']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $datoLaboral = $this->DatoLaborals->newEntity();
        if ($this->request->is('post')) {
            $datoLaboral = $this->DatoLaborals->patchEntity($datoLaboral, $this->request->data);
            if ($this->DatoLaborals->save($datoLaboral)) {
                $this->Flash->success(__('The dato laboral has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The dato laboral could not be saved. Please, try again.'));
            }
        }
        $estados = $this->DatoLaborals->Estados->find('list', ['limit' => 200]);
        $municipios = $this->DatoLaborals->Municipios->find('list', ['limit' => 200]);
        $this->set(compact('datoLaboral', 'estados', 'municipios'));
        $this->set('_serialize', ['datoLaboral']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dato Laboral id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $datoLaboral = $this->DatoLaborals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $datoLaboral = $this->DatoLaborals->patchEntity($datoLaboral, $this->request->data);
            if ($this->DatoLaborals->save($datoLaboral)) {
                $this->Flash->success(__('The dato laboral has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The dato laboral could not be saved. Please, try again.'));
            }
        }
        $estados = $this->DatoLaborals->Estados->find('list', ['limit' => 200]);
        $municipios = $this->DatoLaborals->Municipios->find('list', ['limit' => 200]);
        $this->set(compact('datoLaboral', 'estados', 'municipios'));
        $this->set('_serialize', ['datoLaboral']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dato Laboral id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $datoLaboral = $this->DatoLaborals->get($id);
        if ($this->DatoLaborals->delete($datoLaboral)) {
            $this->Flash->success(__('The dato laboral has been deleted.'));
        } else {
            $this->Flash->error(__('The dato laboral could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
