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
