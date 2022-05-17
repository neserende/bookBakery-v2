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
    <a class="nav-link active" href="/publish">Publishing Support</a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="/help">Help</a>
</li>
@endsection

@section('content')
<div class="row mb-2">
    <div class="col-md-3">
        <div class="fs-5 mt-2" >Download button here</div>
    <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" id="notesScroll">
        <a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
        <span class="fs-5 fw-semibold">Writing tips for you</span>
        </a>
        <div class="list-group list-group-flush border-bottom scrollarea">
        <a href="https://www.masterclass.com/articles/how-to-write-a-book" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="false">
            <div class="d-flex w-100 align-items-center justify-content-between">
            <strong class="mb-1">How to Write a Book: Complete Step-by-Step Guide</strong>
            </div>
            <div class="col-10 mb-1 small">A step-by-step guide can help new authors overcome the intimidating parts of writing a book...</div>
        </a>
        <a href="https://self-publishingschool.com/how-to-get-an-isbn/" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="false">
            <div class="d-flex w-100 align-items-center justify-content-between">
            <strong class="mb-1">How to get an ISBN?</strong>
            </div>
            <div class="col-10 mb-1 small">Knowing how to get an ISBN as a self-published author is crucial...</div>
        </a>
        <a href="https://alanrinzler.com/2013/10/how-to-grab-delight-or-shock-your-readers-right-from-the-start/" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="false">
            <div class="d-flex w-100 align-items-center justify-content-between">
            <strong class="mb-1">How to grab, delight or shock your readers right from the start</strong>
            </div>
            <div class="col-10 mb-1 small">The first pages of your story create an instant impression of its quality and value...</div>
        </a>
        <a href="https://www.masterclass.com/articles/writing-101-what-is-a-prologue" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="false">
            <div class="d-flex w-100 align-items-center justify-content-between">
            <strong class="mb-1">How to Write a Prologue</strong>
            </div>
            <div class="col-10 mb-1 small">Just as an amuse bouche prepares restaurant diners for a meal...</div>
        </a>
        <a href="https://www.writermag.com/improve-your-writing/fiction/ending-on-a-cliffhanger/#:~:text=Bring%20resolution%20%E2%80%93%20in%20whatever%20form,to%20read%20the%20next%20book" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="false">
            <div class="d-flex w-100 align-items-center justify-content-between">
            <strong class="mb-1">Ending on a cliffhanger</strong>
            </div>
            <div class="col-10 mb-1 small">When you write a book that’s part of a larger arc of conflict...</div>
        </a>
        <a href="https://www.masterclass.com/articles/how-to-write-an-epilogue-for-your-novel" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="false">
            <div class="d-flex w-100 align-items-center justify-content-between">
            <strong class="mb-1">How to Write an Epilogue for Your Novel</strong>
            </div>
            <div class="col-10 mb-1 small">An epilogue is a postscript to a story that follows the final chapter of a book...</div>
        </a>
        <a href="https://gatekeeperpress.com/book-acknowledgements/" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="false">
            <div class="d-flex w-100 align-items-center justify-content-between">
            <strong class="mb-1">Book Acknowledgement Crash Course</strong>
            </div>
            <div class="col-10 mb-1 small">A book acknowledgments page is the perfect setting for an author to express...</div>
        </a>
        </div>
    </div>
    </div>
    <div class="col-md-9">
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Apple Inc.</strong>
                        <h3 class="mb-0">Apple Books</h3>
                        <p class="card-text mb-auto">This is information about the publisher. To learn more...</p>
                        <a href="#" class="stretched-link">More</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="{{ URL::asset('images/apple-books-log.jpg') }}" alt="" class="bd-placeholder-img" width="220" height="220" preserveAspectRatio="xMidYMid slice" focusable="false">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Amazon</strong>
                        <h3 class="mb-0">Kindle Direct Publishing</h3>
                        <p class="card-text mb-auto">This is information about the publisher. To learn more...</p>
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#publisher1modal" class="btn btn-link stretched-link">
                            More
                        </button>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="https://ebooksuccess4free.files.wordpress.com/2012/02/kdp-amazon.jpg?w=584" alt="" class="bd-placeholder-img" width="220" height="220" preserveAspectRatio="xMidYMid slice" focusable="false">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Filler Text</strong>
                        <h3 class="mb-0">Barnes & Noble</h3>
                        <p class="card-text mb-auto">This is information about the publisher. To learn more...</p>
                        <a href="#" class="stretched-link">More</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="{{ URL::asset('images/barnesNoble.jpg') }}" alt="" class="bd-placeholder-img" width="220" height="220" preserveAspectRatio="xMidYMid slice" focusable="false">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Amazon</strong>
                        <h3 class="mb-0">Kobo</h3>
                        <p class="card-text mb-auto">This is information about the publisher. To learn more...</p>
                        <a href="#" class="stretched-link">More</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="{{ URL::asset('images/kobo.png') }}" alt="" class="bd-placeholder-img" width="220" height="220" preserveAspectRatio="xMidYMid slice" focusable="false">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">XXXXXXXXX</strong>
                        <h3 class="mb-0">Draft2Digital</h3>
                        <p class="card-text mb-auto">This is information about the publisher. To learn more...</p>
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#publisher1modal" class="btn btn-link stretched-link">
                            More
                        </button>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="{{ URL::asset('images/d2d.jpg') }}" alt="" class="bd-placeholder-img" width="220" height="220" preserveAspectRatio="xMidYMid slice" focusable="false">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Amazon</strong>
                        <h3 class="mb-0">Smashwords</h3>
                        <p class="card-text mb-auto">This is information about the publisher. To learn more...</p>
                        <a href="#" class="stretched-link">More</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="{{ URL::asset('images/smashwords.jpeg') }}" alt="" class="bd-placeholder-img" width="220" height="220" preserveAspectRatio="xMidYMid slice" focusable="false">
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
            <h5 class="modal-title" id="publisher1modalLabel">Kindle Direct Publishing</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p id="publisherDesc">Self-publish eBooks and paperbacks for free with Kindle Direct Publishing, and reach millions of readers on Amazon.
Get to market fast. Publishing takes less than 5 minutes and your book appears on Kindle stores worldwide within 24-48 hours.</p>
        </div>
        <div class="modal-footer">
            <a href="https://kdp.amazon.com/en_US/" class="btn btn-info text-light">Publish on Kindle<a/>
        </div>
        </div>
    </div>
    </div>
@endsection
