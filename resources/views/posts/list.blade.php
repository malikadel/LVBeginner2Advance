<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{asset('assets/css/toast.style.css')}}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Posts Table</title>
</head>
<body>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-6 offset-3">
                @if (session('status'))
                    <div class="alert alert-danger">
                        <emp>{{ session('status') }}</emp>
                    </div>
                    <script>
                        function addToast() {
                            $.Toast("test", "this is a test message.", "success", {
                                has_icon: true,
                                has_close_btn: true,
                                stack: true,
                                fullscreen: false,
                                timeout: 3000,
                                sticky: false,
                                rtl: false,
                            });
                        }
                        $(document).ready(function(){
                            addToast();
                        });

                    </script>
                @endif
            </div>
        </div>
        <div class="row mt-5 pt-5">
            <div class="col-6 offset-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Published</th>
                            <th scope="col">Active</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->title }}</th>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->is_published == 1 ? 'Yes' : 'No' }}</td>
                                <td>{{ $post->is_active = 1 ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="show/{{ $post->id }}" class="btn btn-success btn-sm" style="display:inline;">View</a>
                                    <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-info btn-sm" style="display:inline;">Edit</a>
                                    <form method="post" action="{{ route('posts.destroy',$post->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm">
                                            X
                                        </button>
                                    </form>                              
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $posts->links()}}
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/toast.script.js') }}"></script>

</body>
</html>