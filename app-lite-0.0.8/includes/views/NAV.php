<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="<?=BASE_URL;?>index.php"><?=APP_NAME;?></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Section 1 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=BASE_URL;?>some_view.php">some view</a></li>
                <li><a href="<?=BASE_URL;?>some_view.php">some view</a></li>
               	<li><a href="<?=BASE_URL;?>some_view.php">some view</a></li>
               	 
              </ul>
            </li>
           -->
           <?php if(isset($_SESSION['authorized']) ){ ?>
           		 <?php if($_SESSION['authorized'] == 1){ ?>

           		 	<li id="main_controller" class=" menu_item "><a href="<?=BASE_URL;?>index.php?c=main_controller&m=read">Main</a></li>
            		<!--<li id="user_controller" class=" menu_item "><a href="<?=BASE_URL;?>index.php?c=user_controller&m=read">User</a></li> -->
            		<!--<li id="account_controller"  class=" menu_item " ><a href="<?=BASE_URL;?>index.php?c=account_controller&m=read">account</a></li> -->
					<!--<li id="admin_controller"  class=" menu_item " ><a href="<?=BASE_URL;?>index.php?c=admin_controller&m=read">admin</a></li>

            	-->
          		 	<?php include_once('nav_includes.php'); ?>
          		 
          		 <?php } ?>
          <?php } ?>
          </ul>
          
           <?php 
           
           if( isset($_SESSION['authorized']) &&  $_SESSION['authorized'] == 1){   
           		$cw_link = ' <li><a href="'.BASE_URL.'codewriter_plus.php"><span class="glyphicon glyphicon-user"></span>code writer +</a></li>';
          }else {$cw_link=""; } 
          
          ?>
          
          <ul class="nav navbar-nav navbar-right">
          	<li id="admin_controller"  class=" menu_item " ><a href="<?=BASE_URL;?>index.php?c=admin_controller&m=read">admin</a></li>
            <li><a href="<?=BASE_URL;?>index.php?c=admin_controller&m=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
         <?php echo($cw_link); ?>
          </ul>
        </div>
      </div>
    </nav>
    <script>
    $(document).ready(function(){
    	if(typeof controller != "undefined"){
    		$('#'+controller).addClass('active');
    	}
    });
    </script>
	<div id="fixedNavigationAdjuster">&nbsp;</div>
