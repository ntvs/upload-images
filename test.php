<!--<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h2>Display Cursor Coordinates</h2>

<div id="CursorXY"></div><br />

<button id="aButton">Get the cursor coordinates</button>

<script type="text/javascript">
	document.getElementById("aButton").addEventListener("click", displayCursor);

	function displayCursor() {
		var coord = 'x = ' + event.clientX + ' y = ' + event.clientY;

		document.getElementById("CursorXY").innerHTML = coord;
	}

</script>

</body>
</html>-->

<!DOCTYPE html>
<html>
<head>

<style type="text/css">

	body, html {
	    height: 100%;
	    padding: 0px;
	    padding: 0px;
	}

	.container {
		max-width: 780px;
		margin: 0px auto 0px auto;
	}

	.grid-container {
		max-width: 780px;
		margin: 0px auto 0px auto;
		display: grid;
		grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
		grid-gap: 5px;
		grid-row-gap: 10px;
		grid-column-gap: 2px;
	}

	.grid-item {
		text-align: center;
	}

	.collapsed {
		display: none;
	}

</style>

</head>
<body>
 
	<div class="container">
		<p class="profile-side-h1">About The1UPNetwork's channel</p>
		<p class="profile-side-s1" id="channelDescription">1UP is home to the finest editorial, with the latest news, previews, reviews, cheats, and videos. 1UP not only delivers the best articles on videogames and videogame culture, but also serves as a hub for other gamers like you! Meet other enthusiasts on our popular message boards, write your own blogs, and join our thriving community!</p>
		<p class="profile-side-s1" id="channelDescription2" onload="var result = processText('channelDescription'); toElement(result, 'channelDescription2');"></p>

		<button onclick="moreLess('channelDescription');" style="text-align: right;"> show more </button>  
	</div>

	<br />

	<div class='grid-container'>
	    <div class='grid-item'>
		    <img src='https://www.ajactraining.org/wp-content/uploads/2019/09/image-placeholder.jpg' alt='' width="250px">
	    </div>
	    <div class='grid-item'>
		    <img src='https://www.ajactraining.org/wp-content/uploads/2019/09/image-placeholder.jpg' alt='' width="250px">
	    </div>
	    <div class='grid-item'>
		    <img src='https://www.ajactraining.org/wp-content/uploads/2019/09/image-placeholder.jpg' alt='' width="250px">
	    </div>
	    <div class='grid-item'>
		    <img src='https://www.ajactraining.org/wp-content/uploads/2019/09/image-placeholder.jpg' alt='' width="250px">
	    </div>
	    <div class='grid-item'>
		    <img src='https://www.ajactraining.org/wp-content/uploads/2019/09/image-placeholder.jpg' alt='' width="250px">
	    </div>
	</div>    

</body>

<script type="text/javascript">
		
	function moreLess(elementName) {

		var myElement = document.getElementById(elementName);
		var processedText = document.getElementById(elementName + "2");

		if (myElement.classList.contains('collapsed')) {

			myElement.classList.remove('collapsed'); //Show OG text
			processedText.classList.add('collapsed'); //Hide processed text

		} else {

			myElement.classList.add('collapsed'); //Hide OG text
			processedText.classList.remove('collapsed'); //show processed text

		}

		/*if (this.status == false) {
			elementName.innerHTML = results[1]; //new

			this.status = true;
			console.log(results[1], this.status);
		} else {
			elementName.innerHTML = results[0]; //original

			this.status = false;
			console.log(results[0], this.status);
		}*/

	}

	function toElement(content, elementName) {
		document.getElementById(elementName).textContent = content;
	}

	function processText(elementName) {

		//originalDescription = originalText
		//channelDescription = element
		//channelDescriptionTokens = tokens
		//newDescription = newText

		var originalText = document.getElementById(elementName).textContent; //ex. "channelDescription"

		var element = document.getElementById(elementName);

		var tokens = originalText.split(" ");

		var newText = "";

		if (tokens.length >= 40) {

			for (var i = 0; i < 40; i++) {
				if (i == 39) {
					newText += "...";
				} else if (i == 37) {

					newText += tokens[i];

				} else if (i == 38) {

					var counter = 0;

					var regex = /[a-zA-Z0-9]/;

					var subTokens = tokens[i].split();

					for (var x = 0; x < subTokens.length; x++) {

						if (regex.exec(subTokens[x])) {
							counter++;
						}

					}

					if (counter == 0) {
						newText += " " + tokens[i]
					} 
					
				} else {
					newText += tokens[i] + " ";
				}
			}

		} else {
			newText = originalText;
		}

		//var items = [originalText, newText];

		return newText;
	}

</script>

</html>