LwcCmsContent
=============

### Composer ###
Add the repository to your composer.json:

    "repositories": [
        {
            "type": "package",
            "package": {
                "name": "lwc/LwcCmsPage",
                "version": "1.0.0",
                "source": {
                    "url": "http://github.com/lewildcode/LwcCmsPage",
                    "type": "git",
                    "reference": "master"
                }
            }
        },
        {
            "type": "package",
            "package": {
                "name": "lwc/LwcCmsContent",
                "version": "1.0.0",
                "source": {
                    "url": "http://github.com/lewildcode/LwcCmsContent",
                    "type": "git",
                    "reference": "master"
                }
            }
        }
    ],

then add the page & content package to the require block

    "require": {
        "lwc/LwcCmsPage": "1.*", /* if not added yet */
        "lwc/LwcCmsContent": "1.*"
    }

### ZF2 config setup ###
* Add the "LwcCmsContent" module to your <b>config/application.config.php</b> file
* Copy the <b>config/lwccmscontent.global.dist</b> file to your config/autoload/ directory, replace the .dist with ".php"

### Database setup ###
* <b>Warning:</b> Make sure to setup the LwcCmsPage module first!
* Import the <b>data/table-init.sql</b> file into your database. It will create a few basic tables for storing the cms contents.
* The module will provide a ServiceManager alias called <b>LwcCmsContent\DbAdapter</b>. Per default, it points to a "dbAdapter" service. You may have to change this according to your application's default database adapter.

## Defining your own content types ##
You may extend the LwcCmsContent module with your own content types. I'll describe an example use-case for a "person" content type here.

#### Type definition in your module's config file ####
```php
<?php
return array(
  'lwccmscontent' => array(
    'types' => array(
      // this array key will be inserted into the cms_content table, so
      // it should be unique within the whole application
      'acme_spokesperson' => array(
        // or any other namespace within your module
        'class_name' => 'Acme\ContentType\Spokesperson', 
        // this view-helper will be used within the LwcCmsContent module
        // via __invoke(ContentEntityInterface $content), where $content 
        // is an instance of your "class_name"
        'view_helper' => 'contentSpokesperson' 
      )
    )
  )
);
```
#### Creating the content type class (model) ####
Within your module, create the <b>src/Acme/ContentType</b> folder an put a 
<b>Spokesperson.php</b> file in it, like so:
```php
<?php
namespace Acme\ContentType;

use LwcCmsContent\Model\ContentEntityInterface;
use LwcCmsContent\Model\AbstractContentEntity;

class Spokesperson extends AbstractContentEntity implements ContentEntityInterface
{
    public function getTypeId()
    {
        return 'acme_spokesperson';
    }
}
```
By extending the <b>AbstractContentEntity</b> class, the only thing you'll need to define is the getTypeId() method.
You may / have to define any getters/setters which you will need to display your content. However, while loading the contents, a ClassHydrator will be used to call the setters. So make sure your setters match the database columns. Underscores are allowed for the column names (those will be treated via camel-casing). Also take care not to specify typehints within your setters, as (basically) strings will be passed in from the database resultset.

####  Creating the view helper to display the model ####
Create the folder <b>src/View/Helper</b> and put a <b>ContentSpokesperson.php</b> in there, like so:
```php
<?php
namespace Acme\View\Helper;

use Zend\View\Helper\AbstractHelper;
use LwcCmsContent\View\Helper\RendererInterface;
use LwcCmsContent\Model\ContentEntityInterface;

class ContentSpokesperson extends AbstractHelper implements RendererInterface
{

    /**
     *
     * @return string
     */
    protected function getViewModel()
    {
        return 'content/spokesperson';
    }

    /**
     * (non-PHPdoc)
     *
     * @see \LwcCmsContent\View\Helper\RendererInterface::__invoke()
     */
    public function __invoke(ContentEntityInterface $content)
    {
        $viewModel = $this->getViewModel();
        return $this->view->render($viewModel, array(
            'person' => $content
        ));
    }
}
```
The getViewModel() method is not needed, but it makes the file a bit cleaner / extendable (imho).

#### Adding the view script (ViewModel) ####
Create a <b>view/acme-module/content</b> directory and put a spokesperson.phtml in there, like so:
```php

<div class="foobar">
<?php echo $this->escapehtml($person->getXYZ()); // use any methods from your model class here. ?>
</div>
```

#### Adding the ViewModel and the ViewHelper to your config ####
```php
<?php
return array(
  // ... other module stuff ...
  'view_helpers' => array(
    'invokables' => array(
      // the alias is important.
      // php namespace has to match the Helper class you just added above
      'contentSpokesperson' => 'Acme\View\Helper\ContentSpokesperson'
    )
  ),
  // ... even more stuff ...
  'view_manager' => array(
    'template_map' => array(
      // path could be any path, doesn't really matter. the array key is important
      'content/spokesperson' => __DIR__ . '/../view/acme-module/content/spokesperson.phtml',
    )
  )
);
```

