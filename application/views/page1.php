<?php

if(!session_id()){
    session_start();
}


/*
 * Get access token using Facebook Graph API
 */
if(isset($_SESSION['facebook_access_token'])){
    // Get access token from session
    $access_token = $_SESSION['facebook_access_token'];
}else{
    // Facebook app id & app secret 
    $appId = '1259941061232317'; 
    $appSecret = '8ebcc7094e9b60b1285444cf09865698';
    

    // Generate access token
    $graphActLink = "https://graph.facebook.com/oauth/access_token?client_id={$appId}&client_secret={$appSecret}&grant_type=client_credentials";
    
    
    // Retrieve access token
    $accessTokenJson = file_get_contents($graphActLink);
    $accessTokenObj = json_decode($accessTokenJson);
    $access_token = $accessTokenObj->access_token;
    
    // Store access token in session
    $_SESSION['facebook_access_token'] = $access_token;
}

    // Get photo albums of Facebook page using Facebook Graph API
    $fields = "id,name,description,link,cover_photo,count";
    $fb_page_id = "449303188490386";
    $graphAlbLink = "https://graph.facebook.com/v2.9/{$fb_page_id}/albums?fields={$fields}&access_token={$access_token}";

    $jsonData = file_get_contents($graphAlbLink);
    $fbAlbumObj = json_decode($jsonData, true, 512, JSON_BIGINT_AS_STRING);

    // Facebook albums content
    $fbAlbumData = $fbAlbumObj['data'];



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
