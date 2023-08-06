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

  <!-- change this area only : start -->

  <div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl lg:mx-0">
        <p class="mt-2 text-lg leading-8 text-blue-600">
          <b>Frequently asked questions</b>
        </p>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
          Everything you need to know
        </h2>
      </div>
      <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        <article class="flex max-w-xl flex-col items-start justify-between">
          <div class="flex items-center gap-x-4 text-xs">
            <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">General</a>
          </div>
          <div class="group relative">
            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
              <span class="absolute inset-0"></span>
              How does the online voting system work?
            </h3>
            <p class="mt-5 line-clamp-5 text-sm leading-6 text-gray-600">
              The online voting system allows registered voters to cast their
              votes electronically through a secure web-based platform. Users
              can log in, view the available ballots, make their selections,
              and submit their votes. The system ensures the confidentiality
              and integrity of the voting process.
            </p>
          </div>
        </article>

        <article class="flex max-w-xl flex-col items-start justify-between">
          <div class="flex items-center gap-x-4 text-xs"></div>
          <div class="group relative">
            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
              <span class="absolute inset-0"></span>
              Is the online voting system secure?
            </h3>
            <p class="mt-5 line-clamp-5 text-sm leading-6 text-gray-600">
              Yes, we prioritize the security of the system. We implement
              multi-factor authentication, and other security measures to
              protect the integrity and confidentiality of each vote. Our
              system undergoes regular security audits and is designed to
              withstand potential threats.
            </p>
          </div>
        </article>

        <article class="flex max-w-xl flex-col items-start justify-between">
          <div class="flex items-center gap-x-4 text-xs"></div>
          <div class="group relative">
            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
              <span class="absolute inset-0"></span>
              Can I vote using my mobile device?
            </h3>
            <p class="mt-5 line-clamp-5 text-sm leading-6 text-gray-600">
              Yes, our online voting system is mobile-friendly. You can access
              the platform using your smartphone or tablet through a web
              browser.<br />
              Please ensure you have a stable internet connection for a smooth
              voting experience.
            </p>
          </div>
        </article>
      </div>
    </div>

    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        <article class="flex max-w-xl flex-col items-start justify-between">
          <div class="flex items-center gap-x-4 text-xs">
            <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Registration and Eligibility</a>
          </div>
          <div class="group relative">
            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
              <span class="absolute inset-0"></span>
              How do I register to vote online?
            </h3>
            <p class="mt-5 line-clamp-5 text-sm leading-6 text-gray-600">
              To register for online voting, you need to visit our
              registration page and provide the required information, such as
              your name, address, and identification details. Once your
              registration is verified, you will receive login credentials to
              access the voting system.
            </p>
          </div>
        </article>

        <article class="flex max-w-xl flex-col items-start justify-between">
          <div class="flex items-center gap-x-4 text-xs"></div>
          <div class="group relative">
            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
              <span class="absolute inset-0"></span>
              Who is eligible to vote using this system?
            </h3>
            <p class="mt-5 line-clamp-5 text-sm leading-6 text-gray-600">
              The eligibility criteria may vary depending on the jurisdiction
              and the election being conducted. Generally, eligible voters
              must meet age and citizenship requirements as defined by the
              relevant electoral authority. Please refer to the specific
              guidelines provided for each election.
            </p>
          </div>
        </article>

        <article class="flex max-w-xl flex-col items-start justify-between">
          <div class="flex items-center gap-x-4 text-xs"></div>
          <div class="group relative">
            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
              <span class="absolute inset-0"></span>
              Can I change my vote after submission?
            </h3>
            <p class="mt-5 line-clamp-5 text-sm leading-6 text-gray-600">
              No,<br />
              once you have submitted your vote, it is considered final and
              cannot be altered. We encourage voters to review their
              selections carefully before submitting their ballots to ensure
              accuracy.
            </p>
          </div>
        </article>
      </div>
    </div>
  </div>

  <!-- change this area only : end -->

  <!-- Footer -->
  <?php include_once "components/footer.php" ?>
</body>

</html>