@extends('layouts.main')

@section('content')

<div class="flex justify-center flex-column g-3 align-items-center">
    <h1 class="text-white my-3">Youbook All In one place</h1>
    <!-- Button trigger modal -->
    <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-content-between rounded-full">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15" stroke="#ef4444" stroke-width="1.5" stroke-linecap="round"></path> <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#ef4444" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
        </div>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add A Book</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post"  action="{{route('books')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Title</span>
                            <input type="text" class="form-control" placeholder="Book Title" name="title" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="inputGroupFile02" name="upload">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="More Info" id="floatingTextarea2" name="description" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Further Info</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn text-white" style="background: #ef4444" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" name="submit" class="btn text-white" style="background: #00048f">Add Book</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

</div>

<div class="mt-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
        @foreach($articles as $article)
        <div role="button" class="scale-100 p-6   dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500 ">
            <div class="row">
                <div class="d-flex ">
                    <div >
                        <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                            <img src="storage/{{$article->image}}" alt="book image"/>
                        </div>

                        <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{$article->title}}</h2>

                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            {{$article->description}}
                        </p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </div>
                </div>
                <div class="align-self-end my-4 d-flex">
                    <form action="{{route('delete.book', $article->id)}}" method="post" class="mx-3">
                        @method('DELETE') @csrf
                        <button type="submit" class="d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ef4444" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                            </svg>

                        </button>
                    </form>
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal{{$article->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ef4444" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                            </svg>
                        </button>

                    <a href="{{route('books.show', ['id' => $article->id]) }}" class="mx-3" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ef4444" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
            <div class="modal fade" id="exampleModal{{$article->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Book</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('update.book', $article->id)}}" method="post" class="mx-3">
                                @method('PUT')
                                @csrf
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Title</span>
                                    <input type="text" class="form-control" placeholder="Book Title" name="title" aria-label="Username"   value="{{$article->title}}" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile02" name="upload" value="{{$article->image}}">
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="More Info" id="floatingTextarea2" name="description" style="height: 100px">
                                        {{$article->description}}
                                    </textarea>
                                    <label for="floatingTextarea2">Further Info</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn text-white" style="background: #ef4444" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="saveBook" class="btn text-white" style="background: #00048f">Save Book</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>
</div>
</div>
@endsection

