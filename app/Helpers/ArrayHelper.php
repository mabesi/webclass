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

function createBreadcrumbs(Array $items)
{
  $totalItems = count($items);
  $links = "";
  $i = 0;

  foreach ($items as $text => $link){
    $i++;
    if ($i == $totalItems){
      $links .= '<li class="breadcrumb-item active">'.$text.'</li>';
    } else {
      $links .= '<li class="breadcrumb-item"><a href="'.url($link).'">'.$text.'</a></li>';
    }
  }

  return $links;
}

function getKeywordsLinks($keywords)
{
  $keywords = explode(',',$keywords);
  $links = "";

  foreach ($keywords as $keyword){
    $links .= '<a class="badge badge-light ml-1" href="'
            .url('course?title='.str_replace(' ','+',$keyword))
            .'">'.$keyword
            .'</a>';
  }
  return $links;
}
