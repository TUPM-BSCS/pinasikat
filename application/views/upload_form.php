<main>
  <?php
    if(isset($successful)){
      if($successful){
        //notif green   
        echo '<div class="section green center" id="upload-notif">
                <span>Your arcticle has been submitted. It will be published soon after passing the evaluation.</span>
              </div>';  
      }else{
        //error red
        echo '<div class="section red center" id="upload-notif">
                <span>Please try again. Make sure all fields have valid inputs.</span>
              </div>'; 
      }
    } 
  ?>
  <?php echo form_open_multipart('upload');?>
    <div class="row">
      <div class="input-field col s12">
        <input id="art_name" name='art_name' type="text" length="500" value="<?php if(isset($art_name)) echo $art_name;?>" required>
        <label for="art_name">Title</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <textarea id="art_desc" name='art_desc' class="materialize-textarea" length="120" required><?php if(isset($art_desc)) echo $art_desc;?></textarea>
        <label for="art_desc">About This Place</label>
      </div>
    </div>
    <div class="row">
      <div class="col s12 m6 l6 input-field">
        <input type='text' id='art_addr' name='art_addr' value="<?php if(isset($art_addr)) echo $art_addr;?>" required>
        <label for="art_street">Address</label>
      </div>
      <div class="col s12 m6 l6 input-field">
        <input type='text' id='art_city' name='art_city' value="<?php if(isset($art_city)) echo $art_city;?>" required>
        <label for="art_street">City</label>
      </div>
    </div>
    <div class="row">
      <div class="col s12">
        <div class="input-field file-field">
          <div class="btn">
            <span>Photos</span>
            <input type="file" name="images[]" multiple>
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload at least 10 photos.">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col s12">
        <button class="waves-effect waves-light btn right" id="art_submit" type="submit">CREATE</button>
      </div>
    </div>
  </form>
</main>