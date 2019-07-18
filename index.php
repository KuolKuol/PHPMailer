<!-- include php mailer scripts -->
<?php require './mail.php';?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHPMailer</title>
</head>
<body>

    <!-- form result message  -->
    <?php if(isset($error)){echo $error;}?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">

        <div class="form-section">
            <label for="name">Name</label> <br>
            <input type="text" name="name">
        </div>

        <div class="form-section">
            <label for="email">Email</label> <br>
            <input type="email" name="email">
        </div>

        <div class="form-section">
            <label for="subject">Subject</label> <br>
            <input type="subject" name="subject">
        </div>

        <div class="form-section">
            <label for="message">Message</label> <br>
            <textarea name="message" cols="30" rows="10"></textarea>
        </div>

        <div class="form-section">
            <input type="file" name="file">  
        </div>

        <div class="form-section"><br>
            <input type="submit" value="Submit" name="submit">
        </div>

    </form>

</body>
</html>