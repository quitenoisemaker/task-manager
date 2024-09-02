@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error )
                               <li>{{$error}}</li> 
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                    @csrf 
                    @method('PUT')

                    <div class="form-row p-4">
                        <div class="form-group col-md-12">
                            <input type="hidden" name="project_id" value="{{$task->project_id}}">
                            <label for="project">Project</label>
                            <select id="project" class="form-control" name="project_id">
                            <option selected disabled value="{{$task->project_id}}">{{$task->project->name}}</option>
                            @if (count($projects)>0)
                                @foreach ($projects as $project)
                                    <option value="{{$project->id}}">{{$project->name}}</option>
                                @endforeach
                            @endif
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="{{$task->name}}" name="name" id="name">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="priority">Priority</label>
                            <input type="number" class="form-control" min="0" value="{{$task->priority}}" name="priority" id="priority">
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">Edit task</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection