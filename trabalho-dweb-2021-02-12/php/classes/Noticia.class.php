<?php

class Noticia {

  private $conexao;
  private $erro;

  public function __construct() {
    $host = "localhost";
    $banco = "projeto_dweb";
    $usuario = "servidor_do_jornal";
    $senha = "i@9B0rfN@ivd";

    try {
      $con = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
      $this->conexao = $con;
    } catch (PDOException $e) {
      $this->erro = $e->getMessage();
    }
  }

  public function getNoticias() {

    $result_noticias = "SELECT * FROM noticias";
    $arrayDeRetorno = array();

    foreach ($this->conexao->query($result_noticias, PDO::FETCH_ASSOC) as $noticia) {
      array_push($arrayDeRetorno, $noticia);
    }

    return $arrayDeRetorno;
  }

  public function buscarNoticia($termoDeBusca) {

    $arrayDeRet = array();

    $busca = "SELECT * FROM noticias WHERE titulo like '%" . $termoDeBusca
      . "%' or descricao like '%" . $termoDeBusca . "%'";

    foreach ($this->conexao->query($busca, PDO::FETCH_ASSOC) as $noticia) {
      array_push($arrayDeRet, $noticia);
    }

    return $arrayDeRet;
  }

  public function insertNoticia($titulo, $descricao) {
    try {
      $this->conexao->query(
        "INSERT INTO noticias(titulo, descricao) VALUES('$titulo','$descricao')"
      );
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}
