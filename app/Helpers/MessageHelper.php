<?php

function getMsgAccessForbidden()
{
  $data = [
    'success' => false,
    'msg' => 'O usuário não possui acesso a este recurso.',
  ];

  return $data;
}

function getMsgDeleteAccessForbidden()
{
  $data = [
    'success' => false,
    'msg' => 'O usuário não possui autorização para deletar este recurso.',
  ];

  return $data;
}

function getMsgDeleteException()
{
  $data = [
    'success' => false,
    'msg' => 'Ocorreu um erro de exceção ao tentar deletar o recurso.',
  ];

  return $data;
}

function getMsgDeleteError()
{
  $data = [
    'success' => false,
    'msg' => 'Ocorreu um erro ao deletar o recurso.',
  ];

  return $data;
}

function getMsgDeleteErrorVinculated($resource='')
{
  if ($resource!='')
  $resource = "\n\nRecurso vinculado: ".$resource."\n\n";

  $data = [
    'success' => false,
    'msg' => "Este recurso possui registros vinculados, por isso não pode ser deletado.".$resource,
  ];

  return $data;
}

function getMsgDeleteErrorLocked()
{
  $data = [
    'success' => false,
    'msg' => 'Este recurso está bloqueado, por isso não pode ser deletado.',
  ];

  return $data;
}

function getMsgDeleteSuccess()
{
  $data = [
    'success' => true,
    'msg' => 'O recurso foi deletado com sucesso.',
  ];

  return $data;
}

function getMsgAddSuccess()
{
  $data = [
    'success' => true,
    'msg' => 'O recurso foi incluído com sucesso.',
  ];

  return $data;
}

function getMsgAddError()
{
  $data = [
    'success' => false,
    'msg' => 'Ocorreu um erro ao incluir o recurso.',
  ];

  return $data;
}

function getMsgRemoveSuccess()
{
  $data = [
    'success' => true,
    'msg' => 'O recurso foi removido com sucesso.',
  ];

  return $data;
}

function getMsgRemoveError()
{
  $data = [
    'success' => false,
    'msg' => 'Ocorreu um erro ao remover o recurso.',
  ];

  return $data;
}
