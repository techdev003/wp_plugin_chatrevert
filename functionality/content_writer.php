<?php

function content_writer(){
        include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
    ?>
    <div class="warpper">
      <input class="radio" id="expree-mode-content" name="group" type="radio" checked>
      <!-- <input class="radio" id="expree-mode-seo" name="group" type="radio" checked> -->
      <input class="radio" id="speech-to-post" name="group" type="radio">
      <input class="radio" id="logs" name="group" type="radio">
        <div class="tabs">
              <label class="tab" id="expree-mode-content-tab" for="expree-mode-content">Express Mode</label>
              <!-- <label class="tab" id="expree-mode-seo-tab" for="expree-mode-seo">Express Mode(Seo)</label> -->
              <label class="tab" id="speech-to-post-tab" for="speech-to-post">Speech-to-Post   <span style="color: #0c8f1c">[New!]</span></label>
              <label class="tab" id="logs-tab" for="logs">Logs</label>
        </div>
      <div class="panels">
          <div class="panel" id="expree-mode-content-panel">
            <div class="panel-area">
              <?php
                  include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-expree-mode-content-panel.php');
              ?>

                 <div class="panel-area-option">
                  <?php
                 //   include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-expree-accordion-mode-content-panel.php');
                  ?>
                  </div>

            </div>
          
          </div>

          <div class="panel" id="speech-to-post-panel">
          <div class="panel-area">
          <?php
              include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-content-writer-speech.php');
          ?>
          <span id="editor-title">
            <?php 
              include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-content-writer-editor.php');
            ?>
          </span>
          </div>
          </div>
          <div class="panel" id="logs-panel">
            <?php
               include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-log-audio-table.php');
            ?>
      </div>
    </div>
</div>
<?php    
}
?>
  <?php include (MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
  function generateContent(speakText=''){
  if(speakText==''){
   var preview_title = $("#preview_title").val();
   if(preview_title ==''){
    alert("Title is empty");
    return false;
   }
  }
  else if(preview_title !=''){
    preview_title = speakText;
  }
   $.ajax({
  url: "https://angry-darwin.62-151-180-40.plesk.page/openApi/api/content-text",
  type: 'POST',
  beforeSend: function (xhr) {  
        xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
        xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
			},
  dataType:'json',
  data: {'prompt': preview_title,'model':'text-davinci-003','temperature':0,'maxtoken':1400}
    }).done(function(response){
      if(response.result=='Success'){
        console.log(response);
        console.log(response.data.choices[0].text);
        if(speakText==''){
          tinymce.get("myTextArea").setContent(response.data.choices[0].text);
          tinyMCE.triggerSave();
        }
        else{
               tinymce.get("textarea-input-generator-result").setContent(response.data.choices[0].text);
               tinyMCE.triggerSave();
        }
        var data = {
                        'action': 'my_content_data',
                        'model': response.data.model,
                        'title':preview_title,
                        'date':response.data.created,
                        'token':response.data.usage.total_tokens,
                        'type':'content'
                  };
            jQuery.post(ajaxurl, data, function(response) {
            var responseJsonData =jQuery.parseJSON(response);
            console.log(responseJsonData.result);
                if(responseJsonData.result == 'Success'){
                    alert("Log saved successfully.");
                }
                else if(responseJsonData.result=='Failure')
            {
                        alert("Something Went Wrong!!");
            }   
            });
      }
      else if(response.result=='Failure'){
        alert("Something Went Wrong!!")
      }
 
    }).fail(function(jqXHR, textStatus, errorThrown){
      alert('FAILED! ERROR: ' + errorThrown);
    });

}



$(document).ready(function(){


$('.section-title').click(function(e) {
    // Get current link value
    var currentLink = $(this).attr('href');
    if($(e.target).is('.active')) {
    	close_section();
    }else {
    	close_section();
    // Add active class to section title
    $(this).addClass('active');
    // Display the hidden content
    $('.accordion ' + currentLink).slideDown(350).addClass('open');
    }
e.preventDefault();
});
	
function close_section() {
    $('.accordion .section-title').removeClass('active');
    $('.accordion .section-content').removeClass('open').slideUp(350);
}
	
});
  /* JS comes here */
		    function runSpeechRecognition() {
		        // get output div reference
		        var output = document.getElementById("output");
		        // get action element reference
		        var action = document.getElementById("action");
                // new speech recognition object
                var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
                var recognition = new SpeechRecognition();
            
                // This runs when the speech recognition service starts
                recognition.onstart = function() {
                    action.innerHTML = "<small>listening, please speak...</small>";
                };
                
                recognition.onspeechend = function() {
                    action.innerHTML = "<small>stopped listening, hope you are done...</small>";
                    recognition.stop();
                }
              
                // This runs when the speech recognition service returns result
                recognition.onresult = function(event) {
                    var transcript = event.results[0][0].transcript;
                    var confidence = event.results[0][0].confidence;
                    output.innerHTML = "<b>Text:</b> " + transcript + "<br/> <b>Confidence:</b> " + confidence*100+"%";
                    output.classList.remove("hide");
                    $("#text-input-generator-play").val(transcript);
                    generateContent(transcript);   
                };

                 recognition.start();
	        }
		

</script>

<script>
  $(document).ready(function(){
    $("#logs-tab").click(function(){
      $('table tbody > tr').remove();
      var data = {
                        'action': 'my_content_data_get',
                        'type': 'content'
                  };
            jQuery.post(ajaxurl, data, function(response) {
            var responseJsonData =jQuery.parseJSON(response);
            console.log(responseJsonData.result);
                if(responseJsonData.result == 'Success'){
                  var table = '';
                  table += '<tbody>';
                  var dataObj  = responseJsonData.data; 
                  // console.log(responseJsonData.data);
                  $.each( dataObj, function( key2, valueObj ) {
                    table += "<tr>";
                    $.each( valueObj, function( key, value ) {
                        table+= "<td>"+value+"</td>"
                    });
                    table += "</tr>";
                });
                table += '</table>'; 
                console.log(table);
                $('.log-audio-table').append(table);
                }
                else if(responseJsonData.result=='Failure')
            {
                        alert("Something Went Wrong!!");
            }   
        });
    })
  })
</script>