BddExampleApp
=============

This is a sample CakePHP2 application testing the basic usage of BDD plugin.

CakePHP2 BDD plugin is 
https://github.com/sizuhiko/Bdd

### Install & Configuration

1. Install CakePHP2.x.
2. Install PHPUnit.
3. git clone or download this example application included app, feature and spec to root directory of CakePHP2.
4. Install dependency plugin for creating test data. To see fixture-factory(https://github.com/rodrigorm/fixture-factory) installation section. But this plugin directory has problem. So after install, rename directory name from vendors to vendor.
```
$ mv app/Plugin/fixture_factory/vendors app/Plugin/fixture_factory/vendor
```
5. Configuration database. The application default schema is app/Config/sql/posts.sql. Execute the sql from like a phpMyAdmin.
6. Configuration application. Please change app/Config/core.php and database.php to get along with your configuration.
7. Insert host name for testing on your hosts file. The name has been used into app/Config/database.php for switching configuration database.
8. At last, do installation and configuration BDD plugin to your CakePHP plugin directory. Please see BDD plugin page(https://github.com/sizuhiko/Bdd).

### try

On your root directory of CakePHP2, exec 2 commands.

**Note: Example story has javascript session for using selenium. I suggest install and run selenium RC for success to the story.**


	$ lib/Cake/Console/cake Bdd.spec

	Welcome to CakePHP v2.x.x Console
	---------------------------------------------------------------
	App : app
	Path: /your CakePHP root/app/
	---------------------------------------------------------------
	•••••••••••••••••••••••••••••••••••••••••••••••••
	▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁▁
 	✔ OK ❯ Passed 49 of 49 (0.17s 22Mb)
	▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔▔

	$ lib/Cake/Console/cake Bdd.story

	Welcome to CakePHP v2.x.x Console
	---------------------------------------------------------------
	App : app
	Path: /your CakePHP root/app/
	---------------------------------------------------------------
	Feature:
	  In order to tell the masses what's on my mind
	  As a user
	  I want to read articles on the site

	  Background:              # /your CakePHP root/features/posts.feature:7
	    Given there is a post: # /your CakePHP root/features/steps/posts_step.php:3
	      | Title              | Body                          |
	      | The title          | This is the post body.        |
	      | A title once again | And the post body follows.    |
	      | Title strikes back | This is really exciting! Not. |

	  Scenario: Show articles                 # /your CakePHP root/features/posts.feature:14
	    When I am on "TopPage"                # FeatureContext::visit()
	    Then I should see "The title"         # FeatureContext::assertPageContainsText()
	    And I should see "A title once again" # FeatureContext::assertPageContainsText()
	    And I should see "Title strikes back" # FeatureContext::assertPageContainsText()

	....


## Testing Tutorial

### Installing PHPUnit

Please check Installing PHPUnit into CakePHP Cookbook (http://book.cakephp.org/2.0/en/development/testing.html#installing-phpunit).

### Test Database Setup

An initial value of config/database.php is $default. 
When UnitTest is executed, $test might already been defined. 
http://book.cakephp.org/2.0/en/development/testing.html#test-database-setup

Story framework is executed by the browser access. Database ($test) for the test cannot access to without the change in the setting.
When test step registers the test data, BDD plugin uses $test. Therefore, the definition is needed without fail. My recommendation is that the database setting is switched by the environment.

At see: https://github.com/sizuhiko/BddExampleApp/blob/master/app/Config/database.php#L60-91

The example switch based on the accessed server name.
When the accessed host name is test.localhost, the database for test is used. 
When it is not so, the database for development is used.
It will become possible to use test.localhost if it set  "127.0.0.1 localhost and test.localhost" into the hosts file. It is easy. 

**Important:** BDD plugin maybe not create table for testing basically. You should create database and tables for testing into $test database.

### Spec

Spec framework uses Spec for PHP(https://github.com/drslump/Spec-PHP). It was inspired on RSpec from the Ruby world. Visit official page for get more detail if you interest it.

#### Running tests from command line

BDD plugin provides spec shell for running tests. Options and arguments get along with Spec for PHP.
From your root directory of CakePHP, you can do the following to run tests:

```sh
# Run all tests into spec directory(default directory spec)
lib/Cake/Console/cake Bdd.spec

# You can be given target spec directory(for example spec)
lib/Cake/Console/cake Bdd.spec spec

# You can be given target spec file
lib/Cake/Console/cake Bdd.spec spec/post.spec.php

# For more options information is
lib/Cake/Console/cake Bdd.spec --help
```

#### Test Case Lifecycle Callbacks & Test Case Conventions

Spec for PHP builds on top of PHPUnit and Hamcrest projects. And use annotation to inherit from custom PHPUnit_TestCase class.

Bdd plugin use the feature, provides 2 annotation are CakeSpec and ControllerSpec.
These are extends CakeTestCase and ControllerTestCase and customize for using fixtures and testAction method. 

So you can use lifecycle callbacks (http://book.cakephp.org/2.0/en/development/testing.html#test-case-lifecycle-callbacks). For example setUp, tearDown and etc.

If you have some conventions into test cases. see CakePHP Cookbook (http://book.cakephp.org/2.0/en/development/testing.html#test-case-conventions).
But now, BDD plugin can not load the test case. Now, you should have dirty hack to add `App::uses('Your extends CakeSpec', 'Your location');` to plugins/Bdd/Console/Command/SpecShell.php.

##### future approach

The problem will solve using spec_helper.

#### Spec File

BDD plugin must be directory spec under CakePHP root.
Filename must end with 'spec.php', can use 3 pattern names are:

* post.spec.php
* post_spec.php
* PostSpec.php

#### Testing Models

See example:
https://github.com/sizuhiko/BddExampleApp/blob/master/spec/post.spec.php

```php
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
```

For testing model, must specify annotation `# class CakeSpec`.

In CakeSpec world variable $W->fixtures we define the set of fixtures. In the CakeTestCase, you should include all the fixtures at once. But CakeSpec needs only nested block. The fixtures are loaded each of "it" blocks (like a later load using loadFixtures method).

##### Inside Working

You can dump a spec file transformed to PHP.
`$ lib/Cake/Console/Bdd.spec spec/post.spec.php --dump`

```php
<?php

/** @class CakeSpec */
\DrSlump\Spec::describe("Post", function($W){
  \DrSlump\Spec::describe("with fixture", function($W){
    \DrSlump\Spec::before(function($W){
      $W->fixtures = array('app.post');
    });
    \DrSlump\Spec::describe("#findByTitle", function($W){
      \DrSlump\Spec::subject(function($W){
        $post = ClassRegistry::init('Post');
        $result = $post->findByTitle('The title');
        return $result['Post']['body'];
      });
      \DrSlump\Spec::it("body", function($W){
        \DrSlump\Spec::expect(\DrSlump\Spec::test()->subject($W))->equal_('This is the post body.')->do();});
    });
  });
```

Spec for PHP use TestSuite and TestCase. Only 'it' block is assigned to TestCase. Other blocks (describe, context, before...) are assigned to TestSuite. So inside 'it' block can use $this variable as TestCase instance.
If you want use $this variable into scope of test case, out of 'it' block, you can use 
`\DrSlump\Spec::test()`. The method return current test case.

Subject block callback from "it" block with world variable. If you start match condition in 'it' block, subject callback is applied automatically.

#### Testing Controllers

See example:
https://github.com/sizuhiko/BddExampleApp/blob/master/spec/posts_controller.spec.php

```php
<?php

# class ControllerSpec
describe "PostsController"
  before
    $W->fixtures = array('app.post');
  end
  describe "/posts/index"
    subject
      $vars = \DrSlump\Spec::test()->testAction("/posts/index", array('return'=>'vars'));
      return array_map(function($post) { return $post['Post']['title']; }, $vars['posts']);
    end
    it 'have 3 titles'
      should equal array('The title', 'A title once again', 'Title strikes back')
    end
  end
end
```

For testing controllers, must specify annotation `# class ControllerSpec`.
ControllerSpec extends ControllerTestCase of CakePHP, so you can use `testAction()` and fixtures. Fixtures usage is similar in testing model, use `$W->fixture`. 

The `testAction` usage checks CakePHP Cookbook: 
http://book.cakephp.org/2.0/en/development/testing.html#testing-controllers

I have already explained the scope each blocks, subject scope is TestSuite. But `testAction()` is TestCase method. In this case, you should use current testcase taked by `\DrSlump\Spec::test()`.

Maybe any other tests are ok. If you have problem, please post issue to github.

### Story

Story framework uses Behat.(http://behat.org/) is PHP version clone of famous BDD framework cucumber in Ruby on Rails. Visit official page for get more detail if you interest it.

#### Running tests from command line

BDD plugin provides story shell for running tests. Options and arguments get along with Behat.
From your root directory of CakePHP, you can do the following to run tests:

```sh
# Run all tests into features directory
lib/Cake/Console/cake Bdd.story

# You can be given target feature file
lib/Cake/Console/cake Bdd.story features/posts.features

# For more options information is
lib/Cake/Console/cake Bdd.story --help
```

Options see "Command Line Tool - Behat 2 documentation" : http://docs.behat.org/guides/6.cli.html

#### Features

You write human-readable stories that describe the behavior of your application to feature files.

See "Define your Feature in Quick Intro to Behat" : http://docs.behat.org/quick_intro.html#define-your-feature

#### Steps

See "Writing your Step definitions in Quick Intro to Behat" : http://docs.behat.org/quick_intro.html#writing-your-step-definitions

Basically steps write into FeatureContext.
I think no good, because steps are too many. So my recommend style separates some step files properly. see "Closures as Definitions and Hooks": http://docs.behat.org/guides/5.closures.html

BDD plugin recommend this way. Steps file should put on `features/steps` directory.
The files are loaded automatically by FeatureContext provided BDD plugin.

You not have to change `features/bootstrap/FeatureContext.php` while normal usage.

Step file example: https://github.com/sizuhiko/BddExampleApp/blob/master/features/steps/posts_step.php

##### Dependency CakePHP

You may want to insert test data to database. In this case, BDD plugin provides 2 methods :

* truncateModel() : Method for deletion of test data. 
* getModel() Method of getting model to register test data. 

```php
<?php
$steps->Given('/^there is a post:$/', function($world, $table) {
  $hash = $table->getHash();
  $world->truncateModel('Post');
  $post = $world->getModel('Post');
  foreach ($hash as $row) {
	$post->create(array('Post'=>array('title'=>$row['Title'], 'body'=>$row['Body'])));
	$post->save();
  }
});
```

In Bdd.story is not support fixture. Because test data should be visualization on the scenario. For example:

```
  Background:
    Given there is a post:
      | Title | Body |
      | The title | This is the post body. |
      | A title once again | And the post body follows. |
      | Title strikes back | This is really exciting! Not. |
```

#### Page access alias

Behat/Mink have step "Given /^(?:|I )am on "(?P<page>[^"]+)"$/". The page attribute means url. 

```
  Scenario: Show articles
    When I am on "TopPage"
```

If you don't want to use url,  can write the alias to `features/support/env.php`.

```php
<?php
$world->getPathTo = function($path) use($world) {
    switch ($path) {
    case 'TopPage': return 'posts';
    case 'トップページ': return 'posts';
    default: return $path;
  }
};
```


