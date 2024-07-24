<?php
class S_Categorie{
    private $name;
    private $id_categorie;

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    public function getId_categorie()
    {
        return $this->id_categorie;
    }
    public function setId_categorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;

        return $this;
    }
}