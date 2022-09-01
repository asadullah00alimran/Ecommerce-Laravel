
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Meta -->
        <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
        <meta name="author" content="ThemePixels">

        <title>Register</title>

        <!-- vendor css -->
        <link href="{{ asset('backend') }}/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('backend') }}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

        <!-- Bracket CSS -->
        <link rel="stylesheet" href="{{ asset('backend') }}/css/bracket.css">
    </head>

    <body>
        <div class="d-flex align-items-center justify-content-center ht-100v">
            <video id="headVideo" class="pos-absolute a-0 wd-100p ht-100p object-fit-cover" autoplay muted loop>
                <source src="{{ asset('backend') }}/videos/video1.mp4" type="video/mp4">
                <source src="{{ asset('backend') }}/videos/video1.ogv" type="video/ogg">
                <source src="{{ asset('backend') }}/videos/video1.webm" type="video/webm">
            </video><!-- /video -->
            <div class="overlay-body bg-black-5 d-flex align-items-center justify-content-center">
                <div class="login-wrapper wd-300 wd-xs-400 pd-20 pd-xs-40 rounded bg-black-7">
                    <div class="signin-logo tx-center tx-28 tx-bold tx-white"><span class="tx-normal"><img src="{{asset('frontend/images/logo.svg')}}" alt=""></span></div>
                    <div class="tx-white tx-center mg-b-30">Admin Login</div>
                    
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-3" :errors="$errors" />

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control fc-outline-dark" placeholder="Enter your Name":value="old('name')" required>
                        </div><!-- form-group -->
                        <!-- Role -->
                        <div class="mt-3 form-group">
                            <select name="role" id="role" class="form-control fc-outline-dark" :value="old('role')" required>
                                <option value=""style="background: black; color: white;" >-----Select Role-----</option>
                                <option value="admin" style="background: black; color: white;">Admin</option>
                                <option value="vendor"style="background: black; color: white;">Vendor</option>
                                <option value="user"style="background: black; color: white;">User</option>
                            </select>
                            <!-- <x-input id="email" type="email" name="email" :value="old('email')" required /> -->
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control fc-outline-dark" placeholder="Enter Phone Number":value="old('phone')" required>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <input type="email" name="email" class="form-control fc-outline-dark" placeholder="Enter Email":value="old('email')" required>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <input type="password" name="password" class="form-control fc-outline-dark" placeholder="Enter your password">
                        </div><!-- form-group -->

                        
                        <!-- Confirm Password -->
                        <div class="mt-3">
                            <x-input id="password_confirmation" class="form-control fc-outline-dark" type="password"
                                name="password_confirmation" placeholder="Confirm password" required />
                        </div>
                        
                        <!-- Picture -->
                        <div class="mt-3">
                            <x-label for="picture" :value="__('Profile Photo')" />
                            <x-input id="picture" class="form-control fc-outline-dark" type="file" name="picture"
                                :value="old('picture')" />
                        </div>
                        <button type="submit" class="my-3 btn btn-info btn-block">Sign Up</button>
                    </form>
                    <div class="mg-t-30 tx-center">Already a member? <a href="{{route('login')}}" class="tx-info">Sign In</a></div>
                </div><!-- login-wrapper -->
            </div><!-- overlay-body -->
        </div><!-- d-flex -->

        <script src="{{ asset('backend') }}/lib/jquery/jquery.min.js"></script>
        <script src="{{ asset('backend') }}/lib/jquery-ui/ui/widgets/datepicker.js"></script>
        <script src="{{ asset('backend') }}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script>
            $(function(){
                'use strict';

                // Check if video can play, and play it
                var video = document.getElementById('headVideo');
                video.addEventListener('canplay', function() {
                    video.play();
                });

            });
        </script>

    </body>
</html>
