<html>
<body>
	
	Your {{$mode == 'edit' ? "Crossword" : 'Progress'}} has been succesfully saved. You can now manage it by following this link at any time you want:<br /><br />
	
	<a href="http://localhost:8000/crossword/{{$mode}}/{{$id}}/{{$token}}">http://localhost:8000/crossword/{{$mode}}/{{$id}}/{{$token}}</a><br /><br />
	
	You may also copy the link and paste it on the navigation bar of your browser if for some reason you are unable to open the link by clicking on it<br /><br />
	
	<strong>NOTE: Try to keep this message or save the provided link in a safe place. If you lose it, we cannot do anything to provide you access to {{$mode == 'edit' ? 'your crossword' : 'the session that you have saved'}} again. Also remember that {{$mode == 'edit' ? 'your crossword will be deleted if you do not publish it before '.Settings::MAX_INACTIVE_DAYS().' days of being saved.' : 'this session that you are saving will expire after '.Settings::MAX_INACTIVE_DAYS().' days of being inactive.'}}</strong><br /><br />
	
	Thank you for being part of <a href="http://www.allcrossword.com">AllCrosword</a> and best Regards!
	
</body>
</html>