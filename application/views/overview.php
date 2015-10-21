
<main>

  <?php
    $row = $query->row();
  ;?>

  <div class="section blue-grey lighten-5">
    <div class="row">
      <div class="col s12">
        <h3 class="center"><b><?php echo $row->name;?></b></h3>
      </div>
      <div class="col s12">
        <h5 class="center"><?php echo $row->addr;?></h5>
      </div>
    </div>
  </div>

  <div class="section">
    <div class="row">
    <?php

      for($i = 0; $i < $row->photos; $i++){
        echo '<div class="col s6 l4 m4">';
        echo '<img class="materialboxed responsive-img" src="'.base_url("uploads/".$row->id.'-'.$i.'.png').'">';
        echo '</div>';
      }

    ?>
    </div>
  </div>

  <div class="section white">
    <div class="row">
      <div class="col s12">
        <?php echo $row->desc;?>
      </div>
    </div>
  </div>

  <?php
    if(!isset($_SESSION['admin'])){
      if(isset($_SESSION['username'])){
        echo '<div class="section" id="comment-field">
                <div class="row">
                  <div class="col s12">
                    <div class="card-panel">
                      <textarea id="comment-area" class="materialize-textarea"></textarea>
                      <label for="comment-area">Write a comment...</label>
                    </div>
                  </div>
                  <div class="col s12">
                    <button class="btn right" id="submit-comment">Post</button>
                  </div>
                </div>
              </div>';
      }else{
        echo '<div class="section" id="comment-field">
                <div class="row">
                  <div class="col s12">
                    <div class="card-panel">
                      <textarea id="textarea1" class="materialize-textarea" disabled></textarea>
                      <label for="textarea1">Write a comment...</label>
                    </div>
                  </div>
                  <div class="col s12">
                    <a class="btn right modal-trigger" href="#login-modal" name="action">login to post comments</a>
                  </div>
                </div>
              </div>';
      }
    }else{
      echo '<div class="section">';
      echo '<div class="row">';
      echo '<div class="col s12">';
      echo '<a class="btn green" style="" href="'.base_url("approve/".$row->id).'">Approve</a>';
      echo '<a class="btn red" href="'.base_url("reject/".$row->id).'">Reject</a>';
      echo '<a class="btn grey" href="'.base_url("hold/".$row->id).'">Hold</a>'; 
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
 
  ?>

  <input type="hidden" value="<?php echo $row->id;?>" id="art_id">
  <input type="hidden" value="1" id="offset">

  <div id="comment-section" class="section">
  </div>

  <div class="row">
    <div class="col s12">
      <button id="load-more" class="btn waves-effect waves-light"><span>Load more comments</span></button>
    </div>
  </div>

  
  <!--
    <div class="rating">
        <div class="rating">
          <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
        </div>
    </div>
  </div>
  -->

  <script type="text/javascript" src="<?php echo base_url("js/comments.js");?>"></script>
</main>