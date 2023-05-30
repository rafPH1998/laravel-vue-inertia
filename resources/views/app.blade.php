<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    @routes
    @vite('resources/js/app.js')
    @inertiaHead
  </head>

  <body class="bg-gray-900">
    <div class="flex justify-center mt-4">
      @inertia
    </div>
  </body>
</html>