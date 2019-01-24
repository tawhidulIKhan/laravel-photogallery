<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'albums' => 'c,r,u,d',
            'photos' => 'c,r,u,d',
            'teams' => 'c,r,u,d',
            'services' => 'c,r,u,d',
            'contactinfos' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'albums' => 'c,r,u,d',
            'photos' => 'c,r,u,d',
            'teams' => 'c,r,u,d',
            'services' => 'c,r,u,d',
            'contactinfos' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'contributor' => [
            'profile' => 'r,u',
            'albums' => 'c,r,u,d',
            'photos' => 'c,r,u,d',
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'c,r,u',
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
