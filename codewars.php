<?php
namespace CodeWars;
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
/*
Write a function that takes in a string of one or more words, and returns the same string, but with all five or more letter words reversed (like the name of this kata).

Strings passed in will consist of only letters and spaces.
Spaces will be included only when more than one word is present.
*/
function spinWords(string $str): string {
    $words = explode(' ', $str);
    foreach ($words as &$word) {
        if (strlen($word) > 4) {
            $word = strrev($word);
        }
    }
    return implode(' ', $words);
}

function duplicate_encode($word)
{
   $res = '';
   $word = strtolower($word);
   $chars = str_split($word);
   $count =  array_count_values($chars);
   foreach ($chars as $char) {
      $res .= $count[$char] === 1 ? '(' : ')';
   }
   return $res;
}

//echo duplicate_encode('receve');
