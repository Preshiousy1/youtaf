
    <div class="site-section" id="blog-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-7 text-center mb-5 text-center">
            <h2 class="text-black text-uppercase section-title">Our Blog</h2>
            <p> This is our blog, enjoy!</p>
          </div>
        </div>
        @if(count($posts)>0)
      
          @if(count($posts) == 1)
            <div class="col-lg-6">
              <div>
                <a href="single.html" class="mb-4 d-block"><img src="/storage/cover_images/{{$posts[0]->cover_image}}" style="height: 300px !important;" alt="Image" class="img-fluid rounded"></a>
                <h2><a href="/single/{{$posts[0]->id}}">{{$posts[0]->title}}</a></h2>
                <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">{{$posts[0]->created_at}} </span> By <a href="single.html" class="by">{{$posts[0]->user->name}}</a></p>
                <p> {!! Str::words($posts[0]->body, 10,'...')  !!} </p>
                <p><a href="/single/{{$posts[0]->id}}">Read More</a></p>
              </div>
            </div>
          @else
            <div class="row">
              <div class="col-lg-6">
                <div>
                  <a href="single.html" class="mb-4 d-block"><img src="/storage/cover_images/{{$posts[0]->cover_image}}" style="height: 300px !important;" alt="Image" class="img-fluid rounded"></a>
                  <h2><a href="/single/{{$posts[0]->id}}">{{$posts[0]->title}}</a></h2>
                  <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">{{$posts[0]->created_at}} </span> By <a href="single.html" class="by">{{$posts[0]->user->name}}</a></p>
                  <p> {!! Str::words($posts[0]->body, 10,'...')  !!} </p>
                  <p><a href="/single/{{$posts[0]->id}}">Read More</a></p>
                </div>
              </div>
              <div class="col-lg-6">
                <div>
                  <a href="single.html" class="mb-4 d-block"><img src="/storage/cover_images/{{$posts[1]->cover_image}}" alt="Image" style="height: 300px !important;" class="img-fluid rounded"></a>
                  <h2><a href="/single/{{$posts[1]->id}}">{{$posts[1]->title}}</a></h2>
                  <p class="text-muted mb-3 text-uppercase small"><span class="mr-2">{{$posts[1]->created_at}} </span> By <a href="single.html" class="by">{{$posts[1]->user->name}}</a></p>
                  <p> {!! Str::words($posts[1]->body, 10,'...')  !!}</p>
                  <p><a href="/single/{{$posts[1]->id}}">Read More</a></p>
                </div>
              </div>
            </div>
          @endif

        @else
        <p> Sorry, No Posts yet.. </p>
        @endif
            <p class="text-center"><a href="/blog">Check out all our blogs </a> </p>
      </div>
    </div> 
