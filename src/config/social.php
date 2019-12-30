<?php 

return [

    'services' => [

       'github' => [
            'name' => 'Github'
       ], 
       
       'google' => [
            'name' => 'Google'
       ], 
       
    ],

    'events' => [

        'github' => [
            'created' => \DesignByCode\Admin\Events\Social\GithubLoginEvent::class
        ],
        
        'google' => [
            'created' => \DesignByCode\Admin\Events\Social\GoogleLoginEvent::class
        ]

    ]

];
