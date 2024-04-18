<?php 
    const API_URL ="https://whenisthenextmcufilm.com/api";
    # INICIAE UNA NUEVA SESION DE CURL; CH = CURL HANDLE
    $ch = curl_init(API_URL);
    //indicar que queremos recibir el resultado y no mostrarlo en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    /*
    ejecutar peticion
    y guardamos el resultado
    */
    $resul = curl_exec($ch);
    //otra alternativa sería usar file_get_contents
    // $resul = file_get_contents(API_URL);
    $data = json_decode($resul, true);
    curl_close($ch);

   // var_dump($ch);

?>

<head>
    <meta charset="UTF-8"/>
    <title>la proxima pelicula de Marvel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Centered viewport --> 
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>
<main>
     <hgroup>
        <h3>Esta es mi primera pagina web de producción la cual pude realizar gracias a un curso impartido por midulive, quien para mpi es un gran referente</h3>
        <p>dedicatoria <br>
        Sandra patricia Nájera y Kenia gabriela Hernández
        </p>
    </hgroup>
    
    <section>
    <img src="<?=$data["poster_url"]; ?>" width="200" alt="poster de <?= $data["title"]; ?>"
    style="border-radius: 16px"/>
    </section>
    <hgroup>
        <h3><?= $data["title"]; ?>se estrena en <?= $data["days_until"]; ?>días</h3>
        <p>fecha de estreno: <?= $data["release_date"]; ?></p>
        <p>la siguiente es: <?= $data["following_production"]["title"]; ?></p>
    </hgroup>
    <style>
        :root {
            color-scheme: light dark;
        }
        body {
            display: grid;
            place-content: center;
        }
        img {
            margin: 0 auto;
        }
        section{
            display: flex;
            justify-content: center;
            text-align: center;
        }
        hgroup {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }
    </style>
    </main>
