
<main>
  <div class="row">
    <div class="col s12 center blue-grey lighten-4">
      <h4 class="right">Dashboard</h4>
    </div>
  </div>
  <div class="row">
  
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s4"><a class="black-text" href="#test1">Pending Articles</a></li>
        <li class="tab col s4"><a class="black-text" href="#test2">Approved Articles</a></li>
        <li class="tab col s4"><a class="black-text" href="#test3">Rejected Articles</a></li>
      </ul>
    </div>
    
    <div id="test1" class="col s12">
      <div class="row card-panel">
        <table class="highlight centered">
          <thead>
            <tr>
              <th data-field="id">Article Name</th>
              <th data-field="id">Category</th>
            </tr>
          </thead>

          <tbody>
          <?php
            foreach ($pending->result() as $row) {
              echo '<tr>
                      <td><a href="'.base_url("inspect/".$row->id).'">'.$row->name.'</a></td>
                      <td>'.strtoupper($row->category).'</td>
                    </tr>';
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>

    <div id="test2" class="col s12">
      <div class="row card-panel">
        <table class="highlight centered">
          <thead>
            <tr>
              <th data-field="id">Article Name</th>
              <th data-field="id">Category</th>
            </tr>
          </thead>

          <tbody>
          <?php
            foreach ($approved->result() as $row) {
              echo '<tr>
                      <td><a href="'.base_url("inspect/".$row->id).'">'.$row->name.'</a></td>
                      <td>'.strtoupper($row->category).'</td>
                    </tr>';
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>

    <div id="test3" class="col s12">
      <div class="row card-panel">
        <table class="highlight centered">
          <thead>
            <tr>
              <th data-field="id">Article Name</th>
              <th data-field="id">Category</th>
            </tr>
          </thead>

          <tbody>
          <?php
            foreach ($rejected->result() as $row) {
              echo '<tr>
                      <td><a href="'.base_url("inspect/".$row->id).'">'.$row->name.'</a></td>
                      <td>'.strtoupper($row->category).'</td>
                    </tr>';
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  
  </div>

</main>
