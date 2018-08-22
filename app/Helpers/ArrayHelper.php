<?php

function getQueryLink(Array $items)
{
  $link = Array();

  foreach($items as $key => $value){
    if ($value!=Null){
      $link[] .= $key.'='.$value;
    }
  }

  $queryLink = implode('&',$link);
  $queryLink = str_replace(" ","+",$queryLink);

  return $queryLink;
}
