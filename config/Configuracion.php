<?php
return [
    //Email
    'Server' => [
        'email' => [
            'correo' => 'icticore.pruebas@gmail.com' ,
            'nombre' => 'Administrador Sistema',
            'titulo' => 'Invitación Sistema',
            'mensaje' => 'Click en la siguiente liga para confirmar',
        ],
    ],
    
    'Uploads' => [
            'fotografias_avatar' => [
                'path' => WWW_ROOT . 'img' . DS . 'uploads' . DS .'fotografias_avatar',
                
            ]
        ],
        /*
        'site' => [
            'home' => [ROOT . DS . 'plugins' . DS,
                '/path/to/other/plugins/'],
        ]
         * 
         */
    
];