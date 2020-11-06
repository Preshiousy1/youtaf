<div class="site-section-cover bg-image overlay inner-page bg-light" style="background-image: url('/storage/cover_images/{{$post->cover_image}}')" data-aos="fade">
      
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-lg-10">

          <div class="box-shadow-content">
            <div class="block-heading-1">
              <span class="d-block mb-3 text-white" data-aos="fade-up">{{$post->created_at}}  <span class="mx-2">&bullet;</span> {{$post->user->name}}</span>
              <h1 class="mb-4" data-aos="fade-up" data-aos-delay="100">{{$post->title}}</h1>
            </div>
            
            
          </div>
        </div>
      </div>
    </div>
    
  </div>

  <section class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 blog-content">
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda nihil aspernatur nemo sunt, qui, harum repudiandae quisquam eaque dolore itaque quod tenetur quo quos labore?</p>
          <p>{!!$post->body!!}  </p>
          <div class="pt-5">
            <p>Categories:  <?php foreach($categories as $category){ ?> 
              <a target="_blank" href="/categories/<?=$category->id;?>"><?=$category->name;?></a>, 
              <?php } ?> 
              <a href="#">Events</a>  Tags: <a href="#">#html</a>, <a href="#">#trends</a></p>
          </div>

          <div class="comment-form-wrap pt-5">
            <h3 class="mb-5 text-black">Leave a comment</h3>
            <form id="commentForm" action="/comments" method="post" class="p-5 bg-light">
              @csrf
              <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" class="form-control" id="name" name="guest_name">
              </div>
              <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" class="form-control" id="email" name="guest_email">
              </div>
              <div class="form-group">
                <label for="website">Website</label>
                <input type="url" class="form-control" id="website" name="guest_website">
              </div>

              <div class="form-group">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"></textarea>
              </div>

              <input type="hidden" name="post_id" value="<?= $post->id ?>" />
              <div class="form-group">
                <input type="submit" id="submit-comment" value="Post Comment" class="btn btn-primary py-3 px-5">
              </div>

            </form>
                <div class="alert alert-info" id="com_alert-msg" style="display: none"></div>
              <div id="com_success" class="alert alert-success" style="display: none"></div>             
              <div id="com_error" class="alert alert-danger" style="display: none"></div>
          </div>

          <div class="pt-5">
            <h3 class="mb-5 text-black"> <?= count($comments);?> <?php if(count($comments) == 1){echo "Comment";}else{echo "Comments";}?></h3>
            @if(count($comments)>0)
            <ul class="comment-list">
              @foreach($comments as $comment)
              <li class="comment">
                <!-- <div class="vcard bio">
                  <img src="images/person_1.jpg" alt="Image placeholder">
                </div> -->
                <div class="comment-body">
                  <h3>{{$comment->guest_name}}</h3>
                  <div class="meta">{{date('F j, Y \a\t g:i a', strtotime($comment->created_at))}} </div>
                  <p>{{ $comment->comment}}</p>
                </div>
              </li>
              @endforeach
            </ul>
            @else
            <p> No Comments Yet</p>
            @endif
            <!-- END comment-list -->
            

          </div>

        </div>
        <div class="col-md-4 sidebar">
          <div class="sidebar-box">
            <form action="#" class="search-form">
              <div class="form-group mb-0">
                <span class="icon fa fa-search"></span>
                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
              </div>
            </form>
          </div>
          <div class="sidebar-box">
            <div class="categories">
              <h3 class="text-black">Categories</h3>
              @if(count($allcategories)>0)
                @foreach ($allcategories as $allcategory)
                <li><a href="/category/{{$allcategory->id}}">{{$allcategory->name}} <span>({{count($allcategory->posts)}})</span></a></li>
                @endforeach
              @else
                <span>No Categories Yet</span>
              @endif
            </div>
          </div>
          <div class="sidebar-box">
            <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4 w-50 rounded-circle">
            <h3 class="text-black">About The Author</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            <p><a href="#" class="btn btn-primary btn-md">Read More</a></p>
          </div>

          <div class="sidebar-box">
            <h3 class="text-black">Paragraph</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
          </div>
        </div>
      </div>
    </div>


  </section>