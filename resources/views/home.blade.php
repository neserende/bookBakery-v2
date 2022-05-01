@extends('layouts.app')

@section('stylesToAdd')
  <link rel="stylesheet" href="{{ URL::asset('css/myBooks.css') }}">
@endsection

@section('content')

<div class="container mt-5">
    <div class="p-4 p-md-5 mb-3 text-white rounded bg-dark">
        <div class="row">  
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Daily writing tip</h1>
                <p class="lead my-4">Write what you want to read! 
                    If you yourself wouldn’t pick up the book or story you’re writing and read it with joy, 
                    then you shouldn’t be writing it. </p>
                <p class="lead my-3">  When you create a story that you love yourself, 
                    it comes through in the writing. It’ll read as if the words and your protagonist 
                    and characters as a whole pop off the page instead of lying flat.</p>
            </div>
            <div class="col-md-6 pl-3">
            <img src="{{ URL::asset('images/type.jpg') }}" alt="" width="100%">
        </div>
    </div>
  </div>  
  <div class="row justify-content-between mb-3">
    <div class="col-4 lead">
      x books
    </div>
    <div class="col-4">
      <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addBookModal" id="newBookButton">Add A New Book</button>
    </div>
  </div>
  <div class="row mb-2">
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">Author Name</strong>
          <h3 class="mb-0">Book Name</h3>
          <div class="mb-1 text-muted">12 chapters</div>
          <p class="card-text mb-auto">This is the book summary. It is an important section to get reader's attention on your book.</p>
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
          <strong class="d-inline-block mb-2 text-primary">Author Name</strong>
          <h3 class="mb-0">Book Name</h3>
          <div class="mb-1 text-muted">12 chapters</div>
          <p class="card-text mb-auto">This is the book summary. It is an important section to get reader's attention on your book.</p>
          <button type="submit" data-bs-toggle="modal" data-bs-target="#bookInfoModal" class="btn btn-link stretched-link">More</button>
        </div>
        <div class="col-auto d-none d-lg-block">
            <img src="{{ URL::asset('images/book-plant.jpg') }}" alt="" class="bd-placeholder-img" width="200" height="250" preserveAspectRatio="xMidYMid slice" focusable="false">
        </div>
      </div>
    </div>
    </div>
  </div>

  <!-- Book Info Modal -->
    <div class="modal fade" id="bookInfoModal" tabindex="-1" aria-labelledby="bookInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="bookInfoModalLabel">Book Title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p id="bookAuthor">Author name</p>
            <p id="bookSummary">Summary</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
            <a href="/mybooks/book1" class="btn btn-info text-light">Edit Book<a/>
        </div>
        </div>
    </div>
    </div>


    <!-- Add New Book Modal -->
    <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addBookModalLabel">Add A New Book</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addBookForm" method="POST" action="/mybooks/addBook">
            @csrf
            <div class="form-group">
              <label for="bookName">Title:</label>
              <input type="text" class="form-control" id="bookName" name="bookName">
            </div>
            <div class="form-group">
              <label for="authorName">Author:</label>
              <input type="text" class="form-control" id="authorName" name="authorName">
            </div>
            <div class="form-group">
              <label for="summary">Summary:</label>
              <textarea class="form-control" id="summary" rows="3"></textarea>
            </div>
           
          </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
            <a href="/mybooks/1" class="btn btn-info text-light" type="submit">Start Writing!<a/>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection