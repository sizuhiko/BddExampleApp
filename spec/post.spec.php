<?php

# class CakeSpec
describe "Post"
  context "with fixture"
    before
      $W->fixtures = array('app.post');
    end
    describe "#findByTitle"
      subject
        $post = ClassRegistry::init('Post');
        $result = $post->findByTitle('The title');
        return $result['Post']['body'];
      end
      it "body"
        should equal 'This is the post body.'
      end
    end
  end
  context "with fixture-factory"
    before
      $W->fixtures = false;
      App::Import('Vendor', 'FixtureFactory.fixture_factory');
      FFactory::define('Post');
      FFactory::create('Post', array('title'=>'The title', 'body'=>'This is the factory body.'));
    end
    describe "#findByTitle"
      subject
        $post = ClassRegistry::init('Post');
        $result = $post->findByTitle('The title');
        return $result['Post']['body'];
      end
      it "body"
        should equal 'This is the factory body.'
      end
    end
  end
end
