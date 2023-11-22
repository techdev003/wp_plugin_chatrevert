<div class="panel-area-content"> 
        <div class="edit-image-area">

                <div class="mask-file-image">
                        <label for="file-image">Image</label>
                        <input type="file" class="generate-input" id="image-variation"/>
                </div>
                <div class="clearfix"></div>
                <div class="image-holder-style-variation">
             
                <div class="holder" style="display:none">
                       
                        <div class="clearfix"></div>
                        <img id="imgPreview" src="#" alt="pic" /><span id="original-img-text">(Original Image)</span>
                        
                </div>
                <div class="crop-image" style="display:none">
                        
                        <div class="clearfix"></div>
                        <div id="upload-image"></div><span id="crop-image-text">(Crop Image)</span>
                </div>
                </div>
                
        </div>
        <div class="button-box-generate-image-edit">
            <button onclick="generateImageVariation()" class="generate-button">Image Variation</button>
        </div>
        <section class="display-box" id="display-box-edit">     
        </section>
</div>
