<style>
    span#custom_prompt_span {
        display: none;
    }

    #image-setting-data {
        display: none;
    }
</style>

<div class="loaderoverlay">
    <div class="loader-cv-spinner">
        <span class="loader-spinner"></span>
    </div>
</div>

<?php
include(MY_CUSTOM_PLUGIN_DIR . 'includes/wp-global.php');
?>
<!-- Google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


<div class="plugins-accounts-wrapper plugins-contentui-wrapper">
    <div class="top-header">
        <h1>Content Writer</h1>
        <span>Need Help? Watch our <a href="#">video tutorial.</a></span>
    </div>


    <div class="plugins-accounts-info">
        <div class="left-sec-wrap">
            <div class="logo-info">
                <div class="icon-info"><?php echo $iWhitelogo; ?></div>
            </div>
            <ul>
                <li><a href="#" class="menu-link-info active" data-target="tabs-1">Express Mode</a></li>
                <li><a href="#" class="menu-link-info" data-target="tabs-2">Speech-to-Post</a></li>
                <li><a href="#" class="menu-link-info" data-target="tabs-3">Playground</a></li>
                <li><a href="#" class="menu-link-info" id="logs-tab" data-target="tabs-4">Logs</a></li>

            </ul>
        </div>



        <div class="right-sec-wrap">
            <div class="main-content-wrap">
                <div class="main-content-info tabs active" data-tab="tabs-1">
                    <h3>Express Mode</h3>
                    <div class="content-area-info">
                        <div class="left-data-info">
                            <div class="full-wid input-data">
                                <div class="input-info">
                                    <span>Title:</span>
                                    <input type="text" id="preview_title" placholder="Enter title">
                                    <div class="sub-cta-info">
                                        <button onclick="generateContent()" id="generateText" class="btn sub-cta-info">Generate Text</button>
                                    </div>

                                </div>
                            </div>


                            <div class="editor-data-wrap">
                                <div class="cwem-tab">
                                    <button class="cwem-tablinks" onclick="openContent(event, 'Contentone')" id="defaultOpen">Content</button>
                                    <button class="cwem-tablinks" onclick="openContent(event, 'Seoone')">Seo</button>

                                </div>

                                <div id="Contentone" class="cwem-tabcontent">
                                    <div class="content-info">
                                        <textarea id="content-text" name="" rows="10" cols="50"></textarea>

                                    </div>
                                </div>

                                <div id="Seoone" class="cwem-tabcontent">
                                    <p>Meta Description</p>
                                    <div class="content-info">

                                        <textarea id="meta-description" name="" rows="10" cols="50"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right-data-info">

                        <div class="accordian-menu-wrap">
                            <button class="accordionmenu">Language, Style and Tone<span class="arrow-up-down"><?php echo $iArrowupdown; ?></span></button>
                            <div class="am-panel">
                                <div class="input-data-wrap">
                                    <div class="input-data">
                                        <div class="label-info"><span>Language:</span></div>
                                        <div class="input-info">
                                            <select id="language">
                                                <?php
                                                foreach ($languageDataArray as $key => $languageData) {
                                                    echo "<option value=" . $languageData['language'] . ">" . $languageData['language'] . "</option>";
                                                }
                                                ?>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Style:</span></div>
                                        <div class="input-info">
                                            <select id="style">
                                                <?php
                                                foreach ($styleDataArray as $key => $styleData) {
                                                    echo "<option value=" . $styleData['style_code'] . ">" . $styleData['style_value'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Tone:</span></div>
                                        <div class="input-info">
                                            <select id="tone">
                                                <?php
                                                foreach ($toneDataArray as $toneDataKey => $toneData) {
                                                    echo "<option value=" . $toneDataKey . ">" . $toneData . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <button class="accordionmenu">Headings<span class="arrow-up-down"><?php echo $iArrowupdown; ?></span></button>
                            <div class="am-panel">
                                <div class="input-data-wrap">
                                    <div class="input-data">
                                        <div class="label-info"><span>Headings:</span></div>
                                        <div class="input-info">
                                            <select id="heading">
                                                <?php
                                                for ($heading = 1; $heading <= 15; $heading++) {
                                                    echo "<option value=" . $heading . ">" . $heading . "</option>";
                                                }
                                                ?>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Heading Tag:</span></div>
                                        <div class="input-info">
                                            <select id="heading-tag">
                                                <?php
                                                for ($heading = 1; $heading <= 6; $heading++) {
                                                    echo "<option value=h" . $heading . ">h" . $heading . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-data check-box-row">
                                        <div class="label-info"><span>Outline Editor:</span></div>
                                        <div class="input-info">
                                            <input type="checkbox" id="otline_editor" name="0" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="accordionmenu">Keywords<span class="arrow-up-down"><?php echo $iArrowupdown; ?></span></button>
                            <div class="am-panel">
                                <div class="input-data-wrap">
                                    <div class="input-data bottom-input-text">
                                        <div class="label-info"><span>Add Keywords?</span></div>
                                        <div class="input-info">
                                            <input type="text" id="add_keywords" placeholder="Available in Pro">
                                            <span>(Use comma to seperate keywords)</span>
                                        </div>
                                    </div>
                                    <div class="input-data bottom-input-text">
                                        <div class="label-info"><span>Keywords to Avoid?</span></div>
                                        <div class="input-info">
                                            <input type="text" id="keywords_to_avoid" placeholder="Keywords to avoids">
                                            <span>(Use comma to seperate keywords)</span>
                                        </div>
                                    </div>
                                    <div class="input-data check-box-row">
                                        <div class="label-info"><span>Make Keywords Bold:</span></div>
                                        <div class="input-info">
                                            <input type="checkbox" id="make_keywords_bold" name="0" value="0">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button class="accordionmenu">Image<span class="arrow-up-down"><?php echo $iArrowupdown; ?></span></button>
                            <div class="am-panel">
                                <div class="input-data-wrap">
                                    <div class="input-data">
                                        <div class="label-info"><span>Image:</span></div>
                                        <div class="input-info">
                                            <select id="image">
                                                <option value="">none</option>
                                                <option value="dalle">Dall-E</option>
                                                <option disabled value="pexels">Pexels</option>
                                                <option disabled value="pixabay">Pixabay</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Featured Image:</span></div>
                                        <div class="input-info">
                                            <select id="featured-image">
                                                <option value="">none</option>
                                                <option value="dalle">Dall-E</option>
                                                <option disabled value="pexels">Pexels</option>
                                                <option disabled value="pixabay">Pixabay</option>
                                            </select>
                                        </div>
                                    </div>

                                    <h4>DALL-E</h4>
                                    <div class="input-data">
                                        <div class="label-info"><span>Image Size:</span></div>
                                        <div class="input-info">
                                            <select id="image-size">
                                                <option value="256x256">Small (256x256)</option>
                                                <option value="512x512" selected="">Medium (512x512)</option>
                                                <option value="1024x1024">Big (1024x1024)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Image Style</span></div>
                                        <div class="input-info">
                                            <select id="image-style">
                                                <option value="">None</option>
                                                <option value="abstract">Abstract</option>
                                                <option value="modern">Modern</option>
                                                <option value="impressionist">Impressionist</option>
                                                <option value="popart">Pop Art</option>
                                                <option value="cubism">Cubism</option>
                                                <option value="surrealism">Surrealism</option>
                                                <option value="contemporary">Contemporary</option>
                                                <option value="cantasy">Fantasy</option>
                                                <option value="graffiti">Graffiti</option>
                                            </select>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" id="image_settings">[More or less Setting]</a>
                                    <div id="image-setting-data">
                                        <div class="input-data">
                                            <div class="label-info"><span>Artist:</span></div>
                                            <div class="input-info">
                                                <select id="artist">
                                                    <option value="Salvador Dalí">Salvador Dalí</option>
                                                    <option value="Leonardo da Vinci">Leonardo da Vinci</option>
                                                    <option value="Michelangelo">Michelangelo</option>
                                                    <option value="Albrecht Dürer">Albrecht Dürer</option>
                                                    <option value="Alfred Sisley">Alfred Sisley</option>
                                                    <option value="Andrea Mantegna">Andrea Mantegna</option>
                                                    <option value="Andy Warhol">Andy Warhol</option>
                                                    <option value="Amedeo Modigliani">Amedeo Modigliani</option>
                                                    <option value="Camille Pissarro">Camille Pissarro</option>
                                                    <option value="Caravaggio">Caravaggio</option>
                                                    <option value="Caspar David Friedrich">Caspar David Friedrich</option>
                                                    <option value="Cézanne">Cézanne</option>
                                                    <option value="Claude Monet">Claude Monet</option>
                                                    <option value="Diego Velázquez">Diego Velázquez</option>
                                                    <option value="Eugène Delacroix">Eugène Delacroix</option>
                                                    <option value="Frida Kahlo">Frida Kahlo</option>
                                                    <option value="Gustav Klimt">Gustav Klimt</option>
                                                    <option value="Henri Matisse">Henri Matisse</option>
                                                    <option value="Henri de Toulouse-Lautrec">Henri de Toulouse-Lautrec</option>
                                                    <option value="Jackson Pollock">Jackson Pollock</option>
                                                    <option value="Jasper Johns">Jasper Johns</option>
                                                    <option value="Joan Miró">Joan Miró</option>
                                                    <option value="John Singer Sargent">John Singer Sargent</option>
                                                    <option value="Johannes Vermeer">Johannes Vermeer</option>
                                                    <option value="Mary Cassatt">Mary Cassatt</option>
                                                    <option value="M. C. Escher">M. C. Escher</option>
                                                    <option value="Paul Cézanne">Paul Cézanne</option>
                                                    <option value="Paul Gauguin">Paul Gauguin</option>
                                                    <option value="Paul Klee">Paul Klee</option>
                                                    <option value="Pierre-Auguste Renoir">Pierre-Auguste Renoir</option>
                                                    <option value="Pieter Bruegel the Elder">Pieter Bruegel the Elder</option>
                                                    <option value="Piet Mondrian">Piet Mondrian</option>
                                                    <option value="Pablo Picasso">Pablo Picasso</option>
                                                    <option value="Rembrandt">Rembrandt</option>
                                                    <option value="René Magritte">René Magritte</option>
                                                    <option value="Raphael">Raphael</option>
                                                    <option value="Sandro Botticelli">Sandro Botticelli</option>
                                                    <option value="Titian">Titian</option>
                                                    <option value="Theo van Gogh">Theo van Gogh</option>
                                                    <option value="Vincent van Gogh">Vincent van Gogh</option>
                                                    <option value="Vassily Kandinsky">Vassily Kandinsky</option>
                                                    <option value="Winslow Homer">Winslow Homer</option>
                                                    <option selected="" value="None">None</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-data">
                                            <div class="label-info"><span>Photography:</span></div>
                                            <div class="input-info">
                                                <select id="photography">
                                                    ><option value="Portrait">Portrait</option>
                                                    <option selected="" value="Landscape">Landscape</option>
                                                    <option value="Abstract">Abstract</option>
                                                    <option value="Action">Action</option>
                                                    <option value="Aerial">Aerial</option>
                                                    <option value="Agricultural">Agricultural</option>
                                                    <option value="Animal">Animal</option>
                                                    <option value="Architectural">Architectural</option>
                                                    <option value="Artistic">Artistic</option>
                                                    <option value="Astrophotography">Astrophotography</option>
                                                    <option value="Bird photography">Bird photography</option>
                                                    <option value="Black and white">Black and white</option>
                                                    <option value="Candid">Candid</option>
                                                    <option value="Cityscape">Cityscape</option>
                                                    <option value="Close-up">Close-up</option>
                                                    <option value="Commercial">Commercial</option>
                                                    <option value="Conceptual">Conceptual</option>
                                                    <option value="Corporate">Corporate</option>
                                                    <option value="Documentary">Documentary</option>
                                                    <option value="Event">Event</option>
                                                    <option value="Family">Family</option>
                                                    <option value="Fashion">Fashion</option>
                                                    <option value="Fine art">Fine art</option>
                                                    <option value="Food">Food</option>
                                                    <option value="Food photography">Food photography</option>
                                                    <option value="Glamour">Glamour</option>
                                                    <option value="Industrial">Industrial</option>
                                                    <option value="Lifestyle">Lifestyle</option>
                                                    <option value="Macro">Macro</option>
                                                    <option value="Nature">Nature</option>
                                                    <option value="Night">Night</option>
                                                    <option value="Product">Product</option>
                                                    <option value="Sports">Sports</option>
                                                    <option value="Street">Street</option>
                                                    <option value="Travel">Travel</option>
                                                    <option value="Underwater">Underwater</option>
                                                    <option value="Wedding">Wedding</option>
                                                    <option value="Wildlife">Wildlife</option>
                                                    <option value="None">None</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-data">
                                            <div class="label-info"><span>Lighting:</span></div>
                                            <div class="input-info">
                                                <select id="lighting">
                                                    <option selected="" value="Ambient">Ambient</option>
                                                    <option value="Artificial light">Artificial light</option>
                                                    <option value="Backlight">Backlight</option>
                                                    <option value="Black light">Black light</option>
                                                    <option value="Blue hour">Blue hour</option>
                                                    <option value="Candle light">Candle light</option>
                                                    <option value="Chiaroscuro">Chiaroscuro</option>
                                                    <option value="Cloudy">Cloudy</option>
                                                    <option value="Color gels">Color gels</option>
                                                    <option value="Continuous light">Continuous light</option>
                                                    <option value="Contre-jour">Contre-jour</option>
                                                    <option value="Direct light">Direct light</option>
                                                    <option value="Direct sunlight">Direct sunlight</option>
                                                    <option value="Diffused light">Diffused light</option>
                                                    <option value="Firelight">Firelight</option>
                                                    <option value="Flash">Flash</option>
                                                    <option value="Flat light">Flat light</option>
                                                    <option value="Fluorescent">Fluorescent</option>
                                                    <option value="Fog">Fog</option>
                                                    <option value="Front light">Front light</option>
                                                    <option value="Golden hour">Golden hour</option>
                                                    <option value="Hard light">Hard light</option>
                                                    <option value="Hazy sunlight">Hazy sunlight</option>
                                                    <option value="High key">High key</option>
                                                    <option value="Incandescent">Incandescent</option>
                                                    <option value="Key light">Key light</option>
                                                    <option value="LED">LED</option>
                                                    <option value="Low key">Low key</option>
                                                    <option value="Moonlight">Moonlight</option>
                                                    <option value="Natural light">Natural light</option>
                                                    <option value="Neon">Neon</option>
                                                    <option value="Open shade">Open shade</option>
                                                    <option value="Overcast">Overcast</option>
                                                    <option value="Paramount">Paramount</option>
                                                    <option value="Party lights">Party lights</option>
                                                    <option value="Photoflood">Photoflood</option>
                                                    <option value="Quarter light">Quarter light</option>
                                                    <option value="Reflected light">Reflected light</option>
                                                    <option value="Rim light">Rim light</option>
                                                    <option value="Shaded">Shaded</option>
                                                    <option value="Shaded light">Shaded light</option>
                                                    <option value="Silhouette">Silhouette</option>
                                                    <option value="Side light">Side light</option>
                                                    <option value="Single-source">Single-source</option>
                                                    <option value="Softbox">Softbox</option>
                                                    <option value="Soft light">Soft light</option>
                                                    <option value="Split lighting">Split lighting</option>
                                                    <option value="Stage lighting">Stage lighting</option>
                                                    <option value="Studio light">Studio light</option>
                                                    <option value="Sunburst">Sunburst</option>
                                                    <option value="Tungsten">Tungsten</option>
                                                    <option value="Umbrella lighting">Umbrella lighting</option>
                                                    <option value="Underexposed">Underexposed</option>
                                                    <option value="Venetian blinds">Venetian blinds</option>
                                                    <option value="Warm light">Warm light</option>
                                                    <option value="White balance">White balance</option>
                                                    <option value="None">None</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-data">
                                            <div class="label-info"><span>Subject:</span></div>
                                            <div class="input-info">
                                                <select id="image-subject">
                                                    <option value="Landscapes">Landscapes</option>
                                                    <option value="People">People</option>
                                                    <option value="Animals">Animals</option>
                                                    <option value="Food">Food</option>
                                                    <option value="Cars">Cars</option>
                                                    <option value="Architecture">Architecture</option>
                                                    <option value="Flowers">Flowers</option>
                                                    <option value="Still life">Still life</option>
                                                    <option value="Portrait">Portrait</option>
                                                    <option value="Cityscapes">Cityscapes</option>
                                                    <option value="Seascapes">Seascapes</option>
                                                    <option value="Nature">Nature</option>
                                                    <option value="Action">Action</option>
                                                    <option value="Events">Events</option>
                                                    <option value="Street">Street</option>
                                                    <option value="Abstract">Abstract</option>
                                                    <option value="Candid">Candid</option>
                                                    <option value="Underwater">Underwater</option>
                                                    <option value="Night">Night</option>
                                                    <option value="Wildlife">Wildlife</option>
                                                    <option selected="" value="None">None</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-data">
                                            <div class="label-info"><span>Camera:</span></div>
                                            <div class="input-info">
                                                <select id="image-camera">
                                                    <option selected="" value="Aperture">Aperture</option>
                                                    <option value="Active D-Lighting">Active D-Lighting</option>
                                                    <option value="Auto Exposure Bracketing">Auto Exposure Bracketing</option>
                                                    <option value="Auto Focus Mode">Auto Focus Mode</option>
                                                    <option value="Auto Focus Point">Auto Focus Point</option>
                                                    <option value="Auto Lighting Optimizer">Auto Lighting Optimizer</option>
                                                    <option value="Auto Rotate">Auto Rotate</option>
                                                    <option value="Aspect Ratio">Aspect Ratio</option>
                                                    <option value="Audio Recording">Audio Recording</option>
                                                    <option value="Auto ISO">Auto ISO</option>
                                                    <option value="Chromatic Aberration Correction">Chromatic Aberration Correction</option>
                                                    <option value="Color Space">Color Space</option>
                                                    <option value="Continuous Shooting">Continuous Shooting</option>
                                                    <option value="Distortion Correction">Distortion Correction</option>
                                                    <option value="Drive Mode">Drive Mode</option>
                                                    <option value="Dynamic Range">Dynamic Range</option>
                                                    <option value="Exposure Compensation">Exposure Compensation</option>
                                                    <option value="Flash Mode">Flash Mode</option>
                                                    <option value="Focus Mode">Focus Mode</option>
                                                    <option value="Focus Peaking">Focus Peaking</option>
                                                    <option value="Frame Rate">Frame Rate</option>
                                                    <option value="GPS">GPS</option>
                                                    <option value="Grid Overlay">Grid Overlay</option>
                                                    <option value="High Dynamic Range">High Dynamic Range</option>
                                                    <option value="Highlight Tone Priority">Highlight Tone Priority</option>
                                                    <option value="Image Format">Image Format</option>
                                                    <option value="Image Stabilization">Image Stabilization</option>
                                                    <option value="Interval Timer Shooting">Interval Timer Shooting</option>
                                                    <option value="ISO">ISO</option>
                                                    <option value="ISO Auto Setting">ISO Auto Setting</option>
                                                    <option value="Lens Correction">Lens Correction</option>
                                                    <option value="Live View">Live View</option>
                                                    <option value="Long Exposure Noise Reduction">Long Exposure Noise Reduction</option>
                                                    <option value="Manual Focus">Manual Focus</option>
                                                    <option value="Metering Mode">Metering Mode</option>
                                                    <option value="Movie Mode">Movie Mode</option>
                                                    <option value="Movie Quality">Movie Quality</option>
                                                    <option value="Noise Reduction">Noise Reduction</option>
                                                    <option value="Picture Control">Picture Control</option>
                                                    <option value="Picture Style">Picture Style</option>
                                                    <option value="Quality">Quality</option>
                                                    <option value="Self-Timer">Self-Timer</option>
                                                    <option value="Shutter Speed">Shutter Speed</option>
                                                    <option value="Time-lapse Interval">Time-lapse Interval</option>
                                                    <option value="Time-lapse Recording">Time-lapse Recording</option>
                                                    <option value="Virtual Horizon">Virtual Horizon</option>
                                                    <option value="Video Format">Video Format</option>
                                                    <option value="White Balance">White Balance</option>
                                                    <option value="Zebra Stripes">Zebra Stripes</option>
                                                    <option value="None">None</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-data">
                                            <div class="label-info"><span>Composition:</span></div>
                                            <div class="input-info">
                                                <select id="image-composition">
                                                    <option selected="" value="Rule of Thirds">Rule of Thirds</option>
                                                    <option value="Asymmetrical">Asymmetrical</option>
                                                    <option value="Balance">Balance</option>
                                                    <option value="Centered">Centered</option>
                                                    <option value="Close-up">Close-up</option>
                                                    <option value="Color blocking">Color blocking</option>
                                                    <option value="Contrast">Contrast</option>
                                                    <option value="Cropping">Cropping</option>
                                                    <option value="Diagonal">Diagonal</option>
                                                    <option value="Documentary">Documentary</option>
                                                    <option value="Environmental Portrait">Environmental Portrait</option>
                                                    <option value="Fill the Frame">Fill the Frame</option>
                                                    <option value="Framing">Framing</option>
                                                    <option value="Golden Ratio">Golden Ratio</option>
                                                    <option value="High Angle">High Angle</option>
                                                    <option value="Leading Lines">Leading Lines</option>
                                                    <option value="Long Exposure">Long Exposure</option>
                                                    <option value="Low Angle">Low Angle</option>
                                                    <option value="Macro">Macro</option>
                                                    <option value="Minimalism">Minimalism</option>
                                                    <option value="Negative Space">Negative Space</option>
                                                    <option value="Panning">Panning</option>
                                                    <option value="Patterns">Patterns</option>
                                                    <option value="Photojournalism">Photojournalism</option>
                                                    <option value="Point of View">Point of View</option>
                                                    <option value="Portrait">Portrait</option>
                                                    <option value="Reflections">Reflections</option>
                                                    <option value="Saturation">Saturation</option>
                                                    <option value="Scale">Scale</option>
                                                    <option value="Selective Focus">Selective Focus</option>
                                                    <option value="Shallow Depth of Field">Shallow Depth of Field</option>
                                                    <option value="Silhouette">Silhouette</option>
                                                    <option value="Simplicity">Simplicity</option>
                                                    <option value="Snapshot">Snapshot</option>
                                                    <option value="Street Photography">Street Photography</option>
                                                    <option value="Symmetry">Symmetry</option>
                                                    <option value="Telephoto">Telephoto</option>
                                                    <option value="Texture">Texture</option>
                                                    <option value="Tilt-Shift">Tilt-Shift</option>
                                                    <option value="Time-lapse">Time-lapse</option>
                                                    <option value="Tracking Shot">Tracking Shot</option>
                                                    <option value="Travel">Travel</option>
                                                    <option value="Triptych">Triptych</option>
                                                    <option value="Ultra-wide">Ultra-wide</option>
                                                    <option value="Vanishing Point">Vanishing Point</option>
                                                    <option value="Viewpoint">Viewpoint</option>
                                                    <option value="Vintage">Vintage</option>
                                                    <option value="Wide Angle">Wide Angle</option>
                                                    <option value="Zoom Blur">Zoom Blur</option>
                                                    <option value="Zoom In/Zoom Out">Zoom In/Zoom Out</option>
                                                    <option value="None">None</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-data">
                                            <div class="label-info"><span>Resolution:</span></div>
                                            <div class="input-info">
                                                <select id="image-resolution">
                                                    <option selected="" value="4K (3840x2160)">4K (3840x2160)</option>
                                                    <option value="1080p (1920x1080)">1080p (1920x1080)</option>
                                                    <option value="720p (1280x720)">720p (1280x720)</option>
                                                    <option value="480p (854x480)">480p (854x480)</option>
                                                    <option value="2K (2560x1440)">2K (2560x1440)</option>
                                                    <option value="1080i (1920x1080)">1080i (1920x1080)</option>
                                                    <option value="720i (1280x720)">720i (1280x720)</option>
                                                    <option value="None">None</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-data">
                                            <div class="label-info"><span>Color:</span></div>
                                            <div class="input-info">
                                                <select id="image-color">
                                                    <option selected="" value="RGB">RGB</option>
                                                    <option value="CMYK">CMYK</option>
                                                    <option value="Grayscale">Grayscale</option>
                                                    <option value="HEX">HEX</option>
                                                    <option value="Pantone">Pantone</option>
                                                    <option value="CMY">CMY</option>
                                                    <option value="HSL">HSL</option>
                                                    <option value="HSV">HSV</option>
                                                    <option value="LAB">LAB</option>
                                                    <option value="LCH">LCH</option>
                                                    <option value="LUV">LUV</option>
                                                    <option value="XYZ">XYZ</option>
                                                    <option value="YUV">YUV</option>
                                                    <option value="YIQ">YIQ</option>
                                                    <option value="YCbCr">YCbCr</option>
                                                    <option value="YPbPr">YPbPr</option>
                                                    <option value="YDbDr">YDbDr</option>
                                                    <option value="YCoCg">YCoCg</option>
                                                    <option value="YCgCo">YCgCo</option>
                                                    <option value="YCC">YCC</option>
                                                    <option value="None">None</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-data">
                                            <div class="label-info"><span>Special Effects:</span></div>
                                            <div class="input-info">
                                                <select id="special-effects-image">
                                                    <option selected="" value="Cinemagraph">Cinemagraph</option>
                                                    <option value="3D">3D</option>
                                                    <option value="Add Noise">Add Noise</option>
                                                    <option value="Black and White">Black and White</option>
                                                    <option value="Blur">Blur</option>
                                                    <option value="Bokeh">Bokeh</option>
                                                    <option value="Brightness and Contrast">Brightness and Contrast</option>
                                                    <option value="Camera Shake">Camera Shake</option>
                                                    <option value="Clarity">Clarity</option>
                                                    <option value="Color Balance">Color Balance</option>
                                                    <option value="Color Pop">Color Pop</option>
                                                    <option value="Color Temperature">Color Temperature</option>
                                                    <option value="Cross Processing">Cross Processing</option>
                                                    <option value="Crop and Rotate">Crop and Rotate</option>
                                                    <option value="Dehaze">Dehaze</option>
                                                    <option value="Denoise">Denoise</option>
                                                    <option value="Diffuse Glow">Diffuse Glow</option>
                                                    <option value="Displace">Displace</option>
                                                    <option value="Distort">Distort</option>'
                                                    <option value="Double exposure">Double exposure</option>
                                                    <option value="Duotone">Duotone</option>
                                                    <option value="Edge Detection">Edge Detection</option>
                                                    <option value="Emboss">Emboss</option>
                                                    <option value="Exposure">Exposure</option>
                                                    <option value="Fish Eye">Fish Eye</option>
                                                    <option value="Flare">Flare</option>
                                                    <option value="Flip">Flip</option>
                                                    <option value="Fractalius">Fractalius</option>
                                                    <option value="Glowing Edges">Glowing Edges</option>
                                                    <option value="Gradient Map">Gradient Map</option>
                                                    <option value="Grayscale">Grayscale</option>
                                                    <option value="Halftone">Halftone</option>
                                                    <option value="HDR">HDR</option>
                                                    <option value="HDR Look">HDR Look</option>
                                                    <option value="High Pass">High Pass</option>
                                                    <option value="Hue and Saturation">Hue and Saturation</option>
                                                    <option value="Impressionist">Impressionist</option>
                                                    <option value="Infrared">Infrared</option>
                                                    <option value="Invert">Invert</option>
                                                    <option value="Lens Correction">Lens Correction</option>
                                                    <option value="Lens flare">Lens flare</option>
                                                    <option value="Lomo Effect">Lomo Effect</option>
                                                    <option value="Motion Blur">Motion Blur</option>
                                                    <option value="Night Vision">Night Vision</option>
                                                    <option value="Oil Painting">Oil Painting</option>
                                                    <option value="Old Photo">Old Photo</option>
                                                    <option value="Orton Effect">Orton Effect</option>
                                                    <option value="Panorama">Panorama</option>
                                                    <option value="Pinch">Pinch</option>
                                                    <option value="Pixelate">Pixelate</option>
                                                    <option value="Polar Coordinates">Polar Coordinates</option>
                                                    <option value="Posterize">Posterize</option>
                                                    <option value="Radial Blur">Radial Blur</option>
                                                    <option value="Rain">Rain</option>
                                                    <option value="Reflect">Reflect</option>
                                                    <option value="Ripple">Ripple</option>
                                                    <option value="Sharpen">Sharpen</option>
                                                    <option value="Slow motion">Slow motion</option>
                                                    <option value="Stop-motion">Stop-motion</option>
                                                    <option value="Solarize">Solarize</option>
                                                    <option value="Starburst">Starburst</option>
                                                    <option value="Sunburst">Sunburst</option>
                                                    <option value="Timelapse">Timelapse</option>
                                                    <option value="Tilt-shift">Tilt-shift</option>
                                                    <option value="Vignette">Vignette</option>
                                                    <option value="Zoom blur">Zoom blur</option>
                                                    <option value="None">None</option>
                                                </select>
                                            </div>
                                        </div>
                                        <h4>Pexels</h4>
                                        <div class="input-data">
                                            <div class="label-info"><span>Orientation:</span></div>
                                            <div class="input-info">
                                                <select id="image-pexels-orientation">
                                                    <option value="">None</option>
                                                    <option value="landscape">Landscape</option>
                                                    <option value="portrait">Portrait</option>
                                                    <option value="square">Square</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="input-data">
                                            <div class="label-info"><span>Size:</span></div>
                                            <div class="input-info">
                                                <select id="image-pexels-orientation">
                                                    <option value="">None</option>
                                                    <option value="large">Large</option>
                                                    <option value="medium">Medium</option>
                                                    <option value="small">Small</option>
                                                </select>
                                            </div>
                                        </div>




                                    </div>

                                </div>

                            </div>



                            <button class="accordionmenu">Additional Content<span class="arrow-up-down"><?php echo $iArrowupdown; ?></span></button>
                            <div class="am-panel">
                                <div class="input-data-wrap">
                                    <div class="input-data check-box-row">
                                        <div class="label-info"><span>Add Tagline?</span></div>
                                        <div class="input-info">
                                            <input type="checkbox" id="add_tagline" />
                                        </div>
                                    </div>
                                    <div class="input-data check-box-row">
                                        <div class="label-info"><span>Add Introduction?</span></div>
                                        <div class="input-info">
                                            <input type="checkbox" id="add_introduction" />
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Intro Title Tag:</span></div>
                                        <div class="input-info">
                                            <select id="intro_title_tag">
                                                <option value="h1">h1</option>
                                                <option value="h2">h2</option>
                                                <option value="h3">h3</option>
                                                <option value="h4">h4</option>
                                                <option value="h5">h5</option>
                                                <option value="h6">h6</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="input-data check-box-row">
                                        <div class="label-info"><span>Add Conclusion?</span></div>
                                        <div class="input-info">
                                            <input type="checkbox" id="add_conclusion" name="0" value="0">
                                        </div>
                                    </div>



                                    <div class="input-data">
                                        <div class="label-info"><span>Conclusion Title Tag</span></div>
                                        <div class="input-info">
                                            <select id="conclusion_title_tag">
                                                <option value="h1">h1</option>
                                                <option value="h2">h2</option>
                                                <option value="h3">h3</option>
                                                <option value="h4">h4</option>
                                                <option value="h5">h5</option>
                                                <option value="h6">h6</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-data check-box-row">
                                        <div class="label-info"><span>Add Q&A:</span></div>
                                        <div class="input-info">
                                            <input type="checkbox" id="available_in_pro" /> Available in Pro
                                        </div>
                                    </div>
                                    <div class="input-data check-box-row">
                                        <div class="label-info"><span>Add Table of Contents?</span></div>
                                        <div class="input-info">
                                            <input type="checkbox" id="add_table_of_content" />
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>ToC Title</span></div>
                                        <div class="input-info">
                                            <input type="text" id="toc_title" />
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>ToC Title Tag</span></div>
                                        <div class="input-info">
                                            <select id="toC_title_tag">
                                                <option value="h1">h1</option>
                                                <option value="h2">h2</option>
                                                <option value="h3">h3</option>
                                                <option value="h4">h4</option>
                                                <option value="h5">h5</option>
                                                <option value="h6">h6</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button class="accordionmenu">Links<span class="arrow-up-down"><?php echo $iArrowupdown; ?></span></button>
                            <div class="am-panel">

                                <div class="input-data-wrap">
                                    <div class="input-data bottom-input-text">
                                        <div class="label-info"><span>Anchor Text?</span></div>
                                        <div class="input-info">
                                            <input type="text" id="anchor-text" placeholder="e.g battery life">
                                        </div>
                                    </div>
                                    <div class="input-data bottom-input-text">
                                        <div class="label-info"><span>Target URL?</span></div>
                                        <div class="input-info">
                                            <input type="text" id="target-url" placeholder="https://">
                                            <span>(Use comma to seperate keywords)</span>
                                        </div>
                                    </div>
                                    <div class="input-data bottom-input-text">
                                        <div class="label-info"><span>Add Call-to-Action?</span></div>
                                        <div class="input-info">
                                            <input type="text" id="add-call-to-position" placeholder="https://">
                                            <span>Enter target URL.</span>
                                        </div>
                                    </div>
                                    <div class="input-data bottom-input-text">
                                        <div class="label-info"><span>CTA Position?</span></div>
                                        <div class="input-info">
                                            <select id="cta-position">
                                                <option value="Beginning">Beginning</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button class="accordionmenu">SEO<span class="arrow-up-down"><?php echo $iArrowupdown; ?></span></button>
                            <div class="am-panel">
                                <div class="input-data-wrap">
                                    <div class="input-data check-box-row">
                                        <div class="label-info"><span>Meta Description?</span></div>
                                        <div class="input-info">
                                            <input type="checkbox" id="metaDescription">
                                        </div>
                                    </div>
                                    <div class="input-data bottom-input-text">
                                        <div class="label-info"><span>Tags:</span></div>
                                        <div class="input-info">
                                            <input id="tags" type="text" value="" placeholder="">
                                            <span>(Use comma to seperate tags)</span>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <button class="accordionmenu">Custom Prompt<span class="arrow-up-down"><?php echo $iArrowupdown; ?></span></button>
                            <div class="am-panel">
                                <div class="input-data-wrap">
                                    <div class="input-data check-box-row">
                                        <div class="label-info"><span>Enable:</span></div>
                                        <div class="input-info">
                                            <input type="checkbox" id="custom_prompt">
                                            <span id="custom_prompt_span">
                                                <h6>Best Practices and TipsEnsure [title] is included in your prompt.</h6>
                                                <p>You can add your language to the prompt. Just replace "in English" with your language.</p>
                                                <p>This works best with gpt-4 and gpt-3.5-turbo and gpt-3.5-turbo-16k. Please note that GPT-4 is currently in limited beta, which means that access to the GPT-4 API from OpenAI is available only through a waiting list and is not open to everyone yet. You can sign up for the waiting list at here.</p>
                                                <p>Please note that if custom prompt is enabled the plugin will bypass language, style, tone etc settings. You need to specify them in your prompt.</p>
                                                <textarea id="custom_prompt_textarea" cols="30" rows="10"></textarea>
                                            </span>


                                        </div>
                                    </div>



                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="main-content-info tabs" data-tab="tabs-2">
                <h3>Speech-to-Post</h3>

                <div class="full-wid-content-area-info">

                    <div class="full-wid-data-info">
                        <p>Simply press the record button and speak your prompt, just like you would in a conversation.</p>
                        <div class="please-note-info mt-0">
                            <h4>Example</h4>
                            <p>"Write a blog post about the latest mobile phones and their features. Include an introduction that highlights the importance of mobile phones in today's world. In the body of the post, discuss the latest mobile phone trends, such as foldable screens, 5G connectivity, and high refresh rate displays. Also, mention the most popular mobile phone brands and their latest releases. Don't forget to discuss the benefits and drawbacks of each phone and how they compare to one another. In the conclusion, summarize the key points of the post."</p>

                        </div>
                        <p><button type="button" class="generate-button" onclick="runSpeechRecognition()"><?php echo $svgMic; ?>Speech to Text</button> &nbsp; <span id="action"></span></p>
                        <div id="output" class="hide"></div>

                    </div>

                </div>
                <div class="full-wid-data-info" style="margin-top:1em; ">
                    <div class="editor-data-wrap">
                        <div class="content-info">
                            <?php
                            $custom_text_value = '';
                            wp_editor(
                                $custom_text_value,
                                'textarea-input-speak-text',  //Editor_ID
                                array(
                                    'textarea_name' => '_wporg_preview_texarea',
                                    'editor_height' => 300,
                                    'media_buttons' => true,
                                    'wpautop' => false,
                                    'quicktags' => true,
                                    'tinymce' => true, // Textarea box// Textarea box
                                    'textarea_class' => 'preview_textarea'
                                )
                            );
                            ?>
                        </div>

                    </div>
                </div>



            </div>
            <div class="main-content-info tabs" data-tab="tabs-3">
                <h3>Playground</h3>
                <div class="content-area-info">
                    <div class="left-data-info">
                        <div class="full-wid input-data">
                            <div class="input-info">
                                <span>Category:</span>
                                <select>
                                    <option value="Default">Select a category</option>
                                    <option value="Dall-E">Dall-E</option>
                                </select>

                            </div>
                        </div>
                        <h4>Custom Prompt:</h4>
                        <div class="input-data full-wid">
                            <div class="input-info">
                                <textarea id="generate-text-playground" name="" rows="5" cols="50">Write a blog post on how to effectively monetize a blog, discussing various methods such as affiliate marketing, sponsored content, and display advertising, as well as tips for maximizing revenue.</textarea>
                                <div class="sub-cta-info">
                                    <button class="btn" id="generate-playground"> Generate </button>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="right-data-info">
                        <div class="editor-data-wrap">
                            <div class="content-info">
                                <textarea id="playground-output" rows="10"></textarea>
                            </div>

                        </div>


                    </div>
                </div>


            </div>
            <div class="main-content-info tabs" data-tab="tabs-4">
                <h3>Logs</h3>

                <div class="content-area-info single-content-area-info">
                    <div class="left-data-info search-data-wrap">

                        <div class="input-data full-wid">
                            <div class="input-info">
                                <span>Search</span>
                                <input type="text" id="" name="0" value="">

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
                                        <th>Topic</th>
                                        <th>Date</th>
                                        <th>Token</th>
                                        <th>Model</th>
                                        <th>Author</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Topic</th>
                                        <th>Date</th>
                                        <th>Token</th>
                                        <th>Model</th>
                                        <th>Author</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>




        </div>
    </div>
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript">
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
            alert(transcript);

            var transcript = event.results[0][0].transcript;
            var confidence = event.results[0][0].confidence;
            output.innerHTML = "<b>Text:</b> " + transcript + "<br/> <b>Confidence:</b> " + confidence * 100 + "%";
            output.classList.remove("hide");
            //  $("#text-input-generator-play").val(transcript);

            generateContent(transcript);
        };

        recognition.start();
    }
</script>
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
    document.getElementById("defaultOpen").click();

    $(document).ready(function() {
        $("#generate-playground").click(function() {
            var playgroundText = $("#generate-text-playground").val();
            if (playgroundText == '') {
                alert("Playground text can not empty.");
                return false;
            }
            $(".loaderoverlay").fadeIn(300);
            $.ajax({
                url: "<?php echo $apiUrl; ?>content-text-playground",
                type: 'POST',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader("secertkey", "<?php echo $secertkey; ?>");
                    xhr.setRequestHeader("openai", "<?php echo $openAi; ?>");
                },
                dataType: 'json',
                data: {
                    'prompt': playgroundText,
                    'model': 'text-davinci-003',
                    'temperature': 0.7,
                    'maxtoken': 256
                }
            }).done(function(response) {
                if (response.result == 'Success') {
                    console.log(response);
                    console.log(response.data.choices[0].text);
                    setTimeout(function() {
                        $(".loaderoverlay").fadeOut(300);
                    }, 500);

                    doWithInterval('input', response.data.choices[0].text);

                    var data = {
                        'action': 'my_content_data',
                        'model': response.data.model,
                        'title': playgroundText,
                        'date': response.data.created,
                        'token': response.data.usage.total_tokens,
                        'type': 'playground'
                    };
                    jQuery.post(ajaxurl, data, function(response) {
                        var responseJsonData = jQuery.parseJSON(response);
                        console.log(responseJsonData.result);
                        if (responseJsonData.result == 'Success') {
                            console.log("log saved Succesfully");
                        } else if (responseJsonData.result == 'Failure') {
                            //alert("Something Went Wrong!!"); 
                            console.log("Something Went Wrong!!");
                        }
                    });
                } else if (response.result == 'Failure') {
                    console.log("Something Went Wrong!!");
                }

            }).fail(function(jqXHR, textStatus, errorThrown) {
                alert('FAILED! ERROR: ' + errorThrown);
            });

        });
    });

    function doWithInterval(id, sentence) {
        var f;
        f = function(i) {
            document.getElementById('playground-output').innerHTML += sentence[i];
            if (i + 1 == sentence.length) {
                return;
            }
            window.setTimeout(function() {
                f(i + 1);
            }, 20);
        }
        f(0);
    }


    function generateContent(speakText = '') {

        var custom_prompt = $("#custom_prompt_textarea").val();

        if (custom_prompt == '') {

            var tags = '';
            var metacheck = false;
            if (speakText == '') {
                var preview_title = $("#preview_title").val();
                if (preview_title == '') {
                    alert("Title is empty");
                    return false;

                }
            } else if (preview_title != '') {
                preview_title = speakText;
            }

            if ($("#metaDescription").is(":checked")) {
                metacheck = true;
                tags = $("#tags").val();
                if (tags == '') {
                    alert("Please enter tags with tags with short desciption");
                    return false;
                }

            } else {
                metacheck = false;
            }
            var language = $("#language").val();
            var style = $("#style").val();
            var tone = $("#tone").val();
            var heading_tag = $("#heading-tag").val();
            var heading = $("#heading").val();





            prompt = "Describe 2000 words in pargraphs and each pargraph start with heading tag i.e " + heading_tag + "and heading is " + heading + "and topic is " + preview_title + " language is " + language + " with style " + style + ",tone " + tone + "and call action url i.e " + add_call_to_position;

            var anchor_text = $("#anchor-text").val();


            if (anchor_text != '') {
                prompt += " and create anchor text " + anchor_text;
            }

            var target_url = $("#target-url").val();

            if (target_url != '') {
                prompt += "and target Url i.e " + target_url;
            }

            var add_call_to_position = $("#add-call-to-position").val();




            if (add_call_to_position == '') {
                prompt += "and call to position " + add_call_to_position;
            }

            var add_keywords = $("#add_keywords").val();

            if (add_keywords != '') {
                prompt += ".Add Keywords in pargraph " + add_keywords;
            }

            var keywords_to_avoid = $("#keywords_to_avoid").val();

            if (keywords_to_avoid != '') {
                prompt += ".Avoid Keywords in pargraph " + keywords_to_avoid;
            }

            if ($("#make_keywords_bold").is(":checked")) {
                prompt += "Make Keywords bold.";
            }


            if ($("#add_tagline").is(":checked")) {
                prompt += "and add tagline and start with p tag.";
            }

            if ($("#add_introduction").is(":checked")) {
                var intro_title_tag = $("#intro_title_tag").val();
                prompt += "and add Pargraph Intrduction and start with " + intro_title_tag;
            }


            if ($("#add_conclusion").is(":checked")) {
                var conclusion_title_tag = $("#conclusion_title_tag").val();
                prompt += "and add Pargraph Intrduction and start with " + conclusion_title_tag;
            }

            if ($("#available_in_pro").is(":checked")) {
                prompt += "and also add question answers.";
            }


            if ($("#add_table_of_content").is(":checked")) {
                var toc_title = $("#toc_title").val();
                var title_tag = $("#toC_title_tag").val();
                prompt += "add table of contents and add The table of contents title is " + toc_title + " The table of contents title tag start with " + title_tag;
            }

            $("#content-text").val('');
            $("#meta-description").val('');
        } else if (custom_prompt != '') {
            prompt = custom_prompt;

        }
        $(".loaderoverlay").fadeIn(300);
        $.ajax({
            url: "<?php echo $apiUrl; ?>content-text",
            type: 'POST',
            beforeSend: function(xhr) {
                xhr.setRequestHeader("secertkey", "<?php echo $secertkey; ?>");
                xhr.setRequestHeader("openai", "<?php echo $openAi; ?>");
            },
            dataType: 'json',
            data: {
                'prompt': prompt,
                'model': 'text-davinci-003',
                'temperature': 0,
                'maxtoken': 3500,
                'type': 'web',
                "language": language,
                "style": style,
                "tone": tone
            }
        }).done(function(response) {
            setTimeout(function() {
                $(".loaderoverlay").fadeOut(300);
            }, 500);
            if (response.result == 'Success') {
                console.log(response);
                console.log(response.data.choices[0].text);
                if (speakText == '') {
                    $("#content-text").val(response.data.choices[0].text);
                    if ($("#metaDescription").is(":checked")) {
                        seoContent(preview_title, 'text-davinci-003', 0, 3500, 'web', tags);

                    }

                    var image = $("#image").val();
                    if (image != '') {
                        imageGenerator(preview_title);
                    }

                    var featureImageGenerator = $("#featured-image").val();
                    if (image != '') {
                        imageGenerator(preview_title);
                    }

                    if (featureImageGenerator != '') {
                        featureImageGenerator(preview_title)
                    }

                    setTimeout(function() {
                        $(".loaderoverlay").fadeOut(300);
                    }, 500);
                } else {
                    $("#content-text").val(response.data.choices[0].text);
                    $(".loaderoverlay").fadeOut(300);
                }
                var data = {
                    'action': 'my_content_data',
                    'model': response.data.model,
                    'title': preview_title,
                    'date': response.data.created,
                    'token': response.data.usage.total_tokens,
                    'type': 'content'
                };
                jQuery.post(ajaxurl, data, function(response) {
                    var responseJsonData = jQuery.parseJSON(response);
                    console.log(responseJsonData.result);
                    if (responseJsonData.result == 'Success') {
                        alert("Log saved successfully.");
                        $(".loaderoverlay").fadeOut(300);
                    } else if (responseJsonData.result == 'Failure') {
                        alert("language not supported");
                        $(".loaderoverlay").fadeOut(300);
                    }
                });
            } else if (response.result == 'Failure') {
                alert("Something Went Wrong!!")
            }

        }).fail(function(jqXHR, textStatus, errorThrown) {
            alert('FAILED! ERROR: ' + errorThrown);
        });

    }

    $(document).ready(function() {
        $("#logs-tab").click(function() {
            $('table tbody > tr').remove();
            var data = {
                'action': 'my_content_data_get',
                'type': 'content'
            };
            jQuery.post(ajaxurl, data, function(response) {
                var responseJsonData = jQuery.parseJSON(response);
                console.log(responseJsonData.result);
                if (responseJsonData.result == 'Success') {
                    var table = '';
                    table += '<tbody>';
                    var dataObj = responseJsonData.data;
                    // console.log(responseJsonData.data);
                    $.each(dataObj, function(key2, valueObj) {
                        table += "<tr>";
                        $.each(valueObj, function(key, value) {
                            table += "<td>" + value + "</td>"
                        });
                        table += "</tr>";
                    });
                    table += '</table>';
                    console.log(table);
                    $('.log-audio-table').append(table);
                } else if (responseJsonData.result == 'Failure') {
                    alert("Something Went Wrong!!");
                }
            });
        })
    })

    function seoContent(prompt, model, temperature, maxtoken, tags) {
        $.ajax({
            url: "<?php echo $apiUrl; ?>generate-meta-description",
            type: 'POST',
            beforeSend: function(xhr) {
                xhr.setRequestHeader("secertkey", "<?php echo $secertkey; ?>");
                xhr.setRequestHeader("openai", "<?php echo $openAi; ?>");
            },
            dataType: 'json',
            data: {
                'prompt': prompt,
                'model': model,
                'temperature': temperature,
                'maxtoken': maxtoken,
                'tags': tags
            }
        }).done(function(response) {
            setTimeout(function() {
                $(".loaderoverlay").fadeOut(300);
            }, 500);
            if (response.result == 'Success') {
                console.log(response);
                console.log(response.data.choices[0].text);
                $("#meta-description").val(response.data.choices[0].text);
                setTimeout(function() {
                    $(".loaderoverlay").fadeOut(300);
                }, 500);
            } else if (response.result == 'Failure') {
                alert("Something Went Wrong!!")
            }

        }).fail(function(jqXHR, textStatus, errorThrown) {
            alert('FAILED! ERROR: ' + errorThrown);
        });


    }


    $("#custom_prompt").click(function() {
        var prompt = '';
        if ($("#custom_prompt").is(":checked")) {
            $("#custom_prompt_span").css("display", "block");
            var preview_title = $("#preview_title").val();
            if (preview_title == '') {
                alert("custom prompt required title.");
                return false;
            }
            var language = $("#language").val();
            var heading_tag = $("#heading-tag").val();
            var style = $("#style").val();
            if (preview_title != '') {
                var prompt =
                    "Create a compelling and well-researched article of at least 500 words on the topic of " + preview_title + " in " + language + ".  Structure the article with clear headings enclosed within the appropriate heading tags " + heading_tag + " and engaging subheadings. Ensure that the content is " + style + " and provides valuable insights to the reader. Incorporate relevant examples, case studies, and statistics to support your points. Organize your ideas using unordered lists with <ul> and <li> tags where appropriate. Conclude with a strong summary that ties together the key takeaways of the article. Remember to enclose headings in the specified heading tags to make parsing the content easier. Additionally, wrap even paragraphs in <p> tags for improved readability."
            }
            $("#custom_prompt_textarea").val(prompt);
        } else {
            $("#custom_prompt_span").css("display", "none");
            $("#custom_prompt_textarea").val('');
        }
    })
</script>


<script>
    $('#image_settings').click(function() {
        $('#image-setting-data').slideToggle("slow");
    });



    function imageGenerator(preview_title) {


        var prompt = preview_title;
        var size = $("#image-size").val();

        $.ajax({
            url: "<?php echo $apiUrl; ?>generate-image",
            type: 'POST',
            beforeSend: function(xhr) {
                xhr.setRequestHeader("secertkey", "<?php echo $secertkey; ?>");
                xhr.setRequestHeader("openai", "<?php echo $openAi; ?>");
            },
            dataType: 'json',
            data: {
                'prompt': prompt,
                'n': 1,
                'size': size
            }
        }).done(function(response) {

            if (response.result == 'Success') {
                var images = response.data.data;
                console.log(images);
                setTimeout(function() {
                    $(".loaderoverlay").fadeOut(300);
                }, 500);


            } else if (response.result == 'Failure') {
                setTimeout(function() {
                    $(".loaderoverlay").fadeOut(300);
                }, 500);
                alert("Something Went Wrong!!")
            }

        }).fail(function(jqXHR, textStatus, errorThrown) {
            setTimeout(function() {
                $(".loaderoverlay").fadeOut(300);
            }, 500);
            alert('FAILED! ERROR: ' + errorThrown);
        });

    }


    function featureImageGenerator(preview_title) {

        var prompt = preview_title;
        var size = $("#image-size").val();


        $.ajax({
            url: "<?php echo $apiUrl; ?>generate-image",
            type: 'POST',
            beforeSend: function(xhr) {
                xhr.setRequestHeader("secertkey", "<?php echo $secertkey; ?>");
                xhr.setRequestHeader("openai", "<?php echo $openAi; ?>");
            },
            dataType: 'json',
            data: {
                'prompt': prompt,
                'n': 1,
                'size': size
            }
        }).done(function(response) {

                if (response.result == 'Success') {
                    var images = response.data.data;
                    console.log(images);
                }); setTimeout(function() {
                $(".loaderoverlay").fadeOut(300);
            }, 500);


        }
        else if (response.result == 'Failure') {
            setTimeout(function() {
                $(".loaderoverlay").fadeOut(300);
            }, 500);
            alert("Something Went Wrong!!")
        }

    }).fail(function(jqXHR, textStatus, errorThrown) {
        setTimeout(function() {
            $(".loaderoverlay").fadeOut(300);
        }, 500);
        alert('FAILED! ERROR: ' + errorThrown);
    });

    }
</script>