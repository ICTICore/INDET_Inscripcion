<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Mxestados Controller
 *
 * @property \App\Model\Table\PruebasTable $Pruebas
 */
class MxestadosController extends AppController
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
    public function estadosajax($estado_id)
    {
        $this->layout='ajax';
        $this->loadModel('Mxmunicipios');
        $estados_municipios = array();
        $estados_municipios = $this->Mxmunicipios->find()
                    ->select(['id','nombre'])
                    ->where(['mxestado_id'=>$estado_id])
                    ->order(['nombre'=>'ASC']);       
        $this->set(compact('estados_municipios'));
        
    }
}

