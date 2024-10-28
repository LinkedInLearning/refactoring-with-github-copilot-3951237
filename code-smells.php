<?php

class Author
{
  public $name;
  public $email;
  public $bio;

  public function __construct($name, $email, $bio)
  {
    $this->name = $name;
    $this->email = $email;
    $this->bio = $bio;
  }

  // Other author-related methods

}


interface AuthorDisplayTexturizerInterface
{
  public function texturizeAuthor(Author $author);
}

class AuthorStringDisplayTexturizer implements AuthorDisplayTexturizerInterface
{
  public function texturizeAuthor(Author $author)
  {
    return "Author: " . $author->name . " (" . $author->email . ") - " . $author->bio;
  }
}

class LinkedAuthorDisplayTexturizer extends AuthorStringDisplayTexturizer
{
  public function texturizeAuthor(Author $author)
  {
    return "<a href='mailto:" . $author->email . "'>" . parent::texturizeAuthor( $author ) . "</a>";
  }
}

class AuthorDisplay
{
  private AuthorDisplayTexturizerInterface $texturizer;

  public function __construct(AuthorDisplayTexturizerInterface $texturizer)
  {
    $this->texturizer = $texturizer;
  }

  public function displayAuthorDetails(Author $author)
  {
    return $this->texturizer->texturizeAuthor($author);
  }
}

class BlogPost
{
  public $title;
  public $content;
  public $author;

  public function __construct($title, $content, Author $author)
  {
    $this->title = $title;
    $this->content = $content;
    $this->author = $author;
  }

  // Method that suffers from Feature Envy
  public function getAuthorDetails()
  {
    $texturizer = new AuthorStringDisplayTexturizer();
    $authorDisplay = new AuthorDisplay($texturizer);
    return $authorDisplay->displayAuthorDetails($this->author);
  }
}