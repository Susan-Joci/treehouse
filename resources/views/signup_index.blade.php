@extends('app')

@section('styles')
    <link  href="{{asset('css/signup.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container right-panel-active" id="container">
        <div class="form-container sign-up-container">
            <form id="form" action="#">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" required id="name" placeholder="Name" />
                <input type="email" required id="email" placeholder="Email" />
                <!-- <input type="password" placeholder="Password" /> -->
                <button id="signupbtn">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <a href="#">Forgot your password?</a>
                <button disabled>Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    
@endsection

@section('scripts')
        <script>
            const signUpButton = document.getElementById('signupbtn');
            const signInButton = document.getElementById('signIn');
            const container = document.getElementById('container');

            signUpButton.addEventListener('click', (e) => {
                // container.classList.add("right-panel-active");
                // $('#signupbtn').on('submit', function(e) {
                    console.log("this");
                    e.preventDefault(); 
                    var name = $('#name').val();
                    var email = $('#email').val();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        url: '/newsletter/signup',
                        data: {name:name, email:email},
                        success: function( msg ) {
                            // alert( msg );
                        }
                    });
                // });

            });

            // signInButton.addEventListener('click', () => {
            //     container.classList.remove("right-panel-active");
            // });

        </script>
@endsection