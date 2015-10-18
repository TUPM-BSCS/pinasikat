<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
    <title>PINASikat</title>
    <meta charset="utf-8">
  	<link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style> body{ font-family: Segoe UI; }</style>
  </head>

    <body>
    	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    	<script type="text/javascript" src="js/materialize.min.js"></script>
      
      <nav class="white"></nav>

      <div class="container">
        <div class="row">
          <h4 class="blue-text"><b>Article Approval Module</b></h4>
          <p>Listed below are the submitted articles from different users of the PINASikat Travel and Tour Guide System. Please click approve to post the article on the website, otherwise, click reject.</p>
        </div>

        <div class="row">
          <table class="striped highlight centered">
            <thead>
              <tr>
                <th data-field="id">Article</th>
                <th data-field="name">Action</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td> <a href="#">Palawan Underground River </a> </td>
                <td class="center">
                  <button class="btn  waves-effect waves-light  blue darken-1 white-text" type="submit" name="action">APPROVE</button>
                  <button class="btn  waves-effect waves-light  blue darken-1 white-text" type="submit" name="action">REJECT</button>
                </td>
              </tr>
              <tr>
                <td> <a href="#">Palawan Underground River </a> </td>
                <td class="center">
                  <button class="btn  waves-effect waves-light  blue darken-1 white-text" type="submit" name="action">APPROVE</button>
                  <button class="btn  waves-effect waves-light  blue darken-1 white-text" type="submit" name="action">REJECT</button>
                </td>
              </tr>
              <tr>
                <td> <a href="#">Palawan Underground River </a> </td>
                <td class="center">
                  <button class="btn  waves-effect waves-light  blue darken-1 white-text" type="submit" name="action">APPROVE</button>
                  <button class="btn  waves-effect waves-light  blue darken-1 white-text" type="submit" name="action">REJECT</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </body>
</html>