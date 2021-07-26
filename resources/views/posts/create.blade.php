<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    
    
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <form action="{{route('posts.store')}}" method="POST" role="form" class="form-group">@csrf
                <legend>Create new posts</legend>
            
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" namespace "title" id="" placeholder="Input field">
                </div>
                <div class="form-group">
                    <label for="">Content</label>
                    <input type="text" class="form-control" namespace "content" id="" placeholder="Input field">
                </div>
            
                
            
                <button type="submit" class="btn btn-primary">Create new post</button>
            </form>
            </div>
        </div>
    </div>
    
    


    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>