<?php
    defined('DIR') OR exit;
    
    if(!session_id()) {
        session_start();
    }

    $data = json_decode(file_get_contents('php://input'), true);

    $out = array(
        "Error" => array(
            "Code"=>1, 
            "Text"=>l("error"),
            "gErrorRedLine"=>array("popupbox"),
            "Details"=>""
        ),
        "Success"=>array(
            "Code"=>0, 
            "Text"=>"",
            "Details"=>""
        )
    ); 

    if(isset($data["type"]))
    {
        $type = $data["type"];

        switch ($type) {
            case 'recover-password-final':
                if( 
                    empty($data["g_email"]) || 
                    empty($data["g_newpass"]) || 
                    empty($data["g_code"]) 
                ){
                    if(empty($data["g_newpass"])){
                        $gErrorRedLine["g_newpass"] = l("allfields");
                    }

                    if(empty($data["g_code"])){
                        $gErrorRedLine["g_code"] = l("allfields");
                    }
                    
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("allfields");
                    $successText = "";                
                    $countCartitem = 0;                
                }else if(strlen($data["g_newpass"])<=5) {
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("passwordlengtherror");
                    $successText = "";                
                    $countCartitem = 0;
                    $gErrorRedLine["g_newpass"] = l("passwordlengtherror");
                }else{
                    $check = "SELECT `id` FROM `site_users` WHERE `recovery`='".$data["g_code"]."'";
                    $fetch = db_fetch($check);
                    if($fetch){
                        $update = "UPDATE `site_users` SET `recovery`='', `password`='".md5($data["g_newpass"])."' WHERE `recovery`='".$data["g_code"]."'";
                        db_query($update);

                        $errorCode = 0;
                        $successCode = 1;
                        $errorText = "";
                        $gErrorRedLine = "";
                        $successText = l("welldone");                
                        $countCartitem = 0; 
                    }else{
                        $errorCode = 1;
                        $successCode = 0;
                        $errorText = l("codewrong");
                        $successText = "";                
                        $countCartitem = 0;
                        $gErrorRedLine["g_code"] = l("codewrong");
                    }
                }

                $out = array(
                    "Error" => array(
                        "Code"=>$errorCode, 
                        "Text"=>$errorText,
                        "gErrorRedLine"=>$gErrorRedLine,
                        "Details"=>""
                    ),
                    "Success"=>array(
                        "Code"=>$successCode, 
                        "Text"=>$successText,
                        "Details"=>""
                    )
                );
                break;
            case 'recover-password':
                if( 
                    empty($data["g_email"]) 
                ){
                    if(empty($data["g_email"])){
                        $gErrorRedLine["g_email"] = l("allfields");
                    }
                    
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("allfields");
                    $successText = "";                
                    $countCartitem = 0;                
                }else if(!filter_var($data["g_email"], FILTER_VALIDATE_EMAIL)) {
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("emailformaterror");
                    $successText = "";                
                    $countCartitem = 0;
                    $gErrorRedLine["g_email"] = l("emailformaterror");
                }else if(!g_user_exists($data["g_email"])){
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("useremailnotexists");
                    $successText = "";                
                    $countCartitem = 0;
                    $gErrorRedLine["g_email"] = l("useremailnotexists");
                }else{
                    //send email && insert into db
                    $uniqid = uniqid().time();
                    $update = "UPDATE `site_users` SET `recovery`='".$uniqid."' WHERE `email`='".$data["g_email"]."'";
                    db_query($update);

                    $body = sprintf(l("recoverytext"), $uniqid);

                    g_send_email(array(
                        "sendTo"=>$data["g_email"],
                        "subject"=>l("updatepassword"),
                        "body"=>$body
                    ));

                    $errorCode = 0;
                    $successCode = 1;
                    $errorText = "";
                    $gErrorRedLine = "";
                    $successText = l("welldone");                
                    $countCartitem = 0; 
                }

                $out = array(
                    "Error" => array(
                        "Code"=>$errorCode, 
                        "Text"=>$errorText,
                        "gErrorRedLine"=>$gErrorRedLine,
                        "Details"=>""
                    ),
                    "Success"=>array(
                        "Code"=>$successCode, 
                        "Text"=>$successText,
                        "Details"=>""
                    )
                );
                break;
            case 'update-profile-password':
                if( 
                    empty($data["g_old_password"]) || 
                    empty($data["g_password"]) || 
                    empty($data["g_comfirmpassword"]) 
                ){
                    if(empty($data["g_old_password"])){
                        $gErrorRedLine["g_old_password"] = l("allfields");
                    }

                    if(empty($data["g_password"])){
                        $gErrorRedLine["g_password"] = l("allfields");
                    }

                    if(empty($data["g_comfirmpassword"])){
                        $gErrorRedLine["g_comfirmpassword"] = l("allfields");
                    }
                    
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("allfields");
                    $successText = "";                
                    $countCartitem = 0;                
                }else if(strlen($data["g_password"])<=5) {
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("passwordlengtherror");
                    $successText = "";                
                    $countCartitem = 0;
                    $gErrorRedLine["g_password"] = l("passwordlengtherror");
                }else if($data["g_password"]!==$data["g_comfirmpassword"]){
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("passmatch");
                    $successText = "";                
                    $countCartitem = 0;
                    $gErrorRedLine["g_password"] = l("passmatch");
                    $gErrorRedLine["g_comfirmpassword"] = l("passmatch");
                }else{
                    $user = "";
                    if(isset($_COOKIE['user'])){
                        $user = $_COOKIE['user'];
                    }

                    if(isset($_SESSION["g_username"])){
                        $user = $_SESSION["g_username"];
                    }

                    if(!g_user_exists($user, $data["g_old_password"])){
                        $errorCode = 1;
                        $successCode = 0;
                        $errorText = l("oldpassworderror");
                        $successText = "";                
                        $countCartitem = 0;
                        $gErrorRedLine["g_old_password"] = l("oldpassworderror");
                    }else{
                        $updatePassword = "UPDATE `site_users` SET `password`='".md5(strip_quotes($data["g_password"]))."' WHERE `email`='".$user."'";
                        db_query($updatePassword);

                        $errorCode = 0;
                        $successCode = 1;
                        $errorText = "";
                        $gErrorRedLine = "";
                        $successText = l("welldone");                
                        $countCartitem = 0; 
                    }                    
                }

                $out = array(
                    "Error" => array(
                        "Code"=>$errorCode, 
                        "Text"=>$errorText,
                        "gErrorRedLine"=>$gErrorRedLine,
                        "Details"=>""
                    ),
                    "Success"=>array(
                        "Code"=>$successCode, 
                        "Text"=>$successText,
                        "Details"=>""
                    )
                );
                break;
            case 'update-profile':
                if (
                    isset($_COOKIE['user']) || isset($_SESSION["g_username"])
                ){
                    if(
                        empty($data["g_firstname"]) ||  
                        empty($data["g_lastname"]) || 
                        empty($data["g_birthday"]) || 
                        empty($data["g_personalnumber"]) || 
                        empty($data["g_address"]) || 
                        empty($data["g_phone"]) || 
                        empty($data["g_workplace"]) || 
                        empty($data["g_position"]) 
                    ){
                        if(empty($data["g_firstname"])){
                            $gErrorRedLine["g_firstname"] = l("allfields");
                        }

                        if(empty($data["g_lastname"])){
                            $gErrorRedLine["g_lastname"] = l("allfields");
                        }

                        if(empty($data["g_birthday"])){
                            $gErrorRedLine["g_birthday"] = l("allfields");
                        }

                        if(empty($data["g_personalnumber"])){
                            $gErrorRedLine["g_personalnumber"] = l("allfields");
                        }

                        if(empty($data["g_address"])){
                            $gErrorRedLine["g_address"] = l("allfields");
                        }

                        if(empty($data["g_phone"])){
                            $gErrorRedLine["g_phone"] = l("allfields");
                        }

                        if(empty($data["g_workplace"])){
                            $gErrorRedLine["g_workplace"] = l("allfields");
                        }

                        if(empty($data["g_position"])){
                            $gErrorRedLine["g_position"] = l("allfields");
                        }
                        
                        $errorCode = 1;
                        $successCode = 0;
                        $errorText = l("allfields");
                        $successText = "";                
                        $countCartitem = 0;                
                    }else if(preg_match("/^[0-1][0-9]-[0-3][0-9]-[0-9]{4}$/",$data["g_birthday"])!=1){
                        $errorCode = 1;
                        $successCode = 0;
                        $errorText = l("dateformaterror");
                        $successText = "";                
                        $countCartitem = 0;
                        $gErrorRedLine["g_birthday"] = l("dateformaterror");
                    }else if($data["CSRF_token"]!==$_SESSION["CSRF_token"]){
                        $errorCode = 1;
                        $successCode = 0;
                        $errorText = l("error")." CSRF";
                        $successText = "";                
                        $countCartitem = 0;
                    }else{
                        $user = "";
                        if(isset($_COOKIE['user'])){
                            $user = $_COOKIE['user'];
                        }

                        if(isset($_SESSION["g_username"])){
                            $user = $_SESSION["g_username"];
                        }
                        // update profile
                        $update = "UPDATE `site_users` SET                     
                        `firstname`='".strip_quotes($data["g_firstname"])."',
                        `lastname`='".strip_quotes($data["g_lastname"])."',
                        `birthday`='".strip_quotes($data["g_birthday"])."',
                        `pn`='".strip_quotes($data["g_personalnumber"])."',
                        `address`='".strip_quotes($data["g_address"])."',
                        `phone`='".strip_quotes($data["g_phone"])."',
                        `workplace`='".strip_quotes($data["g_workplace"])."',
                        `position`='".strip_quotes($data["g_position"])."'
                        WHERE 
                        `email`='".$user."'
                        ";
                        db_query($update);

                        $selectUserData = "SELECT * FROM `site_users` WHERE `email`='".$user."'";
                        $fetchData = db_fetch($selectUserData);

                        if(isset($_COOKIE['user_info'])){
                            $cookie_name = "user_info";
                            setcookie($cookie_name, implode("@@",$fetchData), time() + (86400 * 30), "/");
                        }
                        $_SESSION["g_user_info"] = $fetchData;


                        $errorCode = 0;
                        $successCode = 1;
                        $errorText = "";
                        $gErrorRedLine = "";
                        $successText = l("welldone");                
                        $countCartitem = 0; 
                    }

                    $out = array(
                        "Error" => array(
                            "Code"=>$errorCode, 
                            "Text"=>$errorText,
                            "gErrorRedLine"=>$gErrorRedLine,
                            "Details"=>""
                        ),
                        "Success"=>array(
                            "Code"=>$successCode, 
                            "Text"=>$successText,
                            "Details"=>""
                        )
                    );
                }
                break;
            case 'signout':
                session_destroy();

                if (isset($_COOKIE['user']) && isset($_COOKIE['user_info'])) {
                    unset($_COOKIE['user']);
                    unset($_COOKIE['user_info']);
                    setcookie('user', null, -1, '/');
                    setcookie('user_info', null, -1, '/');
                    
                    $errorCode = 0;
                    $successCode = 1;
                    $errorText = "";
                    $gErrorRedLine = "";
                    $successText = l("welldone");                
                    $countCartitem = 0; 
                }

                $out = array(
                    "Error" => array(
                        "Code"=>$errorCode, 
                        "Text"=>$errorText,
                        "Details"=>""
                    ),
                    "Success"=>array(
                        "Code"=>$successCode, 
                        "Text"=>$successText,
                        "Details"=>""
                    )
                );
                break;
            case 'login':
                if(
                    empty($data["g_login_email"]) ||  
                    empty($data["g_login_password"]) || 
                    empty($data["CSRF_login_token"]) 
                ){
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("allfields");
                    $successText = "";                
                    $countCartitem = 0; 
                }else if(!filter_var($data["g_login_email"], FILTER_VALIDATE_EMAIL)) {
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("emailformaterror");
                    $successText = "";                
                    $countCartitem = 0;
                }else if($data["CSRF_login_token"]!==$_SESSION["CSRF_login_token"]){
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("error")." CSRF";
                    $successText = "";                
                    $countCartitem = 0;
                }else if(!g_user_exists($data["g_login_email"], $data["g_login_password"])){
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("usernotexists");
                    $successText = "";                
                    $countCartitem = 0;
                }else if(g_user_exists($data["g_login_email"], $data["g_login_password"])){
                    $selectUserData = "SELECT * FROM `site_users` WHERE `email`='".strip_quotes($data["g_login_email"])."' AND `password`='".md5(strip_quotes($data["g_login_password"]))."'";
                    $fetchData = db_fetch($selectUserData);

                    if($data["g_login_save"]=="true"){
                        $cookie_name = "user";
                        setcookie($cookie_name, $data["g_login_email"], time() + (86400 * 30), "/");

                        $cookie_name = "user_info";
                        setcookie($cookie_name, implode("@@",$fetchData), time() + (86400 * 30), "/");
                    }

                    $_SESSION["g_username"] = $data["g_login_email"];
                    $_SESSION["g_user_info"] = $fetchData;

                    $errorCode = 0;
                    $successCode = 1;
                    $errorText = "";
                    $gErrorRedLine = "";
                    $successText = l("welldone");                
                    $countCartitem = 0; 
                }

                $out = array(
                    "Error" => array(
                        "Code"=>$errorCode, 
                        "Text"=>$errorText,
                        "Details"=>""
                    ),
                    "Success"=>array(
                        "Code"=>$successCode, 
                        "Text"=>$successText,
                        "Details"=>""
                    )
                );
                break;
            case 'register':
                $genHash = "";
                if(
                    empty($data["g_firstname"]) ||  
                    empty($data["g_lastname"]) || 
                    empty($data["g_birthday"]) || 
                    empty($data["g_usertype"]) || 
                    empty($data["g_personalnumber"]) || 
                    empty($data["g_address"]) || 
                    empty($data["g_email"]) || 
                    empty($data["g_phone"]) || 
                    empty($data["g_workplace"]) || 
                    empty($data["g_position"]) || 
                    empty($data["g_password"]) || 
                    empty($data["g_comfirmpassword"]) 
                ){
                    if(empty($data["g_firstname"])){
                        $gErrorRedLine["g_firstname"] = l("allfields");
                    }

                    if(empty($data["g_lastname"])){
                        $gErrorRedLine["g_lastname"] = l("allfields");
                    }

                    if(empty($data["g_birthday"])){
                        $gErrorRedLine["g_birthday"] = l("allfields");
                    }

                    if(empty($data["g_usertype"])){
                        $gErrorRedLine["g_usertype"] = l("allfields");
                    }

                    if(empty($data["g_personalnumber"])){
                        $gErrorRedLine["g_personalnumber"] = l("allfields");
                    }

                    if(empty($data["g_address"])){
                        $gErrorRedLine["g_address"] = l("allfields");
                    }

                    if(empty($data["g_email"])){
                        $gErrorRedLine["g_email"] = l("allfields");
                    }

                    if(empty($data["g_phone"])){
                        $gErrorRedLine["g_phone"] = l("allfields");
                    }

                    if(empty($data["g_workplace"])){
                        $gErrorRedLine["g_workplace"] = l("allfields");
                    }

                    if(empty($data["g_position"])){
                        $gErrorRedLine["g_position"] = l("allfields");
                    }

                    if(empty($data["g_password"])){
                        $gErrorRedLine["g_password"] = l("allfields");
                    }

                    if(empty($data["g_comfirmpassword"])){
                        $gErrorRedLine["g_comfirmpassword"] = l("allfields");
                    }
                    
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("allfields");
                    $successText = "";                
                    $countCartitem = 0;                
                }else if(preg_match("/^[0-1][0-9]-[0-3][0-9]-[0-9]{4}$/",$data["g_birthday"])!=1){
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("dateformaterror");
                    $successText = "";                
                    $countCartitem = 0;
                    $gErrorRedLine["g_birthday"] = l("dateformaterror");
                }else if(!filter_var($data["g_email"], FILTER_VALIDATE_EMAIL)) {
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("emailformaterror");
                    $successText = "";                
                    $countCartitem = 0;
                    $gErrorRedLine["g_email"] = l("emailformaterror");
                }else if(strlen($data["g_password"])<=5) {
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("passwordlengtherror");
                    $successText = "";                
                    $countCartitem = 0;
                    $gErrorRedLine["g_password"] = l("passwordlengtherror");
                }else if($data["g_password"]!==$data["g_comfirmpassword"]){
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("passmatch");
                    $successText = "";                
                    $countCartitem = 0;
                    $gErrorRedLine["g_password"] = l("passmatch");
                    $gErrorRedLine["g_comfirmpassword"] = l("passmatch");
                }else if(g_user_exists($data["g_email"])){
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("userexists");
                    $successText = "";                
                    $countCartitem = 0;
                    $gErrorRedLine["g_email"] = l("userexists");
                }else if($data["CSRF_token"]!==$_SESSION["CSRF_token"]){
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("error")." CSRF";
                    $successText = "";                
                    $countCartitem = 0;
                }else{
                    /* insert into database */
                    $genHash = base64_encode(sha1(md5(time())));
                    $insertUser = "INSERT INTO `site_users` SET 
                    `registerdate`='".time()."',
                    `registerip`='".$_SERVER["REMOTE_ADDR"]."',
                    `usertype`='".strip_quotes($data["g_usertype"])."',                    
                    `firstname`='".strip_quotes($data["g_firstname"])."',
                    `lastname`='".strip_quotes($data["g_lastname"])."',
                    `birthday`='".strip_quotes($data["g_birthday"])."',
                    `pn`='".strip_quotes($data["g_personalnumber"])."',
                    `address`='".strip_quotes($data["g_address"])."',
                    `email`='".strip_quotes($data["g_email"])."',
                    `phone`='".strip_quotes($data["g_phone"])."',
                    `workplace`='".strip_quotes($data["g_workplace"])."',
                    `position`='".strip_quotes($data["g_position"])."',
                    `password`='".md5(strip_quotes($data["g_password"]))."',
                    `hash`='".$genHash."'";

                    db_query($insertUser);

                    $errorCode = 0;
                    $successCode = 1;
                    $errorText = "";
                    $gErrorRedLine = "";
                    $successText = l("welldone");                
                    $countCartitem = 0; 
                }

                $out = array(
                    "Error" => array(
                        "Code"=>$errorCode, 
                        "Text"=>$errorText,
                        "gErrorRedLine"=>$gErrorRedLine,
                        "Details"=>""
                    ),
                    "Success"=>array(
                        "Code"=>$successCode, 
                        "Text"=>$successText,
                        "genHash"=>$genHash,
                        "Details"=>""
                    )
                );
                break;
            default:
                # code...
                break;
        }


    }

    echo json_encode($out);
?>