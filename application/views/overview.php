
<main>
  <?php $row = $query->row();?>

  <ul>
  <?php

    for($i = 0; $i < $row->photos; $i++){
      echo '<li>';
      echo '<img width="10%" class="materialboxed responsive-img" src="'.base_url("uploads/".$row->id.'-'.$i.'.png').'">';
      echo '</li>';
    }

  ?>
  </ul>

  <div class="row">
    <div class="col s12">
      <h5 class="right"><?php echo $row->name;?></h5>        
    </div>
  </div>

  <div class="row">
    <div class="collection">
        <div class="collection-item avatar grey lighten-2">
            <span class="title"></span><h5><b>Description</b></h5></span>
              <br/>
                <p>Insert description here....<br/>
                Insert description here....<br/>
                Insert description here....<br/>
                Insert description here....<br/>
                Insert description here....<br/>
                Insert description here....<br/>
                Insert description here....<br/>
                </p>
        </div>

        <div class="rating">
            <div class="rating">
              <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
            </div>
        </div>
    </div> 
  </div>

 

    <div class="row"> 
        <form class="col s8">
          <div class="row grey lighten-2">
            <div class="input-field col s12">
              <textarea id="textarea1" class="materialize-textarea "></textarea>
               <label for="textarea1">Write a comment....</label>
               <button class="btn small grey darken-1 right" type="submit" name="action">Post
               </button>
            </div>
          </div>
        </form>  
    </div>

    <div class="row">
      <div class="col s12 m8 offset-m2 l6 offset-5">
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

     <div class="row">
      <div class="col s12 m8 offset-m2 l6 offset-5">
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

     <div class="row">
      <div class="col s12 m8 offset-m2 l6 offset-5">
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
</main>