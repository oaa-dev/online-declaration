
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Online Health Declaration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="{{ asset('author/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('author/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('author/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('author/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('author/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('author/css/style.css') }}">
    @laravelPWA
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">O<span>.</span>H<span>.</span>D<span>.</span></a>
            <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
                data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav nav ml-auto">

                    <li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
                    <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
                    <li class="nav-item"><a href="#chapter-section" class="nav-link"><span>COVID 19</span></a></li>
                    <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>

                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link"><span>Dashboard <i class="fa fa-arrow-right"></span></i></a></li>
                    @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link"><span>Login</span></a></li>

                    @if (Route::has('register'))
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link"><span>Register</span></a>
                    </li>
                    @endif
                    @endauth

                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-wrap js-fullheight">
        <div class="overlay"></div>
        <div class="container-fluid px-0">
            <div class="row d-md-flex no-gutters slider-text align-items-center js-fullheight justify-content-end">
                <img class="one-third js-fullheight align-self-end order-md-last img-fluid"
                    src="{{ asset('author/images/2760147.svg')}}" alt="">
                <div class="one-forth d-flex align-items-center ftco-animate js-fullheight">
                    <div class="text mt-5">
                        <span class="subheading">Company</span>
                        <h1>Online Health Declaration</h1>
                        <p>Be sure that the information you give is accurate and complete. All the information submitted shall be encrypted, and strictly used only in compliance to Philippine law, guidelines, and ordinances, in relation to business operation in light of COVID-19 response.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary py-3 px-4">Sign in</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="ftco-section ftco-no-pb ftco-partner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg ftco-animate">
                    <a href="#" class="partner d-flex justify-content-center"><img
                            src="{{ asset('author/images/partner-1.png')}}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-md-12 col-lg ftco-animate">
                    <a href="#" class="partner d-flex justify-content-center"><img
                            src="{{ asset('author/images/partner-2.png')}}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-md-12 col-lg ftco-animate">
                    <a href="#" class="partner d-flex justify-content-center"><img
                            src="{{ asset('author/images/partner-3.png')}}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-md-12 col-lg ftco-animate">
                    <a href="#" class="partner d-flex justify-content-center"><img
                            src="{{ asset('author/images/partner-4.png')}}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-md-12 col-lg ftco-animate">
                    <a href="#" class="partner d-flex justify-content-center"><img
                            src="{{ asset('author/images/partner-5.png')}}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="ftco-about img ftco-section" id="about-section">
        <div class="container">
            <div class="row d-flex no-gutters">
                <div class="col-md-6 col-lg-6 d-flex">
                    <div class="img-about img d-flex align-items-stretch">
                        <div class="overlay"></div>
                        <div class="img d-flex align-self-stretch align-items-center"
                            style="background-image:url({{ asset('author/images/bg_1.jpg')}});">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 pl-md-5">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-12 heading-section ftco-animate">
                            <h2 class="mb-4">About The Company</h2>
                            <div class="text-about">
                                <h4>Mission</h4>
                                <p id="mission">Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right
                                    at the coast of the Semantics, a large language ocean.</p>
                                <h4>Vision</h4>
                                <p id="vision">Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                                    language ocean.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter">
        <div class="container">
            <div class="row justify-content-center py-5 mt-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Philippines Epidemiology</h2>
                </div>
            </div>
            <div class="row d-md-flex align-items-center align-items-stretch">
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 bg-light">
                        <div class="text">
                            <strong class="number" id="cases">0</strong>
                            <span>Total Cases</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 bg-light">
                        <div class="text">
                            <strong class="number" id="death">0</strong>
                            <span>Deceased Cases</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 bg-light">
                        <div class="text">
                            <strong class="number" id="recovered">0</strong>
                            <span>Cases</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 bg-light">
                        <div class="text">
                            <strong class="number" id="active">0</strong>
                            <span>Recovered Cases</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb ftco-no-pt" id="chapter-section">
        <div class="container">
            <div class="row justify-content-center py-5 mt-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">COVID 19 Disease Control and Prevention</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <nav id="navi">
                        <ul>
                            <li><a href="#page-1">Symptoms</a></li>
                            <li><a href="#page-2">How to Protect Yourself</a></li>
                            <li><a href="#page-3">Emergency medical attention</a></li>
                            <li><a href="#page-4">What to Do If You Are Sick</a></li>
                            <li><a href="#page-5">Peolple at increased Risk</a></li>
                            <li><a href="#page-6">How COVID-19 Spreads</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-9">
                    <div id="page-1" class="page bg-light one">
                        <h2 class="heading">Watch for symptoms</h2>
                        <p>People with COVID-19 have had a wide range of symptoms reported – ranging from mild symptoms
                            to severe illness. Symptoms may appear 2-14 days after exposure to the virus. People with
                            these symptoms may have COVID-19:</p>
                        <ul>
                            <li>Fever or chills</li>
                            <li>Cough</li>
                            <li>Shortness of breath or difficulty breathing</li>
                            <li>Fatigue</li>
                            <li>Muscle or body aches</li>
                            <li>Headache</li>
                            <li>New loss of taste or smell</li>
                            <li>Sore throat</li>
                            <li>Congestion or runny nose</li>
                            <li>Nausea or vomiting</li>
                            <li>Diarrhea</li>
                        </ul>
                        <p>This list does not include all possible symptoms. <a href="https://www.cdc.gov/">CDC</a> will
                            continue to update this list as we learn more about COVID-19.</p>
                    </div>
                    <div id="page-2" class="page bg-light two">
                        <h2 class="heading">How to Protect Yourself & Others</h2>
                        <p>Older adults and people who have certain underlying conditions like heart or lung disease or diabetes are at increased risk of severe illness from COVID-19 illness.</p>
						<h3>Everyone Should</h3>
						<ul>
                            <li>Wash your hands often</li>
                            <li>Avoid close contact</li>
                            <li>Cover your mouth and nose with a mask when around others</li>
                            <li>Cover coughs and sneezes</li>
                            <li>Clean and disinfect</li>
                            <li>Monitor Your Health Daily</li>
                        </ul>
                    </div>
                    <div id="page-3" class="page bg-light three">
                        <h2 class="heading">When to seek emergency medical attention</h2>
						<p>Look for emergency warning signs* for COVID-19. If someone is showing any of these signs,
                            seek emergency medical care immediately:</p>
                        <ul>
                            <li>Trouble breathing</li>
                            <li>Persistent pain or pressure in the chest</li>
                            <li>Shortness of breath or difficulty breathing</li>
                            <li>New confusion</li>
                            <li>Inability to wake or stay awake</li>
                            <li>Bluish lips or face</li>
                        </ul>
                        <p>*This list is not all possible symptoms. Please call your medical provider for any other
                            symptoms that are severe or concerning to you.</p>
                        <p>Call 911 or call ahead to your local emergency facility: Notify the operator that you are
                            seeking care for someone who has or may have COVID-19.</p>
                    </div>
                    <div id="page-4" class="page bg-light four">
                        <h2 class="heading">What to Do If You Are Sick</h2>
                        <p>Steps to help prevent the spread of COVID-19 if you are sick</p>
						<ul>
                            <li>Stay home except to get medical care</li>
                            <li>Separate yourself from other people</li>
                            <li>Monitor your symptoms</li>
                            <li>Call ahead before visiting your doctor</li>
                            <li>If you are sick, wear a mask over your nose and mouth</li>
                            <li>Cover your coughs and sneezes</li>
                            <li>Clean your hands often</li>
                            <li>Avoid sharing personal household items</li>
                            <li>Clean all “high-touch” surfaces everyday</li>
                        </ul>
                    </div>
                    <div id="page-5" class="page bg-light five">
                        <h2 class="heading">People with Certain Medical Conditions</h2>
                        <p>Adults of any age with certain underlying medical conditions are at increased risk for severe illness from the virus that causes COVID-19:</p>
						<p>Adults of any age with the following conditions are at increased risk of severe illness from the virus that causes COVID-19:</p>
						
						<ul>
                            <li>Cancer</li>
                            <li>Chronic kidney disease</li>
                            <li>COPD (chronic obstructive pulmonary disease)</li>
                            <li>Heart conditions, such as heart failure, coronary artery disease, or cardiomyopathies</li>
                            <li>Immunocompromised state (weakened immune system) from solid organ transplant</li>
                            <li>Obesity (body mass index [BMI] of 30 kg/m2 or higher but < 40 kg/m2)</li>
                            <li>Severe Obesity (BMI ≥ 40 kg/m2)</li>
                            <li>Sickle cell disease</li>
                            <li>Smoking</li>
                            <li>Type 2 diabetes mellitus</li>
                        </ul>
					
					</div>
                    <div id="page-6" class="page bg-light six">
                        <h2 class="heading">How COVID-19 Spreads</h2>
                        <p>COVID-19 is thought to spread mainly through close contact from person to person, including between people who are physically near each other (within about 6 feet). People who are infected but do not show symptoms can also spread the virus to others. We are still learning about how the virus spreads and the severity of illness it causes.</p>
						
					</div>
					<div id="page-6" class="page bg-light six">
                        <h2 class="heading">COVID-19 spreads very easily from person to person</h2>
                        <p>How easily a virus spreads from person to person can vary. The virus that causes COVID-19 appears to spread more efficiently than influenza but not as efficiently as measles, which is among the most contagious viruses known to affect people.</p>
					</div>
					
					<div id="page-6" class="page bg-light six">
                        <h2 class="heading">COVID-19 most commonly spreads during close contact</h2>
                        
						<ul>
                            <li>People who are physically near (within 6 feet) a person with COVID-19 or have direct contact with that person are at greatest risk of infection.</li>
                            <li>When people with COVID-19 cough, sneeze, sing, talk, or breathe they produce respiratory droplets. These droplets can range in size from larger droplets (some of which are visible) to smaller droplets. Small droplets can also form particles when they dry very quickly in the airstream.</li>
                            <li>Infections occur mainly through exposure to respiratory droplets when a person is in close contact with someone who has COVID-19.</li>
                            <li>Respiratory droplets cause infection when they are inhaled or deposited on mucous membranes, such as those that line the inside of the nose and mouth.</li>
                            <li>As the respiratory droplets travel further from the person with COVID-19, the concentration of these droplets decreases. Larger droplets fall out of the air due to gravity. Smaller droplets and particles spread apart in the air.</li>
                            <li>With passing time, the amount of infectious virus in respiratory droplets also decreases.</li>
                        </ul>
					</div>
					
					<div id="page-6" class="page bg-light six">
                        <h2 class="heading">COVID-19 can sometimes be spread by airborne transmission</h2>
                        
						<ul>
                            <li>Some infections can be spread by exposure to virus in small droplets and particles that can linger in the air for minutes to hours. These viruses may be able to infect people who are further than 6 feet away from the person who is infected or after that person has left the space.</li>
                            <li>This kind of spread is referred to as airborne transmission and is an important way that infections like tuberculosis, measles, and chicken pox are spread.</li>
                            <li>There is evidence that under certain conditions, people with COVID-19 seem to have infected others who were more than 6 feet away. These transmissions occurred within enclosed spaces that had inadequate ventilation. Sometimes the infected person was breathing heavily, for example while singing or exercising.</li>
                            <li>Available data indicate that it is much more common for the virus that causes COVID-19 to spread through close contact with a person who has COVID-19 than through airborne transmission.</li>
                        </ul>
					</div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt">
        <div class="container">
            <div class="row justify-content-center py-5 mt-5">
                <div class="col-md-5 heading-section text-center ftco-animate">
                    <span class="subheading">New campaign to prevent spread of coronavirus indoors</span>
                    <h2 class="mb-4">Campaign </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <div class="services-1 bg-light">
                        <span class="icon">
                            {{-- <i class="fa"></i> --}}
                        </span>
                        <div class="desc">
                            <h3 class="mb-5">Wash Hands</h3>
                            <p>While coronavirus is not likely to survive for long periods of time on outdoor surfaces in sunlight, it can live for more than 24 hours in indoor environments. Washing your hands with soap and water for at least 20 seconds, or using hand sanitizer, regularly throughout the day will reduce the risk of catching or passing on the virus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <div class="services-1 bg-light">
                        <span class="icon">
                            {{-- <i class="flaticon-network"></i> --}}
                        </span>
                        <div class="desc">
                            <h3 class="mb-5">Cover Face</h3>
                            <p>Coronavirus is carried in the air by tiny respiratory droplets that carry the virus. Larger droplets can land on other people or on surfaces they touch while smaller droplets, called aerosols, can stay in the air indoors for at least 5 minutes, and often much longer if there is no ventilation. Face coverings reduce the dispersion of these droplets, meaning if you’re carrying the virus you’re less likely to spread it when you exhale</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <div class="services-1 bg-light">
                        <span class="icon">
                            {{-- <i class="flaticon-network"></i> --}}
                        </span>
                        <div class="desc">
                            <h3 class="mb-5">Make Space</h3>
                            <p>Transmission of the virus is most likely to happen within 2 metres, with risk increasing exponentially at shorter distances. While keeping this exact distance isn’t always possible, remaining mindful of surroundings and continuing to make space has a powerful impact when it comes to containing the spread.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Contact Us</h2>
                    <p> You can contact us through the following information:</p>
                </div>
            </div>

            <div class="row d-flex contact-info mb-5">
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box text-center p-4 bg-light">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-map-marker"></span>
                        </div>
                        <div>
                            <h3 class="mb-4">Address</h3>
                            <p id="address">198 West 21th Street, Suite 721 New York NY 10016</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box text-center p-4 bg-light">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-phone"></span>
                        </div>
                        <div>
                            <h3 class="mb-4">Contact Number</h3>
                            <p id="contact_number"><a href="tel://1234567920">+ 1235 2355 98</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box text-center p-4 bg-light">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-paper-plane"></span>
                        </div>
                        <div>
                            <h3 class="mb-4">Email Address</h3>
                            <p><a href="mailto:info@yoursite.com" id="email">info@yoursite.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box text-center p-4 bg-light">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-globe"></span>
                        </div>
                        <div>
                            <h3 class="mb-4">Website</h3>
                            <p><a href="#" id="website">yoursite.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>


    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());

                        </script> All rights reserved | This template is made with <i class="fa fa-heart"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" /></svg></div>


    <script src="{{ asset('author/js/jquery.min.js')}}"></script>
    <script src="{{ asset('author/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{ asset('author/js/popper.min.js')}}"></script>
    <script src="{{ asset('author/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('author/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{ asset('author/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('author/js/jquery.stellar.min.js')}}"></script>
    <script src="{{ asset('author/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('author/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('author/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{ asset('author/js/scrollax.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="{{ asset('author/js/google-map.js')}}"></script>

    <script src="{{ asset('author/js/main.js')}}"></script>
    <script>

        $(document).ready(function(){
            
            $.ajax({
                url: '/company/1',
                type: "GET",
                dataType: "JSON",
                success: function (data) {
                    $('#address').text(data.address);
                    $('#contact_number').text(data.contact_number);
                    $('#email').text(data.email);
                    $('#mission').text(data.mission);
                    $('#vision').text(data.vision);
                }
            });

            $.ajax({
                url: '/company/1',
                type: "GET",
                dataType: "JSON",
                success: function (data) {
                    $('#address').text(data.address);
                    $('#contact').text(data.contact_number);
                    $('#email').text(data.email);
                    $('#mission').text(data.mission);
                    $('#vision').text(data.vision);
                }
            })

            $.ajax({
                url: 'https://coronavirus-19-api.herokuapp.com/countries/philippines',
                type: "GET",
                dataType: "JSON",
                success: function (data) {

                    jQuery({ Counter: 0 }).animate({ Counter: data.cases }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $('#cases').text( Math.ceil(now).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}).replace(/\B(?=(\d{3})+\b)/g, ","));
                        }
                    });

                    jQuery({ Counter: 0 }).animate({ Counter: data.deaths }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $('#death').text( Math.ceil(now).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}).replace(/\B(?=(\d{3})+\b)/g, ","));
                        }
                    });

                    jQuery({ Counter: 0 }).animate({ Counter: data.recovered }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $('#recovered').text(Math.ceil(now).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}).replace(/\B(?=(\d{3})+\b)/g, ","));
                        }
                    });
                    
                    jQuery({ Counter: 0 }).animate({ Counter: data.active }, {
                        duration: 3000,
                        easing: 'swing',
                        step: function (now) {
                            $('#active').text(Math.ceil(now).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}).replace(/\B(?=(\d{3})+\b)/g, ","));
                        }
                    });

                }
            });
        });
    </script>

</body>

</html>
