<!doctype html>
<html lang="pl">
<head>
	<title>Administracja</title>
<meta charset="utf-8">
	<?=$this->Html->css('Markdown.css'); ?>
	<?=$this->Html->css('bootstrap.css'); ?>
	<?=$this->Html->css('app.css'); ?>
	<?=$this->Html->css('bootstrap-responsive.min.css'); ?>
	<?=$this->Html->css('http://blueimp.github.com/Bootstrap-Image-Gallery/css/bootstrap-image-gallery.min.css'); ?>
	<?=$this->Html->css('jquery.fileupload-ui.css'); ?>
	<?=$this->Html->css('app.css'); ?>
	<?=$this->Html->script(array(
		'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
		'Markdown.Converter.js',
		'Markdown.Editor.js',
		'Markdown.Sanitizer.js',
	)); ?>
	
	
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
	<div class="container">
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<?=$this->Html->link('Panel administracyjny', '/administration', array('class' => 'brand')); ?>
					<ul class="nav">
					</ul>
					<ul class="nav pull-right">
						<?php if(is_array($this->Session->read('Auth.User')) && $this->params['action'] != 'administration_login'){ ?>
                                                <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$this->Session->read('Auth.User.username'); ?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><?=$this->Html->link('Wyloguj mnie', '/administration/users/logout'); ?></li>
							</ul>
						</li>
                    	<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	<div class="row-fluid page-content">
				<aside class="span2 page-sidebar">
				<?php if(is_array($this->Session->read('Auth.User')) && $this->params['action'] != 'administration_login'){ ?>
                
                <nav class="well" style="padding: 8px 0;">
					<ul class="nav nav-list">
						<li class="nav-header">Zarządzanie</li>
						
						<li class="#"><?=$this->Html->link(
							'<i class=" icon-list"></i> Główne menu', 
							'/administration/menuItems', 
							array('escape' => false)
						); ?></li>
						
						<li class="#"><?=$this->Html->link(
							'<i class=" icon-signal"></i> Podstrony', 
							'/administration/StaticElements/list', 
							array('escape' => false)
						); ?></li>
						
						<li class="#"><?=$this->Html->link(
							'<i class=" icon-th"></i> Aktualności', 
							'/administration/news', 
							array('escape' => false)
						); ?></li>
						
						<li class="#"><?=$this->Html->link(
							'<i class=" icon-list-alt"></i> Galerie zdjęć', 
							'/administration/galleries', 
							array('escape' => false)
						); ?></li>
						
						<li class="divider"></li>
						
						<li class="nav-header">Administracja</li>
						
						<li class="#"><?=$this->Html->link(
							'<i class=" icon-pencil"></i> Zmień hasło', 
							'/administration/users/password', 
							array('escape' => false)
						); ?></li>
						
						<li class=""><?=$this->Html->link(
							'<i class="icon-flag"></i> Pomoc', 
							'#', 
							array('escape' => false)
						); ?></li>
						
					</ul>
				</nav>
				
				<?php } ?>

			</aside>
	
				<!--  -->
	<div class="span10">
		<?=$this->fetch('content'); ?>
	</div>
	</div>
		<hr>
<footer class="footer row-fluid">
	<div class="span12">
		<p>&copy; G-INTERACTIVE Solutions 2012</p>
		<p class="pull-right"><a href="#" class="btn btn-small"><i class="icon-arrow-up"></i> do góry</a></p>
	</div>
</footer>
</div>


<!-- modals -->
<?php /*
<div class="modal" id="notification_modal">
  <div class="modal-header">
    <button class="close" data-dismiss="modal">×</button>
    <h3 class="modal-title"></h3>
  </div>
  <div class="modal-body">
    <p class="modal-content"></p>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal"  >Zamknij</a>
    <!-- <a href="#" class="btn btn-primary">Save changes</a> -->
  </div>
</div>
*/ ?>
<!-- eof: modals -->

	<?=$this->Html->script(array(
		"bootstrap.js",
		'vendor/jquery.ui.widget.js',
		'http://blueimp.github.com/JavaScript-Templates/tmpl.min.js',
		'http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js',
		'http://blueimp.github.com/JavaScript-Canvas-to-Blob/canvas-to-blob.min.js',
		'http://blueimp.github.com/Bootstrap-Image-Gallery/js/bootstrap-image-gallery.min.js',
		'jquery.iframe-transport.js',
		'jquery.fileupload.js',
		'jquery.fileupload-fp.js',
		'jquery.fileupload-ui.js',
		'locale.js',
		'main.js',
	)); ?>

</body>

</html>			