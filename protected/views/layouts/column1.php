<?php $this->beginContent('//layouts/main'); ?>
 <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="http://corpseeker.org/#">Corpseeker.org</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="http://corpseeker.org/#">Home</a></li>
              <ul class="nav">
  <li class="dropdown">
    <a href="#"
          class="dropdown-toggle"
          data-toggle="dropdown">
        
          Account
          <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
        
      <li ><a href="#"><i class="icon-user"></i> Профиль </a></li>
    </ul>
  </li>
</ul>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<div id="content">
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>