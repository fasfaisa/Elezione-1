<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Elezione | Easy Voting Solution</title>

    <!-- include common data php file-->
    <?php include_once "components/common.php" ?>

    <!-- script for navigation bar control -->
    <script src="js/header.js"></script>

</head>

<body>

    <!-- Navigation -->
    <?php include_once "components/header.php" ?>

    <!-- error msg -->
    <h1 class="text-lg md:text-xl xl:text-2xl text-center text-slate-800">
        <?php include_once "../app/model/process/verification_process.php" ?>
    </h1>

    <!-- Footer -->
    <?php include_once "components/footer.php" ?>
</body>

</html>