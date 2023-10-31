<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Layout com Eventus e Menu</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>

<body>
  <header>
    <div class="p-4 flex justify-between items-center">
      <div class="flex flex-row">
        <a href="#" class="text-2xl font-bold text-gray-800 flex flex-row">
          <svg width="35" height="32" viewBox="0 0 35 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.258 26.865C15.2724 27.4021 15.1797 27.9367 14.9851 28.4376C14.7906 28.9384 14.4982 29.3955 14.125 29.782C13.7521 30.1668 13.3057 30.4728 12.8124 30.682C12.3191 30.8913 11.7888 30.9994 11.253 31C10.717 31.0002 10.1865 30.8924 9.69308 30.6832C9.19966 30.4739 8.75342 30.1674 8.38099 29.782C8.00708 29.396 7.71422 28.939 7.51964 28.438C7.32505 27.9371 7.23269 27.4022 7.24799 26.865C7.25699 26.167 7.44799 25.483 7.80499 24.884C8.16099 24.284 8.66799 23.79 9.27499 23.451C9.25099 23.56 9.36499 23.396 9.27499 23.451L11.135 21.799C12.6094 20.2298 13.4329 18.1592 13.439 16.006C13.439 13.08 11.728 10.105 9.26899 8.549C9.23299 8.455 9.36299 8.604 9.26899 8.549C8.66168 8.20902 8.15493 7.71469 7.79999 7.116C7.44382 6.5163 7.25172 5.83344 7.24299 5.136C7.22834 4.59872 7.321 4.06391 7.51555 3.56287C7.71009 3.06183 8.00261 2.60462 8.37599 2.218C8.74879 1.83334 9.19496 1.52735 9.68809 1.31815C10.1812 1.10894 10.7113 1.00076 11.247 1C11.783 0.999714 12.3135 1.10742 12.807 1.31668C13.3004 1.52595 13.7466 1.83249 14.119 2.218C14.493 2.60395 14.786 3.06089 14.9806 3.56188C15.1752 4.06288 15.2675 4.59777 15.252 5.135C15.2624 7.30708 16.1019 9.3932 17.599 10.967L18.416 11.767C18.742 12.052 19.084 12.318 19.44 12.565C20.061 12.895 20.582 13.391 20.944 13.996C21.215 14.4489 21.3913 14.9521 21.4622 15.4751C21.5331 15.9982 21.4972 16.5301 21.3566 17.0389C21.216 17.5476 20.9736 18.0225 20.6442 18.4349C20.3148 18.8473 19.9051 19.1885 19.44 19.438C19.377 19.474 19.473 19.371 19.44 19.438C18.1838 20.2321 17.1447 21.3258 16.416 22.621C15.6855 23.9184 15.2876 25.3764 15.258 26.865ZM19.741 5.123C19.741 5.919 19.976 6.698 20.417 7.36C20.8564 8.02107 21.4822 8.53685 22.215 8.842C22.9471 9.14685 23.7534 9.22661 24.5311 9.07112C25.3087 8.91563 26.0224 8.53193 26.581 7.969C27.1413 7.40452 27.5226 6.68728 27.6772 5.9071C27.8318 5.12692 27.7527 4.31848 27.45 3.583C27.1473 2.84836 26.6337 2.2199 25.974 1.777C25.2039 1.26028 24.2779 1.02768 23.355 1.11909C22.4321 1.2105 21.5698 1.62024 20.916 2.278C20.1641 3.034 19.7417 4.05673 19.741 5.123ZM23.748 22.84C22.956 22.84 22.181 23.076 21.522 23.518C20.8624 23.9609 20.3487 24.5894 20.046 25.324C19.743 26.0596 19.6639 26.8683 19.8185 27.6486C19.9731 28.429 20.3545 29.1464 20.915 29.711C21.4736 30.2739 22.1872 30.6576 22.9649 30.8131C23.7425 30.9686 24.5489 30.8888 25.281 30.584C26.0144 30.2785 26.6406 29.762 27.08 29.1C27.5947 28.3249 27.8261 27.3959 27.735 26.47C27.6439 25.544 27.2359 24.6779 26.58 24.018C26.2088 23.6446 25.7676 23.3482 25.2816 23.1457C24.7956 22.9432 24.2745 22.8386 23.748 22.838V22.84ZM34 15.994C34 15.198 33.765 14.42 33.325 13.758C32.8857 13.0966 32.2599 12.5804 31.527 12.275C30.7948 11.9699 29.9882 11.8901 29.2104 12.0456C28.4325 12.2011 27.7187 12.5849 27.16 13.148C26.5995 13.7126 26.2181 14.43 26.0635 15.2104C25.9089 15.9907 25.988 16.7994 26.291 17.535C26.5937 18.2696 27.1073 18.8981 27.767 19.341C28.4252 19.783 29.2001 20.019 29.993 20.019C30.5194 20.0182 31.0406 19.9136 31.5265 19.7111C32.0125 19.5086 32.4537 19.2122 32.825 18.839C33.577 18.0826 33.9994 17.0596 34 15.993V15.994Z" fill="#6366F1" />
            <path d="M5.00699 11.969C4.21399 11.969 3.43999 12.205 2.78099 12.647C2.12121 13.0902 1.60759 13.719 1.30499 14.454C1.00226 15.1895 0.923231 15.9979 1.07781 16.7781C1.23239 17.5583 1.6137 18.2755 2.17399 18.84C2.73339 19.4017 3.44702 19.7845 4.22434 19.9399C5.00166 20.0953 5.80763 20.0164 6.53999 19.713C7.2729 19.4075 7.89866 18.8914 8.338 18.23C8.85242 17.4552 9.08361 16.5265 8.99251 15.601C8.90141 14.6754 8.49361 13.8097 7.83799 13.15C7.4669 12.7767 7.02585 12.4803 6.54007 12.2776C6.0543 12.075 5.53334 11.9701 5.00699 11.969Z" fill="#6366F1" />
          </svg>
          <p class="ml-2">Eventus</p>
        </a>
      </div>
      <ul class="flex space-x-6 text-lg">
        <li>
          <a href="/events" class="text-gray-800 hover:text-indigo-600">Eventos</a>
        </li>
        <li>
          <a href="/myEvents" class="text-gray-800 hover:text-indigo-600">Meus Eventos</a>
        </li>

        <?php
        if (isset($_SESSION['user']['isAdmin']) && $_SESSION['user']['isAdmin']) : ?>
          <li>
            <a href="/newEvent" class="text-gray-800 hover:text-indigo-600">Cadastrar Eventos</a>
          </li>
        <?php endif; ?>

        <li>
          <?php if (isset($_SESSION['user'])) : ?>
            <a href="/logout" class="text-gray-800 hover:text-indigo-600">Sair</a>
          <?php else : ?>
            <a href="/login" class="text-gray-800 hover:text-indigo-600">Login</a>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </header>
</body>

</html>