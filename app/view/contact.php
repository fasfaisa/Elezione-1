<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset = "UTF-8"/>
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge"/>
    <title>Elezione | Easy Voting Solution</title>

    <!-- script for navigation bar control -->
    <script src = "/js/header.js"></script>

    <!-- include common data php file-->
    <?php include_once "components/common.php" ?>
    <!--emailjs-->
    <script type = "text/javascript"
            src = "https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
    </script>
    <script type = "text/javascript">
        (function () {
            emailjs.init("6Ck40Ci9cdlwrNOT6");
        })();
    </script>
    <!-- sweet alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<!-- Navigation -->
<?php include_once "components/header.php" ?>

<div class = "py-10 px-5 flex justify-center">
    <section class = "bg-white w-full max-w-screen-lg shadow-xl drop-shadow-xl rounded-md">
        <div class = "flex flex-col md:flex-row w-full h-full md:items-center md:gap-x-8">
            <div class = "flex bg-slate-600 flex-col gap-y-6 w-full h-full justify-center rounded-t-md p-8 mb-5 md:mb-0 md:rounded-tr-none md:rounded-s-md">
                <div>
                    <h2 class = "mb-4 text-4xl tracking-tight font-bold text-center text-sky-500">
                        Contact Us
                    </h2>
                    <p class = "mb-8 lg:mb-16 font-light text-center text-gray-200 sm:text-lg">
                        Got a technical issue? Want to send feedback about a feature? Need
                        details about our Business plan? Let us know.
                    </p>
                </div>
                <div class = "flex items-center gap-x-3 text-white">
                    <span class = "material-symbols-outlined text-sky-400">mail</span>
                    contact@elezione.com
                </div>
                <div class = "flex items-center gap-x-3 text-white">
                    <span class = "material-symbols-outlined text-sky-400">phone</span>
                    +94 112 459 350
                </div>
                <div class = "flex items-center gap-x-3 text-white">
                    <span class = "material-symbols-outlined text-sky-400">location_on</span>
                    No 75/B , Galle RD, Colombo 3
                </div>
            </div>
            <form class = "space-y-4 w-full p-8" id = "contact-form">
                <h2 class = "text-2xl text-sky-600">Message Us</h2>
                <div>
                    <label for = "name" class = "block mb-2 text-sm font-medium text-gray-900">Name</label>
                    <input type = "text" id = "name" name = "name"
                           class = "block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-emerald-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                           placeholder = "John Perera" required/>
                </div>
                <div>
                    <label for = "email" class = "block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type = "email" id = "email" name = "email"
                           class = "shadow-sm bg-gray-50 border border-emerald-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                           placeholder = "name@abc.com" required/>
                </div>
                <div>
                    <label for = "subject" class = "block mb-2 text-sm font-medium text-gray-900">Subject</label>
                    <input type = "text" id = "subject" name = "subject"
                           class = "block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-emerald-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                           placeholder = "Let us know how we can help you" required/>
                </div>
                <div class = "sm:col-span-2">
                    <label for = "message" class = "block mb-2 text-sm font-medium text-gray-900">Your
                                                                                                  message</label>
                    <textarea id = "message" rows = "6" name = "message"
                              class = "block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-emerald-300 focus:ring-blue-500 focus:border-blue-500"
                              placeholder = "Leave a comment..."></textarea>
                </div>
                <button type = "submit"
                        id = "submit"
                        name = "test"
                        class = "py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-blue-700 sm:w-fit hover:bg-blue-800">
                    Send message
                </button>
            </form>
        </div>
    </section onC>
</div>


<!-- jquery -->
<script src = "https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
<!--email js send file-->
<script src = "/js/send_email.js"></script>

<!-- Footer -->
<?php include_once "components/footer.php" ?>
</body>

</html>