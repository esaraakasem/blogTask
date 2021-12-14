@extends('layouts.app')


@section('content')
    <main class="main-content">
        <section class="post-h">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="grey-bg-large">



                            <h3 class="header">posts</h3>


                            <div>
                                <button>  <a href="/sortDesc?type=myBlogs"> sortDesc</a></button>


                                @if($blogs->isNotEmpty())
                                    @foreach($blogs as $blog)

                                        <div >

                                            <div class="comment clearfix">

                                                <div class="comment-content">
                                                    <p class="time">{{$blog->created_at}}</p>
                                                    <h5><span class="icon"><i class="fa fa-user"></i></span>{{$blog->user->name}}</h5>


                                                    <p  style="color:darkred">{{$blog->title}}</p>

                                                    <p>{{$blog->description}}</p>







                                                </div>




                                            </div>



                                        </div>




                            </div>
                            @endforeach

                            @endif
                        </div>


                    </div>
                </div>

            </div>
            </div>
        </section>
    </main>

@endsection
