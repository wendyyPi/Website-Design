<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Userflairs Controller
 *
 * @property \App\Model\Table\UserflairsTable $Userflairs
 * @method \App\Model\Entity\Userflair[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserflairsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $userflairs = $this->paginate($this->Userflairs);

        $this->set(compact('userflairs'));
    }

    /**
     * View method
     *
     * @param string|null $id Userflair id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userflair = $this->Userflairs->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('userflair'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userflair = $this->Userflairs->newEmptyEntity();
        if ($this->request->is('post')) {
            $userflair = $this->Userflairs->patchEntity($userflair, $this->request->getData());
            if ($this->Userflairs->save($userflair)) {
                $this->Flash->success(__('The userflair has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The userflair could not be saved. Please, try again.'));
        }
        $users = $this->Userflairs->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('userflair', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Userflair id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userflair = $this->Userflairs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userflair = $this->Userflairs->patchEntity($userflair, $this->request->getData());
            if ($this->Userflairs->save($userflair)) {
                $this->Flash->success(__('The userflair has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The userflair could not be saved. Please, try again.'));
        }
        $users = $this->Userflairs->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('userflair', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Userflair id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userflair = $this->Userflairs->get($id);
        if ($this->Userflairs->delete($userflair)) {
            $this->Flash->success(__('The userflair has been deleted.'));
        } else {
            $this->Flash->error(__('The userflair could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
