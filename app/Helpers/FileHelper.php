<?php

use Illuminate\Support\Facades\Storage;

function saveFile($request,$fieldName,$dir,$fileName,$oldName=Null,$default=Null)
{
  if ($request->hasFile($fieldName)){

    if ($request->file($fieldName)->isValid()) {

      $file = $request->file($fieldName);
      $fileName = strtolower($fileName.'.'.$file->getClientOriginalExtension());
      $pathImage = $file->storeAs($dir, $imageName, 'public');

      if ($oldName != Null){
        $oldPath = $dir.'/'.$oldName;
        $defaultPath = $dir.'/'.$default;
        if ($pathImage != $oldPath && $oldPath != $defaultPath){
          Storage::disk('public')->delete($oldPath);
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

function deleteAvatar($avatar)
{
  deleteFile('avatar/'.$avatar);
}

function deleteFile($file)
{
  Storage::disk('public')->delete($file);
}

function deleteDir($dir)
{
  Storage::disk('public')->deleteDirectory($dir);
}
