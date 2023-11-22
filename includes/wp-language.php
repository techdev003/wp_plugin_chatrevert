<select id="language" class="generator-input-field" >    
                  <?php
                    
                    foreach($languageDataArray as $key=>$languageData)
                    {
                      echo "<option  value=".$languageData['language_code'].">".$languageData['language']."</option>";
                    }
                  ?>  
                
</select>