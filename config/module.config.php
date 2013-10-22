<?php
return array(
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

            // core content type templates
            'content/article' => __DIR__ . '/../view/lwc-cms-content/content/article.phtml',
            'content/section' => __DIR__ . '/../view/lwc-cms-content/content/section.phtml',
            'content/definitionlist' => __DIR__ . '/../view/lwc-cms-content/content/definitionlist.phtml',
        )
    )
);