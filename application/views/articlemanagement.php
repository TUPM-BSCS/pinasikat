<main>
  <div class="row center">
    <div class="col s12">
      <div class="col s6 m6 l6 black"> 
         <h6> <button class="btn  waves-effect waves-dark  white darken-1 black-text" type="submit" name="action">PENDING ARTICLES</button></h6> 
      </div>

      <div class="col s6 m6 l6 black"> 
        <h6> <button class="btn  waves-effect waves-dark  white darken-1 black-text" type="submit" name="action">PENDING ARTICLES</button></h6> 
      </div>
    </div>

    <div class="col s12">
       <nav class="white">
        <div class="nav-wrapper">
          <form>
            <div class="input-field">
              <input id="search" type="search" required>
              <label for="search"><i class="material-icons black-text">search</i></label>
              <i class="material-icons black-text">close</i>
            </div>
          </form>
        </div>
      </nav>

      <table class="centered highlight bordered">
        <thead>
          <tr>
              <th data-field="id">Article Name</th>
              <th data-field="name">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Hagdan Hagdang Palayan</td>
            <td>
              <button class="btn  waves-effect waves-light black darken-1 white-text" type="submit" name="action">Approve</button>
              <button class="btn  waves-effect waves-light black darken-1 white-text" type="submit" name="action">Promote</button>
              <button class="btn  waves-effect waves-light black darken-1 white-text" type="submit" name="action">Disable</button>
            </td>
          </tr>
        </tbody>
      </table>                                  
    </div>
  </div>
</main>