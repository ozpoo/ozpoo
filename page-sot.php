<?php get_header(); ?>
<?php
	require_once dirname( __FILE__ ) . '/assets/php/lib/twitteroauth-master/autoload.php';
	use Abraham\TwitterOAuth\TwitterOAuth;
	define('CONSUMER_KEY', 'LNxFMLFk1tOD7bkePX1E1Avo1');
	define('CONSUMER_SECRET', 'vun9H7Vc4bWk7Tx4gJ50sUpn7l1sDbSlu88VaNRI6R3aXklnmW');
	define('ACCESS_TOKEN', '45056175-KD41p3f5cEgyQ6Yckf5rTV8n9WHueDgI0umZ3LapD');
	define('ACCESS_TOKEN_SECRET', 'Y0CGg5DTTiVzCdilCaA5eo9EWQEgXz2y4jAkHbJh1bqWr');
?>

	<main role="main">

	<style>

		.frame {
			/* padding: 8vw; */
			/* height: 100vh; */
			/* width: 100vw; */
		}
		.wrap {
			position: relative;
			height: 50vw;
			width: 100%;
		}
		#visual{
			height: 100%;
			width: 100%;
		}
		.grid{
			display: flex;
			flex-wrap: wrap;
		}
		.grid .column {
			width: 5vw;
			height: 5vw;
		}
		.grid .column img{
			height: 100%;
			width: 100%;
			object-fit: cover;
		}
		.tweet{
			display: none;
		}
		.stop{
			display: none;
		}

		.playToggle{
			cursor: pointer;
		}

		.playToggle{
			height: 100%;
			width: 100%;
			position: absolute;
			z-index: 6;
			top: 0;
			left: 0;
		}
		.playToggle.on{
			background: transparent!important;
		}
		header{
			display: none;
			position: fixed;
			top: 0px;
			width: 100%;
		}
		.vertical-stuff{
			display: none;
		}
		.spantop{
			display: none;
		}
		.current_thumb{
			position: fixed;
			top: 2vh;
			left: 2vw;
			height: 40px;
			width: 40px;
			border-radius: 50%;
		}
		.current_thumb img{
			height: 100%;
			width: 100%;
			border-radius: 50%;
		}
		.current_letter{
			position: fixed;
			top: 2vh;
			right: 2vw;
			color: white;
			text-transform: uppercase;
		}
	</style>

	<section class="page-content panel">

		<section class="flex back" data-aos="fade-right" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
			<?php $type = get_post_type_object(get_post_type( $post_id )); ?>
			<h1><a href="<?php echo site_url('/', 'http'); ?>">&larr;</a></h1>
		</section>

	</section>

	<section class="panel">

		<section class="grid">
			<?php
				$results = json_cached_api_results();
				// var_dump($results);
				foreach($results as $result){
					// var_dump($result);
					$tweet = "@" . $result->user->screen_name . ": " . $result->text;
					echo '<div class="column">';
					echo '<a class="profile_image" href="http://www.twitter.com/'.$result->user->screen_name.'" target="_blank"><img src="' . str_replace('_normal', '', $result->user->profile_image_url) . '"/></a>';
					echo '<div class="left tweet"><p>' . linkify($tweet) . '</p></div>';
					echo '</div>';
				}
			?>
		</section>

	</section>

	<section class="panel">

		<div class="wrap">
			<div id="visual"></div>
			<section class="playToggle"></section>
		</div>

	</section>

	<!-- <script type="text/javascript" src="scripts/nexusUI.js?v=<?php echo time(); ?>"></script> -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/_lib/tone/tone.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/_lib/p5/p5.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/_lib/p5/addons/p5.sound.min.js"></script>

	<script type="text/javascript">
	(function ($, root, undefined) {
		$(function () {
			'use strict';

				var isPlaying = false;
				var fft;

				var t = function( p ) {
					var aT = 0.1; // attack time in seconds
					var aL = 1.0; // attack level 0.0 to 1.0
					var dT = 0.1; // decay time in seconds
					var dL = 0.1; // decay level  0.0 to 1.0
					var sT = 0.1; // sustain time in seconds
					var sL = dL; // sustain level  0.0 to 1.0
					var rT = 0.1; // release time in seconds

					var speaker = 0;
					var currspeaker = 0;

					var state = 0;

					var charactersEnv;
					var charactersOsc;

					var tweetsOsc,tweetsPattern, count, space;
					var punctuation, tweetsPhrase, wordsPhrase;
					var delay, filter, reverb, reverb2;
					var recorder, soundFile, char;

					var mySound, charactersPhrase, myPart;
					var charactersPattern = [1,0,0,2,0,2,0,0];
					var wordsPattern = [0,0,0,0,0,0,0,0];

					var sound = new Array();
					var characters = new Array();
					var currChar=0;

					var cnv;
					var x = 10;
					var y = 10;

					var power = 135;
					var density = 600;

					var img;

					var curry = 0;
					var incy = 0;

					p.preload = function() {
						sound['shtuffs'] = p.loadSound('<?php echo get_template_directory_uri(); ?>/assets/audio/bmth_samples/shtuffs.wav');
						sound['words'] = p.loadSound('<?php echo get_template_directory_uri(); ?>/assets/audio/bmth_samples/shit.wav');
						sound['tweets'] = p.loadSound('<?php echo get_template_directory_uri(); ?>/assets/audio/bmth_samples/shtuffs.wav');
					};

					p.setup = function() {

						generateScore();

						fft = new p5.FFT();

						delay = new p5.Delay();
						filter = new p5.LowPass();
						// reverb = new p5.Reverb();
						// reverb2 = new p5.Reverb();
						// recorder = new p5.SoundRecorder();
						// soundFile = new p5.SoundFile();

						charactersEnv = new p5.Env(aT, aL, dT, dL, sT, sL, rT);
						charactersOsc = new p5.Oscillator('sine');

						charactersOsc.freq(320);
						charactersOsc.amp(charactersEnv);
						// charactersOsc.disconnect();
						// reverb.process(charactersOsc, 3, 10);
						charactersOsc.start();

						p.masterVolume(1.0);

						sound['words'].disconnect();
						sound['words'].connect(filter);
						sound['tweets'].disconnect();
						sound['tweets'].connect(filter);
						delay.process(sound['words'], .12, .7, 2300);
						// reverb2.process(sound['words'], 6, 0.2);
						delay.process(sound['tweets'], .12, .7, 2300);
						// reverb2.process(sound['tweets'], 6, 0.2);
						filter.set(6000, 10);
						sound['words'].setVolume(1);
						sound['tweets'].setVolume(1);

						cnv = p.createCanvas($("#visual").width(), $("#visual").height());
						img = p.createImage(p.width, p.height);
						img.loadPixels();
						for (var y= 0; y < p.height; y++) {
							for (var x= 0; x < p.width; x++) {
								var total = 0.0;
								for (var i= density; i>=1; i/=2.0){
									total += p.noise(x/density, y/density)*density;
								}

								var turbulance = 128 * total/density;
								var base = (x *0.2) + (y* 0.12);
								var offset = base + (power*turbulance/256.0);
								var gray = p.abs(p.sin(offset))*300;
								img.set(x, y, p.color(gray+245,35+gray,101+gray));
							}
						}
						img.updatePixels();
						// img.filter("threshold", 0.45);
						// img.filter("invert");

						p.strokeWeight(1);
						p.stroke(255);
						p.noFill();

						$(window).resize(function(){
							cnv.resize($("#visual").width(), $("#visual").height());
						});
					};

					p.draw = function() {

						p.background(0);
						var mx = -p.map(p.pwinMouseX, 0, $(window).width(), 0, 40);
						var my = -p.map(p.pwinMouseY, 0, $(window).height(), 0, 40);

						// p.push();
						// p.translate(0, p.height+40);
						// p.scale(1,-1);
						// p.image(img, 0+mx, 0-my+curry, p.width+40, p.height+40);
						// p.pop();
						// p.image(img, 0+mx, p.height+40+my-curry, p.width+40, p.height+40);
						// p.push();
						// p.translate(0, p.height+40+p.height+40+p.height+40);
						// p.scale(1,-1);
						// p.image(img, 0+mx, 0-my+curry, p.width+40, p.height+40);
						// p.pop();
						//
						// if(isPlaying){
						// 	incy=0.25;
						// }else{
						// 	incy=0;
						// }
						// curry+=incy;
						// if(curry > p.height+40+p.height+40){
						// 	curry=0;
						// }

						if(isPlaying){
							var spectrum = fft.analyze();

							//Equalizer
							// p.fill(255);
							// p.beginShape();
							// for (var i = 0; i< spectrum.length; i++){
							// 	var x = p.map(i, 0, 100, 0, p.width);
							// 	var h = -p.height + p.map(spectrum[i], 0, 255, p.height, 0);
							// 	p.rect(x, p.height, 20, h) ;
							// }
							// p.endShape();

							//Wave Form
							p.strokeWeight(1);
							p.stroke(255);
							p.smooth(1);
							p.noFill();

							var waveform = fft.waveform();
							p.beginShape();
							for (var i = 0; i < waveform.length; i++) {
								var y = p.map(i, 0, waveform.length, 0, p.height);
								var x = p.map(waveform[i], -1, 1, 0, p.width);
								p.vertex(x, y);
							}
							p.endShape();

						}
					};

					function charactersSound(time, playbackRate) {
						if(playbackRate != 33 && playbackRate != 34){
							charactersOsc.freq(p.map(playbackRate, 0, 127, 300, 600));
							charactersEnv.play();
							console.log('characters change: ' + playbackRate);
							$('.current_letter').html(characters[currChar++]);
						}
					}

					function wordsSound(time, playbackRate) {
						if(playbackRate!=0){
							sound['words'].rate(p.map(playbackRate, 0, 127, 0.01, 0.5));
							console.log('words change: ' + playbackRate);
						}
					}

					function tweetsSound(time, playbackRate) {
						if(playbackRate!=0){
							sound['tweets'].rate(p.map(playbackRate, 0, 127, 0.01, 0.5));
							console.log('tweets change: ' + playbackRate);
						}
						// $('.profile_image').removeClass('current');
						// $('.profile_image').eq(speaker).addClass('current');
						// $('.currentSpeaker').html('<img src="'+$('.profile_image').eq(speaker++).find('img').attr('src')+'"/>');
						currspeaker = speaker-1;
					}

					function generateScore(){
						var nextWord = nextTweet = true;
						var nextTweet = true;
						var word='';
						tweetsPattern = new Array();
						charactersPattern = new Array();
						wordsPattern = new Array();
						$(".grid .tweet p").each(function(){
							word=$(this).text();
							nextTweet = true;
//                    console.log(word);
							length=word.length;
							count=0;
							space=0;
							punctuation=0;
							for(var i=0;i<length;i++){
							char=word.charAt(i);
								if(char == 'undefined'){
									document.write(word.charAt(i));
								}

								if(nextTweet){
									if(char!='@'){
										tweetsPattern.push(pentatonicBlues(word.charCodeAt(i)));
										nextTweet=false;
										characters.push(char);
									}else{
										tweetsPattern.push(0);
									}
								}else{
									tweetsPattern.push(0);
								}

								if(nextWord){
										wordsPattern.push(pentatonicBlues(word.charCodeAt(i)));
										nextWord=false;
								}else{
										wordsPattern.push(0);
								}

//                        console.log(word.charAt(i))
//                        console.log(pentatonicBlues(word.charCodeAt(i)));
								charactersPattern.push(pentatonicBlues(word.charCodeAt(i)));

								if(char=='a' || char=='e' || char=='i' || char=='o' || char=='u'){
										count++;
								}else if(char=='.' || char==',' || char=='?' || char=='!'){
										punctuation++;
								}else if(char==' '){
										space++;
										nextWord=true;
								}
							}
						});
						console.log(count + "  vowels and " + space + " spaces " + punctuation + " punctuation");
						console.log(wordsPattern);
						tweetsPhrase = new p5.Phrase('tweets', tweetsSound, tweetsPattern);
						charactersPhrase = new p5.Phrase('characters', charactersSound, charactersPattern);
						wordsPhrase = new p5.Phrase('words', wordsSound, wordsPattern);
						myPart = new p5.Part();
						myPart.addPhrase(charactersPhrase);
						myPart.addPhrase(wordsPhrase);
						myPart.addPhrase(tweetsPhrase);
						myPart.setBPM(30);
					}

					function pentatonicBlues(note){
							var scale = [0,2,3,4,6];
//                var scale =
//                    [0,   3,  5,  6,  7, 10,
//                    12, 15, 17, 18, 19, 22,
//                    24, 27, 29, 30, 31, 34,
//                    36, 39, 41, 42, 43, 46,
//                    48, 51, 53, 54, 55, 58,
//                    60, 63, 65, 66, 67, 70,
//                    72, 75, 77, 78, 79, 82,
//                    84, 87, 89, 90, 91, 94,
//                    96, 99,101,102,103,106,
//                    108,111,113,114,115,118,
//                    120,123,125,126,127 ];
							var curr = 0;
							var loop = 0;
							for(var i=0; i< 50000; i++){
									if(curr >= note){
											note = curr;
											return note;
									}
									curr+=scale[loop++];
									if(loop > 4){ loop=0 };
							}
							console.log('COULDN\'T FIND: ' + note);
					}

					function pentatonic(note){
						var scale = [0,1,2,4,6];
//                var scale =
//                    [ 0,   2,  4,  7,  9,
//                      12, 14, 16, 19, 21,
//                      24, 26, 28, 31, 33,
//                      36, 38, 40, 43, 45,
//                      48, 50, 52, 55, 57,
//                      60, 62, 64, 67, 69,
//                      72, 74, 76, 79, 81,
//                      84, 86, 88, 91, 93,
//                      96, 98,100,103,105,
//                     108,110,112,115,117,
//                     120,122,124,127];
						var curr = 0;
						var loop = 0;
						for(var i=0; i< 50000; i++){
							if(curr >= note){
								note = curr;
								return note;
							}
							curr+=scale[loop++];
							if(loop > 4){ loop=0 };
						}
					}

					 $('body').on('click', '.playToggle', function(ev){
							ev.preventDefault();
							if(sound['words'].isPlaying()){
									myPart.stop();
									charactersOsc.stop();
									sound['words'].pause();
									sound['shtuffs'].pause();
									sound['tweets'].pause();
									isPlaying = false;
							}else{
									myPart.start();
									charactersOsc.start();
									sound['words'].loop();
									sound['shtuffs'].loop();
									sound['tweets'].loop();
									isPlaying = true;
							}
					});

				};
				var top = new p5(t, 'visual');

			});

		})(jQuery, this);

	</script>

	</main>

	<?php

		// function getTweets(){
		// 	require_once dirname( __FILE__ ) . '/assets/php/lib/twitteroauth-master/autoload.php';
		// 	use Abraham\TwitterOAuth\TwitterOAuth;
		// 	define('CONSUMER_KEY', 'LNxFMLFk1tOD7bkePX1E1Avo1');
		// 	define('CONSUMER_SECRET', 'vun9H7Vc4bWk7Tx4gJ50sUpn7l1sDbSlu88VaNRI6R3aXklnmW');
		// 	define('ACCESS_TOKEN', '45056175-KD41p3f5cEgyQ6Yckf5rTV8n9WHueDgI0umZ3LapD');
		// 	define('ACCESS_TOKEN_SECRET', 'Y0CGg5DTTiVzCdilCaA5eo9EWQEgXz2y4jAkHbJh1bqWr');
		// 	$query = array(
		// 		"id" => "1",
		// 		'count' => 5,
		// 	);
		// 	$toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
		// 	if($results = $toa->get('trends/place', $query)){
		// 		foreach ($results[0]->trends as $result) {
		// 			$tweet = $result->name;
		// 			$query = array(
		// 				'q' => $tweet,
		// 				'count' => 1,
		// 				'result_type' => 'recent',
		// 			);
		// 			if($search = $toa->get('search/tweets', $query)){
		// 				foreach ($search->statuses as $result) {
		// 					$tweet = "@" . $result->user->screen_name . ": " . $result->text;
		// 					echo '<a class="profile_image" href="http://www.twitter.com/'.$result->user->screen_name.'" target="_blank"><img src="' . str_replace('_normal', '', $result->user->profile_image_url) . '"/></a>';
		// 					echo '<div class="left tweet"><p>' . linkify($tweet) . '</p></div>';
		// 				}
		// 			}
		// 		}
		// 	}
		// }

		function twitter_api_request(){
			$results = [];
			$toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
			$query = array(
				"id" => "1",
				'count' => 5,
			);
			$api_results = $toa->get('trends/place', $query);
			if($api_results){
				foreach ($api_results[0]->trends as $result) {
					$tweet = $result->name;
					$query = array(
						'q' => $tweet,
						'count' => 1,
						'result_type' => 'recent',
					);
					$search = $toa->get('search/tweets', $query);
					if($search){
						foreach($search->statuses as $result) {
							array_push($results, $result);
						}
					}
				}
			}
			return $results;
		}

		function linkify($tweet){
			$tweet = preg_replace("/([\w]+\:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/", "<a target=\"_blank\" href=\"$1\">$1</a>", $tweet);
			$tweet = preg_replace("/#([A-Za-z0-9\/\.]*)/", "<a target=\"_blank\" href=\"http://twitter.com/search?q=$1\">#$1</a>", $tweet);
			$tweet = preg_replace("/@([A-Za-z0-9\/\.]*)/", "<a target=\"_blank\" href=\"http://www.twitter.com/$1\">@$1</a>", $tweet);
			return $tweet;
		}

		function json_cached_api_results( $cache_file = NULL, $expires = NULL ) {
	    global $request_type, $purge_cache, $limit_reached, $request_limit;

	    if( !$cache_file ) $cache_file = dirname(__FILE__) . '/assets/cache/sounds-of-twitter/api-cache.json';
	    if( !$expires ) $expires = time() - 2*60*60;

	    if( !file_exists($cache_file) ) die("Cache file is missing: $cache_file");

	    // Check that the file is older than the expire time and that it's not empty
	    // if ( filectime($cache_file) < $expires || file_get_contents($cache_file)  == '' || $purge_cache && intval($_SESSION['views']) <= $request_limit ) {
			if ( false ) {
        // File is too old, refresh cache
        $json_results = json_encode(twitter_api_request());

        // Remove cache file on error to avoid writing wrong xml
        if ( $json_results )
          file_put_contents($cache_file, $json_results);
        else
          unlink($cache_file);
	    } else {
        // Check for the number of purge cache requests to avoid abuse
        if( intval($_SESSION['views']) >= $request_limit )
	        $limit_reached = " <span class='error'>Request limit reached ($request_limit). Please try purging the cache later.</span>";
        // Fetch cache
        $json_results = file_get_contents($cache_file);
        $request_type = 'JSON';
				// echo $json_results;
	    }
	    return json_decode($json_results);
		}

 ?>

<?php get_footer(); ?>
