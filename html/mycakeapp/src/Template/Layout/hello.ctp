<!DOCTYPE html>
<html lang="ja">
<head>
    <?=$this->Html->charset() ?>
    <title><?=$title ?></title>
    <?=$this->Html->css('hello') ?>
    <?=$this->Html->script('hello') ?>
</head>
<body>
    <header class="head now">
    <!-- src/Template/Element/header.ctp で表示される-->
        <?=$this->element('header', $header) ?>
    </header>
    <div class="content row">
    <!-- src/Template/Hello/index.ctp の内容が表示される  -->
        <?=$this->fetch('content') ?>
    </div>
    <!-- src/Template/Element/footer.ctp で表示される -->
    <footer class="foot row">
        <?=$this->element('footer', $footer) ?>
    </footer>
        
        

</body>
</html>