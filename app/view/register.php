<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Elezione | Easy Voting Solution</title>

    <!-- include common data php file-->
    <?php include_once "components/common.php" ?>
</head>

<body>
    <div class="h-auto min-h-screen flex py-10 justify-center items-center bg-slate-300/70 flex-col">
        <!-- logo -->
        <a href="/" class="absolute top-3 start-2 sm:start-3 md:start-4">
            <h1 class="text-3xl font-bold md:text-4xl text-slate-700 font-belanosima">
                Elezione
            </h1>
        </a>

        <!--form div-->
        <div id="form-div" class="w-11/12 h-fit sm:w-[28rem] md:w-[30rem] max-w-lg bg-white border border-gray-200 rounded-lg shadow">
            <!-- user type selection-->
            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50" id="regtab">
                <li class="mr-2">
                    <button id="reg-voter" type="button" class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100">
                        Voter
                    </button>
                </li>
                <li class="mr-2">
                    <button id="reg-org" type="button" class="inline-block p-4 hover:bg-gray-100">
                        Organization
                    </button>
                </li>
            </ul>

            <!-- user registration -->
            <form class="space-y-6 p-4 sm:p-6 md:p-8" id="user-form">
                <h5 class="text-xl font-medium text-gray-900">
                    Register to
                    <span class="font-belanosima text-2xl text-sky-600">Elezione</span>
                </h5>

                <!-- name-->
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:ring-1 !outline-none" placeholder="Peter Elwin" required />
                    <span class="text-sm text-red-400 font-semibold" id="error-span-0"></span>
                </div>

                <!--- email-->
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:ring-1 !outline-none" placeholder="name@company.com" required />
                    <span class="text-sm text-red-400 font-semibold" id="error-span-1"></span>
                </div>

                <!-- package type-->
                <div class="my-2 hidden" id="package">
                    <label for="package" class="block mb-2 text-sm font-medium text-gray-900">Package type <span class="text-red-500">*</span></label>
                    <select id="package" name="package" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:ring-1 !outline-none">
                        <option value="silver" selected>Silver</option>
                        <option value="gold">Gold</option>
                        <option value="platinum">Platinum</option>
                    </select>
                    <span class="text-sm text-red-400 font-semibold" id="error-span-2"></span>
                </div>

                <!-- password-->
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password <span class="text-red-500">*</span></label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:ring-1 !outline-none" required />
                    <span class="text-sm text-red-400 font-semibold" id="error-span-3"></span>
                </div>

                <!-- confirm password-->
                <div>
                    <label for="conf_password" class="block mb-2 text-sm font-medium text-gray-900">Confirm password <span class="text-red-500">*</span></label>
                    <input type="password" name="conf_password" id="conf_password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 focus:ring-1 !outline-none" required />
                    <span class="text-sm text-red-400 font-semibold" id="error-span-4"></span>
                </div>

                <!-- error message-->
                <div class="text-center py-2 bg-red-400 text-white hidden" id="unsuccessful-div">
                    Registration unsuccessful.
                </div>

                <!--payment message-->
                <p class="mb-4 mt-8 text-center italic text-emerald-700 hidden" id="payment-msg">
                    No need to pay today. All accounts have 7 days free trial.
                </p>

                <!-- submit button-->
                <label class="cursor-pointer">
                    <input id="submit-btn" type="button" value="voter" name="voter" class="peer sr-only" />
                    <div class="relative group mt-4 w-full self-center bg-transparent z-[0] text-blue-700 hover:text-white border-blue-700 border-2 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-8 py-2 text-center overflow-hidden">
                        Register to Elezione
                        <span class="z-[-1] absolute w-full h-full -left-full top-0 bg-blue-700 group-hover:left-0 duration-200 ease-in"> </span>
                    </div>
                </label>

                <!-- login redirection-->
                <div class="text-sm font-medium text-gray-500">
                    Already registered?
                    <a href="/login" class="text-blue-700 hover:underline">Login account</a>
                </div>
            </form>
        </div>

        <!-- processing div-->
        <div id="processing-div" class="text-sky-800 text-center hidden">
            <span class="material-symbols-outlined text-5xl animate-spin">progress_activity</span>
            <h1 class="mt-5 text-xl italic">Processing</h1>
        </div>

        <!-- success div-->
        <div id="success-div" class="px-4 max-w-lg text-center hidden">
            <h1 class="mb-3 text-2xl font-semibold">Email Confirmation Required</h1>
            <h3>
                We sent the email to your email.
                Check your inbox to activate the account. If the confirmation email is not in your inbox, please
                check the Spam. Thank you.
            </h3>
        </div>

        <!-- footer-->
        <p class="text-gray-600 absolute bottom-4 w-screen text-center text-sm">
            © 2023 Elezione. All rights reserved.
        </p>

        <!-- jquery -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>

        <!-- form change script -->
        <script>
            $(document).ready(() => {
                const submit = $("#submit-btn");
                $("#reg-voter").click((event) => {
                    $("#package").hide();
                    $("#payment-msg").hide();
                    submit.prop("name", "voter");
                    submit.prop("value", "voter");
                    $("#reg-voter").addClass("text-blue-600");
                    $("#reg-org").removeClass("text-blue-600");
                })
                $("#reg-org").click((event) => {
                    $("#package").show();
                    $("#payment-msg").show();
                    submit.prop("name", "organization");
                    submit.prop("value", "organization");
                    $("#reg-org").addClass("text-blue-600");
                    $("#reg-voter").removeClass("text-blue-600");
                })
            })
        </script>

        <!-- submit function -->
        <script>
            $(document).ready(() => {
                $("#submit-btn").click((event) => {
                    event.preventDefault();
                    let formData = $("#user-form").serialize();
                    formData += "&" + event.target.name + "=" + event.target.value;

                    // start processing animation
                    $("#processing-div").removeClass("hidden");
                    $("#form-div").addClass("hidden");

                    // remove current errors
                    for (let i = 0; i < 5; i++) {
                        $("#error-span-" + i).text("");
                    }
                    $("#unsuccessful-div").addClass("hidden");

                    $.post("register_process", formData, (data, status) => {
                        console.log("data -> ", data, "\nstatus -> ", status); // this statement help to get idea about response
                        // remove processing div
                        $("#processing-div").addClass("hidden");

                        // show new error
                        if (status === "success") {
                            if (data !== "success") {
                                $("#form-div").removeClass("hidden");
                                if ([0, 1, 3, 4].includes(parseInt(data))) {
                                    $("#error-span-" + data).text("Field is empty");
                                } else if (parseInt(data) === 2) {
                                    $("#error-span-2").text("Invalid package type");
                                } else if (parseInt(data) === 5) {
                                    $("#error-span-1").text("Invalid email format");
                                } else if (parseInt(data) === 6) {
                                    $("#error-span-3").text("Password less than 6 characters");
                                } else if (parseInt(data) === 7) {
                                    $("#error-span-4").text("Different password and confirm password");
                                } else if (parseInt(data) === 8) {
                                    $("#error-span-1").text("Email already registered");
                                } else {
                                    $("#unsuccessful-div").removeClass("hidden");
                                }
                            } else {
                                $("#success-div").removeClass("hidden");
                            }
                        } else {
                            $("#form-div").removeClass("hidden");
                            $("#unsuccessful-div").removeClass("hidden");
                        }
                    })
                })
            })
        </script>
    </div>
</body>

</html>