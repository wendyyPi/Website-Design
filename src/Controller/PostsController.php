<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function viewpost()
    {
        $this->viewBuilder()->setLayout('dashboardDefault');

    }

    public function index()
    {
        // if is admin
        // pass
        // if not admin
        // redirect(index)

        $this->viewBuilder()->setLayout('dashboardDefault');


        $posts = $this->Posts->find()->contain(['Users','Tags']);

        $this->set(compact('posts'));

    }

    public function board()
    {
        // if is admin
        // pass
        // if not admin
        // redirect(index)

        $this->viewBuilder()->setLayout('default');


        $posts = $this->Posts->find()->where(['approve'=>'1'])->contain(['Users','Tags']);

        $this->set(compact('posts'));

    }


    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('default');
        $post = $this->Posts->get($id, [
            'contain' => ['Users', 'Comments','Tags'],
        ]);

        $this->set(compact('post'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('dashboardDefault');
        $post = $this->Posts->newEmptyEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200])->all();
        $tags = $this->Posts->Tags->find('list',['limit'=> 200])->all();

        $this->set(compact('post', 'users'));
        $this->set(compact('tags', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('dashboardDefault');
        $post = $this->Posts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200])->all();
        $tags = $this->Posts->Tags->find('list',['limit'=> 200])->all();

        $this->set(compact('post', 'users'));
        $this->set(compact('tags', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->setLayout('dashboardDefault');
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function postStatus($id = null, $approve)
    {
        $this->request->allowMethod(['post']);
        $post = $this->Posts->get($id);
        if($approve == 1)
           $post->approve = 0;
        else
           $post->approve = 1;

        if ($this->Posts->save($post))
      {
          $this->Flash->success(__('The post status has changed.'));
      }
        return $this->redirect(['action' => 'index']);
    }
}
