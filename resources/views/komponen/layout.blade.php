<!DOCTYPE html>
<html lang="en" dir="ltr" class="h-full bg-gray-100">
  <head>
    <meta charset="utf-8">
    <title>The Bee Movie</title>
    
    <!-- ? ==================== FAVICON ==================== ? -->

    <link rel="shortcut icon" href="./images/favicon.svg" type="image/x-icon">

    <!-- ? ==================== CUSTOM CSS ==================== ? -->

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- ? ==================== GOOGLE FONTS ==================== ? -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap"
    rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="h-full">
    <!--
      This example requires updating your template:

      ```
      <html class="h-full bg-gray-100">
      <body class="h-full">
      ```
    -->
    <div class="min-h-full">
      <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
              </div>
              <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                  <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                  <x-nav-link href="/" :active="request()->is('/')">Beranda</x-nav-link>
                  <x-nav-link href="/booking" :active="request()->is('booking')">Booking</x-nav-link>
                  <x-nav-link href="/riwayat" :active="request()->is('riwayat')">Riwayat</x-nav-link>
                </div>
              </div>
            </div>
            <div class="hidden md:block">
              <div class="ml-4 flex items-center md:ml-6">
                @guest
                  <x-nav-link href="/login" :active="request()->is('login')">Log In</x-nav-link>
                  <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                @endguest

                @auth
                  <x-nav-link href="/editProf" :active="request()->is('register')">Edit Profile</x-nav-link>
                  <form method="POST" action="/logout">
                    @csrf

                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Log out</button>
                  </form>
                @endauth
              </div>
            </div>
          </div>
        </div>
      </nav>

      <header class="bg-white shadow">
       <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
         <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{$heading}}</h1>
       </div>
      </header>

      <main>
        {{$slot}}
      </main>
    </div>

    <!-- ? ============== FOOTER ============== ? -->

    <footer class="footer">
      <div class="container">
        <div class="footer-top">
          <div class="footer-brand">
            <a href="#" class="logo">
              <img src="./images/logo1.png" alt="Alpha97 Logo">
            </a>

            <p class="footer-text">
              Search for cheap rental cars in New York. With a diverse fleet of 19,000 vehicles, Waydex offers its consumers an
              attractive and fun selection.
            </p>
          </div>

          <ul class="footer-list">
            <li>
              <p class="footer-list-title">Company</p>
            </li>

            <li>
              <a href="#" class="footer-link">About us</a>
            </li>

            <li>
              <a href="#" class="footer-link">Pricing plans</a>
            </li>

            <li>
              <a href="#" class="footer-link">Our blog</a>
            </li>

            <li>
              <a href="#" class="footer-link">Contacts</a>
            </li>

          </ul>

          <ul class="footer-list">
            <li>
              <p class="footer-list-title">Support</p>
            </li>

            <li>
              <a href="#" class="footer-link">Help center</a>
            </li>

            <li>
              <a href="#" class="footer-link">Ask a question</a>
            </li>

            <li>
              <a href="#" class="footer-link">Privacy policy</a>
            </li>

            <li>
              <a href="#" class="footer-link">Terms & conditions</a>
            </li>

          </ul>

          <ul class="footer-list">
            <li>
              <p class="footer-list-title">Neighborhoods in New York</p>
            </li>

            <li>
              <a href="#" class="footer-link">Manhattan</a>
            </li>

            <li>
              <a href="#" class="footer-link">Central New York City</a>
            </li>

            <li>
              <a href="#" class="footer-link">Upper East Side</a>
            </li>

            <li>
              <a href="#" class="footer-link">Queens</a>
            </li>

            <li>
              <a href="#" class="footer-link">Theater District</a>
            </li>

            <li>
              <a href="#" class="footer-link">Midtown</a>
            </li>

            <li>
              <a href="#" class="footer-link">SoHo</a>
            </li>

            <li>
              <a href="#" class="footer-link">Chelsea</a>
            </li>

          </ul>

        </div>

        <div class="footer-bottom">

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-skype"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="mail-outline"></ion-icon>
              </a>
            </li>

          </ul>

          <p class="copyright">
            &copy; 2023 <a href="https://www.linkedin.com/in/usamaweb/">Muhammad Usama</a>
            <a href="https://github.com/usamaweb">Alpha97</a>. All Rights Reserved
          </p>

        </div>
      </div>
    </footer>
  </body>
</html>
