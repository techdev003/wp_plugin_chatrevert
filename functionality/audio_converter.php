<style>

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 999999999;
  padding-top: 149px;
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 60%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
<?php
function audio_converter(){
       include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
    ?>
    <div class="warpper">
            <input class="radio" id="audio-mode-content" name="group" type="radio" checked>
            <input class="radio" id="logs" name="group" type="radio">
        <div class="tabs">
                <label class="tab" id="audio-mode-content-tab" for="audio-mode-content">Audio Converter</label>
                <label class="tab" id="logs-tab" for="logs">Logs</label>
        </div>
      <div class="panels">
          <div class="panel" id="audio-mode-content-panel">
            <?php
                include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-audio-mode-content-panel.php');
            ?>
          
          </div>

          <div class="panel" id="logs-panel">
          <?php
                include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-audio-logo-panel.php');
            ?>

          </div>
      </div>
    </div>
<?php   

}
include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');

add_action('wp_ajax_fiu_upload_file', 'fiu_upload_file');
add_action('wp_ajax_nopriv_fiu_upload_file', 'fiu_upload_file');
?>
<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="panel-area">
    <div class="input-label-prompt-play">
            <label for="title-audio">Title</label>
            <input type="text" id="title-audio" Placholder="Title Come Here">
    </div>
    <div class="input-label-prompt-play">
    <?php
        $custom_text_value='';
                wp_editor(
                    $custom_text_value,
                    'textarea-audio-converter-result',  //Editor_ID
                    array(
                        'textarea_name' => '_wporg_preview_texarea',
                        'editor_height' => 300,
                        'media_buttons' => true, 
                        'wpautop' => false, 
                        'quicktags' => true,
                        'tinymce'=> true // Textarea box// Textarea box
                    )
                );
            
        ?>
    </div>        
    
    
