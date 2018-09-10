<?php

use Illuminate\Support\Facades\Storage;

function saveFile($request,$fieldName,$dir,$fileName=Null,$oldName=Null)
{
  if ($request->hasFile($fieldName)){

    if ($request->file($fieldName)->isValid()) {

      $file = $request->file($fieldName);

      if ($fileName!=Null){
        $fileName = strtolower($fileName.'.'.$file->getClientOriginalExtension());
      } else {
        $fileName = snake_case(strtolower(time().'_$_$_'.$file->getClientOriginalName()));
      }

      $pathFile = $file->storeAs($dir, $fileName, 'local');

      if ($oldName != Null){
        $oldPath = $dir.'/'.$oldName;
        if ($pathFile != $oldPath){
          Storage::disk('local')->delete($oldPath);
        }
      }
      return $fileName;
    }
  }

  return false;
}

function saveImage($request,$fieldName,$dir,$imageName,$oldName=Null,$default=Null)
{
  if ($request->hasFile($fieldName)){

    if ($request->file($fieldName)->isValid()) {

      $image = $request->file($fieldName);
      $imageName = strtolower($imageName.'.'.$image->getClientOriginalExtension());
      $pathImage = $image->storeAs($dir, $imageName, 'public');

      if ($oldName != Null){
        $oldPath = $dir.'/'.$oldName;
        $defaultPath = $dir.'/'.$default;
        if ($pathImage != $oldPath && $oldPath != $defaultPath){
          Storage::disk('public')->delete($oldPath);
        }
      }
      return $imageName;
    }
  }
  return false;
}

function fileExists($file)
{
  return Storage::disk('local')->exists($file);
}

function deleteAvatar($avatar)
{
  deleteFile('avatar/'.$avatar);
}

function deletePublicFile($file)
{
  Storage::disk('public')->delete($file);
}

function deleteLocalFile($file)
{
  Storage::disk('local')->delete($file);
}

function downloadLocalFile($file,$name=Null,$headers=Array())
{
  if ($name==Null){
    $name = getDownloadName($file);
  }
  return Storage::disk('local')->download($file,$name,$headers);
}

function getDownloadName($file)
{
  $name = $file;

  if (strpos($file,'/')!==false){
    $nameArray = explode('/',$file);
    $name = end($nameArray);
  }

  if (strpos($name,'_$_$_')!==false){
    $nameArray = explode('_$_$_',$name);
    $name = end($nameArray);
  }

  return $name;
}

function deletePublicDir($dir)
{
  Storage::disk('public')->deleteDirectory($dir);
}

function deleteLocalDir($dir)
{
  Storage::disk('local')->deleteDirectory($dir);
}

function getExtension($fileName)
{
  return end(explode(".",$fileName));
}

function getFileIcon($fileName,$color=Null,$size=Null)
{
  $arrayName = explode(".",$fileName);
  $reverse = array_reverse($arrayName);
  $extension = $reverse[0];
  $icon = "";

  switch ($extension) {
    case 'zip':
    case 'rar':
      $icon = "file-zip-o";
      if ($color==Null){
        $icon .= " text-dark";
      }else{
        $icon .= " text-$color";
      }
      break;
    case 'doc':
    case 'odt':
      $icon = "file-word-o";
      if ($color==Null){
        $icon .= " text-info";
      }else{
        $icon .= " text-$color";
      }
      break;
    case 'xls':
    case 'xlsx':
    case 'ods':
      $icon = "file-excel-o";
      if ($color==Null){
        $icon .= " text-success";
      }else{
        $icon .= " text-$color";
      }
      break;
    case 'ppt':
    case 'pptx':
    case 'odp':
      $icon = "file-powerpoint-o";
      if ($color==Null){
        $icon .= " text-warning";
      }else{
        $icon .= " text-$color";
      }
      break;
    case 'jpg':
    case 'jpeg':
    case 'png':
    case 'bmp':
      $icon = "file-image-o";
      if ($color==Null){
        $icon .= " text-warning";
      }else{
        $icon .= " text-$color";
      }
      break;
    case 'pdf':
      $icon = "file-pdf-o";
      if ($color==Null){
        $icon .= " text-danger";
      }else{
        $icon .= " text-$color";
      }
      break;

    default:
      $icon = "file text-secondary";
      break;
  }

  if ($size!=Null){
    $icon .= " font-$size";
  }

  return "<i class='fa fa-$icon'></i>";
}
