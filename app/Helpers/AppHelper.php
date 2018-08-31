<?php

function getItemAdminIcons($item,$itemType,$resource)
{
  $icons = '';

  if (isAdmin()){
    $icons .= "<a title='Editar Registro' class='btn btn-outline-primary btn-sm mr-1' href='".url($itemType.'/'.$item->id.'/edit')."'>
              <i class='fa fa-pencil'></i></a>";
    $icons .= "<a title='Deletar Registro' class='btn btn-outline-danger btn-sm delete-button' href='".url($itemType.'/'.$item->id).
                "' data-token='".csrf_token()."' data-resource='".$resource."' data-previous='".URL::previous()."'>
              <i class='fa fa-trash'></i></a>";
  } elseif (!$resource) {
    $icons .= "<a title='Ver Registro' class='btn btn-outline-success btn-sm' href='".url($itemType.'/'.$item->id)."'>
    <i class='fa fa-arrow-circle-right'></i></a>";
  }

  return trim($icons);
}

/*
 * get youtube video ID from URL
 *
 * @param string $url
 * @return string Youtube video id or FALSE if none found.
 */
 function getYoutubeId($url)
 {
   $pattern =
       '%^# Match any youtube URL
       (?:https?://)?  # Optional scheme. Either http or https
       (?:www\.)?      # Optional www subdomain
       (?:             # Group host alternatives
         youtu\.be/    # Either youtu.be,
       | youtube\.com  # or youtube.com
         (?:           # Group path alternatives
           /embed/     # Either /embed/
         | /v/         # or /v/
         | /watch\?v=  # or /watch\?v=
         )             # End path alternatives.
       )               # End host alternatives.
       ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
       $%x'
       ;
   $result = preg_match($pattern, $url, $matches);
   if ($result) {
       return $matches[1];
   }
   return false;
 }

function getYoutubeEmbedLink($url,$width=560,$height=420,$rel=False,$controls=True,$showinfo=False)
{
  $id = getYoutubeId($url);
  $embed = '';
  $options = Array();

  if (!$rel){
    $options[] = 'rel=0';
  }
  if (!$controls){
    $options[] = 'controls=0';
  }
  if (!$showinfo){
    $options[] = 'showinfo=0';
  }

  if ($id==False){
    return False;
  } else {
    $embed .= '<iframe width="'.$width.'" height="'.$height.'" ';
    $embed .= 'src="https://www.youtube.com/embed/'.$id;
    $embed .= '?'.implode('&amp;',$options).'"';
    $embed .= ' frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
    return $embed;
  }
}

function getStarIcon($level,$color="warning",$title="")
{
  if ($title==""){
      $title = "Classificação: ".round($level,1);
  }

  $stars = '';

  for ($i=1;$i<=5;$i++){
    if ($level>=$i){
      $stars .= '<i class="fa fa-star text-'.$color.'" title="'.$title.'"></i>';
    } elseif ($level<$i && $level>($i-1)){
      $stars .= '<i class="fa fa-star-half-empty text-'.$color.'" title="'.$title.'"></i>';
    } else {
      $stars .= '<i class="fa fa-star-o text-'.$color.'" title="'.$title.'"></i>';
    }
  }

  return '<span>'.$stars.'</span>';
}
