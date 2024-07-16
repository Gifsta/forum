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
            if ($param["user"] == $user['pseudo'] || $param["user"] ==$user['email'] && password_verify($param["password"], $user["password"])) {
                return $user;
            }
        }
    }
}
