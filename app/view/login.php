<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: dashboard");
    exit();
}

global $is_logged;
include_once "../app/model/process/login_token_process.php";
if ($is_logged){
    header("Location: dashboard");
    exit();
}
?>

<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset = "UTF-8"/>
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge"/>
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
    <title>Elezione | Login</title>

    <!-- include common data php file-->
    <?php include_once "components/common.php" ?>

</head>

<body>
<div class = "h-auto min-h-screen flex py-10 justify-center items-center bg-slate-300/70 flex-col">
    <!-- logo -->
    <a href = "/" class = "absolute top-3 start-2 sm:start-3 md:start-4">
        <h1 class = "text-3xl font-bold md:text-4xl text-slate-700 font-belanosima">
            Elezione
        </h1>
    </a>

    <!-- login card -->
    <div class = "w-11/12 md:ms-10 sm:w-[25] max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8"
         id = "login-card">
        <form class = "space-y-6" id = "login-form">
            <h5 class = "text-xl font-medium text-gray-900">
                Sign in to
                <span class = "font-belanosima text-2xl text-sky-600">Elezione</span>
            </h5>

            <!-- email -->
            <div>
                <label for = "email" class = "block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type = "email" name = "email" id = "email"
                       class = "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       placeholder = "name@company.com" required/>
                <span class = "text-sm text-red-400 font-semibold" id = "error-span-0"></span>
            </div>

            <!-- password -->
            <div>
                <label for = "password" class = "block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input type = "password" name = "password" id = "password" placeholder = "••••••••"
                       class = "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       required/>
                <span class = "text-sm text-red-400 font-semibold" id = "error-span-1"></span>
            </div>

            <div class = "flex items-start">
                <div class = "flex items-start">
                    <div class = "flex items-center h-5">
                        <!-- remember me-->
                        <input id = "remember" type = "checkbox" name = "remember" value = "remember"
                               class = "w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300"/>
                    </div>
                    <label for = "remember" class = "ml-2 text-sm font-medium text-gray-900">Remember me</label>
                </div>
            </div>

            <!--  submit button-->
            <label class = "cursor-pointer">
                <input type = "button" class = "sr-only peer" id = "submit-btn"/>
                <div class = "w-full mt-7 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Login to your account
                </div>
            </label>

            <!-- error message-->
            <div class = "text-center py-2 bg-red-400 text-white hidden" id = "unsuccessful-div"></div>

            <!-- register redirect-->
            <div class = "text-sm font-medium text-gray-500">
                Not registered?
                <a href = "/register" class = "text-blue-700 hover:underline">Create account</a>
            </div>
        </form>
    </div>

    <!-- error card-->
    <div class = "text-xl text-center text-sky-950 hidden" id = "error-card">You're email not verified. please verify
                                                                             and comeback.
    </div>

    <!-- footer-->
    <p class = "text-gray-600 absolute bottom-4 w-screen text-center text-sm">
        © 2023 Elezione. All rights reserved.
    </p>
</div>

<!-- jquery -->
<script src = "https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>

<!-- submit function -->
<script>
    $(document).ready(() => {
        $("#submit-btn").click((event) => {
            event.preventDefault();
            let formData = $("#login-form").serialize();
            let error = $("#unsuccessful-div")

            // remove current errors
            for (let i = 0; i < 2; i++) {
                $("#error-span-" + i).text("");
            }
            error.addClass("hidden");

            $.post("login_process", formData, (data, status) => {
                if (status === "success") {
                    if (parseInt(data) in [1, 0]) {
                        $("#error-span-" + data).text("Field is empty");
                    } else if (parseInt(data) === 2) {
                        error.removeClass("hidden");
                        error.text("Email and password not match.");
                    } else if (parseInt(data) === 3) {
                        $("#login-card").addClass("hidden")
                        $("#error-card").removeClass("hidden");
                    } else if (data === "success") {
                        location.href = "/dashboard";
                    } else {
                        error.removeClass("hidden");
                        error.text("Something went wrong try again.")
                    }
                } else {
                    error.removeClass("hidden");
                    error.text("Something went wrong try again.")
                }
            })
        })
    })
</script>
</body>

</html>