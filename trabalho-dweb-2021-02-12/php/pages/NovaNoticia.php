<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nova notícia</title>

  <link rel="stylesheet" href="/trabalho-dweb-2021-02-12/css/base.css">
  <link rel="stylesheet" href="/trabalho-dweb-2021-02-12/css/form.css">
  <link rel="stylesheet" href="/trabalho-dweb-2021-02-12/css/header.css">
  <link rel="stylesheet" href="/trabalho-dweb-2021-02-12/css/footer.css">
</head>
<body>
<?php
    require "../classes/Noticia.class.php";
    include "../views/header.php";

    if(isset($_POST["titulo"]) && isset($_POST["descricao"])) {
      $noticiaHandler = new Noticia();

      try {
        $noticiaHandler->insertNoticia($_POST["titulo"], $_POST["descricao"]);

        header("Location: /trabalho-dweb-2021-02-12/index.php");
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    }

    include "../views/form.php";

    include "../views/footer.php";
  ?>
</body>
</html>
