<?php
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;


//Active route helper
function isActiveRoute(array $route){

    if(is_array($route)){
        foreach($route as $r){
            if(request()->routeIs($r)){
                return 'active';
            }
        }
    }
}

//Resize image helper
function resizeImageHelper(UploadedFile $imageFile,string $imagePath,int $width, int $height){
    $manager = new ImageManager(new Driver());
    $filename = time() . '.' . $imageFile->getClientOriginalExtension();
    $image = $manager->read($imageFile);
    $resizedImage = $image
        ->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })
        ->encode();
        Storage::disk('public')->put("images/$imagePath/$filename", $resizedImage);
    return "images/$imagePath/$filename";
}
