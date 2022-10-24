		<!--Right Column-->
		<div class="col">
			<h1 >Have an Account?</h1>
			<br />
			<p>Just sign in to gain access to all our features, including photo sharing, uploading, and downloading!</p>

			<a href=""><img src="img/uploadImagesGlyph.png" style="margin-top: 89px;"></a>
		</div>

		<!--Splitter-->
		<div class="col" style="width: 140px;"></div>

		<!--Left Column-->
		<div class="col">
			<h1>Sign In</h1>

			<!--Sign Up Form-->
			<form id="signUpForm" method="POST" action="validate.php">
				<ul>
					<li><ul>
						<li><p>Username or email</p> <br /> <input type="text" name="name"style="width: 190px;"></li>
						<li><p>Password</p> <br /> <input type="password" name="password"style="width: 190px;"></li>
					</ul></li>

					<!--
					<li><p>Username or email</p> <br /> <input type="text" name="name" style="width: 402px;"></li>

					<li><p>Password</p> <br /> <input type="password" name="password" style="width: 402px;"></li>
					-->
					<li><button id="signInButton" type="submit">Sign In</button></li>
				</ul>
			</form>
		</div>