
<main>
  <?php $row = $query->row();?>
  <div class="section blue-grey lighten-5">
    <div class="row">
      <div class="col s12">
        <h3 class="right">"<b><?php echo $row->name;?></b>"</h3>
      </div>
      <div class="col s12">
        <h5 class="right"><?php echo $row->addr;?></h5>
      </div>
    </div>
  </div>

  <div class="section">
    <div class="row">
    <?php

      for($i = 0; $i < $row->photos; $i++){
        echo '<div class="col s12 l4">';
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

  <div class="section">
    <form class="row">
      <div class="col s12">
        <div class="card-panel">
          <textarea id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Write a comment...</label>
        </div>
      </div>
      <div class="col s12">
        <button class="btn small right" type="submit" name="action">Post</button>
      </div>
    </form>
  </div>

  <div class="row">
    <div class="col s12 m6 l6">
      <div class="card-panel grey lighten-5 z-depth-1">
        <div class="row valign-wrapper">
          <div class="col s2">
            <img src="images/yuna.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
          </div>
          <div class="col s10">
            <span class="black-text">
            This is a square image. Add the "circle" class to it to make it appear circular.
            </span>
          </div>
        </div>
      </div>
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

  
</main>