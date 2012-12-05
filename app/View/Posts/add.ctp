<h1>Add Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title', array('label'=>__('Title')));
echo $this->Form->input('body', array('label'=>__('Body'), 'rows' => '3'));
echo $this->Form->end(__('Send'));
?>
