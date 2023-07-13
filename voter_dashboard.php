<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Elezione | Easy Voting Solution</title>

    <!-- script for navigation bar control -->
    <script src="js/header.js"></script>

    <!-- include common data php file-->
    <?php include_once "components/common.php" ?>

  </head>

  <body class="bg-gray-100">

  <!-- Navigation -->
  <?php include_once "components/header.php" ?>

    <!-- change this area only : start -->
    <div class="pb-10">
      <div class="flex justify-end bg-gray-200 py-3 px-10 items-center">
        <p class="text-xl font-belanosima">Peter Elwin</p>
      </div>
      <div
        class="grid gap-4 grid-cols-1 md:grid-cols-2 place-items-center px-4 py-10"
      >
        <!-- basic settings -->
        <form
          class="space-y-6 p-4 sm:p-6 md:p-8 bg-white border-2 border-blue-500 rounded-md w-full"
          action="#"
        >
          <h5 class="text-xl font-medium text-gray-900">Basic Settings</h5>
          <div>
            <label
              for="name"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Your name <span class="text-red-500">*</span></label
            >
            <input
              type="text"
              name="name"
              id="name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              value="Peter Elwin"
              required
            />
          </div>
          <div>
            <label
              for="email"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Your email <span class="text-red-500">*</span></label
            >
            <input
              type="email"
              name="email"
              id="email"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              value="peterelwin@abc.com"
              required
            />
          </div>
          <div>
            <label
              for="password"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Current password</label
            >
            <input
              type="password"
              name="password"
              id="password"
              placeholder="••••••••"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            />
          </div>
          <div>
            <label
              for="newpassword"
              class="block mb-2 text-sm font-medium text-gray-900"
              >New password
            </label>
            <input
              type="password"
              name="newpassword"
              id="newpassword"
              placeholder="••••••••"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            />
          </div>
          <div>
            <label
              for="conf_password"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Confirm password
            </label>
            <input
              type="password"
              name="conf_password"
              id="conf_password"
              placeholder="••••••••"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            />
          </div>
          <button
            type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
          >
            Save Changes
          </button>
        </form>
        <div class="w-full space-y-4">
          <!-- advanced -->
          <form
            class="space-y-6 p-4 sm:p-6 md:p-8 bg-white border-2 border-yellow-500 rounded-md w-full"
            action="#"
          >
            <h5 class="text-xl font-medium text-gray-900">Change to Organization</h5>
            <div>
              <label
                for="card-type"
                class="block mb-2 text-sm font-medium text-gray-900"
                >Package type <span class="text-red-500">*</span></label
              >
              <select
                id="card-type"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              >
                <option value="silver" selected>Silver</option>
                <option value="gold">Gold</option>
                <option value="platinam">Platinam</option>
              </select>
            </div>

            <div>
              <label
                for="adv-password"
                class="block mb-2 text-sm font-medium text-gray-900"
                >Password</label
              >
              <input
                type="password"
                name="adv-password"
                id="adv-password"
                placeholder="••••••••"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              />
            </div>

            <button
              type="submit"
              class="w-full text-white bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
            >
              Save Changes
            </button>
          </form>

          <!-- danger -->
          <form
            class="space-y-6 p-4 sm:p-6 md:p-8 bg-white border-2 border-red-500 rounded-md w-full"
            action="#"
          >
            <h5 class="text-xl font-medium text-gray-900">Danger Area</h5>

            <button
              value="deactivate"
              type="submit"
              class="w-full text-red-500 hover:text-white border-2 border-red-500 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center duration-300 ease-in"
            >
              Deactivate Account
            </button>

            <button
              value="delete"
              type="submit"
              class="w-full text-red-500 hover:text-white border-2 border-red-500 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center duration-300 ease-in"
            >
              Delete Account
            </button>
          </form>
        </div>
      </div>
    </div>
    <!-- change this area only : end -->

  <!-- Footer -->
  <?php include_once "components/footer.php" ?>
  </body>
</html>
