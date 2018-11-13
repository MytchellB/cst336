<?php
    function convertToPigLatin($word){
        $first = substr($word, 0, 1); // First letter of word, second half of pig latin word.
        $second = substr($word, 1, strlen($word)); // Second part of word, first half of pig latin word.
        $word = $second.$first."ay";
        // echo ucwords($word)."<br>";
        return ucwords($word);
    }
    
    function reverseWord($word){
        return strrev($word);
    }
    
    function removeVowels($word){
        $vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
        $word = str_replace($vowels, "", $word);
        return ucwords($word);
    }
?>