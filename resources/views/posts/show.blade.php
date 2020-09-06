@extends('layouts.app')

@section('content')
<div class="pl-4 pr-4">

    <div class="row  " style="min-height: 80vh">

        <div class="card w-100">
            <div class="row no-gutters" style="height: 598px;">

                <!-- Card Image -->
                <div class="col-md-8 d-flex justify-content-center h-100 p-4" id="postimage">
                    <img src="{{ asset("storage/$post->image") }}" id="imgpost" class=" w-50 h-100">
                </div>
              


                <div class="col-md-4 h-100">
                    <div class="d-flex flex-column h-100">

                        <!-- Card Header -->
                        <div class="card-header border-0" id="show-info">
                            <div class="d-flex ">
                              
                                    <div class="d-flex justify-content-between w-100">
                                        <div class="d-flex ">
                                            
                                            <a href="/profile/{{$post->user->username}}" style="width: 50px; height: 50px;">
                                                <img src="{{ asset($post->user->profile->getProfileImage()) }}" class="rounded-circle w-100">
                                            </a>
                                            
                                            <div class="">
                                                <a href="/profile/{{$post->user->username}}" class="my-0 ml-3 text-dark text-decoration-none">
                                                <strong> {{ $post->user->name }}</strong>
                                                </a>
                                                <p class="my-0 ml-1 text-dark"> <strong> - Following </strong></p> 
                                                {{-- Post Date --}}
                                                <p class="m-0"><small class="text-muted">{{ strtoupper($post->created_at->diffForHumans()) }}</small></p>    
                                            </div>
                                        </div>
                                        <div> 
                                            <!-- Share Button trigger modal -->
                                            <button type="button" class="btn pl-0 pt-0" data-toggle="modal" data-target="#sharebtn{{$post->id}}">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </button>

                                            <!-- Modal -->
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
                                        </div>
                                        
                                    </div>
                               
                                 
                                
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body px-2" style="overflow-y: auto; overflow-x: hidden;">

                            <!-- Post Caption  -->
                            <div class="row">
                               
                                <div class="col-12 pl-4 pr-4">
                                    <p class="m-0 text-dark">
                                        <a href="/profile/{{$post->user->username}}" class="my-0 text-dark text-decoration-none">
                                            <strong> {{ $post->user->name }}</strong>
                                        </a>
                                        {{ $post->caption }}
                                    </p>
                                </div>
                            </div>
 
                             <hr>

                             
                     

                            @comments(['model' => $post])



                    </div>
                </div>

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
@endsection
