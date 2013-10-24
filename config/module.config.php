<?php
return array(
    'console' => array(
        'router' => array(
            'routes' => array(
                'lwccmscontent_create' => array(
                    'options' => array(
                        'route' => 'cms create content <row> <type> [--weight=] [--visible=] [--specs=]',
                        'defaults' => array(
                            'controller' => 'LwcCmsContent\Controller\Cli',
                            'action' => 'create',
                            'visible' => true,
                            'weight' => 12,
                            'specs' => array()
                        )
                    )
                ),
                'lwccmscontent_update' => array(
                    'options' => array(
                        'route' => 'cms update content <id> --specs=',
                        'defaults' => array(
                            'controller' => 'LwcCmsContent\Controller\Cli',
                            'action' => 'update'
                        )
                    )
                ),
                'lwccmscontent_showtypes' => array(
                    'options' => array(
                        'route' => 'cms content types',
                        'defaults' => array(
                            'controller' => 'LwcCmsContent\Controller\Cli',
                            'action' => 'showtypes'
                        )
                    )
                )
            )
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'LwcCmsContent\Controller\Cli' => 'LwcCmsContent\Controller\CliController'
        )
    ),
    'service_manager' => array(
        'aliases' => array(
            'LwcCmsContent\DbAdapter' => 'dbAdapter'
        ),
        'factories' => array(
            'LwcCmsContent\Table\Content' => 'LwcCmsContent\Table\ContentTableFactory',
            'LwcCmsContent\Service\Content' => 'LwcCmsContent\Service\ContentServiceFactory'
        )
    ),
    'view_helpers' => array(
        'invokables' => array(
            // basic view helpers
            'contentHeader' => 'LwcCmsContent\View\Helper\Header',
            'contentImage' => 'LwcCmsContent\View\Helper\Image',
            'contentBodycopy' => 'LwcCmsContent\View\Helper\Bodycopy',

            // core content type view helpers
            'contentRawHtml' => 'LwcCmsContent\View\Helper\RawHtml',
            'contentArticle' => 'LwcCmsContent\View\Helper\Article',
            'contentSection' => 'LwcCmsContent\View\Helper\Section',
            'contentDefinitionList' => 'LwcCmsContent\View\Helper\DefinitionList'
        ),
        'factories' => array(
            'contentRenderer' => 'LwcCmsContent\View\Helper\RendererFactory'
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
        'template_map' => array(
            // templates
            'content/header' => __DIR__ . '/../view/lwc-cms-content/content/header.phtml',
            'content/image' => __DIR__ . '/../view/lwc-cms-content/content/image.phtml',
            'content/bodycopy' => __DIR__ . '/../view/lwc-cms-content/content/bodycopy.phtml',
            'content/rawhtml' => __DIR__ . '/../view/lwc-cms-content/content/rawhtml.phtml',

            // core content type templates
            'content/article' => __DIR__ . '/../view/lwc-cms-content/content/article.phtml',
            'content/section' => __DIR__ . '/../view/lwc-cms-content/content/section.phtml',
            'content/definitionlist' => __DIR__ . '/../view/lwc-cms-content/content/definitionlist.phtml',
        )
    )
);