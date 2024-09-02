@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h5>Select Projects</h5>

            <div class="card">
             
                <form>
                    <div class="form-row p-4">
                        <div class="form-group col-md-12">
                            <select id="project" class="form-control" name="project_id">
                            <option selected disabled>Select a project to view available tasks</option>
                            @if (count($projects)>0)
                                @foreach ($projects as $project)
                                    <option value="{{$project->id}}">{{$project->name}}</option>
                                @endforeach
                            @endif
                            </select>
                        </div>
                    </div>    
                </form>
                <hr>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Priority</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">  
                        <tr id="no-data" class="text-center"><td colspan="2">No project selected, please select a project</td></tr>              
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    @include('project.script');   
@endsection