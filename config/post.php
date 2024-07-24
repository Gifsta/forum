<?php
class Posts
{
    private $id;
    private $title;
    private $content;
    private $like;
    private $id_categorie;
    private $id_user;


    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
    public function getLike()
    {
        return $this->like;
    }
    public function setLike($like)
    {
        $this->like = $like;

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
    public function getId_user()
    {
        return $this->id_user;
    }
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }
}