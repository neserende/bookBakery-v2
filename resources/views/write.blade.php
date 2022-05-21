@extends('layouts.app')

@section('stylesToAdd')
<script src="https://cdn.tiny.cloud/1/tpgzxi147pmst9k3pc4f3d3zaal228jaol0bzni901g7t09e/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <link rel="stylesheet" href="{{ URL::asset('css/write.css') }}">
@endsection

@section('navbar-content')
<li class="nav-item">
    <a class="nav-link active" href="/home">My Books</a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="/mybooks/{{$book->id}}">Write</a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="/mybooks/publish/{{$book->id}}">Publishing Support</a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="/mybooks/help">Help</a>
</li>
@endsection

@section('content')

<div class="d-flex flex-column align-items-stretch flex-shrink-0 col-3" id="chaptersScroll" style="width: 20%">
        <div class="d-flex align-items-center flex-shrink-0 p-3 text-decoration-none border-bottom">
            <span class="fs-5 fw-semibold">{{$book->title}}</span>
            <button class="btn btn-outline-dark mx-3" data-bs-toggle="modal" data-bs-target="#addChapterModal">
                <i class="bi bi-plus text-end" width=20px></i>+Add chapter
            </button>
        </div>
        <div class="list-group list-group-flush border-bottom scrollarea" id="chapterList">
            @foreach($chapterTitles as $chapterNumber => $chapterTitle)
                <a href="javascript:void(0)" 
                   onclick="selectedChapter(this); displayChapter({{$book->id}});" 
                    class="list-group-item list-group-item-action py-3 lh-tight"
                    data-chapter="{{$chapterNumber}}"
                >
                    <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">Chapter {{$chapterNumber}}</strong>
                    </div>
                    <div class="col-10 mb-1 small">{{$chapterTitle}}</div>
                </a>
            @endforeach
        </div>
    </div>

<textarea id="tinyEditorTextArea">
     Start writing!
  </textarea>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'image autolink lists media table',
      toolbar: 'casechange checklist code image editimage pageembed',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      statusbar: false, 
      width: '60%'
    });
  </script>



    <div class="d-flex flex-column align-items-stretch flex-shrink-0" id="notesScroll" style="width: 25%;">
        <a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
        <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-5 fw-semibold">Notes</span>
        </a>
        <div class="list-group list-group-flush border-bottom scrollarea">
              
        <a href="#" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
            <div class="d-flex w-100 align-items-center justify-content-between">
            <strong class="mb-1">List group item heading</strong>
            <small class="text-muted">Wed</small>
            </div>
            <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div>
        </a>
        <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
            <div class="d-flex w-100 align-items-center justify-content-between">
            <strong class="mb-1">List group item heading</strong>
            <small class="text-muted">Tues</small>
            </div>
            <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div>
        </a>
        <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
            <div class="d-flex w-100 align-items-center justify-content-between">
            <strong class="mb-1">List group item heading</strong>
            <small class="text-muted">Mon</small>
            </div>
            <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div>
        </a>
        </div>
    </div>

    <!-- Add Chapter Modal -->
    <div class="modal fade" id="addChapterModal" tabindex="-1" aria-labelledby="addChapterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addChapterModalLabel">Add New Chapter</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="addChapterForm" method="POST">
                @csrf
                <div class="form-group">
                    <label for="add_chapter_title">Chapter title:</label>
                    <input type="text" class="form-control" id="add_chapter_title" name="add_chapter_title">
                </div>                
                <br>
                <button type="button" onclick="createNewChapter({{$book->id}})" class="btn btn-primary">Save</button>
            </form>
        </div>
        </div>
    </div>
    </div>

    <script>
        var headers = {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

        function selectedChapter(e){
            $("body").data("selectedChapter", $(e).data("chapter"));
        }

        function displayChapter(book_id){
            let chapter_no = $("body").data("selectedChapter");
            $.ajax({
                url: '/mybooks/' + book_id + '/' + chapter_no,
                type: 'get',
                headers: headers,
                data: {
                    _token: $("input[name= _token]").val()
                },
                success: function(response){
                    console.log(response.chapter_content);
                    tinymce.activeEditor.setContent(response.chapter_content);
                }              
            });
        }

        function createNewChapter(book_id){
            let title = $("#add_chapter_title").val();
            console.log("this is the title:" + title);
            $.ajax({
                url: '/mybooks/' + book_id + '/addChapter',
                type: 'post',
                headers: headers,
                data: {
                    _token: $("input[name= _token]").val(), 
					title: title
                },
                success: function(response){
                    console.log(response.status);
                    $("#chapterList").append(
                        '<a href="javascript:void(0)" onclick="selectedChapter(this); displayChapter(' 
                        + book_id + ');" class="list-group-item list-group-item-action py-3 lh-tight" data-chapter="' 
                        + response.chapter_no + '"><div class="d-flex w-100 align-items-center justify-content-between"><strong class="mb-1">Chapter'
                        + response.chapter_no + '</strong></div><div class="col-10 mb-1 small">' 
                        + response.chapter_title + '</div></a>'
                    );
                    $("#addChapterForm")[0].reset();
					$("#addChapterModal").modal('hide');
                }
            });
        }

        function saveChapterBody(){

            let book_id = 1;
            let chapter_id = $("body").data("selectedChapter");
            console.log("This is the content:\n" + tinymce.activeEditor.getContent());
            $.ajax({
                url: '/mybooks/' + book_id + '/' + chapter_id + '/updateChapterBody',
                type: 'post',
                headers: headers,
                data: {
                    _token: $("input[name= _token]").val(), 
					body: tinymce.activeEditor.getContent()
                },
                success: function(response){
                    console.log(response.status);
                },
                complete:function(){
                setTimeout(saveChapterBody,30000);
                }
            });
        }

        $(document).ready(function(){
            setTimeout(saveChapterBody,30000);
            $("body").data("selectedChapter", 1);
            let book_id = 1;
            displayChapter(book_id);
        });
    </script>
@endsection