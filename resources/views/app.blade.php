<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
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