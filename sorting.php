<?php

function orderUsersByPurchases($users)
{
  // Initialize a temporary array for storing users and purchases
  $temp = [];

  // Extract total purchases into a separate array for manual sorting
  foreach ($users as $user) {
    $temp[] = $user['totalPurchases'];
  }

  // Sort the purchases array manually using a bubble sort algorithm
  $n = count($temp);
  for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $n - $i - 1; $j++) {
      if ($temp[$j] < $temp[$j + 1]) {
        // Swap values
        $tempValue = $temp[$j];
        $temp[$j] = $temp[$j + 1];
        $temp[$j + 1] = $tempValue;
      }
    }
  }

  // Create a new sorted array of users based on the sorted purchases array
  $sortedUsers = [];
  foreach ($temp as $purchase) {
    foreach ($users as $key => $user) {
      if ($user['totalPurchases'] === $purchase) {
        $sortedUsers[] = $user;
        // Remove the matched user to prevent duplicates
        unset($users[$key]);
        break;
      }
    }
  }

  return $sortedUsers;
}

function orderUsersByPurchases($users)
{
  // Sort the users array by total purchases in descending order
  usort($users, function ($a, $b) {
    return $b['totalPurchases'] <=> $a['totalPurchases'];
  });

  return $users;
}