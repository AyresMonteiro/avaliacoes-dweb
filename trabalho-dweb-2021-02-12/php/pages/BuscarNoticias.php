<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Busca — <?php echo $_GET["termoDeBusca"] ?></title>

  <link rel="stylesheet" href="/trabalho-dweb-2021-02-12/css/base.css">
  <link rel="stylesheet" href="/trabalho-dweb-2021-02-12/css/index.css">
  <link rel="stylesheet" href="/trabalho-dweb-2021-02-12/css/header.css">
  <link rel="stylesheet" href="/trabalho-dweb-2021-02-12/css/footer.css">
</head>
<body>
  <?php
    function compareTime($a, $b) {
      $adate = new DateTime($a["dataPublicacao"]);
      $bdate = new DateTime($b["dataPublicacao"]);

      if ($adate == $bdate)
        return 0;
      else return $adate < $bdate;
    }

    require "../classes/Noticia.class.php";
    include "../views/header.php";

    $noticiasHandler = new Noticia();

    $noticias = $noticiasHandler->buscarNoticia($_GET["termoDeBusca"]);

    usort($noticias, "compareTime");

    echo '<div class="noticias">';
    foreach ($noticias as $noticia) {
      echo <<< EOD
        <div class="noticia">
          <h3>{$noticia["titulo"]}</h3>
          <h4>{$noticia["descricao"]}</h4>
        </div>
      EOD;
    }
    echo '</div>';

    include "../views/footer.php";
  ?>
</body>
</html>