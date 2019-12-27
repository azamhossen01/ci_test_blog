<?php 
$config = [
    'add_article_rules' => [
        [
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'required'
        ],
        [
            'field' => 'body',
            'label' => 'Body',
            'rules' => 'required'
        ]
    ],
    'login_rules' => [
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|trim'
        ],
        [
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|trim'
        ]
        
    ]
]
?>