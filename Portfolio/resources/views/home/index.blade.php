<!DOCTYPE html>
<html lang="en">

<head>
    <title>Alekh Banshwar Portfolio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('asset/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('asset/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('asset/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('asset/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('asset/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">



    <style>
        /*======================================
//--//-->   ABOUT
======================================*/

        .about-mf .box-shadow-full {
            padding-top: 4rem;
            padding-bottom: 4rem;
        }

        .about-mf .about-img {
            margin-bottom: 2rem;
        }

        .about-mf .about-img img {
            margin-left: 10px;
        }


        .skill-mf .progress {
            /* background-color: #cde1f8; */
            margin: .5rem 0 1.2rem 0;
            border-radius: 0;
            height: .7rem;
        }

        .skill-mf .progress .progress-bar {
            height: .7rem;
            background-color: #ffbd39;
        }


        /* Animation styles */
        #typing-animation {
            position: relative;
            font-size: 30px;
            font-weight: bold;
            color: rgb(255, 255, 255);
            overflow: hidden;
            white-space: nowrap;
            animation: typing 3s steps(20, end) infinite;
        }

        #typing-animation:before {
            content: "";
            /* position: absolute; */
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background-color: #ccc;
            animation: typing-cursor 0.5s ease-in-out infinite;
        }

        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes typing-cursor {
            from {
                width: 5px;
            }

            to {
                width: 0;
            }
        }


        /* project image zoom effect */

        .zoom-effect {
            overflow: hidden;
            transition: transform 0.3s ease-out;
        }

        .zoom-effect:hover {
            transform: scale(1.1);
        }
    </style>


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
        <div class="container">
            @foreach ($home as $h)
                <a class="navbar-brand" href="index.html">{{ $h->title }}</a>
            @endforeach
            <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
                data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav nav ml-auto">
                    <li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
                    <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
                    <li class="nav-item"><a href="#resume-section" class="nav-link"><span>Resume</span></a></li>
                    <li class="nav-item"><a href="#project-section" class="nav-link"><span>Projects</span></a></li>
                    <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="home-section" class="hero">
        <div class="home-slider  owl-carousel">
            <div class="slider-item ">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end"
                        data-scrollax-parent="true">
                        <div class="one-third js-fullheight order-md-last img"
                            style="background-image:url(asset/asset/images/bg_1.png);">
                            <div class="overlay"></div>
                        </div>
                        <div class="one-forth d-flex  align-items-center ftco-animate"
                            data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text">
                                <span class="subheading">Hello!</span>
                                @foreach ($home as $h)
                                    <h1 class="mb-4 mt-3">I'm <span>{{ $h->title }}</span></h1>
                                @endforeach


                                <!-- Element to contain animated typing -->
                                <span id="typing-animation"></span>

                                <script>
                                    // Initialize the typing animation
                                    const typingAnimationElement = document.getElementById('typing-animation');

                                    // Create an array of typing texts from the Blade variable, split by commas
                                    const typingTexts = [
                                        @foreach ($home as $h)
                                            @json($h->subtitle),
                                        @endforeach
                                    ];

                                    // Split the single string into individual parts if it's in a single string
                                    const splitTypingTexts = typingTexts[0].split(',').map(item => item.trim());

                                    // Create a function to display the typing animation for a given text
                                    function playTypingAnimation(text) {
                                        // Loop through each character and add it to the element
                                        for (let i = 0; i < text.length; i++) {
                                            setTimeout(() => {
                                                typingAnimationElement.textContent += text[i];
                                            }, i * 100); // Adjust timing to slow down or speed up the animation
                                        }

                                        // After typing the current text, add a comma and move to the next text
                                        setTimeout(() => {
                                            typingAnimationElement.textContent += ''; // Add a comma after the text
                                            setTimeout(() => {
                                                typingAnimationElement.textContent = ''; // Clear text
                                                playTypingAnimation(splitTypingTexts[(splitTypingTexts.indexOf(text) + 1) %
                                                    splitTypingTexts.length]); // Start next
                                            }, 500); // Wait before clearing and typing next
                                        }, text.length * 100); // Wait until the text animation finishes
                                    }

                                    // Start the typing animation loop
                                    if (splitTypingTexts.length > 0) {
                                        playTypingAnimation(splitTypingTexts[0]);
                                    }
                                </script>
                                <br>
                                <p>
                                    {{-- <a href="https://www.youtube.com/@RishabhMishraOfficial"
                                        class="btn btn-primary py-3 px-4">Github</a> --}}
                                    <a href="https://github.com/alekhbanshwar"
                                        class="btn btn-white btn-outline-white py-3 px-4">My works</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-about img ftco-section ftco-no-pb" id="about-section">
        <div class="container">
            <div class="row">
                <div class="row d-flex align-items-stretch">
                    <!-- <div class="row d-flex"> -->
                    <div class="col-md-6 col-lg-5 d-flex">
                        <div class="img-about img d-flex align-items-stretch">
                            <div class="overlay">
                                @foreach ($about as $a)
                                    <div class="row">
                                        <div class="col-sm-6 col-md-5">
                                            <div class="about-img">
                                                <img src="{{ asset('storage/uploads/about/' . $a->profile_image) }}"
                                                    class="img-fluid rounded b-shadow-a " alt="">
                                            </div>
                                        </div>
                                        <!-- Details next to profile image -->
                                        <div class="col-sm-6 col-md-7">
                                            <div class="about-info">
                                                <p><span class="title-s">Name: </span> <span>{{ $a->name }}</span>
                                                </p>
                                                <p><span class="title-s">Job Role: </span>
                                                    <span>{{ $a->role }}</span>
                                                </p>
                                                <p><span class="title-s">Experience: </span>
                                                    <span>{{ $a->experience }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3" style="font-size: 12px;">{{ $a->tagline }}</p>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-7 pl-lg-5 pb-5">
                        <div class="row justify-content-start pb-3">
                            <div class="col-md-12 heading-section ftco-animate">

                                <h1 class="big">About</h1>
                                <h2 class="mb-4">About Me</h2>


                                <ul class="about-info mt-4 px-md-0 px-2">
                                    <li class="d-flex"><span>Profile:</span> <span>Data Science &amp; Analytics</span>
                                    </li>
                                    <li class="d-flex"><span>Domain:</span> <span>Retail, Ecommerce, BFSI &amp; Digital
                                            Marketing</span></li>
                                    <li class="d-flex"><span>Education:</span> <span>Bachelor of Engineering</span>
                                    </li>
                                    <li class="d-flex"><span>Language:</span> <span>English, Hindi</span></li>
                                    <li class="d-flex"><span>BI Tools:</span> <span>Microsoft Power BI, Looker &amp;
                                            Tableau</span></li>
                                    <li class="d-flex"><span>Other Skills:</span> <span>Cloud, PySpark, Excel, Git,
                                            JIRA, Google Analytics &amp; SEO</span></li>
                                    <li class="d-flex"><span>Interest:</span> <span>Traveling, Travel Photography,
                                            Teaching</span></li>

                                </ul>
                            </div>
                        </div>


                        <div class="counter-wrap ftco-animate d-flex mt-md-3">
                            <div class="text">
                                <p class="mb-4">
                                    <span class="number" data-number="30">0</span> <span>+</span>
                                    <span>&nbsp; Projects completed</span>
                                </p>
                                <p><a href="https://www.linkedin.com/in/rishabhnmishra/"
                                        class="btn btn-primary py-3 px-3">LinkedIn</a></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- skills --}}

    <section class="ftco-section" id="project-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Skills</h1>
                    <h2 class="mb-4">Skills</h2>
                    <p>Leveraging Data-Driven Insights, Machine Learning, and User-Centric Design to Build
                        High-Performance Web Solutions.</p>
                </div>
            </div>

            @foreach ($skill as $index => $tech_skill)
                @php
                    // Map skill levels to percentage values
                    $levelPercentage = 0; // Default value
                    switch ($tech_skill->proficiency) {
                        case 'Beginner':
                            $levelPercentage = 25;
                            break;
                        case 'Intermediate':
                            $levelPercentage = 50;
                            break;
                        case 'Advanced':
                            $levelPercentage = 75;
                            break;
                        case 'Expert':
                            $levelPercentage = 100;
                            break;
                        default:
                            $levelPercentage = 0;
                            break;
                    }
                @endphp

                @if ($index % 2 == 0)
                    <div class="row">
                @endif

                <div class="col-md-6">
                    <div class="skill-mf mt-4">
                        <span>{{ $tech_skill->skill_name }}</span> <span
                            class="pull-right">{{ $levelPercentage }}%</span>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $levelPercentage }}%;"
                                aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">{{ $levelPercentage }}%
                            </div>
                        </div>
                    </div>
                </div>

                @if ($index % 2 == 1 || $loop->last)
        </div>
        @endif
        @endforeach

        </div>
    </section>

    <section class="ftco-section ftco-no-pb" id="resume-section">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-10 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Resume</h1>
                    <h2 class="mb-4">Resume</h2>
                    <p>Seasoned Senior Data Analyst with 5+ years of experience driving business strategies through
                        data-driven insights. Proven expertise in data science, statistical analysis, machine learning
                        algorithms and project management.</p>
                </div>
            </div>

            <div class="row">
                <h1 class="big-4">Experience</h1>
                <div class="underline"></div>
            </div>
            <br>

            @foreach ($experiences as $exp_index => $exp_item)
                @if ($exp_index % 2 == 0)
                    <div class="row">
                @endif

                <div class="col-md-6">
                    <div class="resume-wrap ftco-animate">
                        <span class="date">{{ date('F Y', strtotime($exp_item->start_date)) }} -
                            {{ date('F Y', strtotime($exp_item->end_date)) }}</span>
                        <h2>Senior Data Analyst</h2>
                        <span class="position">{{ $exp_item->job_title }}</span>
                        <p class="mt-4">{{ $exp_item->description }}</p>

                    </div>
                </div>

                @if ($exp_index % 2 == 1 || $loop->last)
        </div> <!-- Closing row div -->
        @endif
        @endforeach



        <br>
        <br>

        <div class="row">
            <h1 class="big-4">Education</h1>
            <div class="underline"></div>
        </div>
        <br>

        @foreach ($education as $edu_index => $edu)
            @if ($edu_index % 2 == 0)
                <div class="row">
            @endif
            <div class="col-md-6">
                <div class="resume-wrap ftco-animate">
                    <span class="date">{{ $edu->duration }}</span>
                    <h2 class="text-uppercase">{{ $edu->degree }}</h2>
                    <span class="position">{{ $edu->institution }}</span>
                    <p class="mt-4">Grade: {{ $edu->division }} class distinction.</p>
                </div>
            </div>
            @if ($edu_index % 2 == 1 || $loop->last)
                </div>
            @endif
        @endforeach


        <div class="row justify-content-center mt-5">
            <div class="col-md-6 text-center ftco-animate">
                <p><a href="#" class="btn btn-primary py-4 px-5">Download CV</a></p>
            </div>
        </div>
        </div>
    </section>



    <section class="ftco-section" id="project-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Projects</h1>
                    <h2 class="mb-4">Projects</h2>
                    <p>Below are the sample Data Analytics projects on SQL, Python, Power BI & ML.</p>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="https://github.com/rishabhnmishra/SQL_Music_Store_Analysis/blob/main/Music_Store_Query.sql"
                            class="block-20 zoom-effect" style="background-image: url('asset/images/proj_1.jpg');">
                        </a>
                        <div class="text mt-3 float-right d-block">

                            <h3 class="heading"><a
                                    href="https://github.com/rishabhnmishra/SQL_Music_Store_Analysis/blob/main/Music_Store_Query.sql">Digital
                                    Music Store Data Analysis using SQL</a></h3>
                            <p>Analyzed music store data using advanced SQL queires to identify gaps and increase the
                                business growth.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="https://github.com/rishabhnmishra/Python_Diwali_Sales_Analysis/blob/main/Diwali_Sales_Analysis.ipynb"
                            class="block-20 zoom-effect" style="background-image: url('asset/images/proj_2.jpg');">
                        </a>
                        <div class="text mt-3 float-right d-block">

                            <h3 class="heading"><a
                                    href="https://github.com/rishabhnmishra/Python_Diwali_Sales_Analysis/blob/main/Diwali_Sales_Analysis.ipynb">Data
                                    Analysis using Python Project for Beginners</a></h3>
                            <p>Performed exploratory data analysis on diwali sales data using Python to improve the
                                customer experience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry">
                        <a href="https://github.com/rishabhnmishra/Madhav_Store_Analysis_PowerBI/blob/main/Madhav%20Store%20dashboard.jpg"
                            class="block-20 zoom-effect" style="background-image: url('asset/images/proj_3.jpg');">
                        </a>
                        <div class="text mt-3 float-right d-block">

                            <h3 class="heading"><a
                                    href="https://github.com/rishabhnmishra/Madhav_Store_Analysis_PowerBI/blob/main/Madhav%20Store%20dashboard.jpg">Power
                                    BI Sales dashboard Project for Beginners</a></h3>
                            <p>Designed a power bi dashboard for Madhav Store to track and analyze the online sales data
                                acorss India.</p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- added justify-content-center to center align the last two projects -->
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="https://github.com/rishabhnmishra/sales_forecasting/tree/main"
                            class="block-20 zoom-effect" style="background-image: url('asset/images/proj_4.jpg');">
                        </a>
                        <div class="text mt-3 float-right d-block">

                            <h3 class="heading"><a
                                    href="https://github.com/rishabhnmishra/sales_forecasting/tree/main">Sales
                                    Forecast- Time Series Forecasting</a></h3>
                            <p>Used multiple machine learning models to forecast sales (retail store) and performed time
                                series analysis.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="https://github.com/rishabhnmishra/customer_segmentation/blob/main/Customer_Segmentation-final.ipynb"
                            class="block-20 zoom-effect" style="background-image: url('asset/images/proj_5.jpg');">
                        </a>
                        <div class="text mt-3 float-right d-block">

                            <h3 class="heading"><a
                                    href="https://github.com/rishabhnmishra/customer_segmentation/blob/main/Customer_Segmentation-final.ipynb">Customer
                                    Segmentation using clustering model</a></h3>
                            <p>Developed a ML model to give various recommendations of financial products &amp; services
                                on target customer groups.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter">
        <div class="container">
            <div class="row d-md-flex align-items-center">
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text">
                            <strong class="number" data-number="20">0</strong>
                            <span>Achievements</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text">
                            <strong class="number" data-number="30">0</strong>
                            <span>Projects</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text">
                            <strong class="number" data-number="1000">0</strong>
                            <span>Mentored Students</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text">
                            <strong class="number" data-number="500">0</strong>
                            <span>Cups of coffee</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ftco-section ftco-hireme img margin-top" style="background-image: url(asset/images/bg_1.jpg)">
            <!-- <div class="container"> -->
            <div class="row justify-content-center">
                <div class="col-md-7 ftco-animate text-center">
                    <h2>More projects on<span> Github </span> </h2>
                    <div class="heading">
                        <h4> I love to solve business problems &amp; uncover hidden data stories </h4>
                        <br>
                        <p><a href="https://github.com/rishabhnmishra" class="btn btn-primary py-3 px-5">GitHub</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </section>



    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Contact</h1>
                    <h2 class="mb-4">Contact Me</h2>
                    <p>Below are the details to reach out to me!</p>
                </div>
            </div>

            @foreach ($contact_details as $con_index => $con)
                <div class="row d-flex contact-info mb-5">
                    <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                        <div class="align-self-stretch box p-4 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="icon-map-signs"></span>
                            </div>
                            <h3 class="mb-4">Address</h3>
                            <p>{{ $con->address }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                        <div class="align-self-stretch box p-4 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="icon-phone2"></span>
                            </div>
                            <h3 class="mb-4">Contact Number</h3>
                            <p><a href="tel:{{ $con->phone }}">{{ $con->phone }}</a></p>

                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                        <div class="align-self-stretch box p-4 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="icon-paper-plane"></span>
                            </div>
                            <h3 class="mb-4">Email Address</h3>
                            <p><a href="mailto:{{ $con->email }}">{{ $con->email }}</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                        <div class="align-self-stretch box p-4 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="icon-globe"></span>
                            </div>
                            <h3 class="mb-4">Download Resume</h3>
                            <p><a href="#">resumelink</a></p>
                        </div>
                    </div>

                    <div class="container">
                        <br>
                        <br>
                        <div class="row justify-content-center">
                            <div class="col-md-7 ftco-animate text-center">
                                <h2>Have a<span> Question? </span> <a
                                        href="https://docs.google.com/forms/d/e/1FAIpQLSeIzWRatj8o2MiaBB1NGqAQpVpoqczfNWYmCy5HO339x8IHuA/viewform?usp=header"
                                        class="btn btn-primary py-3 px-5">Click Here</a> </h2>
                            </div>
                        </div>
                        <br>
                        <ul
                            class="ftco-footer-social list-unstyled d-flex justify-content-center align-items-center mb-0">
                            <li class="ftco-animate normal-txt">Find me on </li>
                            <li class="ftco-animate"><a href="https://www.youtube.com/@RishabhMishraOfficial"><span
                                        class="icon-youtube"></span></a></li>
                            <li class="ftco-animate"><a href="https://www.linkedin.com/in/rishabhnmishra/"><span
                                        class="icon-linkedin"></span></a></li>
                            <li class="ftco-animate"><a href="https://twitter.com/rishabhnmishra"><span
                                        class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="https://twitter.com/rishabhnmishra"><span
                                        class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="https://www.instagram.com/rishabhnmishra/"><span
                                        class="icon-instagram"></span></a></li>
                        </ul>
                        <br>
                    </div>
                </div>
            @endforeach
    </section>




    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i
                            class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com"
                            target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>

    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('asset/js/popper.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('asset/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('asset/js/aos.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('asset/js/scrollax.min.js') }}"></script>

    <script src="{{ asset('asset/js/main.js') }}"></script>
</body>

</html>
