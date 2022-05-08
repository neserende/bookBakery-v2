@extends('layouts.app')

@section('stylesToAdd')
<link rel="stylesheet" href="{{ URL::asset('css/publish.css') }}">
@endsection

@section('navbar-content')
<li class="nav-item">
    <a class="nav-link active" href="/home">My Books</a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="/mybooks/2">Write</a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="/mybooks/format/book1">Format</a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="/publish">Publishing Support</a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="/mybooks/help">Help</a>
</li>
@endsection

@section('content')
<div class="row mb-2">
    <div class="col-md-3">
        <div class="fs-5 mt-2" >Download button here</div>
    <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" id="notesScroll">
        <a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
        <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-5 fw-semibold">A few things to consider before publishing:</span>
        </a>
        <div class="list-group list-group-flush border-bottom scrollarea">
        <a href="#" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="false">
            <div class="d-flex w-100 align-items-center justify-content-between">
            <strong class="mb-1">ISBN</strong>
            </div>
            <div class="col-10 mb-1 small">More info</div>
        </a>
        <a href="#" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="false">
            <div class="d-flex w-100 align-items-center justify-content-between">
            <strong class="mb-1">Is your summary good?</strong>
            </div>
            <div class="col-10 mb-1 small">More info</div>
        </a>
        
        </div>
    </div>
    </div>
    <div class="col-md-9">
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Filler Text</strong>
                        <h3 class="mb-0">Publisher Name</h3>
                        <p class="card-text mb-auto">This is information about the publisher. To learn more...</p>
                        <a href="#" class="stretched-link">More</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="{{ URL::asset('images/book-plant.jpg') }}" alt="" class="bd-placeholder-img" width="200" height="250" preserveAspectRatio="xMidYMid slice" focusable="false">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Amazon</strong>
                        <h3 class="mb-0">Kindle Direct Publishing</h3>
                        <p class="card-text mb-auto">This is information about the publisher. To learn more...</p>
                        <a href="#" class="stretched-link">More</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="{{ URL::asset('images/book-plant.jpg') }}" alt="" class="bd-placeholder-img" width="200" height="250" preserveAspectRatio="xMidYMid slice" focusable="false">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Filler Text</strong>
                        <h3 class="mb-0">Publisher Name</h3>
                        <p class="card-text mb-auto">This is information about the publisher. To learn more...</p>
                        <a href="#" class="stretched-link">More</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="{{ URL::asset('images/book-plant.jpg') }}" alt="" class="bd-placeholder-img" width="200" height="250" preserveAspectRatio="xMidYMid slice" focusable="false">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Amazon</strong>
                        <h3 class="mb-0">Kindle Direct Publishing</h3>
                        <p class="card-text mb-auto">This is information about the publisher. To learn more...</p>
                        <a href="#" class="stretched-link">More</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="{{ URL::asset('images/book-plant.jpg') }}" alt="" class="bd-placeholder-img" width="200" height="250" preserveAspectRatio="xMidYMid slice" focusable="false">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">XXXXXXXXX</strong>
                        <h3 class="mb-0">Publisher Name</h3>
                        <p class="card-text mb-auto">This is information about the publisher. To learn more...</p>
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#publisher1modal" class="btn btn-link stretched-link">
                            More
                        </button>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="{{ URL::asset('images/book-plant.jpg') }}" alt="" class="bd-placeholder-img" width="200" height="250" preserveAspectRatio="xMidYMid slice" focusable="false">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Amazon</strong>
                        <h3 class="mb-0">Kindle Direct Publishing</h3>
                        <p class="card-text mb-auto">This is information about the publisher. To learn more...</p>
                        <a href="#" class="stretched-link">More</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="{{ URL::asset('images/book-plant.jpg') }}" alt="" class="bd-placeholder-img" width="200" height="250" preserveAspectRatio="xMidYMid slice" focusable="false">
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</div>
  
  <!-- Book Info Modal -->
    <div class="modal fade" id="publisher1modal" tabindex="-1" aria-labelledby="publisher1modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="publisher1modalLabel">Book Title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p id="bookAuthor">Author name</p>
            <p id="bookSummary">Summary</p>
        </div>
        <div class="modal-footer">
            <a href="/publisher1link" class="btn btn-info text-light">Publish on Publisher1<a/>
        </div>
        </div>
    </div>
    </div>
@endsection
