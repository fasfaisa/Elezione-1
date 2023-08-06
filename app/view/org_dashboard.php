<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Elezione | Easy Voting Solution</title>

  <!-- script for navigation bar control -->
  <script src="../js/header.js"></script>

  <!-- include common data php file-->
  <?php include_once "components/common.php" ?>

</head>

<body>

  <!-- Navigation -->
  <?php include_once "components/header.php" ?>

  <div>
    <div class="flex justify-end bg-gray-200 py-3 px-10 items-center">
      <p class="text-xl font-belanosima">ABC Dream Star</p>
    </div>
    <!-- details area -->
    <div class="flex flex-col lg:flex-row min-h-[calc(100vh-18.05rem)]">
      <div class="flex flex-col bg-gray-300 py-4 px-2 md:px-4 lg:rounded-r-lg lg:shadow-sm lg:drop-shadow-sm">
        <h2 class="text-lg font-bold">Created Campaign</h2>
        <!-- campaigns -->
        <div class="mb-4">
          <div id="event-card" class="block my-4 w-full lg:w-[28rem] text-slate-100 p-6 bg-blue-400 rounded-lg shadow-xl drop-shadow-xl">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">
              2023-08-07 Program
            </h5>
            <p class="font-normal italic">Start : 2023-08-07 19:00</p>
            <p class="font-normal italic">End : 2023-08-08 00:00</p>
            <p class="font-normal italic">Status : Ongoing</p>
            <p class="font-normal italic overflow-hidden text-ellipsis">
              Link : https://elezion.com/poll=abcdreamstar_drythjg
            </p>
          </div>

          <div class="block my-4 w-full lg:w-[28rem] text-gray-600 p-6 bg-white rounded-lg shadow-xl drop-shadow-xl hover:bg-emerald-100">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">
              2023-08-09 Program
            </h5>
            <p class="font-normal italic">Start : 2023-08-09 19:00</p>
            <p class="font-normal italic">End : 2023-08-10 00:00</p>
            <p class="font-normal italic">Status : Scheduled</p>
            <p class="font-normal italic overflow-hidden text-ellipsis">
              Link : https://elezion.com/poll=abcdreamstar_wtgdknd
            </p>
          </div>

          <div class="block w-full lg:w-[28rem] p-6 text-gray-600 bg-white rounded-lg shadow-xl drop-shadow-xl hover:bg-emerald-100">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">
              2023-08-17 Program
            </h5>
            <p class="font-normal italic">Start : 2023-08-17 19:00</p>
            <p class="font-normal italic">End : 2023-08-18 00:00</p>
            <p class="font-normal italic">Status : Scheduled</p>
            <p class="font-normal italic overflow-hidden text-ellipsis">
              Link : https://elezion.com/poll=abcdreamstar_ourmlsk
            </p>
          </div>
        </div>

        <h2 class="text-lg font-bold">Account Details</h2>
        <div class="my-4 ms-4 text-slate-800">
          <p class="font-normal">Level : Platinum</p>
          <p class="font-normal">Verified : Yes</p>
          <p class="font-normal">Available Campaign Count : 7</p>
          <p class="font-normal">Payment Renew : 2024/06/02</p>
          <p class="font-normal">Current Payment Status : Paid</p>
        </div>
      </div>

      <!-- stats -->
      <div class="flex flex-col items-center w-full p-5">
        <div class="flex self-end mb-5 w-fit items-center space-x-3">
          <a href="settings.php"><span class="material-symbols-outlined hover:text-green-600 duration-300 ease-in">
              settings
            </span></a>
          <button id="new-campaign" class="bg-emerald-700 px-3 py-1.5 text-white rounded-md hover:bg-emerald-600 duration-300 ease-in">
            New Campaign
          </button>
        </div>
        <div class="flex justify-between w-full md:ps-10">
          <h3 class="text-xl font-bold">Vote Count</h3>
          <div class="flex items-center">
            <label for="type-vote-count" class="block me-2 text-sm font-medium text-gray-900">Type</label>
            <select id="type-vote-count" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-1.5 px-2">
              <option value="bar" selected>Bar</option>
              <option value="line">Line</option>
              <option value="doughnut">Doughnut</option>
              <option value="polarArea">Polar Area</option>
              <option value="pie">Pie</option>
            </select>
          </div>
        </div>

        <!-- graph -->
        <div class="flex justify-center w-full h-full" id="graph">
          <canvas id="votes" class="md:mx-10 max-w-[30rem] max-h-[30rem]"></canvas>
        </div>

        <!-- poll rules -->
        <div class="w-full md:ps-10 mt-10">
          <h3 class="text-xl font-bold self-start mb-4">Rules</h3>
          <div class="self-start">
            <ul class="ms-5">
              <li class="flex items-center space-x-3">
                <img src="/resources/tick.svg" class="w-4 h-4" /><span>Maximum vote count for voter : 1</span>
              </li>
            </ul>
          </div>
        </div>

        <!-- poll controls -->
        <div class="w-full md:ps-10 my-10">
          <h3 class="text-xl font-bold self-start mb-4">Controls</h3>
          <div class="">
            <button class="bg-yellow-400 px-4 py-2 mx-2 rounded-md shadow-sm drop-shadow-sm hover:bg-yellow-500 duration-300 ease-in">
              Stop
            </button>
            <button class="bg-red-400 px-4 py-2 mx-2 rounded-md shadow-sm drop-shadow-sm hover:bg-red-500 duration-300 ease-in">
              Delete
            </button>
            <button class="bg-slate-400 px-4 py-2 mx-2 rounded-md shadow-sm drop-shadow-sm hover:bg-slate-500 duration-300 ease-in">
              Edit
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- new campaign area start -->
  <div id="new-campaign-form" class="fixed z-50 scale-0 top-0 left-0 bg-transparent w-screen flex items-center h-screen justify-center px-2 duration-300 ease-in backdrop-blur-md overflow-y-scroll">
    <form class="space-y-6 bg-white p-4 md:w-[38rem] sm:p-6 md:p-8 shadow-lg drop-shadow-lg rounded-md" action="#">
      <div class="flex justify-between">
        <h5 class="text-2xl font-medium text-gray-900">Add new campaign</h5>
        <button id="new-campaign-close" type="button">
          <span class="material-symbols-outlined"> close </span>
        </button>
      </div>

      <!-- form input area -->
      <div class="my-2">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Campaign name <span class="text-red-500">*</span>
        </label>

        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="New Campaign" required />
      </div>

      <!-- start -->
      <div class="my-2">
        <label for="sdate" class="block mb-2 text-sm font-medium text-gray-900">Start Date & Time<span class="text-red-500">*</span>
        </label>
        <div class="flex items-center">
          <input type="datetime-local" name="sdate" id="sdate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
          <p class="ps-3 font-bold">GTM</p>
        </div>
      </div>

      <!-- end -->
      <div class="my-2">
        <label for="edate" class="block mb-2 text-sm font-medium text-gray-900">Start Date & Time<span class="text-red-500">*</span>
        </label>
        <div class="flex items-center">
          <input type="datetime-local" name="edate" id="edate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
          <p class="ps-3 font-bold">GTM</p>
        </div>
      </div>

      <div class="my-2">
        <label for="rules" class="block mb-2 text-sm font-medium text-gray-900">Campaign rules <span class="text-red-500">*</span></label>
        <div id="rules" class="ms-5">
          <ul>
            <li class="flex items-center">
              <label for="vote-count" class="flex items-center"><span class="material-symbols-outlined text-blue-600">
                  arrow_right
                </span>
                Maximum vote count for voter
              </label>
              <input id="vote-count" type="number" min="1" max="10" value="1" class="bg-gray-50 w-20 mx-5 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" />
            </li>
          </ul>
        </div>
      </div>
      <div class="my-2">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password <span class="text-red-500">*</span>
        </label>
        <input type="password" name="password" id="password" placeholder="••••••••" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
      </div>

      <div class="w-full flex justify-center">
        <button type="submit" class="relative group mt-4 w-72 self-center bg-transparent z-[0] text-blue-700 hover:text-white border-blue-700 border-2 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-8 py-2 text-center overflow-hidden">
          Create campaign
          <span class="z-[-1] absolute w-full h-full -left-full top-0 bg-blue-700 group-hover:left-0 duration-200 ease-in"></span>
        </button>
      </div>
    </form>
  </div>
  <!-- new campaign area end -->

  <!-- Footer -->
  <?php include_once "components/footer.php" ?>

  <!-- javascript area -->
  <!-- chart js -->
  <script src="/js/chart_js.js"></script>
  <!--  organization dashboard js-->
  <script src="/js/organization_dashboard.js" type="text/javascript"></script>
</body>

</html>