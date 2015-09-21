<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CountryProvinces Controller
 *
 * @property \App\Model\Table\CountryProvincesTable $CountryProvinces
 */
class CountryProvincesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        
        
        $this->paginate = [
            'contain' => ['Countrys']
        ];
        $this->set('countryProvinces', $this->paginate($this->CountryProvinces));
        $this->set('_serialize', ['countryProvinces']);
    }

    /**
     * View method
     *
     * @param string|null $id Country Province id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $countryProvince = $this->CountryProvinces->get($id, [
            'contain' => ['Countrys']
        ]);
        $this->set('countryProvince', $countryProvince);
        $this->set('_serialize', ['countryProvince']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $countryProvince = $this->CountryProvinces->newEntity();
        if ($this->request->is('post')) {
            $countryProvince = $this->CountryProvinces->patchEntity($countryProvince, $this->request->data);
            if ($this->CountryProvinces->save($countryProvince)) {
                $this->Flash->success(__('The country province has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The country province could not be saved. Please, try again.'));
            }
        }
        $countries = $this->CountryProvinces->Countrys->find('list', ['limit' => 200]);
        $this->set(compact('countryProvince', 'countries'));
        $this->set('_serialize', ['countryProvince']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Country Province id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $countryProvince = $this->CountryProvinces->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $countryProvince = $this->CountryProvinces->patchEntity($countryProvince, $this->request->data);
            if ($this->CountryProvinces->save($countryProvince)) {
                $this->Flash->success(__('The country province has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The country province could not be saved. Please, try again.'));
            }
        }
        $countries = $this->CountryProvinces->Countrys->find('list', ['limit' => 200]);
        $this->set(compact('countryProvince', 'countries'));
        $this->set('_serialize', ['countryProvince']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Country Province id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $countryProvince = $this->CountryProvinces->get($id);
        if ($this->CountryProvinces->delete($countryProvince)) {
            $this->Flash->success(__('The country province has been deleted.'));
        } else {
            $this->Flash->error(__('The country province could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    
    
    public function helloAjax($country_id) {
        $this->layout='ajax';
        $countryProvinces = array();
        $countryProvinces = $this->CountryProvinces->find()
                    ->select(['id','name'])
                    ->where(['country_id'=>$country_id]);       
        $this->set(compact('countryProvinces'));
    }
    
    /*
    public function helloAjax()
    {
        $this->layout='ajax';
        $this->set('result', 'Hello Dolly!');
        $this->set('_serialize', ['result']);
    }
     * 
     */
    
    
}
