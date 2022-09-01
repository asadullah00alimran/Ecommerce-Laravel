
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <!-- Includes in resource/view/backend/includes/head.blade.php -->
    @include('backend/includes/head')

    <!-- Includes in resource/view/backend/includes/css.blade.php -->
    @include('backend/includes/css')

  </head>

  <body>

    <!-- Includes in resource/view/backend/includes/leftbar.blade.php -->
    @include('backend/includes/leftbar')

    <!-- Includes in resource/view/backend/includes/topbar.blade.php -->
    @include('backend/includes/topbar')

    <!-- Includes in resource/view/backend/includes/rightbar.blade.php -->
    @include('backend/includes/rightbar')

    @yield('content')

    <!-- Includes in resource/view/backend/includes/script.blade.php -->
    @include('backend/includes/script')

  </body>
</html>
