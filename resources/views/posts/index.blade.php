@extends('layouts.app')

@section('content')
<div class="container">
  

    {{-- Slide --}}
   <h5 class='text-secondary'>Suggestions For You</h5>
    <div class="container px-5 mb-4 slidecolor">
      

        {{-- <hr class=""> --}}

        <!--Carousel Wrapper-->
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

        <!--Controls-->
        {{-- <div class="controls-top">
            <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
            <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
        </div> --}}
        <!--/.Controls-->
        
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
            <li data-target="#multi-item-example" data-slide-to="1"></li>
            <li data-target="#multi-item-example" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->

        <!--Slides-->
        <div class="carousel-inner" role="listbox">




            <!-- Suggestion Profiles-->           
                        <div class="carousel-item active">
                                <div class="row">
                                @foreach ($sugg_users as $sugg_user)
                                    @if ($loop->iteration == 7)
                                        @break
                                    @endif
                                    <div class="m-4">
                                    <div class="zoom1 containerslide">
                                        <a href="/profile/{{$sugg_user->username}}" style="width: 32px; height: 32px;">
                                        <img class="rounded-circle imageslide" width="100px" src="{{ asset($sugg_user->profile->getProfileImage()) }}"
                                            alt="Card image cap">
                                            
                                        <div class="middleslide">
                                            <div class="textslide">{{ $sugg_user->name}}</div>
                                        </div>
                                        </a>
                                        
                                    </div>
                                    </div>
                                @endforeach 
                                </div>
                        </div>
            <!--Second slide-->
            <div class="carousel-item">

                <div class="row">
                    @foreach ($sugg_users as $sugg_user)
                @if ($loop->iteration  < 13)
                        @continue
                    @endif
                    <div class="m-4">
                    <div class="zoom1 containerslide">
                        <a href="/profile/{{$sugg_user->username}}" style="width: 32px; height: 32px;">
                            <img class="rounded-circle imageslide" width="100px" src="{{ asset($sugg_user->profile->getProfileImage()) }}"
                            alt="Card image cap">
                            <div class="middleslide">
                                <div class="textslide">{{ $sugg_user->name}}</div>
                            </div>
                        </a>
                    </div>
                    </div>
                    @if ($loop->iteration > 17)
                        @break
                    @endif
                    @endforeach 
                </div>
            </div>
            <!--/.Second slide-->

            <!--Third slide-->
            <div class="carousel-item">
                <div class="row">
                    @foreach ($sugg_users as $sugg_user)
                    @if ($loop->iteration  < 7)
                        @continue
                    @endif
                    <div class="m-4">
                    <div class="zoom1 containerslide">
                        <a href="/profile/{{$sugg_user->username}}" style="width: 32px; height: 32px;">
                            <img class="rounded-circle imageslide" width="100px" src="{{ asset($sugg_user->profile->getProfileImage()) }}"
                            alt="Card image cap">
                             <div class="middleslide">
                                <div class="textslide">{{ $sugg_user->name}}</div>
                            </div>
                        </a>
                    </div>
                    </div>
                    @if ($loop->iteration > 11)
                        @break
                    @endif
                    @endforeach 
                </div>
            </div>
            <!--/.Third slide-->

        </div>
        <!--/.Slides-->

        {{-- <hr class=""> --}}
        </div>
        <!--/.Carousel Wrapper-->


    </div>

    {{-- end slide --}}
    <div class="row justify-content-center">

        {{-- Main section --}}
        <div class="col-md-8 px-2">

            @forelse ($posts as $post)

                @php
                    $state=false;
                @endphp

                <div class="card mx-auto custom-card mb-5" id="prova">
                    <!-- Card Header -->
                    <div class="card-header d-flex justify-content-between align-items-center bg-white px-3 py-3">
                        <div class="d-flex align-items-center">
                            <a href="/profile/{{$post->user->username}}" style="width: 32px; height: 32px;">
                                <img src="{{ asset($post->user->profile->getProfileImage()) }}" class="rounded-circle w-100">
                            </a>
                            <a href="/profile/{{$post->user->username}}" class="my-0 ml-3 text-dark text-decoration-none">
                                {{ $post->user->name }}
                            </a>
                        </div>
                        <div class="card-dots">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-link text-muted" data-toggle="modal" data-target="#post{{$post->id}}">
                                <i class="fas fa-ellipsis-h"></i>
                                
                            </button>

                            <!-- Dots Modal -->
                            <div class="modal fade" id="post{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <ul class="list-group">
                                        <a href="/p/{{ $post->id }}"><li class="btn list-group-item">Go to post</li></a>
                                        <a href="#"><li class="btn list-group-item" data-dismiss="modal">Cancel</li></a>
                                    </ul>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Image -->
                    <img class="card-img" src="{{ asset("storage/$post->image") }}" alt="post image" style="max-height: 767px">

                    <!-- Card Body -->
                    <div class="px-4 ">

                        <div class="d-flex flex-row justify-content-between my-2">
                            <form method="POST" action="{{url()->action('LikeController@update2', ['like'=>$post->id])}}">
                                @csrf
                                @if (true)
                                    <input id="inputid" name="update" type="hidden" value="1">
                                @else
                                    <input id="inputid" name="update" type="hidden" value="0">
                                @endif

                                @if($post->like->isEmpty())
                                    <button type="submit" class="btn pl-0">
                                        <i class="far fa-heart fa-2x"></i>
                                    </button>
                                @else

                                    @foreach($post->like as $likes)

                                        @if($likes->user_id==Auth::User()->id && $likes->State==true)
                                            @php
                                                $state=true;
                                            @endphp
                                        @endif

                                    @endforeach

                                    @if($state)
                                        <button type="submit" class="btn pl-0">
                                            <i class="fas fa-heart fa-2x" style="color:red"></i>
                                        </button>
                                    @else
                                        <button type="submit" class="btn pl-0">
                                            <i class="far fa-heart fa-2x"></i>
                                        </button>
                                    @endif

                                @endif

                                <a href="/p/{{ $post->id }}" class="btn pl-0">
                                    <i class="far fa-comment fa-2x"></i>
                                </a>

                                <!-- Share Button trigger modal -->
                                <button type="button" class="btn pl-0 pt-0" data-toggle="modal" data-target="#sharebtn{{$post->id}}">
                                    <svg aria-label="Share Post" class="_8-yf5 " fill="#262626" height="22" viewBox="0 0 48 48" width="21"><path d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 3.1.3 3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 22.6c.1.6.6 1 1.2 1.1h.2c.5 0 1-.3 1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 6.1h35.5L18 18.7 5.2 6.1zm18.7 33.6l-4.4-18.4L42.4 8.6 23.9 39.7z"></path></svg>
                                </button>

                                <!-- Share Modal -->
                                <div class="modal fade" id="sharebtn{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <ul class="list-group">
                                            <li class="list-group-item" style="position: absolute; left: -1000px; top: -1000px">
                                                <input type="text" value="http://localhost:8000/p/{{ $post->id }}" id="copy_{{ $post->id }}" />
                                            </li>
                                            <li class="btn list-group-item" data-dismiss="modal" onclick="copyToClipboard('copy_{{ $post->id }}')">Copy Link</li>
                                            <li class="btn list-group-item" data-dismiss="modal">Cancel</li>
                                        </ul>
                                    </div>
                                    </div>
                                </div>

                            </form>
                             <p class="card-text text-muted">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                        

                            <!-- Likes -->
                            @if (count($post->like->where('State',true)) > 0)
                                <h6 class="card-title">
                                    <strong>{{ count($post->like->where('State',true)) }} likes</strong>
                                </h6>
                            @endif

                            {{-- Post Caption --}}
                            <p class="card-text my-2">
                                <a href="/profile/{{$post->user->username}}" class="my-0 text-dark text-decoration-none">
                                    <strong>{{ $post->user->name }}</strong>
                                </a>
                                {{ $post->caption }}
                            </p>

                            <!-- Comment -->
                             @comments(['model' => $post]) 
                            <!-- Created At  -->
                           
                       
                    </div>

                   
                    

                </div>

            @empty

                <div class="d-flex justify-content-center p-3 py-5 border bg-white">
                    <div class="card border-0 text-center">
                        <img src="{{asset('img/nopost.png')}}" class="card-img-top" alt="..." style="max-width: 330px">
                        <div class="card-body ">
                            <h3>No Post found</h3>
                            <p class="card-text text-muted">We couldn't find any post, Try to follow someone</p>
                        </div>
                    </div>
                </div>

            @endforelse

            {{-- <example-component></example-component> --}} <!-- Testin Infinite scrooling with vue -->

        </div>

        {{-- Aside Section --}}
        <div class="col-md-4 h-100 py-3 bg-white">
            <!-- User Info -->
            <div class="d-flex align-items-center mb-3">
                <a href="/profile/{{Auth::user()->username}}" style="width: 56px; height: 56px;">
                    <img src="{{ asset(Auth::user()->profile->getProfileImage()) }}" class="rounded-circle w-100">
                </a>
                <div class='d-flex flex-column pl-3'>
                    <a href="/profile/{{Auth::user()->username}}" class='h6 m-0 text-dark text-decoration-none' >
                        <strong>{{ auth()->user()->username }}</strong>
                    </a>
                    <small class="text-muted ">{{ auth()->user()->name }}</small>
                </div>
            </div>

            <!-- Suggestions -->
            <div class='mb-4'>
            

                    <div class='text-center' style='color: #797B76;'>
                       In this projet I am going to build an Instagram-Based with Laravel and Boostrap 😄.
                     </div>  

            </div>

            <!-- CopyRight -->
            <div class="text-center">
                <span style='color: #a6b3be;'>© 2020| Instagram building by ❤. <a href=""> SaraOuldjelloul </a></span>
            </div>
        </div>

    </div>

</div>
@endsection


@section('exscript')
    <script>
        function copyToClipboard(id) {
            var copyText = document.getElementById(id);
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
        }
    </script>

    {{-- <script>

        document.addEventListener('submit', function(e){
            e.preventDefault()
            console.log('script run... ');
            var btn = e.submitter;
            console.log(btn.name)

            if (btn.name === 'liked'){
                btn.classList.toggle('text-danger');
                btn.value = !(btn.value == 'true');
            }

        })

            " action="{{url()->action('PostsController@updatelikes', ['post'=>$post->id])}}">
            url =  http://localhost:8000/p/{post}
            (async () => {
                const rawResponse = await fetch('http://localhost:8000/p/', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({a: 1, b: 'Textual content'})
                });
                const content = await rawResponse.json();

                console.log(content);
            })();

    </script> --}}
@endsection