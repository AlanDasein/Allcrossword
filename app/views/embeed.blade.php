{{ header('Content-Type: text/html; charset=utf-8'); }}
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>All Crossword</title>
	{{ HTML::style('http://fonts.googleapis.com/css?family=Courgette|Roboto|Oswald|Shadows+Into+Light|PT+Sans') }}
	{{ HTML::style('css/style.css') }}
	{{ HTML::script('js/jquery-1.11.2.min.js') }}
</head>
<body class="box">

	<div class="container">
		@if(!$crossword)
		{{ '<h4>We could not find the crossword that you are trying to open</h4>' }}
		@else
		{{
		'
		<div class="half-spacer"></div>
		
		<div class="row">
			
			<div class="col-md-7">
				
				<div class="spacer"></div>
				
				<div class="indicator pull-left"><strong>Your Progress: </strong>&nbsp;&nbsp;<small>0%</small></div>
				
				<span class="pull-right"><strong>Created by </strong>&nbsp;&nbsp;' }}{{ $crossword->nick->label }}{{ '</span>
				
				<div class="clearfix"></div>
				
				<div class="half-spacer"></div>
				
				<div class="blocks canvas" data-mode="start"></div>
					
			</div>
			
			<div class="col-md-5">
				
				<div class="captions">
					
					<ul class="nav nav-pills">
						<li class="active"><a href="#pane1" data-toggle="tab">Across</a></li>
						<li><a href="#pane2" data-toggle="tab">Down</a></li>
					</ul>
					
					<div id="tabs" class="tab-content">
						<ol id="pane1" class="unstyled-list tab-pane active"></ol>
						<ol id="pane2" class="unstyled-list tab-pane"></ol>
					</div>
					
				</div>
				
			</div>
			
		</div>
		
		<div id="layout" class="hide">' }} {{ htmlspecialchars($crossword->layout) }} {{ '</div>' }}
		@endif
		
	</div>
	
	{{ HTML::script('js/tab.min.js') }}
	{{ HTML::script('js/global.min.js') }}

</body>
</html>