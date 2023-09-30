<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ZipArchive;

class UploadFileController extends Controller
{
     public function index()
     {
          return view('uploadarchive');
     }
     public function showUploadFile(Request $request)
     {
          try{       
           $request->validate([
               'file' => 'required|mimetypes:application/x-gzip|max:50000'
           ]);}
           catch(\Exception $error){
               error_log($error);
           }
          echo '<head><link rel="stylesheet" href="css/style.css"></head>';
          $file = $request->file('pebble_diag_dump');
          //Display File Name
          echo "File Name: {$file->getClientOriginalName()} </br>";
          //Display File Extension
          echo "File Extension: {$file->getClientOriginalExtension()} </br>";
          //Display File Real Path
          echo "File Real Path: {$file->getRealPath()} </br>";
          //Display File Size
          echo "File Size: {$file->getSize()} </br>";
          //Display File Mime Type
          echo "File Mime Type: {$file->getMimeType()} </br>";
          //Move Uploaded File
          $destinationPath = storage_path() . '/app/private/';
          $file = $file->move($destinationPath, $file->getClientOriginalName());

          // Todo: Delete files unrelated to pebble health
          if ($file->getMimeType() == 'application/zip') {
               echo "File is an archive </br>";
               echo "file is located at {$file->getPath()} </br>";
               echo "file info is {$file->getFileInfo()} </br>";
               echo "file pathinfo is {$file->getPathInfo()} </br>";
          } else {
               echo "File is not an archive </br>";
          }
          // decompress .gzip file and write it out to a folder named 'decompressed'

          $destinationPath = storage_path() . '/app/private/';
          $decompressedPath = $destinationPath . 'decompressed/';
          $zip = new ZipArchive;
          $res = $zip->open($file->getFileInfo());
          if ($res === TRUE) {
               $zip->extractTo($decompressedPath);
               $zip->close();
               echo 'file extraction complete';
          } else {
               echo 'file extraction failed';
          }
          echo '<br/><br/>';
          return view('graphing_options');
     }
}