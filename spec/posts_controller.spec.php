<?php

# class ControllerSpec
describe "PostsController"
  before
    $W->fixtures = array('app.post');
  end
  describe "/posts/index"
    subject
      $vars = $W->testcase->testAction("/posts/index", array('return'=>'vars'));
      return array_map(function($post) { return $post['Post']['title']; }, $vars['posts']);
    end
    it 'have 3 titles'
      should equal array('The title', 'A title once again', 'Title strikes back')
    end
  end
end
