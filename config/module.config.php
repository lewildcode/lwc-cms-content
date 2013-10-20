<?php
return array(
    'view_helpers' => array(
        'invokables' => array(
            'contentHeader' => 'LwcCmsContent\View\Helper\Header',
            'contentImage' => 'LwcCmsContent\View\Helper\Image',
            'contentBodycopy' => 'LwcCmsContent\View\Helper\Bodycopy',
            'contentArticle' => 'LwcCmsContent\View\Helper\Article'
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
        'template_map' => array(
            // basics
            'content/header' => __DIR__ . '/../view/lwc-cms-content/content/header.phtml',
            'content/image' => __DIR__ . '/../view/lwc-cms-content/content/image.phtml',
            'content/bodycopy' => __DIR__ . '/../view/lwc-cms-content/content/bodycopy.phtml',

            // core content types
            'content/article' => __DIR__ . '/../view/lwc-cms-content/content/article.phtml',
            'content/section' => __DIR__ . '/../view/lwc-cms-content/content/section.phtml',
        )
    )
);