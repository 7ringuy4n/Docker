@extends('frontend.main')
@section('title', ' - About')
@section('description', ' - About')
@section('content')
  <!-- SUB BANNER -->
<section class="section-sub-banner awe-parallax bg-3">
    <div class="awe-overlay"></div>
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center">
                <h2>Our BLOG</h2>
                <p>Lorem Ipsum is simply dummy text</p>
            </div>
        </div>
    </div>
</section>
<!-- END / SUB BANNER -->
<!-- BLOG -->
<section class="section-blog bg-white">
    <div class="container">
        <div class="blog">
            <div class="row">
                <h1 class="element-invisible">Blog</h1>
                <div class="col-md-8 col-md-push-4">
                    <div class="blog-content">
                        <h1 class="element-invisible">Blog detail</h1>
                        <!-- POST SINGLE -->
                        <article class="post post-single">
                            <div class="entry-media">
                                <img src="{{ asset('frontend/images/blog/img-2.jpg') }}" alt="">
                                <span class="posted-on"><strong>23</strong>JUN</span>
                            </div>
                            <div class="entry-header">
                                <h2 class="entry-title">relaxing &amp; travel in our hotel</h2>
                                <p class="entry-meta">
                                    <span class="posted-on">
                                    <span class="screen-reader-text">Posted on</span>
                                    <span class="entry-time">JUN 23, 2014</span>
                                    </span>
                                    <span class="entry-author">
                                    <span class="screen-reader-text">Posted by </span>
                                    <a href="#" class="entry-author-link">
                                    <span class="entry-author-name">Jonatha Owens</span>
                                    </a>
                                    </span>
                                    <span class="entry-categories">
                                    <a href="#">Food Dinner</a>, 
                                    <a href="#">Travel</a>
                                    </span>
                                    <span class="entry-comments-link">
                                    <a href="#">3 Comments</a>
                                    </span>
                                </p>
                            </div>
                            <div class="entry-content">
                                <p><b>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</b></p>
                                <br />
                                <p><b>But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</b></p>
                                <br />
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy <a href="#">text ever since the 1500s</a>, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <br>
                                <blockquote>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived.</p>
                                </blockquote>
                                <br><br>
                                <h5>relaxing &amp; travel in our hotel</h5>
                                <img src="{{ asset('frontend/images/blog/img-6.jpg') }}" alt="" class="aligncenter">
                                <br><br>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries. But also the leap into electronic typesetting, remaining essentially unchanged. It was <a href="#">popularised</a> in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <br><br>
                                <img src="{{ asset('frontend/images/blog/img-7.jpg') }}" alt="" class="aligncenter">
                                <br><br>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                <br>
                                <p>
                                    <em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</em>
                                </p>
                            </div>
                        </article>
                        <!-- END / POST SINGLE -->
                    </div>
                </div>
                <div class="col-md-4 col-md-pull-8">
                    <div class="sidebar">
                        <!-- WIDGET CHECK AVAILABILITY -->
                        @include('frontend.elements.availability')
                        <!-- END / WIDGET CHECK AVAILABILITY -->
                        <!-- WIDGET CATEGORIES -->
                        @include('frontend.elements.categories')
                        <!-- END / WIDGET CATEGORIES -->
                        <!-- WIDGET RECENT POST HAS THUMBNAIL -->
                        @include('frontend.elements.recent')
                        <!-- END / WIDGET RECENT POST HAS THUMBNAIL -->
                        <!-- TAG -->
                        @include('frontend.elements.tag')
                        <!-- END / TAG -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / BLOG -->
@endsection