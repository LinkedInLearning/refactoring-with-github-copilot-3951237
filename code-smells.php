<?php

/**
 * Class Author
 * Represents an author with a name, email, and bio.
 */
class Author
{
  public $name;
  public $email;
  public $bio;

  /**
   * Author constructor.
   * @param string $name The name of the author.
   * @param string $email The email of the author.
   * @param string $bio The bio of the author.
   */
  public function __construct($name, $email, $bio)
  {
    $this->name = $name;
    $this->email = $email;
    $this->bio = $bio;
  }

  // Other author-related methods
}

/**
 * Interface AuthorDisplayTexturizerInterface
 * Defines a method to texturize author details.
 */
interface AuthorDisplayTexturizerInterface
{
  /**
   * Texturizes the details of an author.
   * @param Author $author The author whose details are to be texturized.
   * @return string The texturized author details.
   */
  public function texturizeAuthor(Author $author);
}

/**
 * Class AuthorStringDisplayTexturizer
 * Implements texturizing author details as a string.
 */
class AuthorStringDisplayTexturizer implements AuthorDisplayTexturizerInterface
{
  /**
   * Texturizes the details of an author.
   * @param Author $author The author whose details are to be texturized.
   * @return string The texturized author details.
   */
  public function texturizeAuthor(Author $author)
  {
    return "Author: " . $author->name . " (" . $author->email . ") - " . $author->bio;
  }
}

/**
 * Class AuthorDisplay
 * Displays author details using a texturizer.
 */
class AuthorDisplay
{
  private $texturizer;

  /**
   * AuthorDisplay constructor.
   * @param AuthorDisplayTexturizerInterface $texturizer The texturizer to use for displaying author details.
   */
  public function __construct(AuthorDisplayTexturizerInterface $texturizer)
  {
    $this->texturizer = $texturizer;
  }

  /**
   * Displays the details of an author.
   * @param Author $author The author whose details are to be displayed.
   * @return string The displayed author details.
   */
  public function displayAuthorDetails(Author $author)
  {
    return $this->texturizer->texturizeAuthor($author);
  }
}

/**
 * Class BlogPost
 * Represents a blog post with a title, content, and author.
 */
class BlogPost
{
  public $title;
  public $content;
  public $author;

  /**
   * BlogPost constructor.
   * @param string $title The title of the blog post.
   * @param string $content The content of the blog post.
   * @param Author $author The author of the blog post.
   */
  public function __construct($title, $content, Author $author)
  {
    $this->title = $title;
    $this->content = $content;
    $this->author = $author;
  }

  // Other blog post-related methods
}
