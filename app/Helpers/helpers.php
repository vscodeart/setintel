<?php

use TCG\Voyager\Facades\Voyager;

/**
 * @param $path
 * @return mixed
 */
function getImageUri($path)
{
    if (isset($path) && $path != '') {
        return Voyager::image($path);
    }
    return null;
}


/**
 * @param $path
 * @param string $attributeName
 * @param string $cropName
 * @return mixed
 */
function getImageUriCropped($path, string $attributeName = 'image_path', string $cropName = 'cropped'): mixed
{
    if (isset($path) && $path != '') {
        return Voyager::image($path->thumbnail($cropName, $attributeName));
    }
    return null;
}


/**
 * @param $path
 * @return mixed
 */
function getVideoUri($path)
{
    if (isset($path) && $path != '') {

        if (isset((json_decode($path))[0])){
            $file = (json_decode($path))[0]->download_link;
            return Voyager::image($file);
        }else{
            return null;
        }

    }
    return null;


}

/**
 * @return string
 */
function generateInvoiceCode(){
    return sha1(time());
}

