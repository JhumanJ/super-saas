@php
  $config = [
      'appName' => config('app.name'),
      'locale' => $locale = app()->getLocale(),
      'locales' => config('app.locales'),
      'links' => config('links')
  ];
@endphp
  <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>{{ config('app.name') }}</title>

  <link href="https://fonts.googleapis.com/css?family=Inter:100,400,600,700,800" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}">
  <link rel="icon" href="/img/logo.svg">

</head>
<body>
<div id="app"></div>

{{-- Global configuration object --}}
<script>
  window.config = @json($config);
</script>

{{-- Load the application scripts --}}
<script src="{{ mix('dist/js/app.js') }}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script defer src="https://www.googletagmanager.com/gtag/js?id=G-LY6L9T0W5T"></script>
<script defer>
  window.dataLayer = window.dataLayer || []

  function gtag () {dataLayer.push(arguments)}

  gtag('js', new Date())

  gtag('config', 'G-LY6L9T0W5T')
</script>
</body>
</html>
