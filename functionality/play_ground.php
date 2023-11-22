<?php
function play_ground(){
    include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
?>
    <div class="warpper">
            <input class="radio" id="audio-mode-content" name="group" type="radio" checked>
            <input class="radio" id="logs" name="group" type="radio">
        <div class="tabs">
                <label class="tab" id="audio-mode-content-tab" for="audio-mode-content">PlayGround</label>
                <label class="tab" id="logs-tab" for="logs">Logs</label>
        </div>
      <div class="panels">
          <div class="panel" id="audio-mode-content-panel">
            <?php
                include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-play-ground-panel.php');

            ?>
          
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
include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#generatePlayGround").click(function(){
            var  playgroundText = $("#text-input-generator-play").val();
            if(playgroundText ==''){
                alert("Playground text can not empty.");
                return false;
            }
            $.ajax({
  url: "https://api.aiharness.io/api/content-text-playground",
  type: 'POST',
  beforeSend: function (xhr) {  
        xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
        xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
			},
  dataType:'json',
  data: {'prompt': playgroundText,'model':'text-davinci-003','temperature':0.7,'maxtoken':256}
    }).done(function(response){
      if(response.result=='Success'){
        console.log(response);
        console.log(response.data.choices[0].text);
        doWithInterval('input',response.data.choices[0].text);

         var data = {
                         'action': 'my_content_data',
                         'model': response.data.model,
                         'title':playgroundText,
                         'date':response.data.created,
                         'token':response.data.usage.total_tokens,
                         'type':'playground'
                   };
             jQuery.post(ajaxurl, data, function(response) {
             var responseJsonData =jQuery.parseJSON(response);
             console.log(responseJsonData.result);
                 if(responseJsonData.result == 'Success'){
                     console.log("log saved Succesfully");
                 }
                 else if(responseJsonData.result=='Failure')
             {
                         //alert("Something Went Wrong!!"); 
                         console.log("Something Went Wrong!!");
             }   
          });
      }
      else if(response.result=='Failure'){
        console.log("Something Went Wrong!!");
      }
 
    }).fail(function(jqXHR, textStatus, errorThrown){
      alert('FAILED! ERROR: ' + errorThrown);
    });

});
});

function doWithInterval(id, sentence)
{ 
    var f;
    f= function(i){
        document.getElementById('textarea-input-generator-playground').innerHTML+=sentence[i];
        if(i+1==sentence.length)
        {
           return;
        } 
           window.setTimeout(function(){f(i+1);},20);
    }
    f(0);
}


</script>


<script>
  $(document).ready(function(){
    $("#logs-tab").click(function(){
      $('table tbody > tr').remove();
      var data = {
                        'action': 'my_content_data_get',
                        'type': 'playground'
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
