<!DOCTYPE html>
<html>
<pre><?php print_r($data); ?></pre>
<body>

    <?=$this->element('header', $header) ?>

    <?=$this->Form->create(null,
    ['type'=>'post',
    'url'=>['controller'=>'Hello',
    'action'=>'index']]) ?>
    name
    <?=$this->Form->text('Form1.name') ?>
    mail
    <?=$this->Form->text('Form1.mail') ?>
    age
    <?=$this->Form->text('Form1.age') ?>
    <?=$this->Form->submit('送信') ?>
    <?=$this->Form->end() ?>
    
    <p>This is sample content. </p>
    <p>これはHelloテンプレートのサンプル</p>
    <?=$this->Url->build(['controller'=>'hello', 'action'=>'show', '123']) ?>
    <br>
    <?=$this->Url->build(['controller'=>'hello', 'action'=>'show', '?' => ['id' => 'taro', 'password' => 'yamada123']]) ?>
    <br>
    <?=$this->Url->build(['controller'=>'hello', 'action'=>'show', '_ext'=>'png', 'sample']) ?>
    <br>
    <?=$this->Text->autoLinkUrls('http://google.com') ?>
    <br>
    <?=$this->Text->autoLinkEmails('fafa@fafa.com') ?>
    <br>
    <?=$this->Text->autoParagraph("one\ntwo\nthree") ?>
    <br>
    <?=$this->Number->currency(1234567, 'JPY') ?>
    <br>
    <?=$this->Number->precision(1234.5678, 2) ?>
    <br>
    <?=$this->Number->toPercentage(0.12345, 3, ['multiply'=>true]) ?>
    
</body>
</html>