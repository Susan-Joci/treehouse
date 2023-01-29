@extends('app')

@section('styles')
    <link  href="{{asset('css/signup.css')}}" rel="stylesheet">
    <style>
        .error_field{
            background-color: #fce4e4;
            border: 1px solid #cc0033;
            outline: none;
        }
        .error_label {
            color: #cc0033;
            text-align: left!important;
            font-size: 86%;
            font-style: italic;
            width:100%;
        }   
    </style>
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
                <div id="alert_name"></div>
                <input type="email" required id="email" placeholder="Email" />
                <div id="alert_email"></div>
                <p>
                    <button id="signupbtn">Sign Up</button>
                    <button id="back">Back</button>
                </p>
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
            const back = document.getElementById('back');
            const signInButton = document.getElementById('signIn');
            const container = document.getElementById('container');

            back.addEventListener('click', (e) => {
                e.preventDefault();
                window.location='/';
            });

            signUpButton.addEventListener('click', (e) => {
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
                            location.reload(); 
                        },
                        error: function(xhr) { // if error occured
                            console.log(xhr.responseJSON);
                            $.each( xhr.responseJSON.errors, function( key, value ) {
                                console.log(value);
                                $("#alert_"+key).addClass('error_label').html(value);
                                $("#"+key).addClass('error_field');
                            });
                            if(!('name' in xhr.responseJSON.errors)) {
                                $("#alert_name").removeClass('error_label').html('');
                                $("#name").removeClass('error_field');
                            }
                            if(!('email' in xhr.responseJSON.errors)) {
                                $("#alert_email").removeClass('error_label').html('');
                                $("#email").removeClass('error_field');
                            }
                        },
                    });

            });

            signInButton.addEventListener('click', () => {
                window.location='/newsletter/users';
            });

        </script>
@endsection