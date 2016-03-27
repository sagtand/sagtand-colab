<?php
if ( ! defined( 'ABSPATH' ) ) exit;
if(is_admin()) {
  add_action( 'wp_ajax_send_feedbackmail', 'my_ajax_send_feedbackmail' );                 // Send support mail          // Upload document link - Styrelserum
  add_action( 'wp_ajax_nopriv_send_feedbackmail', 'my_ajax_send_feedbackmail' );          // Send support mail   - nopriv
}

function my_ajax_send_feedbackmail(){
  extract($_POST);
  $to = 'h@fullyflared.se';
  $subject = 'Feedback: '.$feedback_title;
  $message = 'Feedback skickat från URL:'."\r\n".$feedback_url."\r\n".$feedback_message;
  $header = 'From: Support Form <support@fullyflared.se>';
  
  $mailed = wp_mail( $to, $subject, $message, $header);

  $data = array(
    'mailed' => $mailed,
    'thesupporturl' => $feedback_url,
    'thetitle' => $feedback_title,
    'themessage' => $feedback_message,
    );
  wp_send_json( $data );
}
add_action('wp_footer', 'add_support_form', 100);
function add_support_form() {
    echo '

<style>
    #support-form {
        width: 550px;
        max-width: 80%;
        padding: 40px;
        background: #FFF;
        position: absolute;
        top: -620px;
        right:0;
        /*top: 4em;*/
        z-index: 1000;
        -webkit-border-bottom-left-radius:    0.6em;
        -webkit-border-bottom-right-radius: 0.6em;
        -moz-border-radius-bottomleft:        0.6em;
        -moz-border-radius-bottomright:     0.6em;
        border-bottom-left-radius:            0.6em;
        border-bottom-right-radius:         0.6em;
        -webkit-transition:all 0.3s;
           -moz-transition:all 0.3s;
             -o-transition:all 0.3s;
                transition:all 0.3s;
        -webkit-box-shadow: 0px 4px 4px 0px rgba(50, 50, 50, 0.2);
        -moz-box-shadow:    0px 4px 4px 0px rgba(50, 50, 50, 0.2);
        box-shadow:         0px 4px 4px 0px rgba(50, 50, 50, 0.2);
    }
    @media all and (max-width: 900px) {
        #support-form {
            width: 80%;
            left: -80%;
        }   
    }
    #support-form.expand {
        top: 0;
    }
    #support-form * {
        color: #222;
    }
    #support-form .sf-expand-button {
        position: absolute;
        bottom: -2.4em;
        /*top: 6em;*/
        font-size: 1.1em;
        line-height: 1.5em;
        padding: 0.5em 1em;
        background: #fff;
        
        border-bottom-left-radius: 0.3em;
        border-bottom-right-radius: 0.3em;
        cursor: pointer;
        -webkit-box-shadow: 0px 4px 4px 0px rgba(50, 50, 50, 0.2);
        -moz-box-shadow:    0px 4px 4px 0px rgba(50, 50, 50, 0.2);
        box-shadow:         0px 4px 4px 0px rgba(50, 50, 50, 0.2);
        
    }
    #support-form input, #support-form textarea {
        width: 100%;
        padding: 0.5em;
        border: 1px solid #e0e0e0;
        border-radius: 0.3em;
        background: #CCC;
    }
    #support-form img {
        width: 100%;
    }
    #support-form button {
        background: #333;
        color: #FFF;
        border-radius: 0.3em;
        -webkit-transition:all 0.3s;
           -moz-transition:all 0.3s;
             -o-transition:all 0.3s;
                transition:all 0.3s;
        margin: .5em 0;
        display: inline-block;
    }
    #support-form button:hover {
        background: #CCC;
        color: #333;
    }
    #support-form .sf-right {
        float: right;
        margin-right: 0;
        margin-left: .5em;
        clear: both;
    }
    #showloader {
        display: none;
    }
    #showloader.show-loader{
        display: block;

    } 
</style>

<form action="" id="support-form">
    <span id="sf-expand-trigger" class="sf-expand-button">Lämna feedback</span>
    <h3>Lämna feedback</h3>
    <p>Det här formuläret används endast under utvecklingen av siten.</p>
    <input type="hidden" value="'.get_permalink(get_queried_object_id()).'" name="sf-link">
    <label for="sf-email" class="sf-label">Email:</label>
    <input id="sf-email" type="text" name="email" placeholder="Din epostadress"></br>
    <label for="sf-subject" class="sf-label">Ämne:</label>
    <input id="sf-subject" type="text" name="subject" placeholder="Rubrik för din synpunkt"></br>
    <label for="sf-feedback" class="sf-label">Beskriv din synpunkt:</label>
    <textarea id="sf-feedback" type="textarea" name="feedback" rows="4" placeholder="Beskriv din synpunkt så detaljerat som möjligt"></textarea></br>
    <!-- 
    <button type="button">Bifoga bild/fil</button>
    <p>[Placeholder för att visa bilden som laddats upp]</p>
    <img src="http://placekitten.com/g/500/500">
    -->
    <button action="submit" class="sf-right">Skicka</button>
    <p id="showloader">Skickar meddelande.</p>
</form>

<script>
    $("#sf-expand-trigger").click(function(){
        $("#support-form").toggleClass("expand");
    });
    $("form#support-form").submit(function(e) {
        e.preventDefault();

    });
     $("form#support-form").submit(function(e) {
        e.stopPropagation();
        e.preventDefault();
        
        var feedBackEmail   = $("input[id=\'sf-email\']").val();
        var feedBackTitle   = $("input[id=\'sf-subject\']").val();
        var feedBackMessage = $("textarea[id=\'sf-feedback\']").val();
        var feedBackURL     = $("input[name=\'sf-link\']").val();

        if(!feedBackTitle) {
            
            $("p#showloader").html("En titel på ärendet behövs.").addClass("show-loader");
            return false
        } else {
            showLoader(true)
        }
        
        var theCall = $.ajax({
          type:       "POST",
          url:      "'.admin_url("admin-ajax.php").'",
          data:
          {
            "feedback_email"    : feedBackEmail,
            "feedback_title"    : feedBackTitle,
            "feedback_message"  : feedBackMessage,
            "feedback_url"      : feedBackURL,
            "action"            : "send_feedbackmail"
          },
          dataType:     "json",
          complete : function() {
            showLoader(false);

          },
          success: function(data) {
            console.log(data);
            
          },
          error: function(errorThrown){
            $("#feedback-message").html("Något har gått fel. Ditt meddelande har inte skickats. Kvarstår problemet skulle vi vara jättetacksamma om ärendet kunde skickas till <a href=\'mailto:r@fullyflared.se\'>r@fullyflared.se</a>.");
            
          }
        });
      });
    function showLoader(isItTrue) {
        if(isItTrue) {
            $("p#showloader").html("Skickar meddelande").addClass("show-loader");
        } else {
            $("p#showloader").html("Tack för din feedback").delay(2000).removeClass("show-loader");
            $("#support-form").removeClass("expand");
            var feedBackTitle   = $("input[id=sf-subject]").val("");
            var feedBackMessage = $("textarea[id=sf-feedback]").val("");
            // var feedBackURL     = $("input[name=sf-link]").val();
            
        }
    }
</script>';
}

?>
