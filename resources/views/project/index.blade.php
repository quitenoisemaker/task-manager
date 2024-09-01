@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">SN</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count=0;
                        @endphp

                        @if (count($projects)>0)
                            @foreach ($projects as $project)
                            @php
                                $count++;
                            @endphp
                            <tr>
                                <th scope="row">{{ $count }}</th>
                                <td>{{$project->name}}</td>
                                <td>
                                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary btn-sm">View</a>
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