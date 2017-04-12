<?php

    /*OGMCY*/

    include_once($_SERVER['DOCUMENT_ROOT']."/core/init.inc.php");

    if (auth::isSession()) {

        header("Location: /sautidates-home.php");
    }

    $user_username = '';

    $error = false;
    $error_message = '';
if(!empty($_GET)){
        $uid = $_GET['id'];
       $account = new account($dbo);
       $account->userIdSession($uid);
                     }
    if (!empty($_POST)) {

        $user_username = isset($_POST['user_username']) ? $_POST['user_username'] : '';
        $user_password = isset($_POST['user_password']) ? $_POST['user_password'] : '';
        $token = isset($_POST['authenticity_token']) ? $_POST['authenticity_token'] : '';

        $user_username = helper::clearText($user_username);
        $user_password = helper::clearText($user_password);

        $user_username = helper::escapeText($user_username);
        $user_password = helper::escapeText($user_password);

        if (auth::getAuthenticityToken() !== $token) {

            $error = true;
        }

        if (!$error) {

            $access_data = array();

            $account = new account($dbo);

            $access_data = $account->signin($user_username, $user_password);

            unset($account);

            if ($access_data['error'] === false) {

                $account_fullname = $access_data['fullname'];
                $account_photo_url = $access_data['photoUrl'];
                $account_verify = $access_data['verify'];

                $account = new account($dbo, $access_data['accountId']);

                switch ($account->getState()) {

                    case ACCOUNT_STATE_BLOCKED: {

                        break;
                    }

                    default: {

                        $account->setState(ACCOUNT_STATE_ENABLED);

                        $clientId = 0; // Desktop version

                        $auth = new auth($dbo);
                        $access_data = $auth->create($access_data['accountId'], $clientId);

                        if ($access_data['error'] === false) {

                            auth::setSession($access_data['accountId'], $user_username, $account_fullname, $account_photo_url, $account_verify, $account->getAccessLevel($access_data['accountId']), $access_data['accessToken']);
                            auth::updateCookie($user_username, $access_data['accessToken']);

                            unset($_SESSION['oauth']);
                            unset($_SESSION['oauth_id']);
                            unset($_SESSION['oauth_name']);
                            unset($_SESSION['oauth_email']);
                            unset($_SESSION['oauth_link']);

                            $account->setLastActive();

                            header("Location: /sautidates-home.php");
                        }
                    }
                }

            } else {

                $error = true;
            }
        }
    }

    auth::newAuthenticityToken();

    $page_id = "login";

    $css_files = array("my.css");
    $page_title = $LANG['page-login']." | ".APP_TITLE;

    include_once($_SERVER['DOCUMENT_ROOT'] . "/common/header-signup.inc.php");
?>

<body>
<?php include_once("analyticstracking.php") ?>

<?php

    include_once($_SERVER['DOCUMENT_ROOT'] . "/common/site_topbar.inc.php");
?>
<section class="main">
<?php

        include_once($_SERVER['DOCUMENT_ROOT']."/common/site_side_nav.php");
    ?>
