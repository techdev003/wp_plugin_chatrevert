<div class="loaderoverlay">
  <div class="loader-cv-spinner">
    <span class="loader-spinner"></span>
  </div>
</div>

<?php 
        include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
        
        
?>
<!-- Google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


<div class="plugins-accounts-wrapper language-converter-ui-wrapper">
    <div class="top-header">
        <h1>Language Converter</h1>
        <span>Need Help? Watch our <a href="#">video tutorial.</a></span>
    </div>
    

    <div class="plugins-accounts-info">
        <div class="left-sec-wrap">
            <div class="logo-info">
                <div class="icon-info"><?php echo $iWhitelogo;?></div>
            </div>
            <ul>
                <li><a href="#" class="menu-link-info active" data-target="tabs-1">Language Converter</a></li>
                <!-- <li><a href="#" class="menu-link-info" data-target="tabs-2">Logs</a></li> -->
              
            </ul>
        </div>    
        <div class="right-sec-wrap">            
            <div class="main-content-wrap">
                <div class="main-content-info tabs active" data-tab="tabs-1">
                    <h3>Langugae Converter</h3>                   
                        <div class="content-area-info">
                            <div class="left-data-info">
                            <div class="input-data">
                                        <div class="label-info"><span>Choose Language:</span></div>
                                        <div class="input-info">
                                            <select id="language">
                                                <?php
                                                  foreach($languageDataArray as $languageDataArraykey=>$languageDataArrayValue){
                                                    echo "<option value=".$languageDataArrayValue['language_code'].">".$languageDataArrayValue['language']."</option>";
                                                  }
                                                ?>
                                            </select> 
                                        </div>
                                    </div>
                                <div class="full-wid input-data">                                    
                                    <div class="input-info">
                                        <span>Text:</span>
                                        <input type="text" id="preview_title" placholder="Enter title">
                                                <div class="sub-cta-info">
                                                        <button id="generateLanguage" class="btn sub-cta-info">Convert Langugae</button>
                                                </div>

                                    </div>
                                </div>
                                

                                <div class="editor-data-wrap">
                                        <div class="content-info">

                                        <span>Output:</span>
                                           <textarea id="output-langugae-translation" name="" rows="5" cols="20"></textarea> 
                                             
                                        </div>
                                </div>
                            </div>

                        </div>                       
                                        
                </div>

<!-- 
                 <div class="main-content-info tabs" data-tab="tabs-2">
                    <h3>Logs</h3>
                    
                        <div class="content-area-info single-content-area-info">
                            <div class="left-data-info search-data-wrap">                               
                                                                   
                                    <div class="input-data full-wid">                                        
                                        <div class="input-info">
                                            <span>Search</span>
                                            <input type="text" id="" name="0" value="" >
                                            
                                        </div>
                                    </div>                                                       
                                  
                                <div class="save-cta-info search-cta-info">
                                    <a href="#">Search</a>
                                </div>                                                                              
                                
                            </div>
                            <div class="right-data-info empty-data-info">
                            </div>                                                   
                        </div>
                        <div class="full-wid-content-area-info log-datatable-wrap">
                            <div class="full-wid-data-info">
                                <div class="log-datatable-info">
                                <table cellpadding="0px" cellspacing="0px" class="log-audio-table" id="log-language-table"> 
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Language</th>
                                        <th>Text</th>
                                        <th>Translation</th>
                                        <th>Token</th>
                                        <th>Model</th>
                                        <th>Author</th>
                                        <th>Date</th>
                                    </tr>			
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Language</th>
                                        <th>Text</th>
                                        <th>Translation</th>
                                        <th>Token</th>
                                        <th>Model</th>
                                        <th>Author</th>
                                        <th>Date</th>
                                    </tr>
                                    </tfoot>
                            </table>
                                    </div>                   
                            </div>

                        </div>
                        

                    
                </div> -->
                 
            </div>
        </div>
    </div>
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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

<script>
    $(document).ready(function(){
        $("#generateLanguage").click(function(){



         var transalate_language = $("#language").val();
            var text = $("#preview_title").val();
            if(text == ''){
                  alert('Text Field Not Empty');
                  return false;
            }
            $(".loaderoverlay").fadeIn(300);
            $.ajax({
                  url: "<?php echo $apiUrl;?>language-converter",
                  type: 'POST',
                  beforeSend: function (xhr) {  
                              xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
                              xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
			},
                  dataType:'json',
                  data: {'transalate_language': transalate_language,'text':text}
                  }).done(function(response){
                    setTimeout(function(){
                          $(".loaderoverlay").fadeOut(300);
                        },500);
                        if(response.result=='Success'){
                            $("#output-langugae-translation").val(response.data.choices[0].text);
                              //tinymce.get("textarea-input-translate-language").setContent(response.data.choices[0].text);
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


        })

    })



$(document).ready(function(){
      $('#logs-tab').click(function(){
        $(".loaderoverlay").fadeIn(300);
            $('table tbody > tr').remove();
      var data = {
                        'action': 'my_language_data_get',
                  };
            jQuery.post(ajaxurl, data, function(response) {
                setTimeout(function(){
                          $(".loaderoverlay").fadeOut(300);
                        },500);
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
