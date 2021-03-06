<?php

require_once 'servidor.php';

// insert into (Simulando POSTs)
/*
$titulo = 'HTML5 + mobile';
$autor = 'Fernando';
$preco = '999';
$paginas = '99';
consulta_dados("insert into livros(titulo, autor, preco, paginas)
        values('$titulo','$autor',$preco, $paginas)");
*/

// update
/*
consulta_dados("update livros set titulo = 'PHP para iniciantes' where id = 2");
*/

// delete
/*
consulta_dados("delete from livros where id = 3");
*/

$livros_query = consulta_dados("
        select
            livros.titulo,
            livros.categoria,
            livros.preco,
            livros.paginas,
            autores.nome as autor
        from
            livros,
            autores
        where
            livros.autor_id = autores.id
");
while ($livros = mysqli_fetch_assoc($livros_query)){
    echo '<pre>';
    print_r($livros);
    echo '<pre>';
}