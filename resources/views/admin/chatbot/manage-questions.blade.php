@extends('admin.master')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@section('body')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('admin.home')}}">Dashboard</a>
        <span class="breadcrumb-item active">Manage Category</span>
    </nav>
    
    <div class="sl-pagebody">
        
         <div class="card pd-20 pd-sm-40">
            <h3 class="text-center text-success"> {{Session::get('message')}} </h3>
            <div class="container">
                <input class="btn btn-success mt-5" type="button" value="Add Question" data-bs-toggle="modal" data-bs-target="#exampleModal">
                
                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">Questions</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($questions as $question)
                        <tr>
                            <td>{{$question->question}}</td>
                            <td>
                                <form action="{{route('delete-question')}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{$question->question_id}}">
                                    <input onclick="return confirm('Are you sure to delete?')" type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add more questions for this answer</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('chatbot')}}" method="POST">
                                <div class="modal-body">	
                                    @csrf
                                    <input type="hidden" name="answer_id" value="{{$answer->id}}">
                                    <input type="text" name="question[]" placeholder="Enter question" size="45" value="">
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
    @include('admin.include.footer')
</div>
@endsection