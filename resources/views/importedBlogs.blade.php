@extends('layouts.app')


@section('content')
    <main class="main-content">
        <section class="post-h">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="grey-bg-large">


                            <div class="break"></div>
                            <h3 class="header">posts</h3>


                            <div>

                                @if(isset($blogs))
                                    @foreach($blogs as $blog)



                                        <div class="comment clearfix">

                                            <div class="comment-content">
                                                <p class="time">{{$blog['publication_date']}}</p>


                                                <p style="color:darkred">{{$blog['title']}}</p>

                                                <p>{{$blog['description']}}</p>


                                            </div>


                                        </div>


                                    @endforeach

                                @endif


                            </div>

                        </div>


                    </div>
                </div>

            </div>
            </div>
        </section>
    </main>

@endsection
