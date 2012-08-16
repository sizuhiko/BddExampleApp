<h1>Add Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title', array('label'=>'タイトル'));
echo $this->Form->input('body', array('label'=>'本文', 'rows' => '3'));
echo $this->Form->end('投稿');
?>
