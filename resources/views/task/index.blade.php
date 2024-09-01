@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error )
                               <li>{{$error}}</li> 
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf 
                
                    <div class="form-row p-4">
                        <div class="form-group col-md-12">
                            <label for="project">Project</label>
                            <select id="project" class="form-control" name="project_id">
                            <option selected disabled>Choose project</option>
                            @if (count($projects)>0)
                                @foreach ($projects as $project)
                                    <option value="{{$project->id}}">{{$project->name}}</option>
                                @endforeach
                            @endif
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="priority">Priority</label>
                            <input type="number" class="form-control" min="0" name="priority" id="priority">
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">Add task</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
        <hr>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                @if (session('success-delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('success-delete')}}

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">SN</th>
                            <th scope="col">Date created</th>
                            <th scope="col">Name</th>
                            <th scope="col">Project</th>
                            <th scope="col">Priority</th>                  
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count=0;
                        @endphp

                        @if (count($tasks)>0)
                            @foreach ($tasks as $task)
                            @php
                                $count++;
                            @endphp
                            <tr>
                                <th scope="row">{{ $count }}</th>
                                <td>{{ $task->created_at->format('Y-m-d')}}</td>
                                <td>{{ $task->name}}</td>
                                <td>{{ $task->project->name}}</td>
                                <td>{{ $task->priority}}</td>
                                <td>
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
    
                                </td>
                            </tr>
                            @endforeach
                        @endif      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection