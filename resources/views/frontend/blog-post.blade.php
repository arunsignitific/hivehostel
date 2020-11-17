@extends('frontend/common/webmaster')
@section('title',"$blog->meta_title")

@section('linkfile')
<style>
.hero_warp.inner_banner .banner_content .banner_title {
    font-size: 30px;
    line-height: 80px;
    margin-bottom: 0;
}
</style>
@endsection

@section('subheader')
    <!-- start hero_warp -->
    <section class="hero_warp inner_banner blog_single_banner">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-12 col-12">
                    <div class="banner_content">
                    <h1 class="banner_title">{{ $blog->title }}</h1>
                        <ul class="post_info">
                            <li><span class="author"><img src="{{ URL::asset('public/assets/media/favicon.ico') }}" alt="img"> by Doors Studio</span></li>
                            <li><span class="post_time"><img src="{{ URL::asset('public/frontend/assets/images/svg/timetable-white.svg') }}" alt="icon">{{ date('M d, Y', strtotime($blog->created_at)) }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <ul class="social_link">
            <li>
                <a href="https://twitter.com/doors_studio" target="_blank" rel="nofollow">
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-twitter"></i>
                </a>
            </li>
            <li>
                <a href="https://www.facebook.com/Doors-Studio-200419663693348/" target="_blank" rel="nofollow">
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-facebook"></i>
                </a>
            </li>
            <li>
                <a href="https://www.pinterest.com/doorsstudio/" target="_blank" rel="nofollow">
                    <i class="fa fa-pinterest-p"></i>
                    <i class="fa fa-pinterest-p"></i>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/doors_studio/" target="_blank" rel="nofollow">
                    <i class="fa fa-instagram"></i>
                    <i class="fa fa-instagram"></i>
                </a>
            </li>
            <li>
                <a href="https://www.linkedin.com/company/doors-studio?trk=nav_account_sub_nav_company_admin" target="_blank" rel="nofollow">
                    <i class="fa fa-linkedin"></i>
                    <i class="fa fa-linkedin"></i>
                </a>
            </li>
        </ul>
    </section>
    <!-- end hero_warp -->
@endsection

@section('content')
    <!-- start blog_wrap -->
    <section class="blog_wrap blog_single_wrap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="blog_content blog_single_content">
                        <div class="blog_single_item wow fadeInUp">
                            <h3 class="blog_inner_title">{{ $blog->title }}</h3>
                            <div class="blog_simg_img">
                                <img src="{{ asset('storage/app/blog_pics/'.$blog->header_img ) }}" class="img-fluid" alt="img">
                            </div>
                            {!! $blog->post !!}
                        </div>
                        {{-- <div class="blog_sing_share wow fadeInUp">
                            <span class="sing_share ">
                                <b>Share on</b>
                            </span>
                            <ul class="blog_social">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-linkedin"></i>
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-behance"></i>
                                        <i class="fa fa-behance"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-dribbble"></i>
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-pinterest-p"></i>
                                        <i class="fa fa-pinterest-p"></i>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                        @if (!$comments->isEmpty())
                        <div class="comment_reply wow fadeInUp mt-4">
                            <div class="comment_text">
                            <h2 class="comment-title"> {{ $comment_count }} {{ ($comment_count == 1) ? 'Comment':'Comments' }} </h2>
                            </div>
                            <div class="comment_reply_form">
                                <ul class="comment-list">
                                    @foreach ($comments as $data)
                                    @if ($data->parent_id == NULL)
                                    <li>
                                        <div class="media">
                                            <div class="media-left"><img class="media-object" src="{{ URL::asset('public/frontend/assets/images/author/user.svg') }}" alt="img"></div>
                                            <div class="media-body">
                                                <div class="reply_body">
                                                    <h6 class="author_name">{{ $data->comment_name }}
                                                        <span class="post_ago">{{ date('M d, y', strtotime($data->created_at)) }}</span>
                                                        <span class="float-right"><a href="#" class="reply_link" data-toggle="modal" data-target="#commentModal" data-name="{{ $data->comment_name }}" data-parent_id="{{ $data->id }}">Reply<i class="arrow_right"></i></a></span>
                                                    </h6>
                                                    <p class="author_details">{!! $data->comment !!}</p>
                                                </div>
                                                <ul class="comment-list">
                                                    @foreach ($comments as $item)
                                                    @if ($data->id == $item->parent_id)
                                                    <li>
                                                        <div class="media">
                                                            <div class="media-left"><img class="media-object" src="{{ URL::asset('public/frontend/assets/images/author/user.svg') }}" alt="img"></div>
                                                            <div class="media-body">
                                                                <div class="reply_body">
                                                                    <h6 class="author_name">{{ $item->comment_name }}
                                                                        <span class="post_ago">{{ date('M d, y', strtotime($item->created_at)) }}</span>
                                                                        {{-- <span class="float-right"><a href="#" class="reply_link">Reply<i class="arrow_right"></i></a></span> --}}
                                                                    </h6>
                                                                    <p class="author_details">{!! $item->comment !!}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif

                        <div class="leave_comment wow fadeInUp mt-4">
                            <div class="comment_text">
                                <h2 class="comment-title"> Submit your comment </h2>
                            </div>
                            <div class="comment-respond">
                            <form action="{{ route('commentSend') }}" method="post" class="contact_form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            @if ($errors->any())
												<div class="form-group form-group-last">
													<div class="alert alert-secondary alert-dismissible fade show" role="alert">
														<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
														<div class="alert-text">
														<ul class="p-3">{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
														</div>
														<div class="alert-close">
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;</span>
                                                            </button>
														</div>
													</div>
												</div>
											@endif
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 form-group wow fadeInUp" data-wow-delay="0.2s">
                                            <input type="text" name="comment_name" class="form-control" placeholder="Name*" onfocus="this.placeholder=''" onblur="this.placeholder='Name*'" required>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 form-group wow fadeInUp" data-wow-delay="0.4s">
                                            <input type="email" name="comment_email" class="form-control" placeholder="Email*" onfocus="this.placeholder=''" onblur="this.placeholder='Email*'" required>
                                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 form-group wow fadeInUp" data-wow-delay="0.6s">
                                            <textarea class="form-control" name="comment" placeholder="Comment*" onfocus="this.placeholder=''" onblur="this.placeholder='Comment*'" required></textarea>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 form-group wow fadeInUp" data-wow-delay="0.2s">
                                            <button type="submit" class="sibmit_btn">Submit</button>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 form-group">
                                            <div id="success" style="display: none;">Your message succesfully sent!</div>
                                            <div id="error" style="display: none;">Opps! There is something wrong. Please try again</div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End blog_wrap -->


<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title text-dark" id="ReplyLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('commentSend') }}" method="post">
            @csrf
        <div class="modal-body">
            <div class="row">
            <div class="col-12">
                @if ($errors->any())
                    <div class="form-group form-group-last">
                        <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                            <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                            <div class="alert-text">
                            <ul class="p-3">{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
                            </div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Name:</label>
                  <input type="text" name="comment_name" class="form-control" placeholder="Name*" required>
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Email:</label>
                  <input type="email" name="comment_email" class="form-control" placeholder="Email*" required>
                  <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                  <input type="hidden" name="parent_id" id="parent_id" value="">
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Comment:</label>
                  <textarea class="form-control" name="comment" placeholder="Comment*" id="comment-text"></textarea>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-warning">Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection

@section('extrascript')
@endsection
