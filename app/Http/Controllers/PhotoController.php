<?php

namespace App\Http\Controllers;

use App\Photo;
use Inertia\Inertia;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
   public function index()
   {
      return Inertia::render('Photo.vue',[
         'photos' => Photo::all()
      ]);
   }

   public function store(Request $request)
   {
      $request->validate([
         'title' => ['required', 'string', 'max:20'],
         'file' => ['required', 'image', 'max:2600'],
      ]);

      $upload_path = public_path('storage/photos');
      $file_name = $request->file->getClientOriginalName();
      $request->file->move($upload_path, $file_name);

      $photo = new Photo;
      $photo->title = $request->title;
      $photo->photo = $request->file->getClientOriginalName();
      $photo->save();

      $photos =  Photo::all();
      return response()->json($photos, 200);
   }
}
