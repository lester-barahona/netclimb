<?php
use Illuminate\Support\Str;
//para esto hay que ir a composer.json "autoload":{..} 
//y agregar "files":["app/helpers.php"]
//composer dumpautoload
function setActive($ruta){
    return request()->routeIs($ruta)?'nav-item-active':'';
}

function setActivePill($ruta){
    return request()->routeIs($ruta)?'tab-pill-active':'';
}