<!DOCTYPE html>
<html>
<head>
	<title>Playlist LDR</title>
	<style type="text/css">
		#playlist{
			list-style: none;
		}
		#playlist li a{
			color:black;
			text-decoration: none;
		}
		#playlist .current-song a{
			color: blue;
		}
	</style>
</head>
<body>
	<table style="width:100%">
		<tr><th>
			<audio src="" controls id="audioPlayer">
				Sorry, your browser doesn't support html5!
			</audio>
		</th></tr>
		<tr><th>
			<ul id="playlist">
				<li class="current-song"><a href="https://dts-data-saver.s3.amazonaws.com/music/LetMeLoveYouLikeAWoman.mp3">Let Me Love You Like A Woman</a></li>
				<li><a href="https://dts-data-saver.s3.amazonaws.com/music/QueenOfDisaster.mp3">Queen Of Disaster</a></li>
				<li><a href="https://dts-data-saver.s3.amazonaws.com/music/YoungandBeautiful.mp3">Young and Beautiful</a></li>
			</ul>
		</th></tr>
	</table>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script type="text/javascript">
		audioPlayer();
		function audioPlayer(){
			var currentSong = 0;
			$("#audioPlayer")[0].src = $("#playlist li a")[0];
			$("#audioPlayer")[0].play();
			$("#playlist li a").click(function(e){
				e.preventDefault();
				$("#audioPlayer")[0].src = this;
				$("#audioPlayer")[0].play();
				$("#playlist li").removeClass("current-song");
				currentSong = $(this).parent().index();
				$(this).parent().addClass("current-song");
			});

			$("#audioPlayer")[0].addEventListener("ended", function () {
				currentSong++;
				if(currentSong == $("#playlist li a").length)
					currentSong = 0;
				$("#playlist li").removeClass("current-song");
				$("#playlist li:eq("+currentSong+")").addClass("current-song");
				$("#audioPlayer")[0].src = $("#playlist li a")[currentSong].href;
				$("#audioPlayer")[0].play();
			});
		}
	</script>
</body>
</html>
