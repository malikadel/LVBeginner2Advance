<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Post</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            
        
            <!-- Error bag watching -->
            <div class="row">
                <div class="col-6 offset-3">
                    @if ($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach   
                        </ul>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-6 offset-3">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-6 offset-3">
                    <form class="mt-5" action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="postTitle" class="form-label">Post Title</label>
                            <input type="text" name="title" class="form-control" id="postTitle" value="{{ old('title') }}"  placeholder="Post Title" >
                            <!-- required minlength="3" maxlength="30" -->
                        </div>
                        <div class="mb-3">
                            <label for="postDisc" class="form-label">Post Description</label>
                            <textarea class="form-control" name="description"  id="postDisc"  rows="3"   minlength="1" maxlength="30000">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="ispublish" class="form-label">Want to Publish?</label>
                            <select class="form-select" id="ispublish"  name="is_published"  aria-label="Publish Selector" required>
                                
                                <option value="1" @selected(old('is_published') == 1)>Yes</option>
                                <option value="0"  @selected(old('is_published') == 0)>No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="isactive" class="form-label">Want to activate it?</label>
                            <select class="form-select" id="isactive"  name="is_active"  aria-label="Active Selector" required>
                                <option value="1"  @selected(old('is_active') == 1)>Yes</option>
                                <option value="0" @selected(old('is_active') == 0)>No</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Post</button>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>