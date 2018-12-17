<?php

class Usuario {

    private $idusuarios;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    /**
     * @return mixed
     */
    public function getIdusuarios()
    {
        return $this->idusuarios;
    }

    /**
     * @param mixed $idusuario
     */
    public function setIdusuarios($idusuarios)
    {
        $this->idusuarios = $idusuarios;
    }

    /**
     * @return mixed
     */
    public function getDeslogin()
    {
        return $this->deslogin;
    }

    /**
     * @param mixed $deslogin
     */
    public function setDeslogin($deslogin)
    {
        $this->deslogin = $deslogin;
    }

    /**
     * @return mixed
     */
    public function getDessenha()
    {
        return $this->dessenha;
    }

    /**
     * @param mixed $desenha
     */
    public function setDessenha($dessenha)
    {
        $this->dessenha = $dessenha;
    }

    /**
     * @return mixed
     */
    public function getDtcadastro()
    {
        return $this->dtcadastro;
    }

    /**
     * @param mixed $dtcadastro
     */
    public function setDtcadastro($dtcadastro)
    {
        $this->dtcadastro = $dtcadastro;
    }

    public function loadById($id){

        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_usuarios WHERE id_usuarios = :ID", array(
            ":ID"=>$id
        ));

        if (count($result) > 0) {

            $row = $result[0];

            $this->setIdusuarios($row['id_usuarios']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime($row['dt_cadastro']));
        }
    }

    public function __toString(){

        return json_encode(array(
            "id_usuarios"=>$this->getIdusuarios(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDessenha(),
            "dt_cadastro"=>$this->getDtcadastro()->format("d-m-Y H:m:s")
        ));
    }

    public static function getList(){

        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
    }

    public static function search($login){

        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
            ':SEARCH'=>"%".$login."%"
        ));
    }

    public function login($login, $password){

        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
            ":LOGIN"=>$login,
            ":PASSWORD"=>$password
        ));

        if (count($result) > 0) {

            $row = $result[0];

            $this->setIdusuarios($row['id_usuarios']);
            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setDtcadastro(new DateTime($row['dt_cadastro']));
        } else {
            throw new Exception("Login e/ou senha inválidos.");
        }
    }



}