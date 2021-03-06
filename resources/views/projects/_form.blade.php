@csrf
<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="title">Title</label>
    <div class="control">
        <input 
            type="text" 
            name="title" 
            class="input bg-transparent border border-muted-light rounded p-2 text-xs w-full"
            required                
            value="{{$project->title}}">
    </div>
</div>
<div class="field mb-6">
    <label for="description" class="label text-sm mb-2 block">Description</label>
    <div class="control">
        <textarea name="description"
            rows="10" 
            class="textarea bg-transparent border border-muted-light rounded p-2 text-xs w-full"
            required
            >{{$project->description}}
        </textarea>
    </div>
</div>
<div class="field">
    <div class="control">
        <button type="submit" class="button is-link mr-2">{{$buttonText}}</button>
        <a href="{{ $project->path()}}" class="text-default">Cancel</a>
    </div>
</div>

@if ($errors->any())
    <div class="field mt-6">
        @foreach ($errors->all() as $error)
            <li class="text-sm text-red">{{$error}}</li>
        @endforeach
    </div>
@endif
