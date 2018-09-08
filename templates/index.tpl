<?php $this->layout('layout.tpl'); ?>

<?php $this->assign('menu', $this->element('menu.tpl')); ?>

<ul>
    <li>Product ID: <strong><?= $product['id'] ?></strong></li>
    <li>Product name: <strong><?= $product['name'] ?></strong></li>
</ul>





