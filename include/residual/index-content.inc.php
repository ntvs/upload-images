		<!--Right Column-->
		<div class="col">
			<h1>What is UI?</h1>
			<br />
			<p>UploadImages is a simple web application that allows users to view and download images uploaded by people around the world. To get started, log in or create a new account now!</p>

			<a href=""><img src="img/uploadImagesGlyph.png" style="margin-top: 110px;"></a>
		</div>

		<!--Splitter-->
		<div class="col" style="width: 140px;"></div>

		<!--Left Column-->
		<div class="col">
			<h1>Make an account</h1>

			<!--Sign Up Form-->
			<form id="signUpForm"method="POST">
				<ul>
					<li><ul>
						<li><p>Username</p> <br /> <input type="text" name="name"style="width: 190px;" required></li>
						<li><p>Password</p> <br /> <input type="password" name="password"style="width: 190px;" required></li>
					</ul></li>

					<li><p>Email</p> <br /> <input type="email" name="email" style="width: 402px;" required></li>

					<li><ul>

						<!--http://www.csscheckbox.com/checkbox/43237/unoffensive-blue-check/-->
						<li><input type="checkbox" name="checkboxG1" id="checkboxG1" class="css-checkbox" required/><label for="checkboxG1" class="css-label">I am 18 years or older</label></li>
						<li><input type="checkbox" name="checkboxG2" id="checkboxG2" class="css-checkbox" required/><label for="checkboxG2" class="css-label">I agree with the terms</label></li>

					</ul></li>

					<li><button id="signUpButton" type="submit">Sign Up</button></li>
				</ul>
			</form>
		</div>