<h2>商品を出品する</h2>
<?= $this->Form->create($biditem,['type'=>'file']) ?>
<fieldset>
	<legend>※商品名と終了日時を入力：</legend>
	<?php
		echo $this->Form->hidden('user_id', ['value' => $authuser['id']]);
		echo '<p><strong>USER: ' . $authuser['username'] . '</strong></p>';
		echo $this->Form->control('name');
		echo $this->Form->hidden('finished', ['value' => 0]);
		echo $this->Form->control('endtime');
		echo '<p><strong>商品詳細</strong></p>';	
		echo $this->Form->textarea('description');
		echo '<p><strong>商品画像アップロード</strong></p>';
		echo $this->Form->file('image');
	?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

