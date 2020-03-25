@extends('layouts.app')
@section('content')

<header class="flex item-center mb-3 py-4">
    <div class="flex justify-between items-end w-full">
        <p class="text-grey text-sm font-normal">
            <a href="/projects" class="text-grey text-sm font-normal no-underline">My Projects</a>/ {{$project->title}}
        </p>

        <div class="flex items-center">
            @foreach ($project->members as $member)

                <img src="{{ gravatar_url($member->email)}}" alt="{{ $member->name }}'s avatar'" class="rounded-full w-8 mr-2">
           
            @endforeach

                <img src="{{ gravatar_url($project->owner->email)}}" alt="{{ $project->owner->name }}'s avatar'" class="rounded-full w-8 mr-2">


            <a href="{{$project->path().'/edit'}}" class="button ml-4">Edit Project</a>
        </div>    
    </div>    
</header>

<main>
    <div class="lg:flex -mx-3">
        <div class="lg:w-3/4 px-3 mb-6">
            <div class="mb-8">
                <h2 class="text-base text-grey font-normal mb-3">Tasks</h2>

                @foreach ($project->tasks as $task)
                    <div class="card mb-3">
                        <form method="POST" action="{{ $task->path()}}" >
                            @method('PATCH')
                            @csrf
                            <div class="flex">
                                <input value="{{ $task->body }}" name="body" class="w-full {{ $task->completed ? 'text-grey' : ''}}">
                                <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : ''}}>
                            </div> 
                        </form>
                    </div>
                
                                      

                @endforeach

                <div class="card mb-3">
                    <form action="{{$project->path() . '/tasks'}}" method="POST">
                        @csrf
                        <input placeholder="Add a new task..." class="w-full" name="body">
                    </form>
                </div>
                
            </div>
            
            
            <div>
                <h2 class="text-base text-grey font-normal mb-3">General Notes</h2>
                
                <form method="POST" action="{{ $project->path()}}">
                    @method('PATCH')
                    @csrf
                    <textarea
                        name="notes" 
                        class="card w-full mb-4" 
                        style="min-height:200px;" 
                        placeholder="Anything special that you want to make a note off?">{{$project->notes}}
                    </textarea>
                    <button type="submit" class="button">Save</button>
                </form>

                
            </div>
        </div>
        <div class="lg:w-1/4 px-3">
            @include('projects.card')

            @include('projects.activity.card')
        </div>
    </div>
</main>
    

@endsection