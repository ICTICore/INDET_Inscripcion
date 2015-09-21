<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Email\Email;
use Cake\Routing\Router;
use Cake\Core\Configure;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController {

    /**
     * beforeFilter method
     * @param  Event  $event
     * @return void
     */
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->Auth->allow(['login', 'logout']);
    }
    
        
    /**
     * Instrucciones method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
     public function instrucciones($id = null) {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            return $this->redirect(['action' => 'edit',$id]);
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    /**
     * Confirmar method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
     public function confirmar($id = null) {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('Tu confirmación fue realizada con éxito.');
                return $this->redirect(['action' => 'instrucciones',$id]);
            } else {
                $this->Flash->error('Error al realizar tu confirmación. Por favor, intenta de nuevo');
            }
        }
        
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    

    /**
     * Invitar method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function invitar() {

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->data);
            $pass_temp = $this->generateRandomString(10);
            $user['password'] = $pass_temp;
            $user['active'] = true;
            if ($this->Users->save($user)) {

                //Si logró salvar el usuario envío el email para la invitación
                $email = new Email();
                $email->transport('gmail');
                $datos_correo = Configure::read('Server.email');
                $last_user_id = $this->Users->find()->select(['id'])->order(['id' => 'DESC'])->first();
                $mensaje = $datos_correo['mensaje'] .
                        '<br/>' .
                        Router::url('/', true) . 'users/confirmar/' . $last_user_id['id'] .
                        '<br/>' .
                        'Contraseña temporal: <b>' . $pass_temp . '</b>' .
                        '<br/>' .
                        'Nombre de usuario: <b>' . $user['email'] . '</b>' .
                        '<br/>';
                try {
                    //Busco al ID del último usuario agregado
                    $last_user_id = $this->Users->find()->select(['id'])->order(['id' => 'DESC'])->first();
                    $datos_email = Configure::read('Server.email');
                    $res = $email
                            ->emailFormat('html')
                            ->from([$datos_email['correo'] => $datos_email['nombre']])
                            ->to([$user['email'] => 'Invitación'])
                            ->subject($datos_email['titulo'])
                            ->send($mensaje);
                    $this->Flash->success('El usuario fue invitado con éxito invitado.');
                    return $this->redirect(['action' => 'index']);
                } catch (Exception $e) {
                    //echo 'Exception : ', $e->getMessage(), "\n";
                    $this->Flash->error('Ocurrio un error al invitar al usuario. Por favor intenta de nuevo.');
                }
                $this->Flash->success('El usuario fue registrado, pero no se pudo envíar el correo.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Ocurrio un error al invitar al usuario. Por favor intenta de nuevo.');
            }

        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->Prg->commonProcess();
        $this->set('users', $this->paginate($this->Users->find('searchable', $this->Prg->parsedParams())));
        //$this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->data);
            //debug($user);

            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('The user has been deleted.');
        } else {
            $this->Flash->error('The user could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * login method
     *
     * @return void Redirects.
     */
    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(
                        __('Username or password is incorrect'), 'default', [], 'auth'
                );
            }
        }
    }

    /**
     * logout method
     * @return void redirect to login.
     */
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

}
