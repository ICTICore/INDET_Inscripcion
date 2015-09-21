<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Countrys Controller
 *
 * @property \App\Model\Table\CountrysTable $Countrys
 */
class CountrysController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('countrys', $this->paginate($this->Countrys));
        $this->set('_serialize', ['countrys']);
    }

    /**
     * View method
     *
     * @param string|null $id Country id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $country = $this->Countrys->get($id, [
            'contain' => ['CountryProvinces']
        ]);
        $this->set('country', $country);
        $this->set('_serialize', ['country']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $country = $this->Countrys->newEntity();
        if ($this->request->is('post')) {
            $country = $this->Countrys->patchEntity($country, $this->request->data);
            if ($this->Countrys->save($country)) {
                $this->Flash->success(__('The country has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The country could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('country'));
        $this->set('_serialize', ['country']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Country id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $country = $this->Countrys->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $country = $this->Countrys->patchEntity($country, $this->request->data);
            if ($this->Countrys->save($country)) {
                $this->Flash->success(__('The country has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The country could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('country'));
        $this->set('_serialize', ['country']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Country id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $country = $this->Countrys->get($id);
        if ($this->Countrys->delete($country)) {
            $this->Flash->success(__('The country has been deleted.'));
        } else {
            $this->Flash->error(__('The country could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
