<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <title>NetClimb</title>
</head>
<body>
    @include('shared.navbar')

    <div class="signup-container">
        <div class="deploy-white-section">
            <img class="github-img" src="{{asset('img/github-2.png')}}" alt="">
        </div>
        <div class="signup-section">
            <h1>Join the best <br> frontend teams</h1>
            <a class="btn-git btn-github" href="{{url('/sign-in/github')}}"> <img src="{{asset('img/ico-github.svg')}}" alt=""> Continue with GitHub</a>
            <a class="btn-git btn-gitlab" href="#"> <img src="{{asset('img/gitlab.svg')}}" alt="">Continue with GitLab</a>
            <a class="btn-git btn-bitbucket" href="#"><img src="{{asset('img/bitbucket.svg')}}" alt="">Continue with BitBucket</a>
        </div>
    </div>

 

    
  
</body>
</html>