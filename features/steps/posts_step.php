<?php
use Behat\Behat\Context\Step\When;

$steps->Given('/^there is a post:$/', function($world, $table) {
  $hash = $table->getHash();
  $world->truncateModel('Post');
  $post = $world->getModel('Post');
  foreach ($hash as $row) {
    $post->create(array('Post'=>array('title'=>$row['Title'], 'body'=>$row['Body'])));
    $post->save();
  }
});

$steps->Given('/^there is a user:$/', function($world, $table) {
  $hash = $table->getHash();
  $world->truncateModel('User');
  $user = $world->getModel('User');
  foreach ($hash as $row) {
    $user->create(array('User'=>array('username'=>$row['Username'], 'password'=>$row['Password'], 'firstname'=>$row['FirstName'], 'lastname'=>$row['LastName'])));
    $user->save();
  }
});

$steps->Given('/^I login "([^"]*)" "([^"]*)"$/', function($world, $username, $password) {
  $steps = array();  
  $steps[] = new When('I fill in "Username" with "'.$username.'"');
  $steps[] = new When('I fill in "Password" with "'.$password.'"');
  $steps[] = new When('I press "Login"');
  return $steps;
});

$steps->When('/^I post article form :$/', function($world, $table) {
  $steps = array();  
  $hash = $table->getHash();
  foreach ($hash as $field) {
    $steps[] = new When('I fill in "'.$field['Label'].'" with "'.$field['Value'].'"');
  }
  $steps[] = new When('I press "Send"');
  return $steps;
});

?>