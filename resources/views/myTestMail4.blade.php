<!DOCTYPE html>
<html>
<head>
    <title>Demande Partagée </title>
</head>
<body>

<p>Bienvenue </p>
<p>Nouvelle demande partagée par :{{ $details['name'] }}</p>

<p>Le sujet de demande est : {{ $details['sujet'] }}</p>
<p>Et le message de demande est : {{ $details['message'] }}</p>

<p>Pour consulter, vous pouvez accéder <a href="http://127.0.0.1:8000/"> ici . </a></p>

<p>Merci d'être avec nous.</p>

</body>
</html>
