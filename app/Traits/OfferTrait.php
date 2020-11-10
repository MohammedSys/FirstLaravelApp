<?php

namespace App\Traits;

Trait OfferTrait {
    /*
     * Function Created to save Image
     * It's Separated with trait for general use
     * */
    function saveImage($photo, $folder){
        $file_extension = $photo -> getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $folder;
        $photo -> move($path,$file_name);
        return $file_name;
    }
}
