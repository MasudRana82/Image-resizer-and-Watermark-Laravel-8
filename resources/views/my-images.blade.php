<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
 
    <title>Image Manipulation System</title>
</head>
 
<body>
    <h1 style=" text-align:center;">Image compresser and watermarking software</h1>
    <div class="container mt-4" style="max-width: 600px" >
    
 
        <form action="{{route('image.watermark')}}" enctype="multipart/form-data" method="post">
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
 
 
            <div class="col-md-12 mb-3 text-center">
        
                <img src="/upload/{{ Session::get('fileName') }}" width="600px"/>
            </div>
            @endif
 
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
 
            <div class="mb-3">
                <level>Enter your WaterMark text</level>
                 <input type="text" name="text" class="form-control"  id="forfile">
                 <hr>
                 <level>Upload your Image</level>
                <input type="file" name="file" class="form-control"  id="formFile">
            </div>
 
            <div class="d-grid mt-4">
                <button type="submit" name="submit" class="btn btn-primary">
                    Upload File
                </button>
            </div>
        </form>
    </div>
</body>
 
</html>