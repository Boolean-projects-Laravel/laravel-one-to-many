@extends('admin.layouts.base')

@section('contents')
<div class="p-5" style="margin-inline: 10rem">
    <h1>Modifica Progetto</h1>
    <form method="POST" action="{{ route('admin.projects.update', ['project' => $project] )}}">
        {{-- Per protezione dati --}}
        @csrf 
        {{-- Per protezione dati --}}
        @method('PUT')

        <div class="mb-3">
            <label 
            for="title" class="form-label" style="font-weight:700; font-size:20px">
                Title
            </label>
            <input 
            type="text" 
            class="form-control @error('title') is-invalid @enderror" 
            id="title" 
            name="title" 
            value="{{ old('title', $project->title)}}">

            <div class="invalid-feedback">
                @error('title') {{ $message }} @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label" style="font-weight:700; font-size:20px">
                Author
            </label>
            <input 
            type="text" 
            class="form-control @error('author') is-invalid @enderror" 
            id="author" 
            name="author" 
            value="{{ old('author', $project->author)}}">

            <div class="invalid-feedback">
                @error('author') {{ $message }} @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="creation_date" class="form-label" style="font-weight:700; font-size:20px">
                Creation Date
            </label>
            <input 
            type="date" 
            class="form-control @error('creation_date') is-invalid @enderror" 
            id="creation_date" 
            name="creation_date" 
            value="{{ old('creation_date', $project->creation_date)}}">
            <div class="invalid-feedback">
                @error('creation_date') {{ $message }} @enderror
            </div>
        </div>


        <div class="mb-3">
            <label for="last_update" class="form-label" style="font-weight:700; font-size:20px">
                Last Update
            </label>
            <input 
            type="date" 
            class="form-control @error('last_update') is-invalid @enderror" 
            id="last_update" 
            name="last_update" 
            value="{{ old('last_update', $project->last_update)}}">
            <div class="invalid-feedback">
                @error('last_update') {{ $message }} @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="collaborators" class="form-label" style="font-weight:700; font-size:20px">
                Collaborators
            </label>
            <input 
            type="text" 
            class="form-control @error('collaborators') is-invalid @enderror" 
            id="collaborators" name="collaborators" value="{{ old('collaborators', $project->collaborators)}}">

            <div class="invalid-feedback">
                @error('collaborators') {{ $message }} @enderror
            </div>
        </div>


        <div class="mb-3">
            <label for="description" class="form-label"style="font-weight:700; font-size:20px">
                Description
            </label>
            <textarea 
            class="form-control @error('description') is-invalid @enderror" 
            id="description" 
            name="description" 
            value="{{ old('description', $project->description)}}" 
            rows="3" 
            >{{ old('description', $project->description) }}
            </textarea>

            <div class="invalid-feedback">
                @error('description') {{ $message }} @enderror
            </div>
        </div>

        
        <div class="mb-3">
            <label for="languages" class="form-label"style="font-weight:700; font-size:20px">
                Languages
            </label>
            <input 
            type="text" 
            class="form-control @error('languages') is-invalid @enderror" 
            id="languages" 
            name="languages" 
            value="{{ old('languages', $project->languages)}}">

            <div class="invalid-feedback">
                @error('languages') {{ $message }} @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="link_github" class="form-label"style="font-weight:700; font-size:20px">
                Link
            </label>
            <input 
            type="url" 
            class="form-control @error('link_github') is-invalid @enderror" 
            id="link_github" 
            name="link_github" 
            value="{{ old('link_github', $project->link_github)}}">

            <div class="invalid-feedback">
                @error('link_github') {{ $message }} @enderror
            </div>
        </div>

        <button class="btn btn-primary" style="font-size: 20px">Salva</button>
    </form>
</div>
    
@endsection