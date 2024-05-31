<?php

class CommentModel
{
    private $id;
    private $content;
    private $articleId; // Article ID
    private $userId; // Author ID
    private $createdAt;

    // Constructor
    public function __construct($id, $content, $articleId, $userId, $createdAt)
    {
        $this->id = $id;
        $this->content = $content;
        $this->articleId = $articleId;
        $this->userId = $userId;
        $this->createdAt = $createdAt;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getArticleId()
    {
        return $this->articleId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}

// Category.php