<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    @auth
        <p>Logged in</p>
        <form action="/logout" method="POST">
            @csrf
            <button>log out</button>
        </form>

        <div style="border: 3px solid black;">
            <h2>Create new post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Post Title">
                <textarea name="body" placeholder="Body Content"></textarea>
                <button>Post</button>
            </form>
        </div>

        <div style="border: 3px solid black;">
            <h2>All posts</h2>
            @foreach($posts as $post)
            <div style="background-color: gray; padding: 10px; margin: 10px;">
                <h3>{{$post['title']}} by {{$post->user->name}}</h3>
                {{$post['body']}}
                <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
        </div>
    @else
        <div style="border: 3px solid black;">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input type="text" name="name" placeholder="name">
                <input type="text" name="email" placeholder="email">
                <input type="password" name="password" placeholder="password">
                <button>Register</button>
            </form>
        </div>

        <div style="border: 3px solid black;">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input type="text" name="loginName" placeholder="name">
                <input type="password" name="loginPassword" placeholder="password">
                <button>Login</button>
            </form>
        </div>
    @endauth
    
</body>
</html>