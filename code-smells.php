<?php

class Checkout
{
  public function calculateTotal($cartItems)
  {
    $total = 0;
    foreach ($cartItems as $item) {
      $priceWithTax = $item['price'] + ($item['price'] * 0.1); // Tax applied here
      $total += $priceWithTax * $item['quantity'];
    }
    return $total;
  }
}

class Invoice
{
  public function generateInvoice($order)
  {
    $subtotal = 0;
    foreach ($order->items as $item) {
      $subtotal += $item->price * $item->quantity;
    }
    $tax = $subtotal * 0.1; // Same tax logic applied here
    return $subtotal + $tax;
  }
}

class Report
{
  public function generateSalesReport($orders)
  {
    $totalSales = 0;
    foreach ($orders as $order) {
      $total = 0;
      foreach ($order->items as $item) {
        $priceWithTax = $item->price + ($item->price * 0.1); // Again, tax logic here
        $total += $priceWithTax * $item->quantity;
      }
      $totalSales += $total;
    }
    return $totalSales;
  }
}

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
    // BlogPost is too interested in Author's properties
    return "Author: " . $this->author->name . " (" . $this->author->email . ") - " . $this->author->bio;
  }
}