<!DOCTYPE HTML>

<html>
	<head>
		<title>Contact tracing horeca</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	    <link rel="stylesheet" href="css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>
		@if (session('success'))
		<div style="background:#542e5c; padding: 50px" class="alert alert-success">
			<h2 style="text-align: center; color:white;">{{session('success')}}</h2 style="text-align: center">
		</div>
		@endif
		<!-- Banner -->
			<section id="banner">
				<div class="inner split">
					<section>
						<h2>Contact tracing app speciaal ontwikkeld voor de horeca.</h2>
					</section>
					<section>
						<p>Zoek je een handige app die al de gegevens van jouw klanten veilig bewaart? 
						   Een makkelijke app voor uw klanten door middel van een QR code?
						   Zoek je een app waar je de gegevens snel en overzichtelijk kan raadplegen wanneer nodig? 
						   Dit kan allemaal met deze veilige contact tracing app ontwikkeld voor de horeca! Dankzij deze app is er geen centraal toestel en gebeurt alles op het toestel van de klant.</p>
						<ul class="actions">
							<li><a href="#one" class="button special">Kom meer te weten!</a></li>
						</ul>
					</section>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="wrapper">
				<div class="inner split">
					<section>
						<h2>Waarom een contact tracing app?</h2>
						<p>De Nationale Veiligheidsraad heeft op 23 juli 2020 beslist dat horecazaken de aanwezigheid van
							hun gasten moeten noteren. Dit komt er niet zomaar: de COVID-19 pandemie woedt opnieuw in
							volle hevigheid, en dit is slechts één van de maatregelen genomen om jou, je familie, vrienden en
							de andere klanten beter te kunnen beschermen. Wil je een snelle en handige app voor uw klanten en voor uzelf? Meld je dan aan via onderstaande formulier en je inlog gegevens staan klaar binnen 24u!</p>
					</section>
					<section>
						<ul class="checklist">
							<li>Volledig gratis.</li>
							<li>QR code om uw klanten snel te verwijzen naar het formulier.</li>
							<li>Dankzij de QR code kan het invullen van het formulier aan eigen tafel gebeuren.</li>
							<li>Geen centraal toestel, het invullen gebeurt op het toestel van de klant.</li>
							<li>Veilig login systeem om gegevens te raadplegen wanneer nodig.</li>
							<li>Volledig conform de GDPR wetgeving.</li>
						</ul>
					</section>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style2 alt">
				<div class="inner">
					<div class="spotlight">
						<div class="image">
							<img style="height: 500px; object-fit: cover;" src="images/yes.jpg" alt="" />
						</div>
						<div class="content">
							<h3>Ja, ik wil gratis gebruik maken van deze applicatie!</h3>
							<p>Vul je gegevens hieronder in en verwacht binnen de 24u jouw inlog gegevens.</p>
							<form action="/register" class="alt" method="POST">
								@csrf							<div class="row uniform">
									<div class="6u 12u$(xsmall)">
										<input required name="name" placeholder="Naam" type="text">
									</div>
									<div class="6u$ 12u$(xsmall)">
										<input required name="firstName" placeholder="Voornaam" type="text">
									</div>
									<div class="12u$">
										<input required name="cateringName" placeholder="Naam horeca zaak" type="text">
									</div>
									<div class="6u 12u$(xsmall)">
										<input required name="streetAndNr" placeholder="Straat + nr." type="text">
									</div>
									<div class="6u$ 12u$(xsmall)">
										<input required name="city" placeholder="Stad of gemeente" type="text">
									</div>
									<div class="6u$ 12u$(xsmall)">
										<input required name="tel" placeholder="Telefoon nr." type="text">
									</div>
									<div class="12u$">
										<input required name="email" placeholder="E-mail adres" type="email">
									</div>
								 </div>
								 <ul class="actions">
									 <li><input class="alt" value="Verstuur!" type="submit"></li>
								 </ul>
							 </form>
						</div>
					</div>
				</div>
			</section>

			<section id="three" class="wrapper">
				<div class="inner split">
					<section>
						<h2>Waarom is deze app gratis?</h2>
						<p>We leven anno 2020 in bewogen tijden. Nu meer als ooit primeert veiligheid in het dagdagelijkse leven. 
							Net daarom kozen we ervoor om deze app gratis te maken, want op veiligheid staat geen prijs. 
							We hopen met dit initiatief het effect te creeëren dat deze app massaal gebruikt wordt en we op die manier samenwerken aan een veiligere situatie. 
						</p>
						<p>Stay safe!</p>
						<a style="text-decoration:none" target="_blank" href="https://bongiodev.be/">Bongio Dev</a>
					</section>
				</div>
			</section>
		<!-- Contact -->
			<section id="contact" class="wrapper">
				<div class="inner split">
					<section>
						<h2>Heb je nog vragen?</h2>
						<p>Aarzel niet om ons te contacteren met al je vragen of opmerkingen en we helpen je zo snel mogelijk verder.</p>
						<form action="/contactMail" class="alt" method="POST">
							@csrf							<div class="row uniform">
								<div class="6u 12u$(xsmall)">
									<input required name="name" placeholder="Naam" type="text">
								</div>
								<div class="6u$ 12u$(xsmall)">
									<input required name="email" placeholder="E-mail" type="email">
								</div>
								<div class="12u$">
									<textarea required name="message" placeholder="Bericht" rows="4"></textarea>
 								</div>
 							</div>
 							<ul class="actions">
 								<li><input class="alt" value="Verstuur!" type="submit"></li>
 							</ul>
 						</form>
					</section>
					<section>
						<ul class="contact">
							<li class="fab fa-linkedin"><a target="_blank" href="https://www.linkedin.com/in/aleko-bongiovanni-983645196/">Aleko Bongiovanni</a></li>
							<li class="fas fa-phone"><a href="+32488303222">+32488303222</a></li>
							<li class="fas fa-mouse-pointer"><a target="_blank" href="https://www.bongiodev.be/">Website</a></li>
						</ul>
					</section>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="copyright">
					Made with &#10084; by <a target="_blank" href="https://bongiodev.be">Bongio Dev</a>.
				</div>
			</footer>

		<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="js/main.js"></script>

	</body>
</html>