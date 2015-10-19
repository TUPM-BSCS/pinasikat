<main>
  <form method="post" enctype="multipart/form-data" action="upload" id="info-form">
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
  </form>
  <div class="row">
    <div class="col s12">
      <form method="post" enctype="multipart/form-data" action="dzupload" class="dropzone" id="imagesForm"></form>
    </div>
  </div>
  <div class="row">
    <div class="col s12">
      <button id="art-submit" class="btn waves-effect waves-light">Submit</button>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo base_url();?>js/dropzone.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>js/article.js"></script>
</main>