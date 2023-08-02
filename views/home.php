<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8"/>
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0"/>
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge"/>
    <title>Elezione | Easy Voting Solution</title>

    <!-- script for navigation bar control -->
    <script src = "../js/header.js"></script>

    <!-- include common data php file-->
    <?php include_once "views/components/common.php" ?>

</head>

<body class = "bg-gray-100">
<!-- Navigation -->
<?php
$color = "bg-transparent";
include_once "views/components/header.php"
?>

<!-- Hero Section -->
<section class = "h-screen flex items-center relative -mt-[4.25rem] bg-slate-800">
    <img
            src = "views/resources/start-bg.jpeg"
            alt = "bg-image"
            class = "object-cover h-screen w-screen top-0 opacity-80 absolute"
    />
    <div class = "container z-50 mx-auto p-4">
        <h1
                class = "text-4xl md:text-6xl xl:text-7xl font-bold text-center text-slate-100 mb-3"
        >
            Welcome to <span class = "font-belanosima text-sky-500">Elezione</span>
        </h1>
        <p
                class = "text-md md:text-lg xl:text-xl text-center text-gray-200 mb-12 italic"
        >
            Cast your vote conveniently from anywhere, anytime.
        </p>
        <div class = "flex justify-center">
            <a
                    href = "/register"
                    class = "bg-blue-500 text-white py-3 px-8 rounded-md shadow-lg hover:bg-emerald-500 transition-colors duration-300"
            >Get Start</a
            >
        </div>
    </div>
</section>

