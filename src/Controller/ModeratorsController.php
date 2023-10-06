<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Moderators Controller
 *
 * @property \App\Model\Table\ModeratorsTable $Moderators
 * @method \App\Model\Entity\Moderator[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModeratorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('dashboardDefault');
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $moderators = $this->paginate($this->Moderators);

        $this->set(compact('moderators'));
    }

    /**
     * View method
     *
     * @param string|null $id Moderator id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('dashboardDefault');
        $moderator = $this->Moderators->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('moderator'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('dashboardDefault');
        $moderator = $this->Moderators->newEmptyEntity();
        if ($this->request->is('post')) {
            $moderator = $this->Moderators->patchEntity($moderator, $this->request->getData());
            if ($this->Moderators->save($moderator)) {
                $this->Flash->success(__('The moderator has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The moderator could not be saved. Please, try again.'));
        }
        $users = $this->Moderators->Users->find('list', ['limit' => 200])->all();

        $this->set(compact('moderator', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Moderator id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('dashboardDefault');
        $moderator = $this->Moderators->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $moderator = $this->Moderators->patchEntity($moderator, $this->request->getData());
            if ($this->Moderators->save($moderator)) {
                $this->Flash->success(__('The moderator has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The moderator could not be saved. Please, try again.'));
        }
        $users = $this->Moderators->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('moderator', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Moderator id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $moderator = $this->Moderators->get($id);
        if ($this->Moderators->delete($moderator)) {
            $this->Flash->success(__('The moderator has been deleted.'));
        } else {
            $this->Flash->error(__('The moderator could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
