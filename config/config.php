<?php
class db
{
    private $db;

    public function connecte()
    {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=forum", 'root', '');
            return $this->db;
        } catch (PDOException $e) {
            $error = fopen('error.log', 'w');
            $txt = $e . "\n";
            fwrite($error, $txt);
            throw new Exception("Error 404");
        }
    }
    public function getAll()
    {
        $sql = "SELECT * FROM user";
        $done = $this->db->query($sql);
        return $done->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addUser(Users $user): void
    {
        $email = $user->getEmail();
        $password = $user->getPassword();
        $pseudo = $user->getPseudo();

        $sql = $this->db->prepare("INSERT INTO user (statut,email,pseudo,password)VALUES('utilisateur',:email,:pseudo,:password)");
        $sql->bindParam(":email", $email);
        $sql->bindParam(":pseudo", $pseudo);
        $sql->bindParam(":password", $password);
        $sql->execute();
    }
    public function userConnect($param = [])
    {
        $users = $this->getAll();
        foreach ($users as $user) {
            if ($param["user"] == $user['pseudo'] || $param["user"] == $user['email'] && password_verify($param["password"], $user["password"])) {
                return $user;
            }
        }
    }
    public function getPost($id)
    {
        $sql = $this->db->prepare("SELECT * FROM post WHERE id_categorie = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
        public function addPost(Posts $post): void
    {
        $title = $post->getTitle();
        $content = $post->getContent();
        $categorie = $post->getId_categorie();
        $sql = $this->db->prepare("INSERT INTO post (title,content,id_categorie) VALUES (:title, :content, :categorie)");
        $sql->bindParam(":title",$title);
        $sql->bindParam(":content",$content);
        $sql->bindParam(":categorie",$categorie);
        $sql->execute();
    }

    

    public function deletePost($id):void
    {
        $sql = $this->db->prepare("DELETE FROM post WHERE id= id");
        $sql->bindParam(":id",$id);
        $sql->execute();
    }
    public function addCategorie(Categorie $name)
    {
        $name = $name->getName();
        $sql = $this->db->prepare("INSERT INTO categorie (name) VALUE (:name)");
        $sql->bindParam(":name", $name);
        $sql->execute();
    }
    public function getCategorie()
    {
        $sql = "SELECT * FROM categorie";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addS_Categorie(S_Categorie $name)
    {
        $name = $name->getName();
        $sql = $this->db->prepare("INSERT INTO sous_categorie(name) VALUE (:name)");
        $sql->bindParam(":name", $name);
        $sql->execute();
    }
    public function getS_Categorie($id)
    {
        $sql = $this->db->prepare("SELECT * FROM sous_categorie WHERE id_categorie = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
