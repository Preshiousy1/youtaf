     <!--================Home Banner Area =================-->
    <div class="site-section-cover bg-image overlay inner-page bg-light"
        style="background-image: url('storage/images/hero_1_no-text.jpg')" data-aos="fade">

        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-lg-10">

                    <div class="box-shadow-content">
                        <div class="block-heading-1">

                            <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100">Our Blog</h1>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Home Banner Area =================-->
    
    <!--================Blog Area =================-->
    <section class="blog_area section-padding mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">

                        @if(count($posts)>0)
                            
                                @foreach ($posts as $post)
                                    <article class="blog_item">
                                        <div class="blog_item_img">
                                            <img class="card-img rounded-0" src="/storage/cover_images/{{$post->cover_image}}" alt="" height="400px">
                                            <a href="/single/{{$post->id}}" class="blog_item_date">
                                                <h3>{{ $post->created_at->format('d') }}</h3>
                                                <p>{{ $post->created_at->format('M') }}</p>
                                            </a>
                                        </div>

                                        <div class="blog_details">
                                            <a class="d-inline-block" href="/single/{{$post->id}}">
                                                <h3>{{$post->title}}</h3>
                                            </a>
                                            <p>
                                                {!! Str::words($post->body, 10,'...')  !!}
                                            </p>
                                            <ul class="blog-info-link">
                                                <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                            </ul>
                                        </div>
                                    </article>

                                @endforeach
                                <nav class="blog-pagination justify-content-center d-flex">
                                    {{$posts->links()}}
                                 </nav>
                            
                        @else
                            <p>No Posts Found</p>
                        @endif
                    </div>
                       


                       
                    
                </div>
                @include('partials.blog_sidebar')
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->