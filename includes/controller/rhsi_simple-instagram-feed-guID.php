<?php
if (!defined('ABSPATH')) exit;

function rhsif_get_instagram_user_ID($rhsif_username)
{

    $rhsif_username = strtolower($rhsif_username);
    $rhsif_token = "708865002.3a81a9f.105a780748714934b5c98b7695411664";
    $rhsif_url = "https://api.instagram.com/v1/users/search?q=".$rhsif_username."&access_token=".$rhsif_token;
    $rhsif_get = file_get_contents($rhsif_url);
    $rhsif_json = json_decode($rhsif_get);

    foreach($rhsif_json->data as $rhsif_user)
    {
        if($rhsif_user->username == $rhsif_username)
        {
            return $rhsif_user->id;
        }
    }

    return '00000000';
}
?>