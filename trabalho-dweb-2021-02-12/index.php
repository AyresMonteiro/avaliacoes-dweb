<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projeto DWEB - Jornal</title>

  <link rel="stylesheet" href="css/base.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/footer.css">
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

    require "php/classes/Noticia.class.php";
    include "php/views/header.php";

    $noticiasHandler = new Noticia();

    echo '<div class="noticias">';
    $noticias = $noticiasHandler->getNoticias();

    usort($noticias, "compareTime");

    foreach ($noticias as $noticia) {
      echo <<< EOD
        <div class="noticia">
          <h3>{$noticia["titulo"]}</h3>
          <h4>{$noticia["descricao"]}</h4>
        </div>
      EOD;
    }
    echo '</div>';

    include "php/views/footer.php";
  ?>
</body>
</html>