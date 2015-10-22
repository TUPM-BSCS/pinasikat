<main>
  <div class="row">
  <?php 
    if(isset($query)){
      foreach ($query->result() as $row) {
        echo '
            <div class="col s12 m6 l4">
              <div class="card medium">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="'.base_url("uploads/".$row->id."-0.png").'">
                </div>
                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4 truncate">'.$row->name.'<i class="material-icons right">more_vert</i></span>
                  <p>'.anchor("article/".$row->id,"More info").'</p>
                </div>
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4><i class="material-icons right">close</i></span>
                  <p>'.$row->addr.'</p>
                  <p>'.$row->desc.'</p>
                </div>
              </div>
            </div>';
      }
    }
  ?>
  </div>
  <ul class="pagination">
    <?php
      if($page <= 1)
        echo '<li class="disabled"><i class="material-icons">chevron_left</i></li>';
      else
        echo '<li class="waves-effect"><a href="'.base_url($page-1).'"><i class="material-icons">chevron_left</i></a></li>';
    ?>
    <?php
      for($i = 1; $i <= $count; $i++){
        if($page == $i)
          echo '<li class="waves-effect active blue-grey white-text"><a href="'.base_url($i).'">'.$i.'</a></li>';
        else
          echo '<li class="waves-effect"><a href="'.base_url($i).'">'.$i.'</a></li>';
      }
    ?>
    <?php
      if($count == $page) 
        echo '<li class="disabled"><i class="material-icons">chevron_right</i></li>';
      else
        echo '<li class="waves-effect"><a href="'.base_url($page+1).'"><i class="material-icons">chevron_right</i></a></li>';
    ?>
  </ul>

</main>

