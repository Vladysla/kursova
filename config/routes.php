<?php

return array(
    'ganers/([0-9]+)'        => 'actors/ganers/$1',
    'actors/update/([0-9]+)' => 'actors/updateActor/$1',
    'cultural'               => 'buildings/listBuildings',
    'actors'                 => 'actors/listActors',
    'student'                => 'student/getAll',
    ''                       => 'site/index'
);