<div class="section no-pad-bot" id="index-banner"  style="margin-top:-6%;" >
    <div class="container">

        <div class="row">
            
            <form class="col s12 m6" action="/login.php" method="post" style="margin: 0 auto; float: none; margin-top: 100px;">

                <input autocomplete="off" type="hidden" name="authenticity_token" value="<?php echo helper::getAuthenticityToken(); ?>">

                <div class="card ">
                    <div class="card-content black-text">
                        <span class="card-title"><?php echo $LANG['page-login']; ?></span>
                        <p class="red-text" style="margin-top: 10px; margin-bottom: 10px; <?php if (!$error) echo "display: none"; ?>"><?php echo $LANG['msg-error-authorize']; ?></p>

                        <?php

                            if (FACEBOOK_AUTHORIZATION) {

                                ?>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <a class="fb-icon-btn fb-btn-large btn-facebook" href="/facebook/login">
                                        <span class="icon-container">
                                            <i class="icon icon-facebook"></i>
                                        </span>
                                                <span><?php echo $LANG['action-login-with']." ".$LANG['label-facebook']; ?></span>
                                            </a>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="username" type="text" class="validate valid input-font"style="font-size:14px;" name="user_username" value="<?php echo $user_username; ?>">
                                <label class="lebel-font-size" style="font-size:16px;" for="username" ><?php echo $LANG['label-username']; ?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" style="font-size:14px;" class="validate valid input-font" name="user_password" value="">
                                <label for="password" class="active lebel-font-size" style="font-size:16px;"><?php echo $LANG['label-password']; ?></label>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 0px">
                            <div class="col s12">
			<div class="row" style="margin-bottom: 0px">
                            <div class="col s12">
                                <a style="font-size: 2rem;" href="/remind.php"><?php echo $LANG['action-forgot-password']; ?></a>
                            </div>
                        </div>	
                                <div class="card-action">
                        <button class="waves-effect waves-light btn"><?php echo $LANG['action-login']; ?></button>
			<a class="waves-effect waves-light btn <?php echo SITE_THEME;?>" href="signup.php" >JOIN NOW</a>

		    </div>
                    </div>
				
                            </div>
                        </div>
                    </div>
                    
                </div>
            </form>
        
        </div>

    </div>
</div>
<div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Terms And Condition</h4>
      </div>
      <div class="modal-body">
       <div class="tosContent">

    <div class="tosHeader">Agreement and terms of use <?php echo APP_TITLE; ?></div>
    <p>This Agreement regulates the relations between the Administration of the information resource «<?php echo APP_TITLE; ?>» and an individual who seeks and disseminates information on this resource.</p>
    <p>Information resource «<?php echo APP_TITLE; ?>» not a mass media, the Administration of a resource does not edit the information posted and is not responsible for its content.</p>
    <p>A user posting information on the resource «<?php echo APP_TITLE; ?>», independently represents and protects its interests arising in connection with the placement of the specified information, in relations with third parties.</p>

    <div class="tosHeader">1.  WHAT DO WE DO WITH YOUR INFORMATION?</div>

    <ul class="tosThemes">

        <li>
           When you use our "contact us" online sheet or the "book an appointment" page, we collect the personal information you give us such as your name, address and email address. 
When you browse our store, we also automatically receive your computer's internet protocol (IP) address in order to provide us with information that helps us learn about your browser and operating system. 
Email marketing (if applicable): With your permission, we may send you emails about our store, new products and other updates.
        </li>
    </ul>

    <div class="tosHeader">2.How do you get my consent?</div>

    <ul class="tosThemes">
        <li>
            When you provide us with personal information to inquire about a firm product or to book an appointment, to verify your phone number or credit card, we imply that you consent to our collecting it and using it for that specific reason only. 
If we ask for your personal information for a secondary reason, like marketing, we will either ask you directly for your expressed consent, or provide you with an opportunity to say no. 
How do I withdraw my consent? 
If after you opt-in, you change your mind, you may withdraw your consent for us to contact you, for the continued collection, use or disclosure of your information, at anytime, by contacting us or mailing us at: 
<p>Sautidates P. O Box 12971-00100 Nairobi</p>
        </li>
    </ul>

    <div class="tosHeader">3. DISCLOSURE</div>

    <ul class="tosThemes">
        <li>
            We may disclose your personal information if we are required by law to do so or if you violate our Terms of Service.
        </li>
            </ul>

    <div class="tosHeader">4.THIRD-PARTY SERVICES</div>

    <ul class="tosThemes">
        <li>
           In general, the third-party providers used by us will only collect, use and disclose your information to the extent necessary to allow them to perform the services they provide to us.
However, certain third-party service providers, such as payment gateways and other payment transaction processors, have their own privacy policies in respect to the information we are required to provide to them for your purchase-related transactions.
For these providers, we recommend that you read their privacy policies so you can understand the manner in which your personal information will be handled by these providers. 
In particular, remember that certain providers may be located in or have facilities that are located a different jurisdiction than either you or us. So if you elect to proceed with a transaction that involves the services of a third-party service provider, then your information may become subject to the laws of the jurisdiction(s) in which that service provider or its facilities are located. 
As an example, if you are located in Kenya and your transaction is processed by a payment gateway located in the United States, then your personal information used in completing that transaction may be subject to disclosure under United States legislation
Once you leave our firm's website or are redirected to a third-party website or application, you are no longer governed by this Privacy Policy or our website's Terms of Service.

Links

When you click on links on our website, they may direct you away from our site. We are not responsible for the privacy practices of other sites and encourage you to read their privacy statements.
        </li>
       
    </ul>

    <div class="tosHeader">5.SECURITY</div>

    <ul class="tosThemes">
        <li>
           To protect your personal information, we take reasonable precautions and follow industry best practices to make sure it is not inappropriately lost, misused, accessed, disclosed, altered or destroyed. Although no method of transmission over the Internet or electronic storage is 100% secure, we follow all reasonable requirements and implement additional generally accepted industry standards.
        </li>
        
    </ul>
 <div class="tosHeader">6. AGE OF CONSENT</div>

    <ul class="tosThemes">
        <li>
          By using this site, you represent that you are at least the age of majority in your state and you have given us your consent to allow any of your minor dependents to use this site.
        </li>
        
    </ul>
 <div class="tosHeader">7.CHANGES TO THIS PRIVACY POLICY</div>

    <ul class="tosThemes">
        <li>
           We reserve the right to modify this privacy policy at any time, so please review it frequently. Changes and clarifications will take effect immediately upon their posting on the website. If we make material changes to this policy, we will notify you here that it has been updated, so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we use and/or disclose it. If our store is acquired or merged with another company, your information may be transferred to the new owners so that we may continue to sell products to you.
        </li>
        
    </ul>
 <div class="tosHeader">8.QUESTIONS AND CONTACT INFORMATION</div>

    <ul class="tosThemes">
        <li>
          If you would like to: access, correct, amend or delete any personal information we have about you, register a complaint, or simply want more information contact our Privacy Compliance Officer or by mail at:

<p>Sautidates P. O Box 12971-00100 Nairobi Re: Privacy Compliance Officer.</p>
        </li>
        
    </ul>

</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
</section>

        <?php

            include_once($_SERVER['DOCUMENT_ROOT']."/common/site_footer.inc.php");
        ?>

        <script type="text/javascript">

            var items_all = <?php echo $items_all; ?>;
            var items_loaded = <?php echo $items_loaded; ?>;

            window.Guests || ( window.Guests = {} );

            Guests.moreItems = function (offset) {

                $.ajax({
                    type: 'POST',
                    url: '/guests.php',
                    data: 'itemId=' + offset + "&loaded=" + items_loaded,
                    dataType: 'json',
                    timeout: 30000,
                    success: function(response){

                        $('div.more_cont').remove();

                        if (response.hasOwnProperty('html')){

                            $("div.guests_cont").append(response.html);
                        }

                        items_loaded = response.items_loaded;
                        items_all = response.items_all;
                    },
                    error: function(xhr, type){

                    }
                });
            };

        </script>

<script src="/js/init.js"></script>
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?4bj3SpHq9N4cDzGVRXSkoN9kLRwNDXlK";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->


</body>
</html>