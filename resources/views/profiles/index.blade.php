@extends('layouts.app')

@section('content')
<div class="">
    
    <div class="d-flex p-5">
        <div class="col-4  text-center" id="profilcolor">
            <div class="d-flex flex-column justify-content-center p-4">
                <div class="">
                    @if ($user->stories->count() > 0)
                        <a href="/stories/{{$user->username}}" >
                            <img src="{{ asset($user->profile->getProfileImage()) }}" class="imgshado" width="185px"  >
                        </a>
                    @else
                       <div class="text-center"> <img src="{{ asset($user->profile->getProfileImage()) }}" class="imgshado" width="185px" > </div>
                    @endif
                </div>
                

                <div class="pt-4 ">
                    <div class="d-flex align-items-center justify-content-center">
                     <div class="d-flex flex-column ">
                      <div> 
                          <h1 class="">{{ $user->username }}</h1>
                      </div>

                      <div class="text-center"> 
                           @can('update', $user->profile)
                            <a class="btn btn-outline-secondary mt-3" href="/profile/{{$user->username}}/edit" role="button">
                                Edit Profile
                            </a>
                        @else
                            <follow-button user-id="{{ $user->username }}" follows="{{ $follows }}"></follow-button>
                        @endcan  
                     </div>
                    </div>   

                    </div>
                    <div class="d-flex align-items-center justify-content-center pt-4">
                        <div class="pr-5"><strong> {{ $postCount }} </strong> posts</div>
                        <div class="pr-5"><strong> {{ $followersCount }} </strong> followers</div>
                        <div class="pr-5"><strong> {{ $followingCount }} </strong> following</div>
                    </div>
                    <div class="pt-4 font-weight-bold ">{{ $user->name }}</div>
                    <div>
                        {!! nl2br(e($user->profile->bio)) !!}
                    </div>
                    <div class="font-weight-bold">
                        <a href="{{ $user->profile->website }}" target="_blanc">
                            {{ $user->profile->website }}
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-8">
            <div class="row pt-4 border-top">
                @forelse ($user->posts as $post)
                    <div class="col-4 col-md-4 mb-4 align-self-stretch container2">
                        <a href="/p/{{ $post->id }}" class="testimage">
                            <img class="img border image" height="300" src="{{ asset("storage/$post->image") }}">
                        </a>
                        <div class="middle">
                            <div class="iconshow"><i class="fas fa-icons"></i></div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 d-flex justify-content-center text-muted">
                        <div class="card border-0 text-center bg-transparent" >
                            <img src="{{asset('img/noimage.png')}}" class="card-img-top" alt="...">
                            <div class="card-body ">
                                <h1>No Posts Yet</h1>
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</div>
@endsection