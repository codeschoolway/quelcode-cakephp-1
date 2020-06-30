<?php
namespace App\Controller;

use App\Controller\AppController;

class PeopleController extends AppController {
    
    public $paginate = [
        'limit' => 5,
        'sort' => 'id',
        'direction' => 'asc',
        'contain' => ['Messages'],
    ];

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function index() {
        if ($this->request->isPost()) {
            $find = $this->request->data['People']['find'];
            $data = $this->People->findByName($find);
        } else {
            $data = $this->People->find('all',
                ['order'=> ['People.age' => 'asc']]
            );
        }
        $this->set('data', $data);

        $data = $this->paginate($this->People);
        $this->set('data', $data);

/*         if ($this->request->is('post')) {
            $find = $this->request->data['People']['find'];
            $data = $this->People->find('me', ['me'=>$find]);
        } else {
            $data = $this->People->find('byAge')
                ->contain(['Messages']);
        }
        $this->set('data', $data); */

        /* if($this->request->is('post')) {
            $find = $this->request->data['People']['find'];
            $condition = ['conditions'=>['name'=>$find]];
            $data = $this->People->find('all', $condition);
        } else {
            $data = $this->People->find('all');
        }
        $this->set('data', $data); */
    }

    public function edit() {
        $id = $this->request->query['id'];
        $entity = $this->People->get($id);
        $this->set('entity', $entity);
    }

    public function update() {
        if ($this->request->is('post')) {
            $data = $this->request->data['People'];
            $entity = $this->People->get($data['id']);
            $this->People->patchEntity($entity, $data);
            $this->People->save($entity);
        }
        return $this->redirect(['action'=>'index']);
    }

    public function add() {
        $msg = 'Please type your personal data...';
        $entity = $this->People->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data(['People']);
            $entity = $this->People->newEntity($data);
            if ($this->People->save($entity)) {
                return $this->redirect(['action'=>'index']);
            }
            $msg = 'Error was occured...';
        }
        $this->set('msg', $msg);
        $this->set('entity', $entity);
    }

    public function create() {
        if ($this->request->is('post')){
            $data = $this->request->data['People'];
            $entity = $this->People->newEntity($data);
            $this->People->save($entity);
        }
        return $this->redirect(['action'=>'index']);
    }

    public function delete() {
        $id = $this->request->query['id'];
        $entity = $this->People->get($id);
        $this->set('entity', $entity);
    }
    
    public function destroy() {
        if($this->request->is('post')) {
            $data = $this->request->data['People'];
            $entity = $this->People->get($data['id']);
            $this->People->delete($entity);
        }
        return $this->redirect(['action'=>'index']);
    }
}