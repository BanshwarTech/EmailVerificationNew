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
        body {
            font-family: "SFMono-Regular", Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            ;
        }

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



        .btn-primary {
            cursor: pointer;
        }

        li strong em {
            color: #FFBD39;
        }
    </style>


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
        <div class="container ">
            @foreach ($home as $h)
                <a class="navbar-brand" href="index.html">{{ $h->title }}</a>
            @endforeach
            <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
                data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav nav ml-auto">
                    @if ($menu->Home)
                        <li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
                    @endif

                    @if ($menu->About)
                        <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
                    @endif

                    @if ($menu->Skill)
                        <li class="nav-item"><a href="#skill-section" class="nav-link"><span>Skill</span></a></li>
                    @endif

                    @if ($menu->EduExp)
                        <li class="nav-item"><a href="#resume-section" class="nav-link"><span>Resume</span></a></li>
                    @endif

                    @if ($menu->Project)
                        <li class="nav-item"><a href="#project-section" class="nav-link"><span>Projects</span></a></li>
                    @endif

                    @if ($menu->Contact)
                        <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
                    @endif
                </ul>

            </div>
        </div>
    </nav>
    @if ($menu->Home)
        <section id="home-section " class="hero">
            <div class="home-slider owl-carousel">
                <div class="slider-item ">
                    <div class="overlay"></div>
                    <div class="container ">
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
                                        <a href="#" class="btn btn-primary py-3 px-4">Download CV</a>&nbsp;
                                        <a href="#project-section" class="btn btn-white btn-outline-white py-3 px-4">My
                                            works</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if ($menu->About)
        <section class="ftco-about img ftco-section ftco-no-pb " id="about-section">
            <div class="container ">
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
                                                    <p><span class="title-s">Name: </span>
                                                        <span>{{ $a->name }}</span>
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
                                        <div class="about-section">
                                            <p id="aboutText">
                                                <span id="shortText">{!! Str::limit($a->tagline, 295, '') !!}<span
                                                        id="dots">...</span></span>
                                                <span id="fullText"
                                                    style="display: none;">{!! substr($a->tagline, 295) !!}</span>
                                            </p>
                                            <button id="readMoreBtn" class="btn btn-primary"
                                                onclick="toggleReadMore()">Read More</button>
                                        </div>
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
                                        @foreach ($about as $a)
                                            <li class="d-flex"><span>Education:</span>
                                                <span>{{ $a->education }}</span>
                                            </li>
                                            <li class="d-flex"><span>Language:</span> <span>{{ $a->language }}</span>
                                            </li>
                                            <li class="d-flex"><span>Other Skills:</span>
                                                <span>{{ $a->other_skills }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- skills --}}
    @if ($menu->Skill)
        <section class="ftco-section " id="skill-section">
            <div class="container ">
                <div class="row justify-content-center mb-2 pb-2">
                    <div class="col-md-10 heading-section text-center ftco-animate">
                        <h1 class="big big-2">Skills</h1>
                        <h2 class="mb-4">Skills</h2>
                        <p>Crafting dynamic, responsive, and high-performance web applications with modern frameworks,
                            intuitive UI/UX, and optimized backend solutions.</p>

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
                                $levelPercentage = 60;
                                break;
                            case 'Advanced':
                                $levelPercentage = 80;
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
                        <div class="skill-mf mt-2">
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
    @endif
    @if ($menu->EduExp)
        <section class="ftco-section ftco-no-pb" id="resume-section">
            <div class="container ">
                <div class="row justify-content-center pb-5">
                    <div class="col-md-10 heading-section text-center ftco-animate">
                        <h1 class="big big-2">Education & Experience</h1>
                        <h2 class="mb-4">Education & Experience</h2>
                        <p>Bachelor's in <strong class="text-primary">Computer Science</strong> from <strong
                                class="text-primary">INSTITUTE
                                OF TECHNOLOGY &
                                MANAGEMENT, LUCKNOW</strong>, with expertise in web development, software engineering,
                            and scalable application design.</p>

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

                    <div class="col-md-6 h-100">
                        <div class="resume-wrap ftco-animate">
                            <span class="date">{{ date('F Y', strtotime($exp_item->start_date)) }} -
                                {{ date('F Y', strtotime($exp_item->end_date)) }}</span>
                            <h2>{{ $exp_item->company_name }}</h2>
                            <span class="position">{{ $exp_item->job_title }}</span>
                            <p class="mt-4" style="font-size: 12px;">{{ $exp_item->description }}</p>

                        </div>
                    </div>

                    @if ($exp_index % 2 == 1 || $loop->last)
            </div> <!-- Closing row div -->
    @endif
    @endforeach


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


    {{-- <div class="row justify-content-center mt-5">
            <div class="col-md-6 text-center ftco-animate">
                <p><a href="#" class="btn btn-primary py-4 px-5">Download CV</a></p>
            </div>
        </div> --}}
    </div>
    </section>
    @endif


    @if ($menu->Project)
        <section class="ftco-section " id="project-section">
            <div class="container ">
                <div class="row justify-content-center mb-5 pb-5">
                    <div class="col-md-10 heading-section text-center ftco-animate">
                        <h1 class="big big-2">Projects</h1>
                        <h2 class="mb-4">Projects</h2>
                        <p>Below are sample web development projects showcasing expertise in front-end, back-end, API
                            integration, and responsive design using modern frameworks and technologies.</p>
                    </div>
                </div>
                <div class="row d-flex">

                    @foreach ($project as $pro_index => $pro)
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="blog-entry justify-content-end">
                                <img src="{{ asset('storage/uploads/project/' . $pro->image) }}"
                                    alt="image not found" width="100%"
                                    onclick="window.location.href='<?= $pro['github_link'] ?>'"
                                    style="cursor: pointer;" height="200.81px">

                                <div class="text mt-3 float-right d-block">
                                    <h3 class="heading"><a href="<?= $pro['github_link'] ?>"><?= $pro['title'] ?></a>
                                    </h3>
                                    <p><?= $pro['description'] ?></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <br>

            </div>
        </section>
    @endif

    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter">
        <div class="container ">
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
            <!-- <div class="container "> -->
            <div class="row justify-content-center">
                <div class="col-md-7 ftco-animate text-center">
                    <h2>More projects on<span> Github </span> </h2>
                    <div class="heading">
                        <h4> I love to solve business problems &amp; uncover hidden data stories </h4>
                        <br>
                        <p><a href="https://github.com/BanshwarTech" class="btn btn-primary py-3 px-5">GitHub</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </section>


    @if ($menu->Contact)
        <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
            <div class="container ">
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
                        <br>
                        <div class="container ">
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
                                @foreach ($social_connection as $social_conn)
                                    <li class="ftco-animate"><a href="{{ $social_conn->account_link }}"
                                            target="_blank"><img
                                                src="{{ asset('storage/uploads/account/' . $social_conn->account_related_image) }}"
                                                alt=""></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
        </section>
    @endif




    <footer class="ftco-footer ftco-section pb-2 pt-3">
        <div class="container ">
            <div class="row">
                <div class="col-md-12 text-center" style="border-top:0.5px solid #999999;">

                    <p class="mt-3">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
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
    <script>
        function toggleReadMore() {
            var dots = document.getElementById("dots");
            var fullText = document.getElementById("fullText");
            var btnText = document.getElementById("readMoreBtn");

            if (fullText.style.display === "none") {
                dots.style.display = "none"; // ✅ Hide `...`
                fullText.style.display = "inline"; // ✅ Show full text
                btnText.innerHTML = "Read Less"; // ✅ Change button text
            } else {
                dots.style.display = "inline"; // ✅ Show `...` again
                fullText.style.display = "none"; // ✅ Hide full text
                btnText.innerHTML = "Read More"; // ✅ Reset button text
            }
        }
    </script>
</body>

</html>
