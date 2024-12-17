<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Réinitialisation de votre mot de passe</title>
  <style>
    body, .clean-body {
      margin: 0;
      padding: 0;
      -webkit-text-size-adjust: 100%;
      background-color: #ffffff;
      color: #000000;
    }
    .u_body {
      border-collapse: collapse;
      table-layout: fixed;
      border-spacing: 0;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
      vertical-align: top;
      min-width: 320px;
      margin: 0 auto;
      background-color: #ffffff;
      width: 100%;
    }
    .u-row-container {
      padding: 0px;
      background-image: url('https://raw.githubusercontent.com/AmiraZidi/Mailinglmsmdp/main/image-6.png');
      background-repeat: no-repeat;
      background-position: center top;
      background-color: transparent;
    }
    .u-row {
      margin: 0 auto;
      min-width: 320px;
      max-width: 600px;
      overflow-wrap: break-word;
      word-wrap: break-word;
      word-break: break-word;
      background-color: transparent;
    }
    .u-col {
      max-width: 320px;
      min-width: 600px;
      display: table-cell;
      vertical-align: top;
    }
    .v-col-background-color {
      height: 100%;
      width: 100% !important;
    }
    .v-container-padding-padding {
      overflow-wrap: break-word;
      word-break: break-word;
      padding: 30px 10px 15px 40px; /* Réduit le padding supérieur */
      font-family: 'Raleway', sans-serif;
    }
    .v-heading {
      overflow-wrap: break-word;
      word-break: break-word;
      padding: 5px 10px 10px 40px; /* Réduit le padding supérieur */
      font-family: 'Raleway', sans-serif;
      color: #ffffff;
      text-align: left;
      line-height: 110%; /* Réduit l'espacement entre les lignes */
      font-size: 20px; /* Réduit la taille du titre */
      font-weight: 400;
    }
    .v-text {
      overflow-wrap: break-word;
      word-break: break-word;
      padding: 0px 40px 10px;
      font-family: 'Raleway', sans-serif;
      color: #ffffff;
      text-align: justify;
      line-height: 170%;
      font-size: 14px;
    }
    .v-button {
      overflow-wrap: break-word;
      word-break: break-word;
      padding: 10px 10px 20px 40px; 
      font-family: 'Raleway', sans-serif;
      text-align: left;
    }
    .v-button a {
      box-sizing: border-box;
      display: inline-block;
      text-decoration: none;
      -webkit-text-size-adjust: none;
      text-align: center;
      color: #ba372a;
      background-color: #f1c40f;
      border-radius: 4px;
      width: 31%;
      max-width: 100%;
      overflow-wrap: break-word;
      word-break: break-word;
      word-wrap: break-word;
      mso-border-alt: none;
      font-size: 14px;
      line-height: 120%;
      padding: 10px 20px;
    }
    .v-footer {
      overflow-wrap: break-word;
      word-break: break-word;
      padding: 10px 20px 20px;
      font-family: 'Raleway', sans-serif;
      color: #6c757d;
      text-align: center;
      line-height: 170%;
      font-size: 14px;
    }
  </style>
</head>

<body style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #ffffff; color: #000000;">
  <table cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td style="word-break: break-word; border-collapse: collapse !important; vertical-align: top;">
    
<div class="u-row-container">
  <div class="u-row">
    <div style="border-collapse: collapse;display: table;width: 100%;height: 100%;background-color: transparent;">
      
<div class="u-col">
  <div class="v-col-background-color">
 <div style="box-sizing: border-box; height: 100%; padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
  
<table id="u_content_image_1" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
    <tr>
      <td class="v-container-padding-padding" align="left">
        
<table width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td class="v-text-align" align="left">
      <br>
      <img align="left" border="0" src="https://raw.githubusercontent.com/AmiraZidi/Mailinglmsmdp/main/image-5.png" alt="image" title="image" class="v-img" width="110"/>
      
    </td>
  </tr>
</table>

      </td>
    </tr>
  </tbody>
</table>

<table id="u_content_heading_1" role="presentation" cellpadding="0" cellspacing="0" width="80%" border="0">
  <tbody>
    <tr>
      <td class="v-heading" align="left">
        
    <h1 style="color:#ffffff;"><span><span><span><span><span><strong>Réinitialisation</strong><br><br><strong>De mot de passe</strong></span></span></span></span></span></h1>

      </td>
    </tr>
  </tbody>
</table>

<table id="u_content_text_1" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="color:#ffffff;">
  <tbody>
    <tr>
      <td class="v-text" align="left">
        
  <div>
    <p style="color:#ffffff;">Salut , <br></p>
<p style="color:#ffffff;">Vous avez demandé la réinitialisation de votre mot de passe. Nous sommes heureux de vous aider à accéder à nouveau à votre compte.</p>
<p style="color:#ffffff;"><strong>Adresse e-mail :</strong> <i style="color:#f1c40f"> {{ $details['email'] }} </i></p>
<p style="color:#ffffff;"><strong>Votre nouveau mot de passe :</strong> {{ $details['password'] }}</p>
<p style="color:#ffffff;">Si vous avez des questions  ou avez besoin d'assistance supplémentaire, n'hésitez pas à nous contacter. Nous sommes là pour vous aider.</p>

</div>
</td>
</tr>
</tbody>
</table>
<table id="u_content_button_1" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
<tbody>
  <tr>
    <td class="v-button" align="left">
<div class="v-text-align" align="left">
  <a href="http://127.0.0.1:8000/" target="_blank">
    <span><span>Accéder à votre compte</span></span>
  </a>
</div></td>
</tr>
  </tbody>
</table>
<table id="u_content_text_2" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
  <tbody>
    <tr>
      <td class="v-footer" align="left">
  <div> <br><br>
    <p>Merci de votre confiance et de faire partie de notre communauté! 😍</p>
<p>Cordialement,<br>L'équipe support STIC</p>
  </div>
  </td>
</tr>
  </tbody>
</table>
  </div>
  </div>
</div>
</div>
  </div>
</div>
</td>
  </tr>
  </tbody>
</table>
</body>
</html>