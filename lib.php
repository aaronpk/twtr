<?php

/**
 * Converts base 10 to base 60. 
 * http://tantek.pbworks.com/NewBase60
 * @param int $n
 * @return string
 */ 
function b10to60($n)
{
  $s = "";
  $m = "0123456789ABCDEFGHJKLMNPQRSTUVWXYZ_abcdefghijkmnopqrstuvwxyz";
  if ($n==0) 
    return 0; 

  while ($n>0) 
  {
    $d = bcmod($n, 60);
    $s = $m[$d] . $s;
    $n = bcdiv(bcsub($n,$d),60);
  }
  return $s;
}

/**
 * Converts base 60 to base 10, with error checking
 * http://tantek.pbworks.com/NewBase60
 * @param string $s
 * @return int
 */
function b60to10($s)
{
  $n = 0;
  for($i = 0; $i < strlen($s); $i++) // iterate from first to last char of $s
  {
    $c = ord($s[$i]); //  put current ASCII of char into $c  
    if ($c>=48 && $c<=57) { $c=bcsub($c,48); }
    else if ($c>=65 && $c<=72) { $c=bcsub($c,55); }
    else if ($c==73 || $c==108) { $c=1; } // typo capital I, lowercase l to 1
    else if ($c>=74 && $c<=78) { $c=bcsub($c,56); }
    else if ($c==79) { $c=0; } // error correct typo capital O to 0
    else if ($c>=80 && $c<=90) { $c=bcsub($c,57); }
    else if ($c==95) { $c=34; } // underscore
    else if ($c>=97 && $c<=107) { $c=bcsub($c,62); }
    else if ($c>=109 && $c<=122) { $c=bcsub($c,63); }
    else { $c = 0; } // treat all other noise as 0
    $n = bcadd(bcmul(60, $n), $c);
  }
  return $n;
}

function get($key, $default=NULL) {
  return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
}
