<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
    <title>PINASikat</title>
    <meta charset="utf-8">
  	<link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>

  	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

    <body>
    	<script type="text/javascript" src="<?php echo base_url("js/jquery.js");?>"></script>
    	<script type="text/javascript" src="<?php echo base_url("js/materialize.min.js");?>"></script>
      
      <div class="navbar-fixed">
        <nav class="blue-grey">
          <div class="nav-wrapper container">
            <form method="get" action="<?php echo base_url("search");?>">
              <div class="input-field">
                <input id="search" type="search" name="item" required>
                <label for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
              </div>
            </form>
          </div>
        </nav>
      </div>

      <div class="container">
        <div class="row card-panel">
          <div class="col s12">
            <a href="<?php echo base_url("adminlogout");?>" class="red-text right">Log out</a>
            <h4 class=""><b>Article Management</b></h4>
          </div>
          <div class="col s12"> 
            <p>Listed below are the submitted articles from different users of the PINASikat. Please click approve to post the article on the website, otherwise, click reject.</p>   
          </div>
        </div>

        <div class="row card-panel">
          <table class="highlight centered">
            <thead>
              <tr>
                <th data-field="id">Article Name</th>
                <th data-field="id">Category</th>
                <th data-field="id">Status</th>
                <th data-field="id">Quick Actions</th>
              </tr>
            </thead>

            <tbody>
            <?php
              foreach ($query->result() as $row) {
                echo '<tr>
                        <td><a href="'.base_url("inspect/".$row->id).'">'.$row->name.'</a></td>
                        <td>'.strtoupper($row->category).'</td>
                        <td>'.$row->approved.'</td>
                        <td class="center">
                          <a class="btn green waves-effect waves-light white-text" href="'.base_url("approve/".$row->id).'">APPROVE</a>
                          <a class="btn red waves-effect waves-light white-text" href="'.base_url("reject/".$row->id).'">REJECT</a>
                          <a class="btn grey waves-effect waves-light white-text" href="'.base_url("hold/".$row->id).'">HOLD</a>
                        </td>
                      </tr>';
              }
            ?>
            </tbody>
          </table>
        </div>
      </div>
    </body>
</html>