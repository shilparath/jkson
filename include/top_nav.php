<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="mobile-only-brand pull-left">
    <div class="nav-header pull-left">
      <div class="logo-wrap">
        <a href="dashboard.php">
          <!--<img class="brand-img" src="logo.jpg" height="40" alt="brand"/>-->
          <span class="brand-text">J.K & Sons</span>
        </a>
      </div>
    </div>
    <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
    <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
    <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
    <form id="search_form" role="search" class="top-nav-search collapse pull-left">
      <div class="input-group">
        <input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
        <span class="input-group-btn">
        <button type="button" class="btn  btn-default"  data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
        </span>
      </div>
    </form>
  </div>


  <div id="mobile_only_nav" class="mobile-only-nav pull-right">
    <ul class="nav navbar-right top-nav pull-right">
      <li>
        <a id="open_right_sidebar" href="#"><i class="fa fa-user top-nav-icon" aria-hidden="true"></i></a>
      </li>
      <li>
        <a href="lock-screen.php"><i class="fa fa-lock top-nav-icon" aria-hidden="true"></i></a>
      </li>
      <!-- <li class="dropdown alert-drp">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-notifications top-nav-icon"></i><span class="top-nav-icon-badge">5</span></a>
        <ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
          <li>
            <div class="notification-box-head-wrap">
              <span class="notification-box-head pull-left inline-block">notifications</span>
              <div class="clearfix"></div>
              <hr class="light-grey-hr ma-0"/>
            </div>
          </li>
          <li>
            <div class="streamline message-nicescroll-bar">
              <div class="sl-item">
                <a href="javascript:void(0)">
                  <div class="icon bg-green">
                    <i class="zmdi zmdi-flag"></i>
                  </div>
                  <div class="sl-content">
                    <span class="inline-block capitalize-font  pull-left truncate head-notifications">
                    New subscription created</span>

                    <div class="clearfix"></div>
                    <p class="truncate">Your customer subscribed for the basic plan. The customer will pay $25 per month.</p>
                  </div>
                </a>
              </div>
              <hr class="light-grey-hr ma-0"/>
              <div class="sl-item">
                <a href="javascript:void(0)">
                  <div class="icon bg-yellow">
                    <i class="zmdi zmdi-trending-down"></i>
                  </div>
                  <div class="sl-content">
                    <span class="inline-block capitalize-font  pull-left truncate head-notifications txt-warning">Server #2 not responding</span>

                    <div class="clearfix"></div>
                    <p class="truncate">Some technical error occurred needs to be resolved.</p>
                  </div>
                </a>
              </div>
              <hr class="light-grey-hr ma-0"/>
              <div class="sl-item">
                <a href="javascript:void(0)">
                  <div class="icon bg-blue">
                    <i class="zmdi zmdi-email"></i>
                  </div>
                  <div class="sl-content">
                    <span class="inline-block capitalize-font  pull-left truncate head-notifications">2 new messages</span>

                    <div class="clearfix"></div>
                    <p class="truncate"> The last payment for your G Suite Basic subscription failed.</p>
                  </div>
                </a>
              </div>
              <hr class="light-grey-hr ma-0"/>
              <div class="sl-item">
                <a href="javascript:void(0)">
                  <div class="sl-avatar">
                    <img class="img-responsive" src="dist/img/avatar.jpg" alt="avatar"/>
                  </div>
                  <div class="sl-content">
                    <span class="inline-block capitalize-font  pull-left truncate head-notifications">Sandy Doe</span>

                    <div class="clearfix"></div>
                    <p class="truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                  </div>
                </a>
              </div>
              <hr class="light-grey-hr ma-0"/>
              <div class="sl-item">
                <a href="javascript:void(0)">
                  <div class="icon bg-red">
                    <i class="zmdi zmdi-storage"></i>
                  </div>
                  <div class="sl-content">
                    <span class="inline-block capitalize-font  pull-left truncate head-notifications txt-danger">99% server space occupied.</span>

                    <div class="clearfix"></div>
                    <p class="truncate">consectetur, adipisci velit.</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
        </ul>
      </li> -->
      <li class="dropdown auth-drp">
        <a href="javascript:void(0);" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="images/user.jpg" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
        <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
          <li>
            <a href="javascript:void(0);"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
          </li>
          <li>
            <a href="income-report.php"><i class="zmdi zmdi-card"></i><span>my income</span></a>
          </li>
          <li>
            <a href="change-password.php"><i class="zmdi zmdi-settings"></i><span>Settings</span></a>
          </li>

          <li class="divider"></li>
          <li>
            <a href="logout.php"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
