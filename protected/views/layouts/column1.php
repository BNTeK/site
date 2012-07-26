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
          <div class="nav-collapse in collapse">
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
      <li ><a href="#"><i class="icon-user"></i> Пункт 1 </a></li>
      <li ><a href="#"><i class="icon-user"></i> Пункт 2 </a></li>
      <li ><a href="#"><i class="icon-user"></i> Пункт 3 </a></li>
      <li ><a href="#"><i class="icon-user"></i> Пункт 4 </a></li>
      
    </ul>
  </li>

            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<div class="reklama">
              <img src="/images/9.jpg" alt="Альтернативный текст">
          </div> <!-- /reklama -->
<div id="content">
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>