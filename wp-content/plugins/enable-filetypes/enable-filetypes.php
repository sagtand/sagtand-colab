<?php
/*
Plugin Name: Enable Filetypes
Description: Upload files like .psd, 
*/

function ef_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    $mime_types['psd'] = 'image/vnd.adobe.photoshop'; //Adding photoshop files
    $mime_types['adg'] = 'application/ableton'; //Adding ableton file type
    $mime_types['agr'] = 'application/ableton'; //Adding ableton file type
    $mime_types['adv'] = 'application/ableton'; //Adding ableton file type
    $mime_types['alc'] = 'application/ableton'; //Adding ableton file type
    $mime_types['als'] = 'application/ableton'; //Adding ableton file type
    $mime_types['alp'] = 'application/ableton'; //Adding ableton file type
    $mime_types['ams'] = 'application/ableton'; //Adding ableton file type
    $mime_types['amxd'] = 'application/ableton'; //Adding ableton file type
    $mime_types['asd'] = 'application/ableton'; //Adding ableton file type
    $mime_types['ask'] = 'application/ableton'; //Adding ableton file type
    return $mime_types;
}
add_filter('upload_mimes', 'ef_myme_types', 1, 1);

?>
