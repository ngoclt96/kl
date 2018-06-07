<?php

/*
 * Return config acl for
 * admin and employee
 * root is granted all permission
 * employee and teacher accept only mypage
 */

return [
    'admin' => [
        'title' => 'Module admin',
        'function' => [
            'index' => [
                'title' => 'Index of admin module',
                'privilege' => ['root', 'admin']
            ],
            'edit' => [
                'title' => 'Index of admin module',
                'privilege' => ['root']
            ],
            'form' => [
                'title' => 'Form of admin module',
                'privilege' => ['root']
            ],
            'confirm' => [
                'title' => 'Confirm of admin module',
                'privilege' => ['root']
            ],
            'complete' => [
                'title' => 'Complete of admin module',
                'privilege' => ['root']
            ],
            'delete' => [
                'title' => 'Delete of admin module',
                'privilege' => ['root']
            ]
        ]
    ],
    'users' => [
        'title' => 'Module users',
        'function' => [
            'index' => [
                'title' => 'Index of users module',
                'privilege' => ['root', 'admin']
            ],
            'edit' => [
                'title' => 'Index of users module',
                'privilege' => ['root']
            ],
            'form' => [
                'title' => 'Form of users module',
                'privilege' => ['root']
            ],
            'confirm' => [
                'title' => 'Confirm of users module',
                'privilege' => ['root']
            ],
            'complete' => [
                'title' => 'Complete of users module',
                'privilege' => ['root']
            ],
            'delete' => [
                'title' => 'Delete of users module',
                'privilege' => ['root']
            ],
            'setting' => [
                'title' => 'Setting table view column',
                'privilege' => ['root']
            ],
            'register' => [
                'title' => 'Register table view column',
                'privilege' => ['root']
            ],
            'show' => [
                'title' => 'show code table view column',
                'privilege' => ['root']
            ],
            'ajustpoint' => [
                'title' => 'Ajust point to member',
                'privilege' => ['root']
            ]
        ]
    ],
    'home' => [
        'title' => 'Module home pages',
        'function' => [
            'index' => [
                'title' => 'Show home page index',
                'privilege' => ['root', 'admin', 'employee']
            ]
        ]
    ],
    'login' => [
        'title' => 'Login module',
        'function' => [
            'logout' => [
                'title' => 'Logout users',
                'privilege' => ['root', 'admin', 'employee']
            ]
        ]
    ],
    'categories' => [
    'title' => 'Module categories',
    'function' => [
        'index' => [
            'title' => 'Index of categories module',
            'privilege' => ['root', 'admin']
        ],
        'form' => [
            'title' => 'Form of categories module',
            'privilege' => ['root', 'admin']
        ],
        'edit' => [
            'title' => 'Index of categories module',
            'privilege' => ['root']
        ],
        'confirm' => [
            'title' => 'Confirm of categories module',
            'privilege' => ['root', 'admin']
        ],
        'complete' => [
            'title' => 'Complete of categories module',
            'privilege' => ['root', 'admin']
        ],
        'setting' => [
            'title' => 'Index of categories module',
            'privilege' => ['root', 'admin']
        ],
        'delete' => [
            'title' => 'Delete categories module',
            'privilege' => ['root']
        ],
    ]
],
    'bookings' => [
        'title' => 'Module Booking',
        'function' => [
            'index' => [
                'title' => 'Index of bookings module',
                'privilege' => ['root', 'admin']
            ],
            'form' => [
                'title' => 'Form of bookings module',
                'privilege' => ['root', 'admin']
            ],
            'edit' => [
                'title' => 'Index of bookings module',
                'privilege' => ['root']
            ],
            'confirm' => [
                'title' => 'Confirm of bookings module',
                'privilege' => ['root', 'admin']
            ],
            'complete' => [
                'title' => 'Complete of bookings module',
                'privilege' => ['root', 'admin']
            ],
            'setting' => [
                'title' => 'Index of bookings module',
                'privilege' => ['root', 'admin']
            ],
            'delete' => [
                'title' => 'Delete of bookings module',
                'privilege' => ['root']
            ],
        ]
    ],
    'courses' => [
        'title' => 'Module courses',
        'function' => [
            'index' => [
                'title' => 'Index of courses module',
                'privilege' => ['root', 'admin']
            ],
            'form' => [
                'title' => 'Form of courses module',
                'privilege' => ['root', 'admin']
            ],
            'edit' => [
                'title' => 'Index of courses module',
                'privilege' => ['root']
            ],
            'confirm' => [
                'title' => 'Confirm of courses module',
                'privilege' => ['root', 'admin']
            ],
            'complete' => [
                'title' => 'Complete of courses module',
                'privilege' => ['root', 'admin']
            ],
            'setting' => [
                'title' => 'Index of courses module',
                'privilege' => ['root', 'admin']
            ],
            'delete' => [
                'title' => 'Delete of courses module',
                'privilege' => ['root']
            ],
        ]
    ],
    'teachers' => [
        'title' => 'Module teachers',
        'function' => [
            'index' => [
                'title' => 'Index of teachers module',
                'privilege' => ['root', 'admin']
            ],
            'form' => [
                'title' => 'Form of teachers module',
                'privilege' => ['root', 'admin']
            ],
            'edit' => [
                'title' => 'Index of teachers module',
                'privilege' => ['root']
            ],
            'confirm' => [
                'title' => 'Confirm of teachers module',
                'privilege' => ['root', 'admin']
            ],
            'complete' => [
                'title' => 'Complete of teachers module',
                'privilege' => ['root', 'admin']
            ],
            'setting' => [
                'title' => 'Index of teachers module',
                'privilege' => ['root', 'admin']
            ],
            'delete' => [
                'title' => 'Delete of teachers module',
                'privilege' => ['root']
            ],
        ]
    ],
    'members' => [
        'title' => 'Module members',
        'function' => [
            'index' => [
                'title' => 'Index of members module',
                'privilege' => ['root', 'admin']
            ],
            'form' => [
                'title' => 'Form of members module',
                'privilege' => ['root', 'admin']
            ],
            'edit' => [
                'title' => 'Index of members module',
                'privilege' => ['root']
            ],
            'confirm' => [
                'title' => 'Confirm of members module',
                'privilege' => ['root', 'admin']
            ],
            'complete' => [
                'title' => 'Complete of members module',
                'privilege' => ['root', 'admin']
            ],
            'setting' => [
                'title' => 'Index of members module',
                'privilege' => ['root', 'admin']
            ],
            'delete' => [
                'title' => 'Delete of members module',
                'privilege' => ['root']
            ],
        ]
    ],
    'lessons' => [
        'title' => 'Module lessons',
        'function' => [
            'index' => [
                'title' => 'Index of lessons module',
                'privilege' => ['root', 'admin']
            ],
            'form' => [
                'title' => 'Form of lessons module',
                'privilege' => ['root', 'admin']
            ],
            'edit' => [
                'title' => 'Index of lessons module',
                'privilege' => ['root']
            ],
            'confirm' => [
                'title' => 'Confirm of lessons module',
                'privilege' => ['root', 'admin']
            ],
            'complete' => [
                'title' => 'Complete of lessons module',
                'privilege' => ['root', 'admin']
            ],
            'setting' => [
                'title' => 'Index of lessons module',
                'privilege' => ['root', 'admin']
            ],
            'delete' => [
                'title' => 'Delete of lessons module',
                'privilege' => ['root']
            ],
        ]
    ],
    'videos' => [
        'title' => 'Module videos',
        'function' => [
            'index' => [
                'title' => 'Index of videos module',
                'privilege' => ['root', 'admin']
            ],
            'form' => [
                'title' => 'Form of videos module',
                'privilege' => ['root', 'admin']
            ],
            'edit' => [
                'title' => 'Index of videos module',
                'privilege' => ['root']
            ],
            'confirm' => [
                'title' => 'Confirm of videos module',
                'privilege' => ['root', 'admin']
            ],
            'complete' => [
                'title' => 'Complete of videos module',
                'privilege' => ['root', 'admin']
            ],
            'setting' => [
                'title' => 'Index of videos module',
                'privilege' => ['root', 'admin']
            ],
            'delete' => [
                'title' => 'Delete of videos module',
                'privilege' => ['root']
            ],
        ]
    ],
    'profile' => [
    'title' => 'Module profiles',
    'function' => [
        'index' => [
            'title' => 'Index of profiles module',
            'privilege' => ['root', 'admin']
        ],
        'form' => [
            'title' => 'Form of profiles module',
            'privilege' => ['root', 'admin']
        ],
        'edit' => [
            'title' => 'Index of profiles module',
            'privilege' => ['root']
        ],
        'confirm' => [
            'title' => 'Confirm of profiles module',
            'privilege' => ['root', 'admin']
        ],
        'complete' => [
            'title' => 'Complete of profiles module',
            'privilege' => ['root', 'admin']
        ],
        'setting' => [
            'title' => 'Index of profiles module',
            'privilege' => ['root', 'admin']
        ],
        'delete' => [
            'title' => 'Delete of profiles module',
            'privilege' => ['root']
        ],
    ],
        ]


];

