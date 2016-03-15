<?php
http://www.catswhocode.com/blog/15-php-regular-expressions-for-web-developers

//MATCHING A XML/HTML TAG
//This simple function takes two arguments: The first is the tag you’d like to match, 
//and the second is the variable containing the XML or HTML. Once again, this can be very powerful used along with cURL.

function get_tag( $tag, $xml ) {
  $tag = preg_quote($tag);
  preg_match_all('{<'.$tag.'[^>]*>(.*?)</'.$tag.">.'}",
                   $xml,
                   $matches,
                   PREG_PATTERN_ORDER);

  return $matches[1];
}


//MATCHING AN XHTML/XML TAG WITH A CERTAIN ATTRIBUTE VALUE
//This function is very similar to the previous one, but it allow you to match a tag having a specific attribute. 
//For example, you could easily match <div id=”header”>.

function get_tag( $attr, $value, $xml, $tag=null ) {
  if( is_null($tag) )
    $tag = '\w+';
  else
    $tag = preg_quote($tag);

  $attr = preg_quote($attr);
  $value = preg_quote($value);

  $tag_regex = "/<(".$tag.")[^>]*$attr\s*=\s*".
                "(['\"])$value\\2[^>]*>(.*?)<\/\\1>/"

  preg_match_all($tag_regex,
                 $xml,
                 $matches,
                 PREG_PATTERN_ORDER);

  return $matches[3];
}

?>