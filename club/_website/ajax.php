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
                }else if(g_user_exists($data["g_email"], $data["g_password"])){
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("userexists");
                    $successText = "";                
                    $countCartitem = 0;
                    $gErrorRedLine["g_email"] = l("userexists");
                }else{
                    /* insert into database */
                    $genHash = base64_encode(sha1(md5(time())));
                    $insertUser = "INSERT INTO `site_users` SET 
                    `registerdate`='".time()."',
                    `registerip`='".$_SERVER["REMOTE_ADDR"]."',
                    `usertype`='".$data["g_usertype"]."',                    
                    `firstname`='".$data["g_firstname"]."',
                    `lastname`='".$data["g_lastname"]."',
                    `birthday`='".$data["g_birthday"]."',
                    `pn`='".$data["g_personalnumber"]."',
                    `address`='".$data["g_address"]."',
                    `email`='".$data["g_email"]."',
                    `phone`='".$data["g_phone"]."',
                    `workplace`='".$data["g_workplace"]."',
                    `position`='".$data["g_position"]."',
                    `password`='".md5($data["g_password"])."',
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