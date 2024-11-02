@extends('Front.layouts.app')
@section('page_title', 'blog')
@section('content')
    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">@yield('page_title')</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="{{ route('index') }}">Home</a></li>
                                    <li class="active" aria-current="page">@yield('page_title')</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->
    <!-- ...:::: Start Blog Single Section:::... -->
    <div class="blog-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">

                <div class="col-lg-12">
                    @if ($blog->count())
                        @foreach ($blog as $item)
                            <!-- Start Blog Single Content Area -->
                            <div class="blog-single-wrapper">
                                <div class="blog-single-img" data-aos="fade-up" data-aos-delay="0">
                                    <img class="img-fluid" src="{{ asset('storage/media/blog/' . $item->image) }}"
                                        alt="">
                                </div>
                                <ul class="post-meta" data-aos="fade-up" data-aos-delay="200">
                                    <li>POSTED BY : <a href="#" class="author">{{ $item->postedBy }}</a></li>
                                    <li>ON : <a href="#" class="date">{{ $item->addedOn }}</a></li>
                                    {{-- APRIL 24, 2018 --}}
                                </ul>
                                <h4 class="post-title" data-aos="fade-up" data-aos-delay="400">{!! $item->title !!}</h4>
                                <div class="para-content" data-aos="fade-up" data-aos-delay="600">
                                    {!! $item->content_before_blockquote !!}
                                    <blockquote class="blockquote-content">
                                        {!! $item->blockquote !!}
                                    </blockquote>
                                    {!! $item->content_after_blockquote !!}
                                </div>
                                <div class="page-pagination text-center aos-init aos-animate" data-aos="fade-up"
                                    data-aos-delay="0">
                                    <ul>
                                        {{ $blog->links('pagination::bootstrap-5') }}

                                    </ul>
                                </div>
                            </div> <!-- End Blog Single Content Area -->
                        @endforeach
                    @else
                        <p>No blogs available.</p>
                    @endif

                    <div class="comment-area">
                        <div class="comment-box" data-aos="fade-up" data-aos-delay="0">
                            <h4 class="title mb-4">3 Comments</h4>
                            <!-- Start - Review Comment -->
                            <ul class="comment">
                                <!-- Start - Review Comment list-->
                                <li class="comment-list">
                                    <div class="comment-wrapper">
                                        <div class="comment-img">
                                            <img src="assets/images/user/image-1.png" alt="">
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-content-top">
                                                <div class="comment-content-left">
                                                    <h6 class="comment-name">Kaedyn Fraser</h6>
                                                </div>
                                                <div class="comment-content-right">
                                                    <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                </div>
                                            </div>

                                            <div class="para-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora
                                                    inventore dolorem a unde modi iste odio amet, fugit fuga aliquam,
                                                    voluptatem maiores animi dolor nulla magnam ea! Dignissimos
                                                    aspernatur cumque nam quod sint provident modi alias culpa,
                                                    inventore deserunt accusantium amet earum soluta consequatur quasi
                                                    eum eius laboriosam, maiores praesentium explicabo enim dolores
                                                    quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam officia, saepe
                                                    repellat. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Start - Review Comment Reply-->
                                    <ul class="comment-reply">
                                        <li class="comment-reply-list">
                                            <div class="comment-wrapper">
                                                <div class="comment-img">
                                                    <img src="assets/images/user/image-2.png" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <div class="comment-content-top">
                                                        <div class="comment-content-left">
                                                            <h6 class="comment-name">Oaklee Odom</h6>
                                                        </div>
                                                        <div class="comment-content-right">
                                                            <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                        </div>
                                                    </div>

                                                    <div class="para-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Tempora inventore dolorem a unde modi iste odio amet, fugit
                                                            fuga aliquam, voluptatem maiores animi dolor nulla magnam
                                                            ea! Dignissimos aspernatur cumque nam quod sint provident
                                                            modi alias culpa, inventore deserunt accusantium amet earum
                                                            soluta consequatur quasi eum eius laboriosam, maiores
                                                            praesentium explicabo enim dolores quaerat! Voluptas ad
                                                            ullam quia odio sint sunt. Ipsam officia, saepe repellat.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul> <!-- End - Review Comment Reply-->
                                </li> <!-- End - Review Comment list-->
                                <!-- Start - Review Comment list-->
                                <li class="comment-list">
                                    <div class="comment-wrapper">
                                        <div class="comment-img">
                                            <img src="assets/images/user/image-3.png" alt="">
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-content-top">
                                                <div class="comment-content-left">
                                                    <h6 class="comment-name">Jaydin Jones</h6>
                                                </div>
                                                <div class="comment-content-right">
                                                    <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                </div>
                                            </div>

                                            <div class="para-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora
                                                    inventore dolorem a unde modi iste odio amet, fugit fuga aliquam,
                                                    voluptatem maiores animi dolor nulla magnam ea! Dignissimos
                                                    aspernatur cumque nam quod sint provident modi alias culpa,
                                                    inventore deserunt accusantium amet earum soluta consequatur quasi
                                                    eum eius laboriosam, maiores praesentium explicabo enim dolores
                                                    quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam officia, saepe
                                                    repellat. </p>
                                            </div>
                                        </div>
                                    </div>
                                </li> <!-- End - Review Comment list-->
                            </ul> <!-- End - Review Comment -->
                        </div>

                        <!-- Start comment Form -->
                        <div class="comment-form" data-aos="fade-up" data-aos-delay="0">
                            <div class="coment-form-text-top mt-30">
                                <h4 class="title mb-3 mt-3">Leave a Reply</h4>
                                <p>Your email address will not be published. Required fields are marked *</p>
                            </div>

                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="default-form-box mb-20">
                                            <label for="comment-name">Your name <span>*</span></label>
                                            <input id="comment-name" type="text" placeholder="Enter your name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="default-form-box mb-20">
                                            <label for="comment-email">Your Email <span>*</span></label>
                                            <input id="comment-email" type="email" placeholder="Enter your email"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="default-form-box mb-20">
                                            <label for="comment-review-text">Your review <span>*</span></label>
                                            <textarea id="comment-review-text" placeholder="Write a review" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-md btn-golden" type="submit">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- End comment Form -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Blog Single Section:::... -->
@endsection
