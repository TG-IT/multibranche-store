<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload New Logo</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
       
        .center-card {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
<div class="container center-card">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">
                <h2>Upload New Logo</h2>
            </div>
            <div class="card-body">
            <form action="{{ route('admin.logo.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf <!-- CSRF Token -->
                    <div class="form-group">
                        <label for="logo">Choose Logo:</label>
                        <input type="file" name="logo" id="logo" class="form-control-file" accept="image/*">
                    </div>
                    <div class="form-group">
    <label for="title">Enter Text:</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Enter text" value="{{ old('title', session('uploaded_logo_title')) }}">
</div>


                    <button type="submit" class="btn btn-primary btn-block" id="uploadButton">Upload Logo</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
