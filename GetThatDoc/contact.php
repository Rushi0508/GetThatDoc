<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | GetThatDoc</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./css/nav.css">
<link rel="stylesheet" href="./css/contact.css">
</head>
<body>
    <?php
        include 'nav.php';
    ?>
    <div class="container">
		<div class="contact-box">
			<!-- <div class="left"></div> -->
			<div class="right">
				<h2>Contact Us</h2>
                <form action="contact_db.php" method="POST">
				<input type="text" class="field" id="name" name="name" placeholder="Your Name" onkeyup="checkFilled()" required>
				<input type="text" class="field" id="email" name="email" placeholder="Your Email" onkeyup="checkFilled()" required>
				<input type="text" class="field" id="phone" name="mobile" placeholder="Phone" onkeyup="checkFilled()" required>
				<textarea placeholder="Message" id="message" name="message" class="field" onkeyup="checkFilled()" required></textarea>
				<button class="btn">Send</button></form>
			</div>
		</div>
	</div>
    <script>
                    function checkFilled() {
                        var interests = document.getElementsByClassName("field");
                        for (var i = 0; i < interests.length; i++) {
                            if (interests[i].value == '') {
                                interests[i].style.backgroundColor = 'rgb(27 26 26 / 60%)';
                            } else {
                                interests[i].style.backgroundColor = 'white';
                                interests[i].style.color = 'black';
                                interests[i].style.fontWeight = 'bold';
                            }
                        }
                    }
                </script>
</body>
</html>