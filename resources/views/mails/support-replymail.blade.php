<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>
  <h2>Hi {{ $email }},<br></h2>
  <p>Thanks for contacting us!<br>
    Your request (#{{ $id }}) has been received and we'll get back to you as soon as possible.<br></p>

  <p>In order to serve you faster, did you mention your TryoutRanking email ID and the name of the Tryout you are talking about?<br>
    If not, please feel free to reply to this email or click the link below:<br>
    http://127.0.0.1:8000/support<br></p>

  <p>Also, in the meantime, here is a short video that might help you solve your problem while you wait. (http://bit.ly/Tryout-Intro)<br></p>

  <p>See you in the Cloud,<br></p>

  <p>EastNest<br>
    Your friends at TryoutRanking<br></p>

  <p>Psst... at TryoutRangking, we also speak Japanese, Spanish, Brazilian Portuguese, and German! :)<br></p>

  <p>DISCLAIMER: When submitting troubleshooting data to Support, please ensure you remove all sensitive data, such as account passwords, government identification numbers, cardholder data, confidential business data, or other sensitive information. We will use the troubleshooting data to help us address your support issues and to improve our services, subject to the https://www.tryoutranking.com/privacy_policy.<br></p>

  <p><br>###<br></p>
  <p>{{ $description }}</p>
  <p><br>###</p>
</body>

</html>