<!-- Features Section -->
<section class = "py-20 relative">
    <!--background image-->
    <img
            src = "views/resources/bg.svg"
            alt = "bg-image"
            class = "absolute object-cover h-full w-full top-0 -z-50 opacity-80"
    />
    <div class = "mx-auto px-8 sm:px-16 md:px-24 lg:px-32 xl:px-40">
        <!-- Why Elezion -->
        <h2
                class = "text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-center mb-5"
        >
            Why <span class = "font-belanosima text-sky-600">Elezione</span>
        </h2>

        <div class = "grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">
            <div
                    class = "bg-white rounded-lg p-8 shadow-xl duration-300 ease-in group cursor-pointer hover:bg-yellow-300 text-gray-600 hover:text-gray-800"
            >
                <div class = "group-hover:scale-105 duration-150 ease-in">
                    <h2 class = "text-2xl font-bold text-gray-800 mb-4">Easy to Use</h2>
                    <p>
                        Elezione is user-friendly and designed to make the voting process
                        as simple as possible.
                    </p>
                </div>
            </div>

            <div
                    class = "bg-white rounded-lg p-8 shadow-xl duration-300 ease-in group cursor-pointer hover:bg-yellow-300 text-gray-600 hover:text-gray-800"
            >
                <div class = "group-hover:scale-105 duration-300 ease-in">
                    <h2 class = "text-2xl font-bold text-gray-800 mb-4">
                        Secure and Reliable
                    </h2>
                    <p>
                        We prioritize the security and integrity of your votes. Elezione
                        ensures a reliable and tamper-proof voting experience.
                    </p>
                </div>
            </div>

            <div
                    class = "bg-white rounded-lg p-8 shadow-xl duration-300 ease-in group cursor-pointer hover:bg-yellow-300 text-gray-600 hover:text-gray-800"
            >
                <div class = "group-hover:scale-105 duration-300 ease-in">
                    <h2 class = "text-2xl font-bold text-gray-800 mb-4">
                        Accessible Anytime, Anywhere
                    </h2>
                    <p>
                        With Elezione, you can cast your vote from the comfort of your
                        home or on the go using any device.
                    </p>
                </div>
            </div>

            <div
                    class = "bg-white rounded-lg p-8 shadow-xl duration-300 ease-in group cursor-pointer hover:bg-yellow-300 text-gray-600 hover:text-gray-800"
            >
                <div class = "group-hover:scale-105 duration-300 ease-in">
                    <h2 class = "text-2xl font-bold text-gray-800 mb-4">
                        Anonymous Voting.
                    </h2>
                    <p>
                        With Elezione, you can vote without show your identity for any
                        others.
                    </p>
                </div>
            </div>
        </div>

        <!-- pricing org-->
        <h2
                class = "text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-center mb-5 mt-16"
                id = "pricing">
            Pricing
            <span class = "font-belanosima text-sky-600 text-xl md:text-3xl"
            >for Organizations</span
            >
        </h2>
        <div class = "w-full flex justify-center">
            <div
                    class = "w-fit grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 place-items-center"
            >
                <div
                        class = "w-[18rem] p-4 bg-white border-2 border-emerald-600 rounded-lg shadow-lg drop-shadow-lg"
                >
                    <h5 class = "mb-4 text-xl font-medium text-gray-500">
                        Silver plan
                    </h5>
                    <div class = "flex items-baseline text-gray-800">
                        <span class = "text-5xl font-extrabold tracking-tight">Free</span>
                    </div>
                    <ul role = "list" class = "space-y-5 my-7">
                        <li class = "flex space-x-3 items-center">
                            <img src = "resources/tick.svg" alt = "tick" class = "w-4 h-4"/>
                            <span
                                    class = "text-base font-normal leading-tight text-gray-500"
                            >1 poll per month</span
                            >
                        </li>
                        <li class = "flex space-x-3 items-center">
                            <img src = "resources/tick.svg" alt = "tick" class = "w-4 h-4"/>
                            <span
                                    class = "text-base font-normal leading-tight text-gray-500"
                            >100 total votes</span
                            >
                        </li>
                        <li class = "flex space-x-3 items-center">
                            <img src = "resources/tick.svg" alt = "tick" class = "w-4 h-4"/>
                            <span
                                    class = "text-base font-normal leading-tight text-gray-500"
                            >5 total candidates</span
                            >
                        </li>
                    </ul>
                    <a href = "/register">
                        <button
                                class = "relative group mt-4 w-full self-center bg-transparent z-[0] text-blue-700 hover:text-white border-blue-700 border-2 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-8 py-2 text-center overflow-hidden"
                        >
                            Register
                            <span
                                    class = "z-[-1] absolute w-full h-full -left-full top-0 bg-blue-700 group-hover:left-0 duration-200 ease-in"
                            ></span></button
                        >
                    </a>
                </div>

                <div
                        class = "w-[18rem] p-4 bg-white border-2 border-emerald-600 rounded-lg shadow-lg drop-shadow-lg"
                >
                    <h5 class = "mb-4 text-xl font-medium text-gray-500">Gold plan</h5>
                    <div class = "flex items-baseline text-gray-800">
                        <span class = "text-3xl font-semibold">$</span>
                        <span class = "text-5xl font-extrabold tracking-tight">4.99</span>
                        <span class = "ml-1 text-xl font-normal text-gray-500"
                        >/Year</span
                        >
                    </div>
                    <ul role = "list" class = "space-y-5 my-7">
                        <li class = "flex space-x-3 items-center">
                            <img src = "resources/tick.svg" alt = "tick" class = "w-4 h-4"/>
                            <span
                                    class = "text-base font-normal leading-tight text-gray-500"
                            >5 poll per month</span
                            >
                        </li>
                        <li class = "flex space-x-3 items-center">
                            <img src = "resources/tick.svg" alt = "tick" class = "w-4 h-4"/>
                            <span
                                    class = "text-base font-normal leading-tight text-gray-500"
                            >1000 total votes</span
                            >
                        </li>
                        <li class = "flex space-x-3 items-center">
                            <img src = "resources/tick.svg" alt = "tick" class = "w-4 h-4"/>
                            <span
                                    class = "text-base font-normal leading-tight text-gray-500"
                            >50 total candidates</span
                            >
                        </li>
                    </ul>
                    <a href = "/register">
                        <button
                                class = "relative group mt-4 w-full self-center bg-transparent z-[0] text-blue-700 hover:text-white border-blue-700 border-2 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-8 py-2 text-center overflow-hidden"
                        >
                            Register
                            <span
                                    class = "z-[-1] absolute w-full h-full -left-full top-0 bg-blue-700 group-hover:left-0 duration-200 ease-in"
                            ></span></button
                        >
                    </a>
                </div>

                <div
                        class = "w-[18rem] bg-white sm:translate-x-1/2 xl:translate-x-0 max-w-sm p-4 border-2 border-emerald-600 rounded-lg shadow-lg drop-shadow-lg"
                >
                    <h5 class = "mb-4 text-xl font-medium text-gray-500">
                        Platinam plan
                    </h5>
                    <div class = "flex items-baseline text-gray-800">
                        <span class = "text-3xl font-semibold">$</span>
                        <span class = "text-5xl font-extrabold tracking-tight">9.99</span>
                        <span class = "ml-1 text-xl font-normal text-gray-500"
                        >/Year</span
                        >
                    </div>
                    <ul role = "list" class = "space-y-5 my-7">
                        <li class = "flex space-x-3 items-center">
                            <img src = "resources/tick.svg" alt = "tick" class = "w-4 h-4"/>
                            <span
                                    class = "text-base font-normal leading-tight text-gray-500"
                            >20 poll per month</span
                            >
                        </li>
                        <li class = "flex space-x-3 items-center">
                            <img src = "resources/tick.svg" alt = "tick" class = "w-4 h-4"/>
                            <span
                                    class = "text-base font-normal leading-tight text-gray-500"
                            >Unlimited total votes</span
                            >
                        </li>
                        <li class = "flex space-x-3 items-center">
                            <img src = "resources/tick.svg" alt = "tick" class = "w-4 h-4"/>
                            <span
                                    class = "text-base font-normal leading-tight text-gray-500"
                            >Unlimited total candidates</span
                            >
                        </li>
                    </ul>
                    <a href = "/register">
                        <button
                                class = "relative group mt-4 w-full self-center bg-transparent z-[0] text-blue-700 hover:text-white border-blue-700 border-2 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-8 py-2 text-center overflow-hidden"
                        >
                            Register
                            <span
                                    class = "z-[-1] absolute w-full h-full -left-full top-0 bg-blue-700 group-hover:left-0 duration-200 ease-in"
                            ></span></button
                        >
                    </a>
                </div>
            </div>
        </div>

        <!-- pricing voter -->
        <h2
                class = "text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-center mb-5 mt-16"
        >
            Free
            <span class = "font-belanosima text-sky-600 text-xl md:text-3xl"
            >for Voters</span
            >
        </h2>
        <div class = "flex w-full justify-center">
            <a href = "/register">
                <button
                        class = "relative group mt-4 w-[10rem] bg-transparent z-[0] text-blue-700 hover:text-white border-blue-700 border-2 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-8 py-2 text-center overflow-hidden"
                >
                    Register FREE
                    <span
                            class = "z-[-1] absolute w-full h-full -left-full top-0 bg-blue-700 group-hover:left-0 duration-200 ease-in"
                    ></span></button
                >
            </a>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once "views/components/footer.php" ?>
</body>
</html>
