<?php

function getItemAdminIcons($item,$itemType,$resource)
{
  $icons = '';

  if (isAdmin() || $item->user_id == getUserId()){

    $icons .= "<a title='Editar Registro' class='btn btn-outline-primary btn-sm' href='".url($itemType.'/'.$item->id.'/edit')."'>
              <i class='fa fa-pencil'></i></a>".nbsp(1);

    $icons .= "<a title='Deletar Registro' class='btn btn-outline-danger btn-sm delete-button' href='".url($itemType.'/'.$item->id).
                "' data-token='".csrf_token()."' data-resource='".$resource."' data-previous='".URL::previous()."'>
              <i class='fa fa-trash'></i></a>";
  }

  return trim($icons);
}

function getCategories($id=Null)
{
  $categories = [
    "Administração",
    "Áudio e Vídeo",
    "Contabilidade",
    "Design Gráfico",
    "Direito",
    "Gestão",
    "Idiomas",
    "Informática",
    "Marketing",
    "Motivação",
    "Negócios",
    "Psicologia",
    "Relações Humanas",
    "Segurança",
    "Turismo e Hotelaria",
    "Outros"
  ];

  if ($id==Null){
    return $categories;
  } else {
    return $categories[$id];
  }
}
