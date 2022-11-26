<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




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
    $graphActLink = 'EAAJQjOl9CncBAOgUpdHrVYo1tEbJZCa1dG1EvrE7ZAuupImYzqTrd7RYolCpLlc1ZC9u1kZATrldkIWKxF7WBcJhZAKCIVaZCJC2ZAPjAR4hgnZC53brXgYsvoNaOjr0xOx3uA4te2sK4GcJeL0jfMsD6Ey4cDZBeVuMWljl5UN0AOPjccQlU3KUzQBQUoXpQ0uG0j2ddhCqnvCkcgy3GFQlyVZAt7wOr2kfAUsTFHeZBIbuWEXbtLZBVwYmK4HmwsgZBq4oZD';
    
    
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
    $graphAlbLink = "https://graph.facebook.com/v15.0/me?fields=id%2Cname&access_token=EAAJQjOl9CncBAK9QWkndbg2g3cB55qUytpXiOYEor23TXAid0zUxlDhWuQz6CsOSkoH0iVRtV5nFkOf7BsGZCFI3DnZBLWng71nDENvfM3ZB6KvNZBK30ya4MXLul0bPnJGvDzXHLGf5yDZAD6DwBrm8WJQllU0zuPZCIiRB6VRATh6466CiHo3SIHHO3RyDrp5lLElHTpTa6cKSbgTrMBdFsSq9vOCpuHJcka7kv3MlaDq1HWtsuQhavPk33bTzYZD";
    
    

    $jsonData = file_get_contents($graphAlbLink);
    $fbAlbumObj = json_decode($jsonData, true, 512, JSON_BIGINT_AS_STRING);

    // Facebook albums content
    $fbAlbumData = $fbAlbumObj['data'];


    






