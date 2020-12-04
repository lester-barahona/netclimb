<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">
    {{-- <link rel="stylesheet" href="{{asset('css/styles.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('css/styles.min.css')}}">
    <title>NetClimb</title>
</head>
<body>
   
   @include('shared.navbar')

   <div class="p-text-container">
       <h1>Start free.</h1>
       <h1>Then grow with us.</h1>
       <p>NetClimb is the optimal workflow for frontend teams. All-in-one: Static and <br> Jamstack deployment, Serverless Functions, and Global CDN.</p>       
   </div>

   <div class="pricings-container">
       <div class="for-you">
            <h2>For you</h2>
            <div class="card-description card-d-hobby">
                <h4>Hobby</h4>
                <h3>Free, forever</h3>
            </div>
            <div>
                <h4>Deploy From</h4>

                <ul class="deploy-from-list">
                    <li>GitHub personal accounts</li>
                    <li>GitLab personal accounts</li>
                    <li>BitBucket personal accounts</li>
                </ul>

                <a href="" class="btn-black btn-xl btn-in">Deploy for free</a>

            </div>
        </div>    
       <div class="for-your-team">
            <h2>For your team</h2>
            <div class="card-description card-d-pro">
                <h4>Pro</h4>
                <h3>$19/mo per member</h3>
            </div>
            <div class="card-description card-d-enterprice">
                <h4>Enterprice</h4>
                <h3>Suited to your needs</h3>
            </div>
            <div>
                <h4>Deploy From</h4>
                <ul class="deploy-from-list">
                    <li>GitHub personal accounts</li>
                    <li>GitLab personal accounts</li>
                    <li>BitBucket personal accounts</li>
                    <li>Command-Line Interface</li>
                </ul>
                <br>
                <hr>
                <br>
                <h4>Aditional Features</h4>
                <div class="sections-container">
                    <div class="list">
                        <ul class="deploy-from-list aditional-list">
                            <li>Up to 10 Team Members</li>
                            <li>Advanced Invoice Settings</li>
                            <li>Multiple Concurrent Builds</li>
                            <li>Unlimit Websites</li>
                        </ul>

                        <a href="" class="btn-black btn-xl btn-in btn-pro">Start 14 Day Pro Trial</a>
                    </div>
                    <div class="list">
                        <ul class="deploy-from-list aditional-list">
                            <li>Customs Domains</li>
                            <li>Team cooperation</li>
                            <li>Continuous deployment</li>
                            <li>...and much more</li>
                        </ul>

                        <a href="" class="btn-black btn-xl btn-in btn-en">Contact Enterprice</a>
                    </div>
                </div>
                
            </div>
            
       </div>
   
</div>


</body>
</html>   