<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pruebas Controller
 *
 * @property \App\Model\Table\PruebasTable $Pruebas
 */
class PruebasController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Countrys', 'CountryProvinces']
        ];
        $this->set('pruebas', $this->paginate($this->Pruebas));
        $this->set('_serialize', ['pruebas']);
    }

    /**
     * View method
     *
     * @param string|null $id Prueba id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prueba = $this->Pruebas->get($id, [
            'contain' => ['Countrys', 'CountryProvinces']
        ]);
        $this->set('prueba', $prueba);
        $this->set('_serialize', ['prueba']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prueba = $this->Pruebas->newEntity();
        if ($this->request->is('post')) {
            $prueba = $this->Pruebas->patchEntity($prueba, $this->request->data);
            if ($this->Pruebas->save($prueba)) {
                $this->Flash->success(__('The prueba has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The prueba could not be saved. Please, try again.'));
            }
        }
        $countries = $this->Pruebas->Countrys->find('list', ['limit' => 200]);
        $countryProvinces = $this->Pruebas->CountryProvinces->find('list', ['limit' => 200]);
        $this->set(compact('prueba', 'countries', 'countryProvinces'));
        $this->set('_serialize', ['prueba']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Prueba id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prueba = $this->Pruebas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prueba = $this->Pruebas->patchEntity($prueba, $this->request->data);
            if ($this->Pruebas->save($prueba)) {
                $this->Flash->success(__('The prueba has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The prueba could not be saved. Please, try again.'));
            }
        }
        $countries = $this->Pruebas->Countrys->find('list', ['limit' => 200]);
        $countryProvinces = $this->Pruebas->CountryProvinces->find('list', ['limit' => 200]);
        $this->set(compact('prueba', 'countries', 'countryProvinces'));
        $this->set('_serialize', ['prueba']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Prueba id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prueba = $this->Pruebas->get($id);
        if ($this->Pruebas->delete($prueba)) {
            $this->Flash->success(__('The prueba has been deleted.'));
        } else {
            $this->Flash->error(__('The prueba could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
