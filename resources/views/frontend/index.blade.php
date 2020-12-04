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
    <link rel="stylesheet" href="{{asset('css/styles.min.css')}}">
    <title>NetClimb</title>
</head>
<body>
   
   @include('shared.navbar')

    <div class="hero">
        <span class="hero-animate-text text-1" data-text="Deploy.">Deploy.</span>
        <span class="hero-animate-text text-2" data-text="Manages.">Manages.</span>
        <span class="hero-animate-text text-3" data-text="Share.">Share.</span>
        <div class="hero-btns-container">
            <a href="#" class="btn-black btn-xl">Start Deploying</a>
            <div class="btn-pricing-container">
            <a href="{{route('pricing')}}" class="btn-ghost btn-xl">Pricing  </a><span class="material-icons arrow">east</span>
          </div>
          </div>
        <p class="gray-text-info">NetClimb combines the best developer experience with an obsessive focus on end-user performance.
            Our platform enables frontend teams to do their best work.</p>
    </div>

    <section class="section-explore">
        <small>Explore the NetClimb Way</small>
        <span class="bar bar-1"></span>
        <span class="ball-number ball-1">1</span>
        <span class="step-text step1-text">Deploy</span>
        <h4>Start with the deployment</h4>
    </section>

    <div class="deploy-description-container">
        <div class="deploy-text-container">
            <h2>Easy <br> Deployment.</h2>
            <p>Deploying your application has never been so easy before, drag and drop your build folder or select your GitHub repository.</p>
           <div class="ico-container">
            <img src="{{asset('img/ico-folder.svg')}}" class="ico-folder" alt="">
            <img src="{{asset('img/ico-github.svg')}}" class="ico-github" alt="">
          </div>
        </div>
        <div class="deploy-white-section">
            <img class="github-img" src="{{asset('img/github.png')}}" alt="">
        </div>
    </div>

    <div class="tecnologies-container">
        <p class="gray-text-info">NetClimb supports multyple modern JS Frameworks</p>
        <div class="imgs-container">
         <img src="{{asset('img/next-dot-js.svg')}}" alt="nextjs">
         <img src="{{asset('img/nuxt-dot-js.svg')}}" alt="nuxtjs">
         <img src="{{asset('img/gatsby.svg')}}" alt="gatsbyjs">
         <img src="{{asset('img/react.svg')}}" alt="reactjs">
         <img src="{{asset('img/vue-dot-js.svg')}}" alt="vuejs">
         <img src="{{asset('img/angular.svg')}}" alt="angular">
         <img src="{{asset('img/svelte.svg')}}" alt="sveltejs">
        </div>
        <p class="gray-text-info">And More!</p>
    </div>

    <section class="section-explore">
        <small>Manage your sites easily</small>
        <span class="bar bar-2"></span>
        <span class="ball-number ball-2">2</span>
        <span class="step-text step2-text">Manages</span>
        <br>
        <p class="gray-text-info">NetClimb is the best place to deploy any frontend app. Start by deploying with zero configuration to our global edge network. Scale dynamically to millions of pages without breaking a sweat an it also gives you a useful management of your sites.</p>
    </section>

 
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="{{asset('img/pages/page1.png')}}" alt="">
          </div>
          <div class="swiper-slide">
            <img src="{{asset('img/pages/page2.png')}}" alt="">
          </div>
          <div class="swiper-slide">
            <img src="{{asset('img/pages/page3.png')}}" alt="">
          </div>
          <div class="swiper-slide">
            <img src="{{asset('img/pages/page1.png')}}" alt="">
          </div>
          <div class="swiper-slide">
            <img src="{{asset('img/pages/page2.png')}}" alt="">
          </div>
          <div class="swiper-slide">
            <img src="{{asset('img/pages/page3.png')}}" alt="">
          </div>
        </div>
      </div>

      <section class="section-explore">
        <small>Share your projects and portafolio</small>
        <span class="bar bar-3"></span>
        <span class="ball-number ball-3">3</span>
        <span class="step-text step3-text">Share</span>
     </section>

    <div class="texts-container">
      <div class="text-section gray-text-info"">Merged changes instantly go live on our global edge network, putting your content as close as possible to your customers. Everything is taken care of for you, from SSL encryption to asset compression and cache invalidation.</div>
      <div class="text-section gray-text-info"">Speed is critical to customers - and for SEO. NetClimb goes beyond just caching static content, scaling to millions of pages through dynamic code execution.</div>
    </div>


    <section class="social-cards-container">
      <article class="card"><img src="{{asset('img/facebook.svg')}}" alt="" class="icon-card"></article>
      <article class="card"><img src="{{asset('img/twitter.svg')}}" alt="" class="icon-card"></article>
      <article class="card"><img src="{{asset('img/instagram.svg')}}" alt="" class="icon-card"></article>
    </section>


    <!-- footer -->
    <div class='footer-container'>
      <section class='footer-subscription'>
       
        <div class='input-areas'>
          <form>
            <input
              class='footer-input'
              name='email'
              type='email'
              placeholder='Your e-mail'
            />
            <a class='btn-black btn-md'>Subscribe</a>
          </form>
        </div>
      </section>
      <div class='footer-links'>
        <div class='footer-link-wrapper'>
          <div class='footer-link-items'>
            <h2>Product</h2>
            <a to='/'>Next.js</a>
            <a to='/'>NetClimb to GitHub</a>
            <a to='/'>NetClimb to GitLab</a>
            <a to='/'>NetClimb to Hugo</a>
            <a to='/'>Integrations</a>
          </div>
          <div class='footer-link-items'>
            <h2>Resources</h2>
            <a to='/'>Documentation</a>
            <a to='/'>Guides</a>
            <a to='/'>Knowledge</a>
            <a to='/'>Blog</a>
          </div>
        </div>
        <div class='footer-link-wrapper'>
          <div class='footer-link-items'>
            <h2>Company</h2>
            <a to='/'>Home</a>
            <a to='/'>About</a>
            <a to='/'>Carrers</a>
            <a to='/'>Pricing</a>
          </div>
          <div class='footer-link-items'>
            <h2>Legal</h2>
            <a to='/'>Privacy Policy</a>
            <a to='/'>Terms of Service</a>
            <a to='/'>TradeMark Policy</a>
            <a to='/'>Inactivity Policy</a>
          </div>
        </div>
      </div>
      <section class='social-media'>
          <small class='website-rights'>NetClimb © 2020</small>
      </section>
    </div>
    
    
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>