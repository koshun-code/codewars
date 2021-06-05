<?php
/*
Given a string of words, you need to find the highest scoring word.

Each letter of a word scores points according to its position in the alphabet: a = 1, b = 2, c = 3 etc.

You need to return the highest scoring word as a string.

If two words score the same, return the word that appears earliest in the original string.

All letters will be lowercase and all inputs will be valid.
*/

function high($strig) {
    $words = explode(' ', $strig);
    return array_reduce($words, function($acc, $word){
          $count = iter($acc);
          if ($count < iter($word)) {
            $count = iter($word);
            $acc = $word;
          }
          return $acc;
    }, $words[0]);
}

function iter($word)
{
    if (strlen($word) === 0) {
      return ;
    }
    return ord(substr($word, 0, 1)) - 96 + iter(substr($word, 1));
}