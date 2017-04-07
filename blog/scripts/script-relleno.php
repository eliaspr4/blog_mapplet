<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/RepositorioComentario.inc.php';

Conexion::abrir_conexion();

for ($usuarios =0; $usuarios <100; $usuarios++){
    $nombre = sa(10);
    $email = sa(5).'@'.sa(3);
    $password =password_hash('123456',PASSWORD_DEFAULT);
    
    $usuario = new Usuario('',$nombre, $email,$password,'','');
    RepositorioUsuario::insertar_usuario(Conexion::obtener_conexion(),$usuario);
}

for($entradas =0; $entradas < 100; $entradas++){
    $titulo = sa(10);
    $url = $titulo;
    $texto = lorem();
    $autor = rand(1,100);
    
    $entrada = new Entrada('',$autor, $url, $titulo, $texto, '','');
    RepositorioEntrada::insertar_entrada(Conexion::obtener_conexion(), $entrada);
}

for($comentarios =0; $comentarios < 100; $comentarios++){
    $titulo = sa(10);
    $texto = lorem();
    $autor = rand(1,100);
    $entrada = rand(1,100);
    
    $comentario = new Comentario('',$autor,$entrada, $titulo, $texto, '');
    RepositorioComentario::insertar_comentario(Conexion::obtener_conexion(), $comentario);
            
}

function sa ($longitud){
    $caracteres ='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numero_caracteres = strlen ($caracteres);
    $string_aleatorio = "";
    
    for($i =0; $i < $longitud; $i++){
        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres -1 )];
    }
    return $string_aleatorio;
}


function lorem(){

    $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ac neque neque. Pellentesque sollicitudin, nisl consequat euismod pretium, tellus orci faucibus nisl, ac volutpat turpis ipsum nec elit. Curabitur at felis volutpat, porta felis egestas, pellentesque diam. Ut blandit purus nec turpis rutrum, non lobortis urna venenatis. Mauris vitae odio diam. Vestibulum consectetur diam at dolor ultricies rhoncus. Cras a condimentum elit, non pretium ex. Proin maximus, felis vel mollis venenatis, nulla nulla interdum enim, sit amet volutpat libero sem et velit. Praesent felis ligula, vestibulum vitae porta nec, congue vel mi. Sed convallis sit amet turpis quis iaculis. Curabitur fermentum sed felis in congue. Nulla consectetur, velit id dapibus feugiat, turpis velit rutrum metus, vel ultricies magna augue aliquam elit. Aliquam purus eros, convallis sed lobortis maximus, ultrices quis nisl.

Morbi volutpat tellus sit amet velit porttitor lobortis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet finibus nunc, quis suscipit ex. Duis in tincidunt turpis. Praesent aliquet eros quis libero vestibulum accumsan. Suspendisse nibh sapien, consequat a suscipit sit amet, ornare viverra enim. Duis eleifend tellus ligula, maximus congue odio venenatis a. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eget felis et purus hendrerit lobortis. In hac habitasse platea dictumst. Nullam sed venenatis lorem. Curabitur semper massa dolor, et tristique lacus porttitor vel. Sed sit amet pretium erat. Donec turpis sem, porttitor quis interdum ac, ornare in erat. Curabitur congue pharetra nibh, placerat consectetur nisl ultricies iaculis.

Quisque neque urna, rutrum eget nulla ut, dignissim consectetur lacus. Duis nunc nisl, ullamcorper sed hendrerit et, vulputate sit amet orci. Vestibulum tempus neque lorem, ac ultrices turpis placerat quis. Sed interdum ipsum nibh, eget sodales nisi convallis id. Maecenas hendrerit et neque ac consequat. Phasellus condimentum, risus at sagittis eleifend, mauris metus tincidunt felis, quis facilisis ipsum mi ut neque. Suspendisse ut ultricies est. Etiam nec eleifend nisl. Fusce nisl lorem, viverra porta viverra ut, sagittis non urna. Praesent bibendum lorem quis tellus gravida commodo. Aenean congue, lectus suscipit pharetra scelerisque, mi neque ultrices ex, eget fringilla sem ex non libero. Integer aliquet pharetra dolor in finibus. Vivamus a lectus id nisi suscipit tristique eu id eros.

Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi lobortis enim at dolor mollis, molestie interdum dolor vestibulum. Aliquam vel elit malesuada, sagittis orci nec, volutpat mauris. Donec viverra orci quis porta eleifend. Suspendisse eget sodales nisl. Aliquam suscipit ipsum enim, eget accumsan quam posuere et. Vestibulum sollicitudin ut ex eu fermentum.

Quisque nec elit at leo vestibulum scelerisque eget non arcu. Etiam metus leo, ornare eget nisl at, dignissim semper lorem. Morbi sed ante facilisis, placerat mi eget, placerat mauris. Sed et ex sit amet dui varius dictum. Vivamus at facilisis mauris. Nam mattis vel purus et ultricies. Quisque ac porta ex, sit amet commodo velit. Suspendisse rhoncus magna ac vehicula tincidunt.';

    
    return $lorem;
}

