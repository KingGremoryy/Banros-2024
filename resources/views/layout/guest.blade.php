<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Banros</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
      </head>  

      <nav>
        <!-- koneksi navigasi bar-->
          @include('layout.navbar')
      </nav>

<div class="font-sans text-gray-900 antialiased min-h-screen">
    @yield('content')
</div>
<footer class="text-white py-4" style="background: #17153B">
  <div class="container mx-auto px-4 flex justify-between items-center">
    <div class="flex items-center justify-center"> <!-- Menambahkan flex dan justify-center -->
      <p class="text-center">&copy; 2024 Banros. All rights reserved.</p> <!-- Mengubah class menjadi text-center -->
    </div>
    <div class="flex">
      <a href="#" class="text-blue-600 hover:text-blue-400 mx-2">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          class="w-6 h-6" viewBox="0 0 24 24">
          <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
        </svg>
      </a>
      <a href="#" class="text-blue-300 hover:text-blue-200 mx-2">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          class="w-6 h-6" viewBox="0 0 24 24">
          <path
            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
          </path>
        </svg>
      </a>
      <a href="#" class="text-pink-400 hover:text-pink-300 mx-2">
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          class="w-6 h-6" viewBox="0 0 24 24">
          <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
          <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
        </svg>
      </a>
    </div>
  </div>
</footer>


</div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

