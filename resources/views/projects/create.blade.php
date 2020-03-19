@extends('layouts.app')
@section('content')
    
<form method="POST" action="/projects">
    @csrf
    <h1 class="heading is-1">Create a project</h1>
    <div class="field">
        <label class="label" for="title">Title</label>
        <div class="control">
            <input type="text" name="title" class="input" placeholder="Title">
        </div>
    </div>
    <div class="field">
        <label for="description" class="label">Description</label>
        <div class="control">
            <textarea name="description" class="textarea" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">Create Project</button>
            <a href="/projects">Cancel</a>
        </div>
    </div>
</form>
@endsection