<?php

function language_converter(){
    include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
    ?>

<div class="warpper">
      <input class="radio" id="expree-mode-content" name="group" type="radio" checked>
      <input class="radio" id="logs" name="group" type="radio">
        <div class="tabs">
              <label class="tab" id="expree-mode-content-tab" for="expree-mode-content">Express Mode</label>
              <label class="tab" id="logs-tab" for="logs">Logs</label>
        </div>
      <div class="panels">
          <div class="panel" id="expree-mode-content-panel">
            <div class="panel-area">
            <div class="panel-area-label-input-audio">
                      <div class="panel-area-label-audio">
                            <label for="language" id="choose-translate-language"> 
                                Choose Translate Language 
                             </label>
                      </div>
                      <div class="panel-area-label-input">
                      <?php
                             include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-language-full-select.php');
                      ?>
                      </div>
            </div>
            <div class="clearfix">
            </div>
            <?php
                  include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-language-mode-content-panel.php');
            ?>

            </div>
          
          </div>
          <div class="panel" id="logs-panel">
            <?php
               include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-log-language-table.php');
            ?>
      </div>
    </div>
</div>
    
<?php    

}
?>
  <?php
    include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
    error_reporting(0);
  ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
      function translateLanguage()
      {
            var transalate_language = $("#transalate_language").val();
            var text = $("#text").val();
            if(text == ''){
                  alert('Text Field Not Empty');
                  return false;
            }
            $.ajax({
                  url: "https://api.aiharness.io/api/language-converter",
                  type: 'POST',
                  beforeSend: function (xhr) {  
                              xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
                              xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
			},
                  dataType:'json',
                  data: {'transalate_language': transalate_language,'text':text}
                  }).done(function(response){
                        if(response.result=='Success'){
                              tinymce.get("textarea-input-translate-language").setContent(response.data.choices[0].text);
                              var data = {
                                          'action': 'my_language_content',
                                          'language': transalate_language,
                                          'text':text,
                                          'translation':response.data.choices[0].text,
                                          'date':response.data.created,
                                          'token':response.data.usage.total_tokens,
                                          'model': response.data.model
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
      $('#logs-tab').click(function(){
            $('table tbody > tr').remove();
      var data = {
                        'action': 'my_language_data_get',
                  };
            jQuery.post(ajaxurl, data, function(response) {
            var responseJsonData =jQuery.parseJSON(response);
            console.log(responseJsonData.result);
                if(responseJsonData.result == 'Success'){
                  var table = '';
                  table += '<tbody>';
                  var dataObj  = responseJsonData.data; 
                  console.log(dataObj);
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



