<!DOCTYPE html>
<html lang="{{$lang}}" dir="{{$lang == 'ar'? 'rtl':'ltr'}}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi:wght@400..700&display=swap" rel="stylesheet">

  <title>{{__('strings.login_title')}}</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <form method="POST" action="{{ route('login') }}" class="bg-white p-8 rounded-lg shadow-md w-96">
    @csrf
    <img src="{{ asset('images/logos/logo.png') }}" alt="">
    <h2 class="page-header font-bold text-center mb-6">{{__('strings.system_admininstration')}}</h2>

    <div class="mb-4">
      <label class="block text-gray-700 mb-2">{{__('strings.email')}}</label>
      <input type="email" name="email" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-teal-500 focus:border-teal-500">
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 mb-2">{{__('strings.password')}}</label>
      <input type="password" name="password" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-teal-500 focus:border-teal-500">
    </div>

    @error('error')
      <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
    @enderror

    <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white py-2 rounded-lg font-medium hover:cursor-pointer">{{__('strings.login_button')}}</button>
  </form>

</body>
</html>
