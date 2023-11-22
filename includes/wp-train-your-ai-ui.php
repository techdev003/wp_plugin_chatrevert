<!-- Google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">




<div class="plugins-accounts-wrapper train-yourai-ui-wrapper">
    <div class="top-header">
        <h1>Train Your AI</h1>
        <span>Need Help? Watch our <a href="#">video tutorial.</a></span>
    </div>
    

    <div class="plugins-accounts-info">
        <div class="left-sec-wrap">
            <div class="logo-info">
                <div class="icon-info"><?php echo $iWhitelogo;?></div>
            </div>
            <ul>
                <li><a href="#" class="menu-link-info active" data-target="tabs-1">Preparation</a></li>
                <li><a href="#" class="menu-link-info" data-target="tabs-2">Upload</a></li>
                <li><a href="#" class="menu-link-info" data-target="tabs-3">Manual Entry</a></li>
                <li><a href="#" class="menu-link-info" data-target="tabs-4">Data Converter</a></li>
                <li><a href="#" class="menu-link-info" data-target="tabs-5">Datasets</a></li>
                <li><a href="#" class="menu-link-info" data-target="tabs-6">Trainings</a></li>
               
              
            </ul>
        </div>


        
        <div class="right-sec-wrap">            
            <div class="main-content-wrap">
                <div class="main-content-info tabs active" data-tab="tabs-1">
                    <h3>Preparation</h3>                   
                         <div class="content-area-info preparation-data-wrap">
                            <div class="left-data-info">                               
                                <div class="please-note-info mt-0">
                                    <h4>How to Train your AI</h4>
                                    <p>Fine-tuning a model in OpenAI involves a few steps.</p>
                                    <p>Below you can find a detailed explanation of how to fine-tune a model using our plugin. You can also watch a short demo <a href="#">here</a>.</p>
                                    <p>There are 3 different ways of uploading your data to OpenAI and starting a fine-tuning process:</p>
                                    <p>1. <a href="#">Upload</a> - Upload your data from your computer. You can use this tool if you already have your data in the required format.</p>
                                    <p>2. <a href="#">Manual Entry</a> - Manually enter your data. You can use this tool if you want to enter your data manually.</p>
                                    <p>3. <a href="#">Data Converter</a> - This tool is one of the most popular one because it allows you to convert your database to the required format with one click.</p>
                                    
                                </div> 
                                
                                <div class="please-note-info">
                                    <h4>1. Upload data directly from your computer</h4>
                                    <p>1. First, navigate to the Upload tab.</p>
                                    <p>2. In the Upload tab, you will be able to upload your datasets directly from your computer. Please note that OpenAI only accepts *.jsonl files and the maximum upload size is 100MB per file. To upload larger datasets, your WordPress maximum file upload size setting should be set to at least 100MB. You can follow this guide here.</p>
                                    <p>3. Here is an example of a *.jsonl file:</p>
                                    <img src="https://www.universal-rights.org/wp-content/uploads/2019/09/30212411048_2a1d7200e2_z-1.jpg" alt="img1">
                                    <p>As you can see, the file contains prompt and completion pairs. The prompt is the question and the completion is the answer. You can find some examples here.</p>
                                    <img src="https://www.universal-rights.org/wp-content/uploads/2019/09/30212411048_2a1d7200e2_z-1.jpg" alt="img2">
                                    <p>4. There are 4 fields in the Datasets tab that you need to fill in:</p>
                                    <p><strong>File</strong>: Click on the "Choose File" button to select the file you wish to upload. As I mentioned earlier, OpenAI only accepts *.jsonl files and the maximum upload size is 100MB per file. Learn about file format <a href="#">here</a>.</p>
                                    <p><strong>Purpose</strong>: Select the purpose. Currently there is only one option which is "Fine-tune".</p>
                                    <p><strong>Model Base</strong>: Select the model base you wish to fine-tune your model. You can select from the dropdown list. Options are: ada, babbage, curie and davinci.</p>
                                    <p><strong>Custom Model Name</strong>: Enter the custom model name for the fine-tuned model. This is optional. If you leave it blank, the fine-tuned model will be named after the model base you selected. I suggest you to use a custom model name so you can easily identify the fine-tuned model.</p>
                                    <p>5. Once the file is uploaded, it will be displayed on the Datasets tab. You can view information such as the file's ID, size, creation date, filename, and purpose. There is also an "Actions" column where you can perform various actions on the uploaded files, such as creating a fine-tune request, retrieving content, and deleting the file.</p>
                                    <p>It will look something like this:</p>
                                    <img src="https://www.universal-rights.org/wp-content/uploads/2019/09/30212411048_2a1d7200e2_z-1.jpg" alt="img3">    

                                    <p>6. If you wish to view the content of the file, you can click on the "Retrieve Content" button. For security reasons, OpenAI does not allow free plan users to view the content of the uploaded files. If you wish to view the content of the file, you will need to upgrade your account to a paid plan.</p>
                                    <p>7. To delete the file, click on the "Delete" button.</p>
                                    <p>8. If you did not receive any error messages up to this point, congratulations, you have succeeded! You can start creating fine-tunes.</p>

   
                                    
                                </div>
                                <div class="please-note-info">
                                    <h4>2. Manual Data Entry</h4>
                                    <p>1. First, navigate to the Manual Entry tab.</p>
                                    <p>2. In the Manual Entry tab, you will be able to manually enter your data.</p>
                                    <p>3. Let say you want to enter your product data</p>
                                    <p>Here is an example of a product data:</p>
                                    <p>{"prompt":"Item is a handbag. Colour is army green. Price is midrange. Size is small.->", "completion":" This stylish small green handbag will add a unique touch to your look, without costing you a fortune."}</p>
                                    <p>It will look something like this:</p>
                                    <img src="https://www.universal-rights.org/wp-content/uploads/2019/09/30212411048_2a1d7200e2_z-1.jpg" alt="img4">

                                    <p>As you can see, the file contains prompt and completion pairs. The prompt is the question and the completion is the answer. You can find some examples here.</p>
                                    <img src="https://www.universal-rights.org/wp-content/uploads/2019/09/30212411048_2a1d7200e2_z-1.jpg" alt="img5">
                                    <p>4. Click on "Add more" to add more data.</p>                                    
                                    <p>5. Once you have entered all your data, select a model base, give a custom name (optional), and click on "Upload".</p>                               

                                    <p>6. If you did not receive any error messages up to this point, congratulations, you have succeeded! You can start creating fine-tunes.</p>
                                   

   
                                    
                                </div>

                                <div class="please-note-info">
                                    <h4>3. Data Converter</h4>
                                    <p>1. First, navigate to the Data Convert tab.</p>
                                    <p>2. In the Data Converter tab, you will be able to convert your entire Database to a JSONL file.</p>
                                    <p>3. This is how it looks like:</p>
                                    <img src="https://www.universal-rights.org/wp-content/uploads/2019/09/30212411048_2a1d7200e2_z-1.jpg" alt="img6">

                                    
                                    <p>4. There are 3 different options here.</p>
                                    <p><strong>Convert Your Posts</strong>: This will convert all your posts in your DB to a JSONL file. Please note that this process will take a while depending on the number of posts you have. If you have huge DB it will split the datasets in small pieces.</p>
                                    <p><strong>Convert Your Pages</strong>: This will convert all your pages in your DB to a JSONL file. Please note that this process will take a while depending on the number of pages you have. If you have huge DB it will split the datasets in small pieces.</p>
                                    <p><strong>Convert Your WooCommerce Products</strong>: You will see this feature only if you have WooCommerce installed. This will convert all your WooCommerce products in your DB to a JSONL file. Please note that this process will take a while depending on the number of products you have. If you have huge DB it will split the datasets in small pieces.</p>
                                    <p><strong>Custom Model Name</strong>: Enter the custom model name for the fine-tuned model. This is optional. If you leave it blank, the fine-tuned model will be named after the model base you selected. I suggest you to use a custom model name so you can easily identify the fine-tuned model.</p>                                    
                                    <p>5. Important note: If you have huge DB, conversion might take longer and your website might become unresponsive if resources are not enough.</p>                              

                                    

                                   

   
                                    
                                </div>
                                
                            </div>
                            <div class="right-data-info">
                                 <div class="please-note-info mt-0">
                                    <h4>Creating Fine-Tunes</h4>
                                    <p>1. To create a fine-tune request, click on the "Create Fine-Tune" button in the Datasets tab. This will create a fine-tune request on the OpenAI API based on the uploaded dataset.</p>
                                    <p>2. There is an important step here before creating your fine-tune request. You need to either create a new model or select an existing model from the dropdown list. If you select an existing model, the fine-tuned model will be created based on the selected model. If you create a new model, the fine-tuned model will be created based on the model base you selected when you uploaded the dataset.</p>
                                    <p>Here is an example of a fine-tune request:</p>
                                    <img src="https://www.universal-rights.org/wp-content/uploads/2019/09/30212411048_2a1d7200e2_z-1.jpg" alt="img6">
                                    <p>So why this step is important? Because you can create multiple fine-tune requests for the same dataset. For example, you can create a fine-tune request for the same dataset using different model bases. Or you can create a fine-tune request for the same dataset using different models. This way, you can compare the results and choose the best model for your use case.</p>
                                    <p>A possible scenario is that you have huge dataset that is not possible to upload to OpenAI because of the 100MB limit. In this case, you can split your dataset into multiple files and upload them to OpenAI. Then, you can create a fine-tune request for each file using the same model base. This way, you can create a fine-tuned model based on the same model base but with different datasets.</p>
                                    <p>3. If you wish to upload a file for the same model, you will need to select the model from the dropdown list when you hit the "Create Fine-Tune" button.</p>
                                    <p>4. If you did not receive any error messages up to this point, congratulations, you have succeeded! Now, let's move on to viewing the fine-tune requests.</p>
                                    
                                    
                                </div> 
                                <div class="please-note-info">
                                    <h4>Viewing Fine-Tune Status</h4>
                                    <p>To view the fine-tune requests, click on the "View Fine-Tunes" button. This will display all the fine-tune requests you have created.</p>
                                    <p>Here is an example of a fine-tune requests:</p>                                   
                                    <img src="https://www.universal-rights.org/wp-content/uploads/2019/09/30212411048_2a1d7200e2_z-1.jpg" alt="img6">

                                    <p>You can view information such as the fine-tune request's ID, creation date, model, and status. There is also an "Training" column where you can perform various actions on the fine-tune requests, such as viewing the fine-tune request's details, viewing the fine-tuned model, and deleting the fine-tune request.</p>
                                    <p>There are 4 buttons in the "Training" column: Events, Hyper-params, Result files and Training files. Let's take a look at each one of them.</p>
                                    <p>1. <strong>Events</strong> : This button will display the fine-tune request's events. You can view information such as the event's ID, creation date, and status. It's important to note that fine-tuning a model can take some time, depending on the size of the dataset and the complexity of the model.</p>
                                    <p>Here is an example of a fine-tune request:</p>
                                    <img src="https://www.universal-rights.org/wp-content/uploads/2019/09/30212411048_2a1d7200e2_z-1.jpg" alt="img6">

                                    <p>If the last message says "Fine-tuning succeeded", then the fine-tune request is complete and your model is ready to be used.</p>
                                    <img src="https://www.universal-rights.org/wp-content/uploads/2019/09/30212411048_2a1d7200e2_z-1.jpg" alt="img6">
                                    <p><strong>Hyper-params</strong>: This button will display the fine-tune request's hyper-parameters. You can view information such as Epochs, batch size, Learning rate, and prompt loss weight.</p>
                                    <p>Here is an example of a fine-tune request's hyper-parameters:</p>
                                    <img src="https://www.universal-rights.org/wp-content/uploads/2019/09/30212411048_2a1d7200e2_z-1.jpg" alt="img6">
                                    
                                    <p><strong>Result files</strong>: This button will display the fine-tune request's result files. You can download the result file from training the model.</p>
                                    <p>Here is an example of a fine-tune request's result files:</p>
                                    <img src="https://www.universal-rights.org/wp-content/uploads/2019/09/30212411048_2a1d7200e2_z-1.jpg" alt="img6">
                                    <p>And here is how a result file looks like:</p>
                                    <img src="https://www.universal-rights.org/wp-content/uploads/2019/09/30212411048_2a1d7200e2_z-1.jpg" alt="img6">
                                    <p>4. <strong>Training files</strong>: This button will display the fine-tune request's training files. It is basically the file you uploaded to OpenAI.</p>
                                    <p>If you made it this far, congratulations, you have succeeded! Now, let's move on to viewing the fine-tuned models.</p>
                                    
                                </div> 
                                <div class="please-note-info">
                                    <h4>Using Fine-Tuned Models</h4>
                                    <p>Let say you already have a fine-tune request that is complete. Now, you want to use the fine-tuned model to with ChatBox in your website. To do that, please proceed to the plugins settings page and click ChatGPT tab.</p>
                                    <p>Here is an example of the ChatGPT tab:</p>                                   
                                    <img src="https://www.universal-rights.org/wp-content/uploads/2019/09/30212411048_2a1d7200e2_z-1.jpg" alt="img6">

                                    <p>You will see that your fine-tuned model is now available in the dropdown list. You can select it and click on the "Save Changes" button. This means from now on your ChatBox will use the fine-tuned model you selected.</p>
                                    <p>If you don't see your fine-tuned model in the dropdown list, please make sure that the fine-tune request is complete. You can also click on "Sync Models" link to get latest models.</p>
                                    <p>Now head over to the ChatGPT and ask your ChatBox a question. You should see that the ChatBox is now using the fine-tuned model.</p>
                                    <p>Please note, I can not guarantee that the fine-tuned model will work for your use case. It is up to you to test it and see if it works for you.As I mentioned before, dataset quality is very important. If you have a small dataset, you might not get good results. If you have a huge dataset with really well-defined prompt and completions, you might get good results. It all depends on your use case.</p>
                                    
                                    
                                </div>     
                                    
                                    
                                    
                                    
      
                                      
                                

                                

                            </div>                           
                        </div> 
                       
                                        
                </div>
                <div class="main-content-info tabs" data-tab="tabs-2">
                    <h3>Upload</h3>
                    <div class="content-area-info single-content-area-info">
                         <div class="left-data-info search-data-wrap">                               
                                     <h4>Upload New File</h4>                                
                                    <div class="input-data"> 
                                        <div class="label-info"><span>Dataset (*.jsonl):</span></div>                                       
                                        <div class="input-info">                                                                                       
                                            <input type="file" value="">                                            
                                        </div>
                                    </div>  
                                    <div class="input-data">
                                        <div class="label-info"><span>Purpose:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Salvador">Fine-Tone</option>                                                
                                                <option value="Salvador">Salvador</option>                                                
                                                <option value="Salvador">Salvador</option>                                                
                                                <option value="Salvador">Salvador</option>                                                
                                            </select> 
                                        </div>
                                    </div> 
                                    <div class="input-data">
                                        <div class="label-info"><span>Model Base:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Salvador">Fine-Tone</option>                                                
                                                <option value="Salvador">Salvador</option>                                                
                                                <option value="Salvador">Salvador</option>                                                
                                                <option value="Salvador">Salvador</option>                                                
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Custom Model Name:</span></div>
                                        <div class="input-info">
                                            <input type="text" value="">  
                                        </div>
                                    </div>                                                     
                                  
                                <div class="save-cta-info search-cta-info">
                                    
                                    <a href="#">Upload</a>
                                </div>                                                                              
                                
                            </div>
                            <div class="right-data-info empty-data-info">
                                <div class="input-data-wrap">
                                    <h4>Settings</h4>                                                                
                                    <div class="input-data">
                                        <div class="label-info"><span>Artist:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Salvador">Salvador</option>                                                
                                                <option value="Salvador">Salvador</option>                                                
                                                <option value="Salvador">Salvador</option>                                                
                                                <option value="Salvador">Salvador</option>                                                
                                            </select> 
                                        </div>
                                    </div>
                                    
                                    <div class="input-data">
                                        <div class="label-info"><span>Style:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Surrealism">Surrealism</option>                                                
                                                <option value="14px">Surrealism</option>                                                
                                                <option value="15px">Surrealism</option>                                                
                                                <option value="16px">Surrealism</option>                                                
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Photography:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="portrait">portrait</option>                                                
                                                <option value="14px">portrait</option>                                                
                                                <option value="15px">Surrealism</option>                                                
                                                <option value="16px">Surrealism</option>                                                
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Lighting:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Ambient">Ambient</option>                                                
                                                <option value="Ambient">Ambient</option>                                                
                                                <option value="15px">Surrealism</option>                                                
                                                <option value="16px">Surrealism</option>                                                
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Subject:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Landscape">Landscape</option>                                                
                                                <option value="14px">Surrealism</option>                                                
                                                <option value="15px">Surrealism</option>                                                
                                                <option value="16px">Surrealism</option>                                                
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Camera:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Aperture">Aperture</option>                                                
                                                <option value="14px">Aperture</option>                                                
                                                <option value="15px">Surrealism</option>                                                
                                                <option value="16px">Surrealism</option>                                                
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Composition:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Rule of Thirds">Rule of Thirds</option>                                                
                                                <option value="14px">Surrealism</option>                                                
                                                <option value="15px">Surrealism</option>                                                
                                                <option value="16px">Surrealism</option>                                                
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Resolution:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="4K (3840x2160)">4K (3840x2160)</option>                                                
                                                <option value="14px">Surrealism</option>                                                
                                                <option value="15px">Surrealism</option>                                                
                                                <option value="16px">Surrealism</option>                                                
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Color:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="RGB">RGB</option>                                                
                                                <option value="14px">Surrealism</option>                                                
                                                <option value="15px">Surrealism</option>                                                
                                                <option value="16px">Surrealism</option>                                                
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Special Effects:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Cinemagraph">Cinemagraph</option>                                                
                                                <option value="14px">Surrealism</option>                                                
                                                <option value="15px">Surrealism</option>                                                
                                                <option value="16px">Surrealism</option>                                                
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Negative prompt:</span></div>
                                        <div class="input-info">
                                            <input type="text" value=""> 
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Width:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="768px">768px</option>                                                
                                                <option value="768px">992px</option>                                                
                                                <option value="15px">8</option>                                                
                                                <option value="16px">9</option>                                                
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Height:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="768px">768px</option>                                                
                                                <option value="768px">992px</option>                                                
                                                <option value="15px">8</option>                                                
                                                <option value="16px">9</option>                                                
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Prompt Strength:</span></div>
                                        <div class="input-info">
                                            <input type="text" value="0.8"> 
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Number of Images:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="1">1</option>                                                
                                                <option value="2">2</option>                                                
                                                <option value="3">3</option>                                                
                                                <option value="4">4</option>                                                
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Number of Inference Steps:</span></div>
                                        <div class="input-info">
                                            <input type="text" value="50"> 
                                        </div>
                                    </div>
                                     <div class="input-data">
                                        <div class="label-info"><span>Guidance Scale:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="7.5">7.5</option>                                                
                                                <option value="7.5">7.5</option>                                                
                                                <option value="3">3</option>                                                
                                                <option value="4">4</option>                                                
                                            </select> 
                                        </div>
                                    </div>
                                     <div class="input-data">
                                        <div class="label-info"><span>NScheduler:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="DDIM">DDIM</option>                                                
                                                <option value="DDIM">DDIM</option>                                                
                                                <option value="3">3</option>                                                
                                                <option value="4">4</option>                                                
                                            </select> 
                                        </div>
                                    </div>
      
                                      
                                </div>

                                

                            </div>   

                            
                                                        
                    </div> 
                    <!-- <div class="save-cta-info">
                        <a href="#">Set as Default</a>
                    </div> -->
                   
                  
                        
                        
                                
                </div>
                <div class="main-content-info tabs" data-tab="tabs-3">
                    <h3>Manual Entry</h3>
                    <div class="content-area-info single-content-area-info">
                            <div class="left-data-info"> 
                                <h4>Enter Your Data</h4>                              
                              <div class="input-data-wrap">                                    
                                    <div class="input-data wid-50">
                                        <a class="close-cta-info" href="#"><?php echo $iCrossicon;?></a>
                                        <div class="input-info"><span>Prompt</span>
                                        <input type="text" id="" name="0" value="Prompt">
                                        </div>
                                        <div class="input-info">
                                            <span>Completion</span>
                                            <input type="text" id="" name="0" value="Completion" >
                                            <!-- <span>Ensure [text] is included in your prompt.</span> -->
                                        </div>
                                    </div>                                                          
                   
                                </div> 
                                <div class="add-more-cta-info">
                                    <a href="#">Add More</a>
                                </div>
                                <div class="input-data-wrap" style="margin-top:2em;">
                                <div class="input-data">
                                        <div class="label-info"><span>Completion:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Salvador">Fine-Tone</option>                                                
                                                <option value="Salvador">Salvador</option>                                                
                                                <option value="Salvador">Salvador</option>                                                
                                                <option value="Salvador">Salvador</option>                                                
                                            </select> 
                                        </div>
                                    </div> 
                                    
                                    <div class="input-data">
                                        <div class="label-info"><span>Model Base:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Salvador">Fine-Tone</option>                                                
                                                <option value="Salvador">Salvador</option>                                                
                                                <option value="Salvador">Salvador</option>                                                
                                                <option value="Salvador">Salvador</option>                                                
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Custom Model Name:</span></div>
                                        <div class="input-info">
                                            <input type="text" value="">  
                                        </div>
                                    </div>                                                     
                                  
                                <div class="save-cta-info search-cta-info">
                                    
                                    <a href="#">Upload</a>
                                </div> 
                                </div>
                                
                            </div>
                            <div class="right-data-info empty-data-info">

                                

                            </div>                                                   
                    </div>

                        
                           

                        
                </div>
                <div class="main-content-info tabs" data-tab="tabs-4">
                    <h3>Data Converter</h3>
                     <div class="content-area-info single-content-area-info">
                            <div class="left-data-info search-data-wrap"> 
                                <h4>Data Converter</h4>
                                <div class="input-data check-box-row">
                                        <div class="label-info"><span>Select Data:</span></div>
                                        <div class="input-info">
                                            <input type="checkbox" id="" name="0" value="0">Posts
                                            <input type="checkbox" id="" name="0" value="0" style="margin-left:1em">Pages
                                        </div>
                                    </div>                              
                                                                   
                                  
                                  
                                <div class="save-cta-info search-cta-info">                                    
                                    <a href="#">Convert</a>
                                </div>                                                                              
                                
                            </div>
                            <div class="right-data-info empty-data-info">

                                

                            </div>                                                   
                    </div>

                        <div class="full-wid-content-area-info log-datatable-wrap">
                            <div class="full-wid-data-info">
                                <div class="log-datatable-info">
                                    <table>
                                        <tr>
                                            <th>Filename</th>
                                            <th>Started</th>
                                            <th>Completed</th>
                                            <th>Size</th>
                                            <th>Action</th>
                                                                                     
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>4</td>
                                            <td>5</td>                                          
                                            
                                        </tr>
                                        
                                        </table>   
                                    </div>                   
                            </div>

                        </div>
                                                  
                    
                                      

                     
                </div>
                  <div class="main-content-info tabs" data-tab="tabs-5">
                    <h3>Datasets</h3>                 
  
                                  <div class="full-wid-content-area-info log-datatable-wrap content-area-info">
                                    
                                        <div class="full-wid-data-info">
                                            <h4 class="syn-text-wrap">Files <a href="#" class="syn-text-info">Sync Files</a></h4>
                                            <div class="log-datatable-info">
                                                <table>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Size</th>
                                                        <th>Created At</th>
                                                        <th>Filename</th>
                                                        <th>Purpose</th>
                                                        <th>Action</th>
                                                                                                
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>2</td>
                                                        <td>3</td>
                                                        <td>4</td>
                                                        <td>5</td>
                                                        <td>6</td>                                          
                                                        
                                                    </tr>
                                                    
                                                    </table>   
                                                </div>                   
                                        </div>

                                    </div>
                                    
                                                                                       
                                  
                                <!-- <div class="save-cta-info search-cta-info">
                                    <a href="#">Save</a>
                                </div>                                                                              
                                 -->
                           
                                                                             
                      

                     
                </div>

                  <div class="main-content-info tabs" data-tab="tabs-6">
                    <h3>Trainings</h3>                     
                        <div class="full-wid-content-area-info log-datatable-wrap content-area-info">
                                    
                                        <div class="full-wid-data-info">
                                            <h4 class="syn-text-wrap">Files <a href="#" class="syn-text-info">Sync Fine-tunes</a></h4>
                                            <div class="log-datatable-info">
                                                <table>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Object</th>
                                                        <th>Model</th>
                                                        <th>Created At</th>
                                                        <th>FT Model</th>
                                                        <th>Org ID</th>
                                                        <th>Status</th>
                                                        <th>Updated</th>
                                                        <th>Training</th>
                                                        <th>Action</th>
                                                                                                
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>2</td>
                                                        <td>3</td>
                                                        <td>4</td>
                                                        <td>5</td>
                                                        <td>6</td>
                                                        <td>7</td> 
                                                        <td>8</td>
                                                        <td>9</td>
                                                        <td>10</td>
                                                                                                
                                                        
                                                    </tr>
                                                    
                                                    </table>   
                                                </div>                   
                                        </div>

                                    </div>

                     
                </div>
                 
                
                 
            </div>
        </div>
    </div>
</div>

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>


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




<!-- accordion-menus -->
<script>


var acc = document.getElementsByClassName("accordionmenu");
var panel = document.getElementsByClassName('am-panel');

for (var i = 0; i < acc.length; i++) {
    acc[i].onclick = function() {
      var setClasses = !this.classList.contains('activeam');
        setClass(acc, 'activeam', 'remove');
        setClass(panel, 'showam', 'remove');
        
        if (setClasses) {
            this.classList.toggle("activeam");
            this.nextElementSibling.classList.toggle("showam");
        }
    }
}

function setClass(els, className, fnName) {
    for (var i = 0; i < els.length; i++) {
        els[i].classList[fnName](className);
    }
}




</script>





    

