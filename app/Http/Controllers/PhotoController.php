<?php

namespace App\Http\Controllers;

use App\Photo;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
   public function index()
   {
      return Inertia::render('Photo.vue',[
         'photos' => Photo::paginate(9)
      ]);
   }

   public function store(Request $request)
   {
      $request->validate([
         'title' => ['required', 'string', 'max:20'],
         'file' => ['required', 'image', 'max:2600'],
      ]);

      $upload_path = public_path('storage/photos');
      $file_name = time().$request->file->getClientOriginalName();
      $request->file->move($upload_path, $file_name);

      $photo = new Photo;
      $photo->title = $request->title;
      $photo->photo = $file_name;
      $photo->save();

      $photos =  Photo::paginate(9);
      return response()->json($photos, 200);
   }

   public function delete(Photo $photo)
   {
      Storage::disk('public')->delete('photos/'.$photo->photo);

      $photo->delete();
      url("/photo");
      $photos =  Photo::paginate(9);
      return response()->json($photos, 200);
   }
}
