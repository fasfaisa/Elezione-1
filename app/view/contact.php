<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Elezione | Easy Voting Solution</title>

  <!-- script for navigation bar control -->
  <script src="/js/header.js"></script>

  <!-- include common data php file-->
  <?php include_once "components/common.php" ?>

</head>

<body>

  <!-- Navigation -->
  <?php include_once "components/header.php" ?>

  <div class="py-10 px-5 flex justify-center">
    <section class="bg-white w-full max-w-screen-lg shadow-2xl drop-shadow-2xl rounded">
      <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900">
          Contact Us
        </h2>
        <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 sm:text-xl">
          Got a technical issue? Want to send feedback about a feature? Need
          details about our Business plan? Let us know.
        </p>
        <form action="#" class="space-y-8">
          <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
            <input type="email" id="email" class="shadow-sm bg-gray-50 border border-emerald-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@flowbite.com" required />
          </div>
          <div>
            <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">Subject</label>
            <input type="text" id="subject" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-emerald-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Let us know how we can help you" required />
          </div>
          <div class="sm:col-span-2">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Your message</label>
            <textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-emerald-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Leave a comment..."></textarea>
          </div>
          <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-blue-700 sm:w-fit hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
            Send message
          </button>
        </form>
      </div>
    </section>
  </div>

  <!-- Footer -->
  <?php include_once "components/footer.php" ?>
</body>

</html>