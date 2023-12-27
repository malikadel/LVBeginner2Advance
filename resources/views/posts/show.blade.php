<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Post Details</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="mb-3">
                        <label for="postTitle" class="form-label">Post Title</label>
                        <input type="text" name="title" class="form-control" id="postTitle" value="{{ $post->title }}" disabled >
                    </div>
                    <div class="mb-3">
                        <label for="postDisc" class="form-label">Post Description</label>
                        <textarea class="form-control" name="description"  id="postDisc"  rows="3"   minlength="1" maxlength="30000" disabled >{{ $post->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="ispublish" class="form-label">Is Published ? --  {{ $post->is_published }}</label>

                    </div>
                    <div class="mb-3">
                        <label for="isactive" class="form-label">
                            Activation Status ? -- --  {{ $post->is_active }}
                        </label>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>