<?php
include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
?>
<!-- Google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


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
</style>

<div class="plugins-accounts-wrapper audio-converter-ui-wrapper">
    <div class="top-header">
        <h1>Audio Converter</h1>
        <span>Need Help? Watch our <a href="#">video tutorial.</a></span>
    </div>
    

    <div class="plugins-accounts-info">
        <div class="left-sec-wrap">
            <div class="logo-info">
                <div class="icon-info"><?php echo $iWhitelogo;?></div>
            </div>
            <ul>
                <li><a href="#" class="menu-link-info active" data-target="tabs-1">Audio Converter</a></li>
                <!-- <li><a href="#" class="menu-link-info" data-target="tabs-2">Logs</a></li>
                -->
              
            </ul>
        </div>


        
        <div class="right-sec-wrap">            
            <div class="main-content-wrap">
                <div class="main-content-info tabs active" data-tab="tabs-1">
                    <h3>Audio Converter</h3>                   
                        <div class="content-area-info single-content-area-info">
                            <div class="left-data-info">
                                <div class="panel-area">
                                    <form method ="post"  name="uploadvideo"  enctype="multipart/form-data">
                                                    <div class="panel-area-content"> 
                                                    <div class="panel-area-label-input-audio">
                                                        <div class="panel-area-label-audio">
                                                                <label for="purpose"> Purpose </label>
                                                        </div>
                                                        <div class="panel-area-label-input">
                                                            <select id="purpose" name="purpose" class="generator-input-field-audio">
                                                                    <option selected="" value="transcriptions">Transcription</option>
                                                                    <option value="translations">Translation</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="panel-area-label-input-audio">
                                                        <div class="panel-area-label-audio">
                                                                <label for="File"> 
                                                                    File
                                                                </label>
                                                        </div>
                                                        <div class="panel-area-label-input">
                                                            <input type="radio" class="audio-change-checked" attrVal="file" name="audio-change" value="" id="file" checked>Computer</label>
                                                            <input type="radio" class="audio-change-checked" attrVal="url" name="audio-change" value="" id="url">Url</label>
                                                             
                                                        </div>

                                                    </div>
                                                    <div class="clearfix">
                                                    </div>
                                                    <div class="panel-area-label-input-audio">
                                                        <div class="panel-area-label-audio">
                                                                <!-- <label for="File"> 
                                                                    Upload File
                                                                </label> -->
                                                        </div>
                                                        <div class="panel-area-label-input-checked" id="file-data-id">
                                                                <input type="file" class="generator-input-field-audio" name="uploadAudio" value="" name="" id="file-input"/>
                                                                <input type="url" name="url" class="generator-input-field-audio" id="url-input" placeholder="Example: https://domain.com/audio.mp3" style="display:none"/>
                                                            </div>
                                                    </div>
                                                    <div class="panel-area-label-input-audio">
                                                        <div class="panel-area-label-audio">
                                                                <label for="purpose"> 
                                                                    Model
                                                                </label>
                                                        </div>
                                                        <div class="panel-area-label-input">
                                                            <select name="model" class="generator-input-field-audio" id="model">
                                                                    <option selected="" value="whisper-1">whisper-1</option>
                                                                    
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="panel-area-label-input-audio">
                                                        <div class="panel-area-label-audio">
                                                                <label for="purpose"> 
                                                                    Prompt(Optional)
                                                                </label>
                                                        </div>
                                                        <div class="panel-area-label-input">
                                                            <input type="text" class="generator-input-field-audio" name="prompt" id="prompt">
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                    </div>
                                                    <div class="panel-area-label-input-audio">
                                                        <div class="panel-area-label-audio">
                                                                <label for="purpose"> 
                                                                    Output Format
                                                                </label>
                                                        </div>
                                                        <div class="panel-area-label-input">
                                                                <select name="format" id="format" class="generator-input-field-audio">
                                                                        <option selected="" value="post">post</option>
                                                                        <option value="page">page</option>
                                                                        <option value="json">json</option>
                                                                        <option value="text">text</option>
                                                                        <option value="srt">srt</option>
                                                                        <option value="verbose_json">verbose_json</option>
                                                                        <option value="vtt">vtt</option>
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                    </div>
                                                    <div class="panel-area-label-input-audio">
                                                        <div class="panel-area-label-audio">
                                                                <label for="title"> 
                                                                    Title
                                                                </label>
                                                        </div>
                                                        <div class="panel-area-label-input">
                                                            <input type="text" class="generator-input-field-audio" name="title" id="title">
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                    </div>
                                                    <div class="panel-area-label-input-audio">
                                                        <div class="panel-area-label-audio">
                                                                <label for="purpose"> 
                                                                    Category
                                                                </label>
                                                        </div>
                                                        <div class="panel-area-label-input">
                                                                <select name="category" id="category" class="generator-input-field-audio">
                                                                    <?php
                                                                    $categories = get_categories();
                                                                    foreach($categories as $key=>$categoriesData){
                                                                        ?>
                                                                        <option value="<?php echo $categoriesData->name;?>"><?php echo $categoriesData->name?></option>
                                                                        <?php    
                                                                    }
                                                                    ?>
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="panel-area-label-input-audio">
                                                        <div class="panel-area-label-audio">
                                                                <label for="purpose"> 
                                                                    Author
                                                                </label>
                                                        </div>
                                                        <div class="panel-area-label-input">
                                                        <select name="author" id="author" class="generator-input-field-audio">
                                                            <?php
                                                                    $users = get_users();
                                                                    foreach ($users as $userData) 
                                                                        {
                                                                            ?>
                                                                            <option value="<?php echo  $userData->display_name;?>"><?php echo $userData->display_name;?></option>
                                                                        <?php
                                                                        }
                                                            ?>  
                                                            </select>    
                                                        </div>
                                                    </div>
                                                    <div class="panel-area-label-input-audio">
                                                        <div class="panel-area-label-audio">
                                                                <label for="status"> 
                                                                    Status
                                                                </label>
                                                        </div>
                                                        <div class="panel-area-label-input">
                                                        <select name="status" id="status" class="generator-input-field-audio">
                                                            <option value="draft">Draft</option>
                                                            <option value="publish">Publish</option>
                                                            </select>    
                                                        </div>
                                                    </div>
                                                    <div class="panel-area-label-input-audio">
                                                        <div class="panel-area-label-audio">
                                                                <label for="status"> 
                                                                    Temperature (Optional)
                                                                </label>
                                                        </div>
                                                        <div class="panel-area-label-input">
                                                            <input type="number" placeholder="Select temperature 0 or 1" class="generator-input-field-audio" max=1 min=0; value="temperature" name="Temperature"/>
                                                        </div>
                                                    </div>
                                                    <div class="panel-area-label-input-audio">
                                                        <div class="panel-area-label-audio">
                                                                <label for="status"> 
                                                                    Language (Optional)
                                                                </label>
                                                        </div>
                                                        <div class="panel-area-label-input">
                                                        <?php
                                                                include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-language.php');
                                                        ?>
                                                        </div>
                                                    </div>
                                                        <div class="panel-area-label-input-audio">
                                                        <div class="panel-area-label-audio">
                                                        </div>
                                                        <div class="panel-area-label-button">
                                                        <!-- <button>Submit</button> -->
                                                        <!-- <input type="submit" value="Upload Image" id="submit" name="submit"> -->
                                                        <input type="submit" value="Upload Video" name="ug_submit_button" id="ug_submit_button" class="btn">
                                                            <!-- <button onclick="start()" class="generate-button-audio-start">Start</button>
                                                            <button onclick="setAsDefault()" class="generate-button-audio-default">Set as Deault</button> -->
                                                        </div>
                                                        </div>                                                
                                                    </div>  
                                    </form>

                            </div> 
                            </div>                            
                            <div class="right-data-info empty-data-info">                         
                            </div>                            
                        </div>                         
                                        
                </div>
                <!-- <div class="main-content-info tabs" data-tab="tabs-2">
                    <h3>Logs</h3>
                    <div class="content-area-info single-content-area-info">
                            <div class="left-data-info">                               
                                 <div class="panel-area">
                                    <div class="panel-area-content-table">
                                            <table class="log-audio-table"> 
                                                    <thead>
                                                        <tr>
                                                                <td>Id</td>
                                                                <td>Title</td>
                                                                <td>Purpose</td>
                                                                <td>Date</td>
                                                                <td>Category</td>
                                                                <td>Author</td>
                                                                <td>Status</td>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                                <td>Id</td>
                                                                <td>Title</td>
                                                                <td>Purpose</td>
                                                                <td>Date</td>
                                                                <td>Category</td>
                                                                <td>Author</td>
                                                                <td>Status</td>
                                                        </tr>
                                                    </tfoot>
                                            </table>
                                    </div>
                                </div>                  
                            </div>                            
                            <div class="right-data-info empty-data-info">                                  

                            </div>                            
                    </div>                        
                </div>                 -->
            </div>
        </div>
    </div>
</div>



<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal cus-model-content-wrap">

  <!-- Modal content -->
  <div class="modal-content cus-model-content-info">
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
<!-- jQuery library -->


<script type="text/javascript">
	$('.menu-link-info').on('click', function(e) {
	  e.preventDefault();
	  $('.menu-link-info').removeClass('active');
	  $(this).addClass('active');
	  $('.tabs').removeClass('active');
	  var tabID = $(this).attr('data-target');
	  $('.tabs[data-tab="' + tabID + '"]').addClass('active');
	});
</script>


<!-- content-seo-->
<script>
function openContent(evt, cName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("cwem-tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("cwem-tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" cwem-active", "");
  }
  document.getElementById(cName).style.display = "block";
  evt.currentTarget.className += " cwem-active";
}

// Get the element with id="defaultOpen" and click on it
//document.getElementById("defaultOpen").click();
</script>




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

<!--  -->
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
                 url = "<?php echo $apiUrl;?>transcriptions-audio"
            }
            else if('translations' == purpose){
                 url="<?php echo $apiUrl;?>translation-audio";
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
                              url = "<?php echo $apiUrl;?>transcriptions-audio"
                          }
                          else if('translations' == purpose){
                              url="<?php echo $apiUrl;?>translation-audio";
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
