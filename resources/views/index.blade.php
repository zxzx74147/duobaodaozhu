<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @component('head')

    @endcomponent


</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-9" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{{__('config.app_name')}}</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
            <ul class="nav navbar-nav">
                <li><a href="http://duobaodaozhu.com/">{{__('config.home')}}</a></li>
                <li><a href="#">{{__('config.auctioned')}}</a></li>
                <li><a href="#">{{__('config.auctioning')}}</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
</body>
</html>
