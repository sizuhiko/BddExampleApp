BddExampleApp
=============

This is a sample CakePHP2 application testing the basic usage of Bdd plugin.

CakePHP2 Bdd plugin is 
https://github.com/sizuhiko/Bdd

### Install & Configuration

1. Install CakePHP2.x
2. git clone or download this example application included app, feature and spec to root directory of CakePHP2.
3. Install dependency plugin for creating test data. To see fixture-factory(https://github.com/rodrigorm/fixture-factory) installation section. But this plugin directory has problem. So after install, rename directory name from vendors to vendor.
```sh
mv app/Plugin/fixture_factory/vendors app/Plugin/fixture_factory/vendor
```
4. Configuration database. The application default schema is app/Config/sql/posts.sql. Execute the sql from like a phpMyAdmin.
5. Configuration application. Please change app/Config/core.php and database.php to get along with your configuration.
6. At last, do installation and configuration Bdd plugin to your CakePHP plugin directory. Please see Bdd plugin page(https://github.com/sizuhiko/Bdd).

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

**TODO**

### Test Database Setup

**TODO**

### Spec

**TODO**

#### Running tests from command line

**TODO**

#### Test Case Lifecycle Callbacks & Test Case Conventions

**TODO**

#### Testing Models

**TODO**

#### Testing Controllers

**TODO**

### Story

**TODO**

#### How to write feature

**TODO**


