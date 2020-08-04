<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$client->cateringName}} - Contact-Tracing Formulier</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                <div style="background:#111; padding: 50px" class="alert alert-success">
                    <h2 style="text-align: center">{{session('success')}}</h2 style="text-align: center">
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="booking-content">
                <div class="booking-image">
                    <h4 class="legal">Waarom vragen we dit?</h4>
                    <p class="legal">De Nationale Veiligheidsraad heeft op 23 juli 2020 beslist dat horecazaken de aanwezigheid van
                        hun gasten moeten noteren. Dit komt er niet zomaar: de COVID-19 pandemie woedt opnieuw in
                        volle hevigheid, en dit is slechts één van de maatregelen genomen om jou, je familie, vrienden en
                        de andere klanten beter te kunnen beschermen. Jouw en hun gezondheid staat op nummer één!</p>
                    <h4 class="legal">Wat gebeurt er met je gegevens?</h4>
                    <p class="legal">We begrijpen dat je bezorgd bent om de verwerking van je persoonsgegevens. We verwerken de
                        gegevens in opdracht van het Vlaams Agentschap Zorg en Gezondheid. We houden je gegevens
                        bij in een gesloten envelop voor een duurtijd van 14 dagen, waarna die onherroepelijk worden
                        vernietigd. Enkel in het geval van een vastgestelde besmetting, worden jouw gegevens verder
                        gecommuniceerd naar de bevoegde overheidsdiensten. In geen geval gebruiken we je gegevens
                        voor marketing- of andere doeleinden dan tracing in het kader van de COVID-19 pandemie.</p>
                    <h4 class="legal">Even juridisch: op welke basis verwerken we je gegevens?</h4>
                    <p class="legal">Je hebt vast al gehoord over de ‘GDPR’: de ‘General Data Protection Regulation’. Dat is een strenge
                        Europese regelgeving die ervoor zorgt dat je privacy beter is beschermd. We verwerken je gegevens,
                        direct in opdracht van de overheid, en in lijn met de beslissing van de Nationale Veiligheidsraad, op
                        grond van artikel 6,  c (“noodzakelijke verwerking om te voldoen aan een wettelijke verplichting die op de
                        verwerkingsverantwoordelijke rust”) en artikel 3, 10° Ministerieel besluit van 24 juli 2020 houdende wijziging
                        van het ministerieel besluit van 30 juni 2020 houdende dringende maatregelen om de verspreiding van het
                        coronavirus COVID-19 te beperken. Indien je vragen hebt over deze verwerking, of je wil een verzoek dan
                        wel klacht indienen, kan je de Data Protection Officer van het Agentschap Zorg & Gezondheid contacteren
                        via veiligheidsconsulent.zg@vlaanderen.be.</p>    
                    

                </div>
                <div class="booking-form">
                    <h1 id="catering">{{$client->cateringName}}</h1>
                    <form style="padding-top: 0" id="booking-form" method="post" action="">
                        @csrf
                        <img id="logo" src="/storage/logos/{{$client->logo}}" alt="Booking Image">
                        <br>
                        <h2>Vul hieronder uw gegevens in</h2>
                        <p>(1 persoon per tafel)</p>
                        <div class="form-group form-input">
                            <input placeholder="Naam*" type="text" name="lastName" value="" required/>
                        </div>
                        <div class="form-group form-input">
                            <input placeholder="Voornaam*" type="text" name="firstName" value="" required/>
                        </div>
                        <div class="form-group form-input">
                            <input placeholder="Telefoonnummer*" type="number" name="telnr" value="" required />
                        </div>
                        <div class="form-group form-input">
                            <input placeholder="E-mailadres*" type="email" name="email" value="" required />
                        </div>
                        <div class="form-group form-input">
                            <input placeholder="Tafelnummer*" type="number" name="tableNr" value="" required />
                        </div>
                        <div class="form-group form-input">
                            <input placeholder="Verblijfsperiode (aantal dagen)" type="number" name="stay" value="" />
                            <small>(Indien van toepassing)</small>
                        </div>
                        <br>
                        <div class="form-submit">
                            <input type="submit" value="Verstuur" class="submit" name="submit" />
                            <h4 class="legal">Met het invullen van dit formulier ga ik akkoord met de gegevensverwerking
                                onder artikel 6, c van de GDPR) en het relevante Ministerieel Besluit.</h4>
                            <p class="legal">Het is belangrijk dat je dit formulier correct invult, je helpt immers mee aan een coronavrije samenleving.
                                Je telefoonnummer en e-mailadres zijn verplicht.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
</body>
</html>