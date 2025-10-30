<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledMarkdownFile',
    'filename' => '/var/www/html/user/pages/01.home/blog.md',
    'modified' => 1759685422,
    'size' => 284,
    'data' => [
        'header' => [
            'title' => 'Blogs',
            'content' => [
                'items' => [
                    0 => '@self.children'
                ],
                'limit' => 5,
                'order' => [
                    'by' => 'date',
                    'dir' => 'desc'
                ],
                'pagination' => true,
                'url_taxonomy_filters' => true
            ]
        ],
        'frontmatter' => 'title: Blogs
content:
    items:
        - \'@self.children\'
    limit: 5
    order:
        by: date
        dir: desc
    pagination: true
    url_taxonomy_filters: true',
        'markdown' => '# NaeS的小窝

废了好大功夫才建好自己的博客呢，这下我要开始努力更新了！！'
    ]
];
