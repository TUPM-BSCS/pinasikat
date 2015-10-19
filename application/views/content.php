<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main>
  <div class="row">
  <?php 
    if(isset($query)){
      foreach ($query->result() as $row) {
        echo '
            <div class="col s12 m6 l4">
              <div class="card medium">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="uploads/'.$row->id.'-0.png">
                </div>
                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">'.$row->name.'<i class="material-icons right">more_vert</i></span>
                  <p><a href="#">More info...</a></p>
                </div>
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">'.$row->name.'<i class="material-icons right">close</i></span>
                  <p>'.$row->addr.'</p>
                  <p>'.$row->desc.'</p>
                </div>
              </div>
            </div>';
      }
    }
  ?>
  </div>
</main>

