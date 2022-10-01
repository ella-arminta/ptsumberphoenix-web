<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Library Style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../style/admin/login.css">

    <!-- Library -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/0e9fafd61c.js" crossorigin="anonymous"></script>

    <title>PT Sumber Phoenix | Login</title>

</head>
<body>

    <!-- Login  -->
    <section class="admin-section">
        <div class="container-fluid">
            <form action="./api/login.php" class="form-container" method="POST">

                <?php if (isset($_GET['error'])) {?>
                    <p class="error" style="color: red">* <?php echo $_GET['error']; ?></p>    
                <?php } ?>

                <label for="email">Email</label>
                <input class="input" type="email" name="email" required>
                <label for="password">Password</label>
                <input class="input" type="password" name="password" required>
                <input type="submit" value="Submit">
            </form>
        </div>
    </section>

</body>
</html>