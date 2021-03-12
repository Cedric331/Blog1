<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Prise de contact</h2>
    <p>Réception d'une prise de contact avec les éléments suivants :</p>
    <ul>
      <li><strong>Nom</strong> : {{ $request['name'] }}</li>
      <li><strong>Email</strong> : {{ $request['email'] }}</li>
      <li><strong>Sujet</strong> : {{ $request['sujet'] }}</li>
      <li><strong>Message</strong> : {{ $request['message'] }}</li>
    </ul>
  </body>
</html>