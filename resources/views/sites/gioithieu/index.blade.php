@extends('sites.master')

@section('content')
  @include('sites._include.navbar')
  @include('sites._include.banner')
  <div class="page-content">
    <div class="container main">
       <div class="row">
            <div class="col-md-9 post">
                    <h2 class='intro-title'>How to stop being an entrepreneur and become one</h2>
                    <div class="body-text">

                        <p class='text-muted ubuntu'>By Yash Shah | Gridle September 17, 2013</p>
                        <br>
                        <div class="row">
                            <div class="col-lg-6"><p>Entrepreneurs are generally perceived as insane risk-takers. A surreal combination of Wolverine and Batman. Aggressive, yet calm, intuitive, yet rational and reckless and brave at the same time. But here’s the moot question: if only five per cent of  entrepreneurs end up working on their original idea, only two per cent entrepreneurs end up providing value and only 0.5 per cent see monetary success, how should this dream really be pursued?</p></div>
                            <div class="col-lg-6"><p class=""><img alt="image" src="../../../images/background.jpg" width="100%"></p></div>
                        </div>

                        <br/>
                        <div class="row">
                            <div class="col-lg-12"><p><strong>Jump off the cliff without a rope</strong></p>
                                <p>In the movie The Dark Knight Rises, superhero Batman learns that you can go full throttle only when there is no back-up. Entrepreneurship teaches you to put all your eggs, fruits, hair-dryer, mobile phone and everything else into one basket. If you have a back-up, it’s you who has failed and not your startup. In any case, unless you took unreasonable risks while pursuing your startup, dealing with its failure will be an unpleasant and a ridiculously boring affair. It’s more like a step along the journey.</p></div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-lg-12"><p><strong>It’s about the journey, not the destination</strong></p>
                                <p>As a startup, people will ask you “Where do you see yourself five years from now?”, while you are still figuring out which client will be paying for your next lunch. In a startup, you learn. You learn to react to insulting situations, uncomfortable questions and demeaning feedback. In a startup, you build, modify, test, rinse and repeat. It’s an incremental and agile perspective towards life. You will never want it to end. It’s addictive.</p></div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-lg-12"><p><strong>The outcome is not binary</strong></p>
                                <p>Chances are that you will not become billionaire. But chances also are that you may not end up on the street begging. There are millions of shades of grey between black and white, there are infinite rational numbers between 0 and 1 and, there are millions of outcomes possible when you have a startup. It’s scary, yes! But it’s even more exciting. That fear of uncertainty, that feeling of not knowing the outcome, that thought process when you are not in control of everything; there are very few things which can trigger such emotions. They are so rare, the English dictionary has no words for them!</p></div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-lg-12"><p><strong>Businesses die, entrepreneurs don’t</strong></p>
                                <p>A misleading element in the perception of success rate is that you only have one shot at entrepreneurship. Startups are never sink or swim. They give you a swing of direction. You give up your corporate job, you put in all the savings, your company fails and you can’t get back to you original career. There, you have another direction all together. And mind you, if a startup fails, a negligible number of people can go back to their jobs. You are addicted, ruined. You will flock to other like-minded, risk taking, lean and convincing SOBs around. And you will start another one!</p>
                                <p>Entrepreneurship is a career. As long as you don’t hit yourself in the face with the bat, you can keep taking swing after swing after swing. If you’ve been with this article till here, lets connect on Facebook.</p>
                            </div>
                        </div>
                        <br/>
                        <p>Thanks!</p>

                        <div class="row">


                            <div class="col-lg-12 aboutme">
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object dp img-circle" src="http://startupcentral.in/wp-content/uploads/2013/07/105x81xyashshah-gridle-150x115.jpg.pagespeed.ic.9W-CH38VbP.jpg" style="width: 120px;height:120px;">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Yash Shah <small> India</small></h4>
                                        <h5>Co-Founder and CEO of <a href="http://gridle.in">Gridle.in</a></h5>
                                        <hr style="margin:8px auto;border-bottom: 1px solid #ccc;">

                                        <p style="text-align:left;">Yash Shah is co-founder of Ahmedabad-based Gridle, a cloud-based collaboration platform for small and medium businesses. The company is currently being incubated at CIIE Ahmedabad. Connect with him at LinkedIn.</p>
                                        <span class="label label-default"><i class="fa fa-twitter"></i> yashparallel</span>
                                        <span class="label label-default"><i class="fa fa-linkedin"></i> yashparallel</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
       @include('sites._include.mucluc')
       </div>
    </div>
  </div>

@include('sites._include.footer')
@endsection

@section('style')
  {{ Html::style('css/sites/gioithieu.css') }}
  {{ Html::style('css/sites/_include/navbar.css') }}
  {{ Html::style('css/sites/_include/footer.css') }}
  {{ Html::style('css/sites/_include/banner.css') }}
@endsection
