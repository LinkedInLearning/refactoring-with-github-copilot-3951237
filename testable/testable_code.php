<?php

// function to add 2 numbers
function add($a, $b)
{
  return $a + $b;
}

echo add(5, 2); // 7

function alphabetize_by_last_name(array $names)
{
  usort($names, function ($a, $b) {
    $a = explode(' ', $a);
    $b = explode(' ', $b);
    return strcasecmp(end($a), end($b));
  });
  return $names;
}

// validate email address 
function validate_email($email)
{
  // regex validate email address
  return preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email);
}

function slugify($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);
  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);
  // trim
  $text = trim($text, '-');
  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);
  // lowercase
  $text = strtolower($text);
  if (empty($text)) {
    return 'n-a';
  }
  return $text;
}
