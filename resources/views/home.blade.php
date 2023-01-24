@extends('app')

@section('styles')
    <link  href="{{asset('css/general.css')}}" rel="stylesheet">
    <style>
        .bg-mynav {
        background-color: #2c3e50;
        }
    </style>
@endsection

@section('content')
    <center style="width: 100%; background-color: #f1f1f1;">
        <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
        &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
        </div>
        <div class="email-container">
            <!-- BEGIN BODY -->
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
            <tr>
            <td valign="middle" class="bg_white" >
            <nav class="navbar navbar-dark bg-mynav">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Treehouse</a>
                </div>
            </nav>
            </td>
            </tr><!-- end tr -->
            <tr>
            <td valign="middle" class="hero bg_white" style="background-image: url(images/bg_01.jpg); background-size: cover; height: 400px;">
                <div class="overlay"></div>
                <table>
                    <tr>
                        <td>
                            <div class="text" style="padding: 0 4em; text-align: center;">
                                <h2>Contractor Nation</h2>
                                <p>Contractor Nation is dedicated to helping home improvement, repair and service contractors grow and thrive.</p>
                                <p><a href="{{ route('newsletter') }}" class="btn btn-primary">Subscribe</a></p>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            </tr><!-- end tr -->
            <tr>
                <td class="bg_white">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                        <td class="bg_white email-section">
                            <div class="heading-section" style="text-align: center; padding: 0 30px;">
                            <h2>Gallery</h2>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                            </div>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                        <td valign="top" width="50%">
                            <table role="presentation" cellspacing="0" cellpadding="4" border="0" width="100%">
                            <tr>
                                <td>
                                <div class="project-entry">
                                    <img src="images/work-1.jpg" alt="" style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;">
                                    <div class="text-project" style="text-align: center;">
                                        <h3><a href="#">Album Name</a></h3>
                                        <span>Fashion</span>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="project-entry">
                                    <img src="images/work-2.jpg" alt="" style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;">
                                    <div class="text-project" style="text-align: center;">
                                        <h3><a href="#">Album Name</a></h3>
                                        <span>Nature</span>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="project-entry">
                                    <img src="images/work-3.jpg" alt="" style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;">
                                    <div class="text-project" style="text-align: center;">
                                        <h3><a href="#">Album Name</a></h3>
                                        <span>Animals</span>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            </table>
                        </td>



                        <td valign="top" width="50%">
                            <table role="presentation" cellspacing="0" cellpadding="4" border="0" width="100%">
                            <tr>
                                <td>
                                <div class="project-entry">
                                    <img src="images/work-5.jpg" alt="" style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;">
                                    <div class="text-project" style="text-align: center;">
                                        <h3><a href="#">Album Name</a></h3>
                                        <span>Photography</span>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="project-entry">
                                    <img src="images/work-6.jpg" alt="" style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;">
                                    <div class="text-project" style="text-align: center;">
                                        <h3><a href="#">Album Name</a></h3>
                                        <span>Fashion</span>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="project-entry">
                                    <img  src="images/work-7.jpg" alt="" style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;">
                                    <div class="text-project" style="text-align: center;">
                                        <h3><a href="#">Album Name</a></h3>
                                        <span>Fashion</span>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            </table>
                        </td>
                        </tr>
                            </table>
                        </td>
                    </tr>

                    </table>

                </td>
                </tr>
        </table>
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
            <tr>
                <td valign="middle" class="bg_light footer email-section">
                    <table>
                    <tr>
                    <td valign="top">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                        <td style="text-align: center;">
                            <p>No longer want to receive these email? You can <a href="#">Unsubscribe here</a></p>
                        </td>
                        </tr>
                        <tr>
                        <td style="text-align: center;">
                            <p>&copy; 2018 Stories. All Rights Reserved</p>
                        </td>
                        </tr>
                    </table>
                    </td>
                </tr>
                </table>
                </td>
            </tr>
        </table>

        </div>
    </center>
@endsection

@section('scripts')

@endsection