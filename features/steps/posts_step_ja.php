<?php
use Behat\Behat\Context\Step\When;

$steps->Given('/^ブログ記事に以下の内容が登録されていること:$/', function($world, $table) {
  $hash = $table->getHash();
  $world->truncateModel('Post');
  $post = $world->getModel('Post');
  foreach ($hash as $row) {
		$post->create(array('Post'=>array('title'=>$row['タイトル'], 'body'=>$row['本文'])));
		$post->save();
  }
});

$steps->Given('/^記事投稿フォームに以下の内容を登録すること:$/', function($world, $table) {
  $hash = $table->getHash();
	$post_steps = array();  
  foreach ($hash as $field) {
  	$post_steps[] = new When('"'.$field['ラベル'].'" フィールドに "'.$field['値'].'" と入力する');
  }
  return $post_steps;

});
$steps->Given('/^(\d+)秒待つ$/', function($world, $arg1) {
    sleep($arg1);
});
?>