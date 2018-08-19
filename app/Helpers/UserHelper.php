<?php

use Illuminate\Support\Facades\Auth;
use App\User;

function dpln($var)
{
  if (isAdmin()){
    dd($var);
  }
}

function isAdmin($user=Null)
{
  if($user==Null){
    $user = getUser();
  }
  if ($user->type=='A'){
    return True;
  } else {
    return False;
  }
}

function isNotAdmin($user=Null)
{
  if($user==Null){
    $user = getUser();
  }
  if ($user->type=='U'){
    return True;
  } else {
    return False;
  }
}

function getUser($id=Null)
{
  if ($id==Null){
    return Auth::user();
  } else {
    return User::find($id);
  }
}

function getUserId()
{
  return Auth::id();
}

function getUserName()
{
  if (Auth::check()){
    return Auth::user()->name;
  } else {
    return '';
  }
}

function getUserEmail()
{
  if (Auth::check()){
    return Auth::user()->email;
  } else {
    return '';
  }
}
