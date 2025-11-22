<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi:wght@400..700&display=swap" rel="stylesheet">

  <title>@yield('title', 'رابطة المهندسين')</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

  @include('layouts.header')

  <main class="flex-grow container mx-auto px-4 py-8">
    @yield('content')
  </main>

  @include('layouts.footer')


  <script>
    // Animate cards to move upward while scrolling
    document.addEventListener("DOMContentLoaded", () => {
      const cards = document.querySelectorAll(".mh-card");

      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.remove("opacity-0", "translate-y-10");
            entry.target.classList.add("opacity-100", "translate-y-0");
            observer.unobserve(entry.target); // animate only once
          }
        });
      }, {
        threshold: 0.2
      });

      cards.forEach(card => observer.observe(card));
    });
  </script>
</body>

</html>