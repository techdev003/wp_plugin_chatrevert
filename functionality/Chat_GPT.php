<?php

function Chat_GPT(){
  include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
?>
<div class="warpper">
  <input class="radio" id="shortcode-mode-content" name="group" type="radio" checked>
    <div class="tabs">
          <label class="tab" id="shortcode-mode-content-tab" for="shortcode-mode-content">Chat Gpt</label>
    </div>
  <div class="panels">
      <div class="panel" id="shortcode-mode-content-panel">
        <div class="panel-area">
             <div class="panel-area-content"> 
                  <section class="msger">
                        <header class="msger-header">
                            <div class="msger-header-title">
                            <i class="fas fa-comment-alt"></i> Chat Gpt
                            </div>
                            <div class="msger-header-options">
                            <span><i class="fas fa-cog"></i></span>
                            </div>
                        </header>
                        <main class="msger-chat">
                        </main>
                            <input type="text" id="chat-message" class="msger-input" placeholder="Enter your message...">
                            <button onclick="chatGpt()" id="chat-gpt-button" class="generate-button">Send Message</button>
                        
                    </section>
             </div>

             <div class="panel-area-option">
             </div>
      
      </div>
  </div>
</div>
</div>
<?php    
}
include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
const msgerForm = get(".msger-inputarea");
const msgerInput = get(".msger-input");
const msgerChat = get(".msger-chat");
function chatGpt() {
  var chatMessage = $("#chat-message").val();
  if(chatMessage == ''){
    alert("Enter Chat Boot Message");
    return false;
  }

  var  msgHtml = '<div class="msg left-msg"><span>Human</span><div class="msg-bubble"><div class="msg-text">'+chatMessage+'</div></div></div>'
  $('.msger-chat').append(msgHtml);
  $('#chat-message').val('');
  $("#chat-gpt-button").attr('disabled','disabled');

  $.ajax({
  url: "https://api.aiharness.io/api/chat",
  type: 'POST',
  beforeSend: function (xhr) {  
              xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
              xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
						},
  dataType:'json',
  data: {'content': chatMessage}
    }).done(function(response){
      if(response.result=='Success'){
        var replyMessage = response.data.choices[0].message.content
        msgHtml = '<div class="msg left-msg"><span>AI:</span><div class="msg-bubble"><div class="msg-text">'+replyMessage+'</div></div></div>'
        $('.msger-chat').append(msgHtml);
        $("#chat-gpt-button").removeAttr('disabled');
        
      }
      else if(response.result=='Failure'){
        alert("Something Went Wrong!!")
      }
 
    }).fail(function(jqXHR, textStatus, errorThrown){
      alert('FAILED! ERROR: ' + errorThrown);
    });
 
}

function botResponse() {
  const r = random(0, BOT_MSGS.length - 1);
  const msgText = BOT_MSGS[r];
  const delay = msgText.split(" ").length * 100;

  setTimeout(() => {
    appendMessage(BOT_NAME, BOT_IMG, "left", msgText);
  }, delay);
}

// Utils
function get(selector, root = document) {
  return root.querySelector(selector);
}

function formatDate(date) {
  const h = "0" + date.getHours();
  const m = "0" + date.getMinutes();

  return `${h.slice(-2)}:${m.slice(-2)}`;
}


</script>