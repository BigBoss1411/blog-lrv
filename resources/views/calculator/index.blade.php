<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('calc.calculate') }}" method="POST" role="form">
                    @csrf
                    <legend>Calculator</legend>
                    <div class="form-group">
                        <label for="">Number A</label>
                        <input type="text" class="form-control" id="" placeholder="" name="number_a">
                    </div>

                    <div class="form-group">
                        <label for="">Number B</label>
                        <input type="text" class="form-control" id="" placeholder="" name="number_b">
                    </div>

                    <div class="form-group">
                        <label for="">Operator</label>
                        <select name="operator" id="" class="form-control">
                            <option value="+">Add</option>
                            <option value="-">Sub</option>
                            <option value="*">Mul</option>
                            <option value="/">Div</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Calculate</button>
                </form>
            </div>
        </div>
    </div>

    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
