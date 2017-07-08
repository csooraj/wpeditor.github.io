<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <p id="loader"></p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
      </div>
      <!-- Begin # DIV Form -->
      <div id="div-forms">
        <!-- Begin # Login Form -->
        <form id="login-form">
          <div class="modal-body">
            <div id="div-login-msg">
              <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
              <span id="text-login-msg">Enter The Name Of App</span>
            </div>
            <input id="newappname" class="form-control" type="text" placeholder="Enter Name Of App" required>
          </div>
          <div class="modal-footer">
            <div>
              <button type="button" class="btn btn-success btn-lg btn-block" onClick="CreateApp()">Create New App</button>
            </div>
          </div>
        </form>
      </div>
      <!-- End # DIV Form -->
    </div>
  </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <p id="loader"></p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
      </div>
      <!-- Begin # DIV Form -->
      <div id="div-forms">
        <!-- Begin # Login Form -->
        <form>
          <div class="modal-body">
            <div id="message">
              <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
              <span id="text-login-msg">Loaded App Configuration</span>
            </div>
          </div>
          <div class="modal-footer" id="footermodal">
            <div>
              <a href="./splash.php"><button type="button" class="btn btn-primary btn-lg btn-block">Start Editing</button></a>
            </div>
          </div>
        </form>
      </div>
      <!-- End # DIV Form -->
    </div>
  </div>
</div>
