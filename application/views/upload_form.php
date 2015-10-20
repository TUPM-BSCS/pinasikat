<main>
  <?php 
    
  ?>
  <form method="post" enctype="multipart/form-data" action="<?php echo base_url("article/create");?>" id="art-form">
    <div class="row">
      <div class="input-field col s12">
        <input id="art_name" name='art_name' type="text" length="500" required>
        <label for="art_name">Title</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <textarea id="art_desc" name='art_desc' class="materialize-textarea" length="120" required></textarea>
        <label for="art_desc">About This Place</label>
      </div>
    </div>
    <div class="row">
      <div class="col s12 m6 l6 input-field">
        <input type='text' id='art_addr' name='art_addr' value="" required>
        <label for="art_street">Address</label>
      </div>
      <div class="col s12 m6 l6 input-field">
        <input type='text' id='art_city' name='art_city' value="" required>
        <label for="art_street">City</label>
      </div>
    </div>
    <div class="row">
      <div class="col s12">
        <div class="file-field input-field">
          <div class="btn">
            <span>Attach</span>
            <input type="file" name="file[]" multiple>
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Please attach at least 5 photos.">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col s12">
        <button class="btn waves-effect waves-light right" type="submit">Submit</button>
      </div>
    </div>
  </form>
</main>