</div>
<button class="saveAsPagePostPublish" pagePostAttr="post"  class="generate-button">Publish as Post</button>
<button class="saveAsPagePostPublish" pagePostAttr="page"  class="generate-button">Publish as Page</button>

  </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>

  $(document).ready(function(){
    $('#logs-tab').click(function(){
      $('table tbody > tr').remove();
      var data = {
                        'action': 'my_audio_log_data_get',
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

    $(".saveAsPagePostPublish").click(function(){
    var attrValuePagePost = $(this).attr('pagePostAttr');
        
    
        var     attrValue             =   attrValuePagePost;
        var     post_page_title       =   $("#title-audio").val();
        var     post_page_content     =   $("#textarea-audio-converter-result").val();
        var     author                =   $("#author").val();
        var     catgeory              =   $("#category").val();
        var     status                =   $("#status").val();
        var     format                =   $("#format").val();
        
    
        if(post_page_title == ''){
            alert('Title can not empty');
            return false;
        }

        if(post_page_content == ''){
            alert("Content Can not empty");
            return false;
        }
        var data = {
                        'action': 'my_audio_post_page',
                        'attrValue':attrValue,
                        'post_page_title': post_page_title,
                        'post_page_content':post_page_content,
                        'author'    :author,
                        'catgeory':catgeory,
                        'status':status,
                        'format':format                          
                    };
        jQuery.post(ajaxurl, data, function(response) {
            var responseJsonData =jQuery.parseJSON(response);
            console.log(responseJsonData.result);
                if(responseJsonData.result == 'Success'){
                     
                    alert("Your Post Publish Succesfully");
                }
                else if(responseJsonData.result=='Failure')
            {
                        alert("Something Went Wrong!!");
            }   
            });
});

  })

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>

jQuery(document).on('click', '#ug_submit_button', function(e){
    e.preventDefault();
    var uplaodFileName='';
    var title = $("#title").val();
    if(title == ''){
      alert("Please enter title here.");
      return false;
    }
    if($('input[name="audio-change"]:checked').attr('attrval')=='file'){
      if( document.getElementById("file-input").files.length == 0 ){
      alert("No files Selected.");
      return false;
    }
    var fd = new FormData();
    var file = jQuery(document).find('input[type="file"]');
    var individual_file = file[0].files[0];
    fd.append("file", individual_file); 
    fd.append('action', 'fiu_upload_file');  
    jQuery.ajax({
        type: 'POST',
        url: ajaxurl,
        data: fd,
        contentType: false,
        processData: false,
        success: function(response){
            uplaodFileData = JSON.parse(response); 
            uplaodFileName = uplaodFileData.data;
            var purpose = $("#purpose").val();
            if('transcriptions' == purpose)
            {
                 url = "https://api.aiharness.io/api/transcriptions-audio"
            }
            else if('translations' == purpose){
                 url="https://api.aiharness.io/api/translation-audio";
            }

            $.ajax({
                    url: url,
                    type: 'POST',
                    beforeSend: function (xhr) {  
                                xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
                                xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
                                            },
                    dataType:'json',
                    data: {'file': uplaodFileName}
                        }).done(function(response){
                        if(response.result=='Success'){
                              $("#myBtn").trigger('click');
                              $("#title-audio").val(title);
                              tinymce.get("textarea-audio-converter-result").setContent(response.data.text);       
                              tinyMCE.triggerSave();
                              logAudioData(response);
                        }
                        else if(response.result=='Failure'){
                            alert("Something Went Wrong!!")
                        }
                    
                        }).fail(function(jqXHR, textStatus, errorThrown){
                        alert('FAILED! ERROR: ' + errorThrown);
                        });
                                
                            }
                        });
                    }
                    else{
                      var url_input = $("#url-input").val();
                      if('transcriptions' == purpose)
                          {
                              url = "https://api.aiharness.io/api/transcriptions-audio"
                          }
                          else if('translations' == purpose){
                              url="https://api.aiharness.io/api/translation-audio";
                          }

                          $.ajax({
                    url: url,
                    type: 'POST',
                    beforeSend: function (xhr) {  
                                xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
                                xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
                                            },
                    dataType:'json',
                    data: {'file': url_input}
                        }).done(function(response){
                        if(response.result=='Success'){
                              $("#myBtn").trigger('click');
                              $("#title-audio").val(title);
                              tinymce.get("textarea-audio-converter-result").setContent(response.data.text);       
                              tinyMCE.triggerSave();
                              logAudioData(response);
                        }
                        else if(response.result=='Failure'){
                            alert("Something Went Wrong!!")
                        }
                    
                        }).fail(function(jqXHR, textStatus, errorThrown){
                        alert('FAILED! ERROR: ' + errorThrown);
                        });
                    }
});

function logAudioData(responseData){
  var title = $("#title").val();
  var purpose = $("#purpose").val();
  var category = $("#category").val();
  var author = $("#author").val();
  var status = $("#status").val();
  var data = {
                        'action': 'my_log_audio_data',
                        'title':title,
                        'purpose':purpose,
                        'category':category,
                        'author':author,
                        'status':status,
                         
            };
  jQuery.post(ajaxurl, data, function(response) {
  var responseJsonData =jQuery.parseJSON(response);
  console.log(responseJsonData.result);
      if(responseJsonData.result == 'Success'){
          alert("log created successfully");
          return true;
      }
      else if(responseJsonData.result=='Failure')
  {
              alert("Something Went Wrong!!");
              return false;
  }   
            });

     
}



$(document).ready(function() {
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

$(document).ready(function() {
    var idValue;
    $('.audio-change-checked:radio').change(function() {
        idValue = $('input[type=radio][name=audio-change]:checked').attr('id');
        idValue = idValue+'-input';
        
        
        //console.log($("#file-data-id").find("select, textarea, input"));
        $("#file-data-id .generator-input-field-audio")
            .each(function () {
               var fileInput = this.id;
               if(idValue == fileInput ){
                $("#"+fileInput).css("display","block");
               }
               else{
                $("#"+fileInput).css("display","none");
               }

        });


    });
    idValue='';
});

</script>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>