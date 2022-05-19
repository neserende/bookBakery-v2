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
    <a class="nav-link active" href="/mybooks/2">Write</a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="/mybooks/publish">Publishing Support</a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="/mybooks/help">Help</a>
</li>
@endsection

@section('content')

<div class="d-flex flex-column align-items-stretch flex-shrink-0 col-3" id="chaptersScroll" style="width: 20%">
        <div class="d-flex align-items-center flex-shrink-0 p-3 text-decoration-none border-bottom">
            <span class="fs-5 fw-semibold">{{$book->title}}</span>
            <button class="btn btn-outline-dark mx-3" onclick="createNewChapter({{$book->id}});"><i class="bi bi-plus text-end" width=20px></i>+Add chapter</button>
        </div>
        <div class="list-group list-group-flush border-bottom scrollarea">
            @foreach($chapterTitles as $chapterNumber => $chapterTitle)
                <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
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
      plugins: 'advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
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

    <script>
        var headers = {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }


        function createNewChapter($book_id){
            
        }
        function saveChapterBody(){

            let book_id = 2;
            let chapter_id = 2;
            console.log("This is the content:\n" + tinymce.activeEditor.getContent());
            $.ajax({
                url: '/mybooks/' + book_id + '/' + chapter_id + '/updateChapterBody',
                type: 'post',
                headers: headers,
                data: {
                    _token: $("input[name= _token]").val(), 
					body: tinymce.activeEditor.getContent()
                },
                success: function(){
                // Perform operation on return value
                //
                },
                complete:function(){
                setTimeout(saveChapterBody,30000);
                }
            });
        }

        $(document).ready(function(){
            setTimeout(saveChapterBody,30000);
        });
    </script>
@endsection