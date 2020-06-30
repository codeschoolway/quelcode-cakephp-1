<?php
namespace App\Controller;

use App\Controller\AppController;

class HelloController extends AppController {   

    public function initialize() {

        $this->viewBuilder()->setLayout('hello');
    }
    public function index() {
    
        $this->set('title', '●●●--こんにちは!!!!');

        $this->set('header', ['subtitle'=>'これはHelloController.phpに書かれてます']);
        $this->set('footer', ['copyright'=>'これもHelloController.phpにあります。名無しの権平']);

        if($this->request->isPost()) {
            $this->set('data', $this->request->data(['Form1']));
        }
        else {
            $this->set('data', []);
        }
    }



}