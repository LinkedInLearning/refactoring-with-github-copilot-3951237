<?php

use PHPUnit\Framework\TestCase;

class Testable_Code_Test extends TestCase
{

  public function setUp(): void
  {
    require_once 'testable_code.php';
  }

  public function testAdd()
  {
    $this->assertEquals(7, add(5, 2));
  }

  public function testSubraction()
  {
    $this->assertEquals(3, sub(5, 2));
  }
}
