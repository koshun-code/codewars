<?php
namespace CodeWars\CodeWars;
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
/**
 * binary search
 */
function binarySearch($list, $item)
{
    $low = 0;
    $hight = count($list) - 1;
    while ($low <= $hight) {
      $middle = floor(($low + $hight) / 2);
      $guess = $list[$middle];
      if ($guess === $item) {
        return $middle;
      }
      if ($guess > $item) {
        $hight = $middle - 1;
      }
      if ($guess < $item) {
        $low = $middle + 1;
      }
    }
    return null;
}
/*The goal of this exercise is to convert a string to a new string where each character in the new string is "(" if that character appears only once in the original string, or ")" if that character appears more than once in the original string. Ignore capitalization when determining if a character is a duplicate.

Examples
"din"      =>  "((("
"recede"   =>  "()()()"
"Success"  =>  ")())())"
"(( @"     =>  "))(("
Notes

Assertion messages may be unclear about what they display in some languages. If you read "...It Should encode XXX", the "XXX" is the expected result, not the input!
*/
function duplicateEncode($word)
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

/*
Count the number of Duplicates
Write a function that will return the count of distinct case-insensitive alphabetic characters and numeric digits that occur more than once in the input string. The input string can be assumed to contain only alphabets (both uppercase and lowercase) and numeric digits.

Example
"abcde" -> 0 # no characters repeats more than once
"aabbcde" -> 2 # 'a' and 'b'
"aabBcde" -> 2 # 'a' occurs twice and 'b' twice (`b` and `B`)
"indivisibility" -> 1 # 'i' occurs six times
"Indivisibilities" -> 2 # 'i' occurs seven times and 's' occurs twice
"aA11" -> 2 # 'a' and '1'
"ABBA" -> 2 # 'A' and 'B' each occur twice
 */
function duplicateCount($text)
{
   $chars = str_split(strtolower($text));
   $res = 0;
   $count = array_count_values($chars);
   foreach ($count as $item) {
      $res += $item > 1 ? 1 : 0;
   }
    return $res;
}
/*
Well met with Fibonacci bigger brother, AKA Tribonacci.

As the name may already reveal, it works basically like a Fibonacci, but summing the last 3 (instead of 2) numbers of the sequence to generate the next. And, worse part of it, regrettably I won't get to hear non-native Italian speakers trying to pronounce it :(

So, if we are to start our Tribonacci sequence with [1, 1, 1] as a starting input (AKA signature), we have this sequence:

[1, 1 ,1, 3, 5, 9, 17, 31, ...]
But what if we started with [0, 0, 1] as a signature? As starting with [0, 1] instead of [1, 1] basically shifts the common Fibonacci sequence by once place, you may be tempted to think that we would get the same sequence shifted by 2 places, but that is not the case and we would get:

[0, 0, 1, 1, 2, 4, 7, 13, 24, ...]
Well, you may have guessed it by now, but to be clear: you need to create a fibonacci function that given a signature array/list, returns the first n elements - signature included of the so seeded sequence.

Signature will always contain 3 numbers; n will always be a non-negative number; if n == 0, then return an empty array (except in C return NULL) and be ready for anything else which is not clearly specified ;)

If you enjoyed this kata more advanced and generalized version of it can be found in the Xbonacci kata
 */
function tribonachi($signature, $n)
{
    $res = [];
    for ($i = 0; $i < $n; $i += 1) {
        if ($i < 3) {
          $res[$i] = $signature[$i];
        } else {
          $res[$i] = $res[$i - 1] + $res[$i - 2] + $res[$i - 3];
        }
    }
    return $res;
}

/*
The marketing team is spending way too much time typing in hashtags.
Let's help them with our own Hashtag Generator!

Here's the deal:

It must start with a hashtag (#).
All words must have their first letter capitalized.
If the final result is longer than 140 chars it must return false.
If the input or the result is an empty string it must return false.
Examples
" Hello there thanks for trying my Kata"  =>  "#HelloThereThanksForTryingMyKata"
"    Hello     World   "                  =>  "#HelloWorld"
""                                        =>  false
 */
function generateHashtag($str)
{
  $str = trim($str);
  $words = explode(" ", $str);
  $upperWords = array_map(function($word){
      return ucfirst($word);
  }, $words);
  $newString = implode('',$upperWords);
  if ($newString === '' || strlen($newString) >= 140) {
    return false;
  }
  return "#{$newString}";
}
