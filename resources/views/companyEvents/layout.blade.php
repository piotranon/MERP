<!DOCTYPE html>
<html>

<head>
    <title>MERP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col-3">
                <a class="btn btn-primary" href="{{ route('companyEvents.index') }}"> Index</a>
            </div>
            <div class="col-3">
                <a class="btn btn-secondary" href="{{ route('companyEvents.create') }}"> Create Event</a>
            </div>
            <div class="col-3">
            </div>
        </div>
        @yield('content')
    </div>

</body>

</html>