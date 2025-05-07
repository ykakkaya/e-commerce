<?php
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

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
