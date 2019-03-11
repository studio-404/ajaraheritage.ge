<?php defined('DIR') OR exit;
$email =  'FullName: ' . post('firstname') . '<br />' .
        //'Last Name: ' . post('lastname') . '<br />' .
        'E-Mail: ' . post('email') . '<br />' .
        // 'Phone: ' . post('phone') . '<br />' .
        //'Subject: ' . post('subject') . '<br />' .
        'Message: ' . post('message');

$alert = null;
$postArray = array_fill_keys(array('csrftoken', 'firstname', 'email', 'message', 'captcha'), '');
$postData = $postArray;
$errorData = $postArray;
if (!empty($_POST['csrftoken'])) {

    $postData = post($postArray, 'str');

    if (!isset($_SESSION['csrftoken']) || $_SESSION['csrftoken'] != $postData['csrftoken'])
        redirect(href($slug));

    if (filter_var(s('feedback'), FILTER_VALIDATE_EMAIL) || !empty($_SESSION[CAPTCHA_SESSION_ID])) {

        $valid = 1;

        if (strtoupper($postData['captcha']) != strtoupper($_SESSION[CAPTCHA_SESSION_ID])) {
            $errorData['captcha'] = l('err.captcha');
            $valid = 0;
        }

        if (!$postData["email"]) {
            $errorData['email'] = l('email') .' '. l('required');
            $valid = 0;
        } else {
            if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
                $errorData['email'] = l('email').' '.l('invalid.format');
                $valid = 0;
            }
        }

        if (!$postData["firstname"]) {
            $errorData['firstname'] = l('firstname') .' '. l('required');
            $valid = 0;
        } else {
            if (!preg_match("/^[a-zA-Z\p{Cyrillic}\p{Georgian}\s]{2,32}$/u", $postData['firstname'])) {
                $errorData['firstname'] = l('name').' '.l('invalid.format');
                $valid = 0;
            }
        }

        /*if (!$postData["lastname"]) {
            $errorData['lastname'] = l('lastname') .' '. l('required');
            $valid = 0;
        } else {
            if (!preg_match("/^[a-zA-Z\p{Cyrillic}\p{Georgian}\s]{2,32}$/u", $postData['lastname'])) {
                $errorData['lastname'] = l('lastname').' '.l('invalid.format');
                $valid = 0;
            }
        }

        if (!$postData["subject"]) {
            $errorData['subject'] = l('subject') .' '. l('required');
            $valid = 0;
        } else {
            if (!preg_match("/^[a-zA-Z\p{Cyrillic}\p{Georgian}\s]{2,32}$/u", $postData['subject'])) {
                $errorData['subject'] = l('subject').' '.l('invalid.format');
                $valid = 0;
            }
        }*/

        if (!$postData["message"]) {
            $errorData['message'] = l('message') .' '. l('required');
            $valid = 0;
        }
        
        if ($valid) {
            unset($postData['csrftoken'], $postData['captcha']);

            require_once '_modules/phpmailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = ' engel-gottfried.de';
            $mail->SMTPAuth = true;
            $mail->Username = 'noreply@engel-gottfried.de';
            $mail->Password = 'qwe123';
            $mail->From = 'noreply@engel-gottfried.de';
            $mail->FromName = $_POST['firstname'];

            $mail->addAddress(s('feedback'));

            $mail->WordWrap = 80;
            $mail->IsHTML(true);
            $mail->Subject = '( engel-gottfried.de)';
            $mail->Body    = $email;
            $mail->AltBody = $email;

            if (!$mail->send())
                $alert = '<div class="error">'.l('suspended').'</div>';
            else
                $alert = '<div id="alert" class="success">'.l('sent').'</div>';

            $postData = $postArray;
        }

    } else {
        $alert = '<div id="alert" class="error">'.l('suspended').'</div>';
    }
}

?>

      <div id="page-header">
        <div class="container">
          <ol class="breadcrumb">
            <?php echo location();?>
          </ol>
          <div id="page-title">
            <h1><?php echo $title ?></h1>
          </div>
        </div>
      </div>
      <div id="contact" class="section">
        <div class="flow">
          <div class="map">
            <iframe src="<?php echo s('map');?>" width="100%" height="458" frameborder="0" style="border:0"></iframe>
          </div>
        </div>
        <div class="container">
            <div class="row">
              <div class="col-md-6 pt-off-md">
                <ul class="info-list">
                  <li>
                    <div class="media">
                      <div class="media-left media-middle">
                        <div class="media-object">
                          <div class="fa fa-phone fa-3x"></div>
                        </div>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading"><?php echo s('phone');?></h4>
                      </div>
                    </div>
                    <div class="media">
                      <div class="media-left media-middle">
                        <div class="media-object">
                          <div class="fa fa-map-marker fa-3x"></div>
                        </div>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading"><?php echo s('address');?></h4>
                      </div>
                    </div>
                    <div class="media">
                      <div class="media-left media-middle">
                        <div class="media-object">
                          <div class="fa fa-envelope fa-2x"></div>
                        </div>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading email"><?php echo s('mail');?></h4>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              
              <?php echo $alert ?>
              <form class="form" role="form" action="<?php echo href($slug) ?>" method="post">
                <input type="hidden" name="csrftoken" value="<?php echo $_SESSION['csrftoken'] ?>">
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="col-xs-6"><?php echo $errorData['firstname'] ?></div>
                      <input type="text" class="form-control" placeholder="<?php echo l('name') ?>" name="firstname">
                    </div>
                    <div class="form-group">
                      <div class="col-xs-6"><?php echo $errorData['email'] ?></div>
                      <input type="email" class="form-control" placeholder="<?php echo l('email') ?>" name="email">
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" placeholder="<?php echo l('message') ?>" name="message"></textarea>
                    </div>
                    <div class="form-group fix">
                      <div class="col-xs-6" style="padding-left:0;">
                        <div class="col-xs-6"><?php echo $errorData['captcha'] ?></div>
                        <input type="text" id="code" placeholder="<?php echo l('enter.code') ?>" name="captcha" class="form-control">
                      </div>
                      <div class="col-xs-6 captcha">
                        <img src="_modules/captcha/captchaImage.php" width="150" height="50" alt="captcha" class="img-responsive" />
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="<?php echo l('send') ?>">
                  </div>
                </div>
              </form>
        </div>
      </div>



<?php if (isset($_POST['csrftoken'])): ?>
<script type="text/javascript">
    $(function(){
        $('html, body').animate({
            scrollTop: $("#form").offset().top
        }, 0);
    });
</script>
<?php endif ?>