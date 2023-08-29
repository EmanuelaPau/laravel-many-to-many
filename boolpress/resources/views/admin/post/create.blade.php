@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <form enctype="multipart/form-data" class="" action="{{ route('admin.posts.store') }}" method="POST">
                @csrf
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleInputTitle" class="form-label"><strong>Title</strong></label>
                    <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="title" name="title" placeholder="Write here your title"  value="{{ old('title', '') }}">
                </div>
                @error('author')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="author" class="form-label"><strong>Author Name</strong></label>
                    <input type="text" class="form-control" id="exampleAuthor" name="author" placeholder="write here author name"  value="{{ old('author', '') }}">
                </div>

                    @error('type_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                {{-- @dd('$type->id') --}}
                <div class="mb-3">
                    <label for="type_id" class="form-label">
                        <strong>Category</strong>
                    </label>
                    <select class='form-select' name="type_id" id="type_id">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                @error('technologies_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="technologies_id" class="form-check-label me-3">
                        <strong>Technologies</strong>
                    </label>
                    {{-- @dump($technologies) --}}
                        @foreach ($technologies as $technology)
                            <input type="checkbox" name="technologies[]" class="form-check-input" id="technologies" value="{{$technology->id}}"  @if( in_array($technology->id, old('technologies', []))) checked @endif>
                            <label for="technologies" class="form-check-label">
                                {{$technology->name}}
                                {{-- @dump($technology) --}}
                            </label>
                        @endforeach
                </div>

                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="image" class="form-label"><strong>Image link</strong></label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="upload here your image" value="{{ old('image', '') }}">
                </div>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="content" class="form-label"><strong>Content</strong></label>
                    <textarea name="content" id="content" cols="20"  class="form-control" rows="15" placeholder="write here your content"  value="">{{ old('content', '') }}</textarea>
                </div>
                
                <button  type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection
