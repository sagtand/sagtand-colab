$(document).ready(function(){
	var sounds = document.querySelectorAll('audio.wp-audio-shortcode');
	if (!sounds) return;

	// forEach ( sounds => sound.addEventListener('keyDown', playSound));

	function playSound(id) {
		if (!sounds[id]) return;
		sounds[id].currentTime = 0;
		sounds[id].play(); 
	}

	function checkKey(e) {
		var keyCode = e.keyCode;
		switch (keyCode) {
			case 49:
				playSound(0);
				break;

			case 50:
				playSound(1);
				break;

			case 51:
				playSound(2);
				break;

			case 52:
				playSound(3);
				break;

			case 53:
				playSound(4);
				break;

			case 54:
				playSound(5);
				break;

			case 55:
				playSound(6);
				break;

			case 56:
				playSound(7);
				break;

			case 57:
				playSound(8);
				break;

			case 48:
				playSound(9);
				break;
				
			default:
				break;
		}
		
	}

	document.addEventListener('keydown', checkKey);

});