<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Image;

 
 
class ImageFileController extends Controller
{
 
    public function index()
    {
        return view('my-images');
    }
  
    public function imageFileUpload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:4096',
            'text'=> 'required',
        ]);
 
        $image = $request->file('file');
        $custom_text = $request->text;//here is custom text
        
        $input['file'] = time().'.'.$image->getClientOriginalExtension();
 
        $imgFile = Image::make($image->getRealPath());
        
         
$temp = $imgFile->resize(500,500, function ($constraint){
            $constraint->aspectRatio();
        }); 
        $temp->text($custom_text, 300, 400, function($font) { 
           
          $font->file(public_path("OrelegaOne-Regular.ttf")); 
          $font->size(45);  
          $font->color('#ffffff');  
          $font->align('center');  
          $font->valign('center');  
          $font->angle(30); 
           $font->color(array(255, 255, 255, 0.3));
           // transparent
        
        })->save(public_path('/upload').'/'.$input['file']); 
                 
 
        return back()
            ->with('success','File successfully WaterMarked!!.')
            ->with('fileName',$input['file']);         
    }
}