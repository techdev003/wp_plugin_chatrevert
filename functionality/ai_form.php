<style>
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  z-index: 9999 !important; /* Sit on top */
  padding-top: unset !important; /* Location of the box */
  left:0;
  top: 0;
  width: 100%; /* Full width */
  height: 90%; /* Full height */
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
  width: 80%;
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
.my-modal-content {
    width: 70%;
    height: calc(100vh - 10em);
    margin-top: 3em;
    overflow-x: hidden;
    overflow-y: scroll
}
</style>



<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content my-modal-content ">
    <span class="close">&times;</span>
        <div class="header">
            <div class="modal_img">
                    <span id="img_span">
                        imag here
                    </span>

            </div>    
            <div class="modal_title">
                    <span id="title_span">
                        Title here 
                    </span>
            </div> 
        </div>
        <hr>
        <div class="content-area">
                <div class="content-area-left-part">
                    <div class="content-area-left">
                        <div class="label-left">
                        </div>
                        <div class="label-left-text" id="input-fields">
                            
                        </div>
                    </div>
                    <div class="content-area-left">
                        <div class="label-left">
                            <label for="Prompt">Prompt</label>
                        </div>
                        <div class="label-left-text">
                        <?php
                            $custom_text_value='';
                                        wp_editor(
                                            $custom_text_value,
                                            'myTextArea',  //Editor_ID
                                            array(
                                                'textarea_name' => '_wporg_preview_texarea',
                                                'editor_height' => 300,
                                                'media_buttons' => true, 
                                                'wpautop' => false, 
                                                'quicktags' => true,
                                                'tinymce'=> true, // Textarea box// Textarea box
                                                'textarea_class'=>'preview_textarea'
                                            )
                                        );
                        ?>
                        </div>
                    </div>
                </div>
                <div class="content-area-right-part">
                    <h5>Setting</h5>
                    <div class="content-area-right">
                            <div class="label-right">
                                    <label for="engine">Engine:</label>
                            </div>
                            <div class="label-right-text">
                                <input type="text" id="engine">
                            </div>
                    </div>
                    <div class="content-area-right">
                            <div class="label-right">
                                    <label for="max_tokens">Max Tokens:</label>
                            </div>
                            <div class="label-right-text">
                                <input type="text" id="max_tokens">
                            </div>
                    </div>
                    <div class="content-area-right">
                            <div class="label-right">
                                    <label for="temperature">Temperature:</label>
                            </div>
                            <div class="label-right-text">
                                <input type="text" id="temperature">
                            </div>
                    </div>
                    <div class="content-area-right">
                            <div class="label-right">
                                    <label for="top_p">Top Of:</label>
                            </div>
                            <div class="label-right-text">
                                <input type="text" id="top_p">
                            </div>
                    </div>
                    <div class="content-area-right">
                            <div class="label-right">
                                    <label for="best_of">Best Of:</label>
                            </div>
                            <div class="label-right-text">
                                <input type="text" id="best_of">
                            </div>
                    </div>
                    <div class="content-area-right">
                            <div class="label-right">
                                    <label for="frequency_penalty">Frequency Penalty:</label>
                            </div>
                            <div class="label-right-text">
                                <input type="text" id="frequency_penalty">
                            </div>
                    </div>
                    <div class="content-area-right">
                            <div class="label-right">
                                    <label for="presence_penalty">Presence Penalty:</label>
                            </div>
                            <div class="label-right-text">
                                <input type="text" id="presence_penalty">
                            </div>
                    </div>
                </div>
       
        </div>
