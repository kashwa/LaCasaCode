<?php

namespace App\Helper;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

trait UploaderHelper {
    public function upload($imageFromRequest, $imageFolder)
    {
        $photoOrigin=$imageFromRequest->getClientOriginalName();
        $stripped = str_replace(' ', '', $photoOrigin);


        if (!file_exists(public_path('uploads/'.$imageFolder)))
            mkdir(public_path('uploads/'.$imageFolder), 0777, true);


        $fileName = time() . $stripped;
        $location = public_path('uploads/' . $imageFolder . '/' . $fileName);


        $image = Image::make($imageFromRequest);
        $image->save($location, 70);

        return $fileName;
    }
}
