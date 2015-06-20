{{ header('Content-Type: text/html; charset=utf-8'); }}
{{ header('Content-Security-Policy: frame-ancestors none'); }}
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
	<meta name="format-detection" content="telephone=no">
	<meta name="Description" content="Crossword puzzles online. Community of Crossword lovers. A site where to take crosswords created by people all around the world in several languages and scripts as well as a site where to create your own crossword regardless your language and alphabet.">
	<meta name="keywords" content="crosswords, puzzles, crucigramas, juego de palabras, cruciverbas, mots croisés, kreuzworträtsel, palavras cruzadas, games, juegos, gioccos, jeus, jogos, spiel" />
	<meta property="og:url" content="http://www.allcrossword.com/_assets/icon.png" />
	<meta property="og:image" content="http://www.allcrossword.com/_assets/icon.png" />
	<meta property="og:title" content="AllCrossword - Crosswords online - A Place where to take and create Crosswords" />
	<meta property="og:description" content="Crosswords online. Community of Crossword lovers. A Place where to take and create Crosswords." />
	<title>Crossword puzzles online - @yield('title')</title>
	{{ HTML::style('favicon.ico', array('rel' => 'SHORTCUT ICON', 'type' => '?image/x-icon?')) }}
	{{ HTML::style('http://fonts.googleapis.com/css?family=Courgette|Roboto|Oswald|Shadows+Into+Light|PT+Sans') }}
	{{ HTML::style('css/style.css') }}
	{{ HTML::script('js/jquery-1.11.2.min.js') }}
	{{ HTML::script('//static.addtoany.com/menu/page.js') }}
	{{ HTML::script('js/modal.min.js') }}
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-60489379-1', 'auto');
	ga('send', 'pageview');
	</script>
	<link rel="image_src" href="http://www.allcrossword.com/_assets/icon.png" />
</head>
<body data-url="@yield('url')" data-host="{{ URL::to('/') }}">
	
	<div class="container">
		
		<header>
			
			<div class="row">
				
				<div class="col-xs-12 col-sm-7 col-md-8 col-lg-9 pull-right">
					
					<div class="buttons text-center">
						
						<a href="#" rel="nofollow" role="share" ind="0" parm-w="570" parm-h="750" title="reddit"><img src="{{ url('/_assets/reddit.png') }}" width="32" height="32" /></a>
						<a href="#" rel="nofollow" role="share" ind="1" parm-w="570" parm-h="335" title="twitter"><img src="{{ url('/_assets/twitter.png') }}" width="32" height="32" /></a>
						<a href="#" rel="nofollow" role="share" ind="2" parm-w="570" parm-h="380" title="facebook"><img src="{{ url('/_assets/facebook.png') }}" width="32" height="32" /></a>
						<a href="#" rel="nofollow" role="share" ind="3" parm-w="550" parm-h="570" title="google+"><img src="{{ url('/_assets/google.png') }}" width="32" height="32" /></a>
						<a href="#" rel="nofollow" role="share" ind="4" parm-w="1140" parm-h="855" title="diigo"><img src="{{ url('/_assets/diigo.png') }}" width="32" height="32" /></a>
						<a href="#" rel="nofollow" role="share" ind="5" parm-w="780" parm-h="530" title="stumble upon"><img src="{{ url('/_assets/stumbleupon.png') }}" width="32" height="32" /></a>
						<a href="#" rel="nofollow" role="share" ind="6" parm-w="450" parm-h="535" title="tumblr"><img src="{{ url('/_assets/tumblr.png') }}" width="32" height="32" /></a>
						<a class="a2a_dd" href="https://www.addtoany.com/share_save" title="more options"><img src="{{ url('/_assets/share.png') }}" width="32" height="32" /></a>
						
					</div>
					
				</div>
				
			</div>
			
			<div class="logo row"><div class="col-xs-12 col-sm-5 col-md-4 col-lg-3"><h1 class="text-center"><span>all</span>cro<span>ss</span>word</h1></div></div>
			
		</header>
		
		<div class="row">
			
			<nav class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
				
				<div class="toggler visible-xs"><span class="glyphicon glyphicon-menu-hamburger show pull-left"></span>&nbsp;&nbsp;Navigation Panel</div>
					
				<div class="bar box hidden-xs">
					
					<ul class="list-unstyled">
						<li><a href="{{ url('/') }}" class="show"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
						<li><a href="{{ url('/crossword/create') }}" class="show highlight">New Crossword</a></li>
						<li>
							<a href="#" rel="nofollow" tabindex="0" class="show">
								<span class="glyphicon glyphicon-info-sign"></span>&nbsp;Information<span class="glyphicon glyphicon-chevron-down arrow pull-right"></span>
							</a>
							<ul class="list-unstyled embeed">
								<li><a href="{{ url('/about') }}" class="show embeed">About Us</a></li>
								<li class="external"><a href="#" rel="nofollow" class="show embeed">Terms Of Services</a></li>
								<li class="external"><a href="#" rel="nofollow" class="show embeed">Privacy Policy</a></li>
							</ul>
						</li>
						<li>
							<a href="#" rel="nofollow" tabindex="0" class="show">
								<span class="glyphicon glyphicon-question-sign"></span>&nbsp;Support<span class="glyphicon glyphicon-chevron-down arrow pull-right"></span>
							</a>
							<ul class="list-unstyled embeed">
								<li><a href="{{ url('/help') }}" class="show embeed">Help</a></li>
								<li><a href="{{ url('/contact') }}" class="show embeed">Contact</a></li>
							</ul>
						</li>
					</ul>
					
					<div class="clearfix"></div>
					
					@yield('sidebar')
					
				</div>
				
			</nav>
			
			<article class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
				
				<section id="intro" class="panel">
					
					<h3>Feeling like working on a Crossword?</h3>
					<p>
						You are definitely in the right place! Here you can find as many crosswords as you want in several languages and with different levels of complexity. You can also create your own crosswords and publish them without having any special skill. Just try it and see how well you can do it. Thousands of people will be able to take and share them. 
						<br />
					</p>
					<h5><strong>Keep calm and work on a crossword!</strong></h5>
					
					<div class="facebook">
						<div class="fb-like" data-href="https://www.facebook.com/allcrossword" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
						<div id="fb-root"></div>
						{{ HTML::script('//connect.facebook.net/en_US/all.js#xfbml=1&appId=146351542070012') }}
					</div>
					
					<div class="google">
						{{ HTML::script('https://apis.google.com/js/platform.js', array('async', 'defer')) }}
						<div class="g-plusone" data-size="medium" data-annotation="bubble"></div>
					</div>
					
					<div class="clearfix"></div>
					
				</section>
				
				@yield('content')
				
				@yield('comments')
				
			</article>
			
		</div>
		
		<footer><h6 class="text-right"><i>&copy; All Crossword 2015</i></h6></footer>
		
	</div>
	
	<div id="myModal" class="modal fade" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header main">
					
				</div>
				<div class="modal-body main">
					
				</div>
				<div class="modal-footer main">
					
				</div>
			</div>
		</div>
	</div>
	
	@yield('resources')
	{{ HTML::script('js/global.min.js') }}

</body>
</html>