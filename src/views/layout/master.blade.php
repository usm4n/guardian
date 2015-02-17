<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guardian: RBAC Mangement Package For Laravel</title>
    {!!app('html')->style('packages/usm4n/guardian/assets/css/bootstrap.css')!!}
    {!!app('html')->style('packages/usm4n/guardian/assets/css/style.css')!!}
    {!!app('html')->style('packages/usm4n/guardian/assets/css/selectize.bootstrap3.css')!!}
</head>
<body>
<div class="container">
    <header id = "header">
        <div class="jumbotron">
            <h1>Guardian: RBAC Management Package For Laravel</h1>
            <p>by Usman Riaz <a class="btn btn-primary" href="http://www.codeheaps.com" target="_blank">Visit Blog</a></p>
        </div>
    </header>
    <div class="row">
        <div class="col-md-3 sidebar">
                @include('guardian::partials.sidebar')
        </div>
        <div class="col-md-9 content">
                @yield('content')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <footer>
                <div class="text-center">
                    <p>&copy; 2014 <a href="http://www.github.com/usm4n">Usman Riaz</a> - Released under MIT license.</p>
                </div>
            </footer>
        </div>
    </div>
</div>
{!! app('html')->script('packages/usm4n/guardian/assets/js/jquery.js') !!}
{!! app('html')->script('packages/usm4n/guardian/assets/js/selectize.min.js') !!}
{!! app('html')->script('packages/usm4n/guardian/assets/js/bootstrap.min.js') !!}
{!! app('html')->script('packages/usm4n/guardian/assets/js/app.js') !!}
</body>

</html>