`    <button id="generatePromptBase"> Generate </button>
  </div>
</div>

<?php

function ai_form(){
    include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
    ?>
     

    <div class="warpper">
        <input class="radio" id="expree-mode-content" name="group" type="radio" checked>
        <div class="tabs">
              <label class="tab" id="expree-mode-content-tab" for="expree-mode-content">PromptBase</label>
              
        </div>
      <div class="panels">
            <div class="panel-full-body-prompt">
                <div class="panel-left-side-prompt">
                        <div class="left-side-bar-heading">
                            <button class="design-your-prompt" id="-your-prompt">Design Your Prompt</button>
                            <h5>Author</h5>
                            <ul>
                                <li><input type="checkbox" class="text-generator" value="gpt_ai_power">GPT AI Power</li>
                            </ul>
                        </div>
                        <div class="left-side-bar-heading">
                            <h5>Category</h5>
                            <ul id="categoryList">
                                
                            </ul>
                        </div>
                </div>
                <div  id="ajax-right-panel">
                    
                      </div>
            </div>
    </div>
</div>



<?php



}





?>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $.ajax({
            url: "https://angry-darwin.62-151-180-40.plesk.page/openApi/api/get-ai-category",
            type:'Get',
            beforeSend:function(xhr){
                xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
                xhr.setRequestHeader("openai", "<?php echo $openAi;?>");

            },
            dataType:'json'   
        }).done(function(response){
            if(response.result=='Success'){
                categoryData  = response.data;
                $.each(categoryData, function( categoryDataindex, categoryDataObject ) {
                        $("#categoryList").append($("<li><input type='checkbox' id="+categoryDataObject.key+" class='category-check-box'>"+categoryDataObject.name+"</li>"));
                });
                
            
         }
      else if(response.result=='Failure'){
        alert("Something Went Wrong!!")
      }
 
    }).fail(function(jqXHR, textStatus, errorThrown){
      alert('FAILED! ERROR: ' + errorThrown);
    });
    })
</script>
<script>
$(document).ready(function(){
 
function getPrompt(){


  $.ajax({
  url: "https://angry-darwin.62-151-180-40.plesk.page/openApi/api/get-prompt-ai",
  type: 'Get',
  beforeSend: function (xhr) {  
              xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
              xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
						},
  dataType:'json'
    }).done(function(response){
      if(response.result=='Success'){
        var dataPrompt = response.data;
         var data = {
                         'action': 'my_prompt_content',
                         'promptData': dataPrompt
                     };
                         jQuery.post(ajaxurl, data, function(response) {
                             $("#ajax-right-panel").html(response);   
                             promptBaseId();
                             checkBoxPrompt()
                                 
                     });
        
      }
      else if(response.result=='Failure'){
        alert("Something Went Wrong!!")
      }
 
    }).fail(function(jqXHR, textStatus, errorThrown){
      alert('FAILED! ERROR: ' + errorThrown);
    });
}   
getPrompt();


 
});



function checkBoxPrompt(){
    $(".category-check-box").change(function() {
                 var objectGranted = [];

                 $("#ajax-right-panel").empty();

                 $(".category-check-box").each(function() {
                     if ($(this).is(":checked")) {
                         objectGranted.push($(this).attr("id"));
                     } 
                 });     
                 objectGranted =  JSON.stringify(objectGranted);
                 objectGranted = objectGranted.substring(1, objectGranted.length-1);

                 objectGranted = objectGranted.replace(/['"]/g, '')

                 $.ajax({
                    url: "https://angry-darwin.62-151-180-40.plesk.page/openApi/api/check-box-filter-ai",
                    type: 'Post',
                    beforeSend: function (xhr) {  
                                xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
                                xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
                    						},
                    dataType:'json',
                    data: {'category': objectGranted}
                      }).done(function(response){
                        if(response.result=='Success'){
                   
                            var dataPrompt = response.data;
                            var data = {
                                    'action': 'my_prompt_content',
                                    'promptData': dataPrompt
                                };
                         jQuery.post(ajaxurl, data, function(response) {
                             $("#ajax-right-panel").html(response);   
                             promptBaseId();
                             checkBoxPrompt();
                                 
                     });
                                   
                        }
                        else if(response.result=='Failure'){
                          alert("Something Went Wrong!!")
                        }
                    
                      }).fail(function(jqXHR, textStatus, errorThrown){
                        getPrompt();
                        promptBaseId();
                        checkBoxPrompt();
                      });
                                   
                 
           });
}


function searchPrompt(){   
  var searchkeyword = $("#search").val();
  if(searchkeyword ==''){
    alert("Please enter search box keyword.");
    return false;
  }

  
  $.ajax({
                    url: "https://angry-darwin.62-151-180-40.plesk.page/openApi/api/search-prompt-ai",
                    type: 'Post',
                    beforeSend: function (xhr) {  
                                xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
                                xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
                    						},
                    dataType:'json',
                    data: {'searchkeyword': searchkeyword}
                      }).done(function(response){
                        if(response.result=='Success'){
                            $("#ajax-right-panel").empty();
                            var dataPrompt = response.data;
                            var data = {
                                    'action': 'my_prompt_content',
                                    'promptData': dataPrompt
                                };
                         jQuery.post(ajaxurl, data, function(response) {
                             $("#ajax-right-panel").html(response);   
                             promptBaseId();
                             checkBoxPrompt();
                                 
                     });
                                   
                        }
                        else if(response.result=='Failure'){
                          alert("Something Went Wrong!!")
                        }
                    
                      }).fail(function(jqXHR, textStatus, errorThrown){
                        alert('FAILED! ERROR: ' + errorThrown);
                      });


}

function promptBaseId(){

        $(".promptBaseId").click(function(){
               $("#title_span").empty();
               $("#img_span").empty();
               $("#input-fields").empty();
               $("#engine").val('');
               $("#max_tokens").val('');
               $("#temperature").val('');
               $("#frequency_penalty").val('');
               $("#presence_penalty").val('');
               $("#top_p").val('');
               $("#best_of").val('');
            var  id = $(this).attr("attrId");
            $.ajax({
                    url: "https://angry-darwin.62-151-180-40.plesk.page/openApi/api/search-by-id-ai",
                    type: 'Post',
                    beforeSend: function (xhr) {  
                                xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
                                xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
                    						},
                    dataType:'json',
                    data: {'id': id}
                      }).done(function(response){
                        if(response.result=='Success'){
                             $("#title_span").text(response.data.response[0].title);
                             $("#img_span").html(response.data.response[0].icon_svg);
                             $("#engine").val('text-davinci-003');
                             $("#top_p").val('1');
                             $("#best_of").val('1');
                             $("#max_tokens").val(response.data.response[0].max_tokens)
                             $("#temperature").val(response.data.response[0].temperature);
                             $("#frequency_penalty").val(response.data.response[0].frequency_penalty);
                             $("#presence_penalty").val(response.data.response[0].presence_penalty);
                             var fields = response.data.response[0].fields;
                             fields = jQuery.parseJSON(fields);
                             $.each(fields, function( fieldsIndex, fieldsValue ) {
                              console.log(fieldsValue);
                              $("#input-fields").append("<label class='fieldlabel'><b>"+fieldsValue.label+"</b><div class='clearfix'></div>");
                              $("#input-fields").append("<input type="+fieldsValue.type+" id="+fieldsValue.id+"  attrId="+fieldsValue.label+" class='text-geneator input-field-text'><div class='clearfix'></div>");
                            });

                            
                             
                             $("#myBtn").trigger('click');
                        }
                        else if(response.result=='Failure'){
                          alert("Something Went Wrong!!")
                        }
                    
                      }).fail(function(jqXHR, textStatus, errorThrown){
                        alert('FAILED! ERROR: ' + errorThrown);
                      });
        })
}
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


<script>



    $("#generatePromptBase").click(function(){

        var engine              =     $("#engine").val();
        var max_tokens          =     $("#max_tokens").val()
        var temperature         =     $("#temperature").val();
        var frequency_penalty   =     $("#frequency_penalty").val();
        var presence_penalty    =     $("#presence_penalty").val();
        var top_p               =     $("#top_p").val();
        var best_of             =     $("#best_of").val();

        if(engine == '' || max_tokens == '' || temperature == '' || frequency_penalty == '' || presence_penalty =='' || top_p=="" || best_of==""){
            alert("All fields are required.");
            return false;
        }

        var  title = [];
        var  textFields = [];


        $('.fieldlabel').each(
          function(index){  
              var input = $(this);
              title.push(input.text());
          }
        );
     
        
        $('.input-field-text:input').each(
          function(index){  
              var input = $(this);
              textFields.push(input.val());
          }
        );

       var promptTextTitle  = title.reduce((obj, key, index) => ({ ...obj, [key]: textFields[index] }), {});

       var title_span = $("#title_span").text();


       var prompt = title_span;
    


      $.each(promptTextTitle, function( fieldsIndex, fieldsValue ) {
          prompt += '\n'+ fieldsIndex+' '+fieldsValue;
        });

        $.ajax({
                    url: "https://angry-darwin.62-151-180-40.plesk.page/openApi/api/prompt-base-ai",
                    type: 'Post',
                    beforeSend: function (xhr) {  
                                xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
                                xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
                    						},
                    dataType:'json',
                    data: {'prompt': prompt,'model':engine,'maxtoken':max_tokens,'temperature':temperature,
                    "frequency_penalty":frequency_penalty,"presence_penalty":presence_penalty,"top_p":top_p,"best_of":best_of}
                      }).done(function(response){
                        if(response.result=='Success'){
                            tinymce.get("myTextArea").setContent(response.data.choices[0].text);
                        }
                        else if(response.result=='Failure'){
                          alert("Something Went Wrong!!")
                        }
                    
                      }).fail(function(jqXHR, textStatus, errorThrown){
                        alert('FAILED! ERROR: ' + errorThrown);
            });
    });
</script>

