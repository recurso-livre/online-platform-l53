@push('stylesheets')
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700' rel='stylesheet' type='text/css'>

    <!-- IcoFont CSS -->
    <link href="about/css/icofont.css" rel="stylesheet">

    <!-- STYLE CSS -->
    <link href="about/style.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('vendor/slippry/css/slippry.css') }}" type="text/css" />


    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
@endpush

@push('posscripts')
    <script type="text/javascript" src="{{ asset('vendor/jquery/jquery-migrate-3.0.0.min.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('vendor/slippry/js/slippry.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/slippry/js/init.js') }}"></script>
@endpush

    <!-- Galley Post Area
        =========================== -->
    <div class="about-gallery-posts">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    @include('modules.vendor.slippry.slider', [
                        'slides' => [
                            [
                                'link' => '#',
                                'img' => asset('about/img/slides/img-01.jpg')
                            ],
                            [
                                'link' => '#',
                                'img' => asset('about/img/slides/img-02.jpg')
                            ],
                            [
                                'link' => '#',
                                'img' => asset('about/img/slides/img-03.jpg')
                            ],
                            [
                                'link' => '#',
                                'img' => asset('about/img/slides/img-04.jpg')
                            ]
                        ]
                    ])
                </div>
                <div class="col-md-7">
                    <div class="about-content" style="color:#323232">
                        <p>Somos uma startup de tecnologia com a missão de oferecer a melhor plataforma eletrônica para que as pessoas possam oferecer recursos ociosos umas para as outras na Internet.</p>
                        <p>Nossa plataforma foi desenvolvida utilizando a metodologia Scrum - uma abordagem iterativa incremental voltada para o desenvolvimento ágil de aplicações.</p>
                        <p>Para realizar tudo isso, utilizamos tecnologias como a Framework de Desenvolvimento PHP Laravel, MySQL, JavaScript, HTML e CSS.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.End Of Galley Post Area -->

    <!-- What WeDo Area
        =========================== -->
    <div class="whatDo-area section-padding">
        <div class="container" style="color:#323232">
            <div class="row">

                <!-- Single Work -->
                <div class="col-sm-4">
                    <div class="sin-whatWork">
                        <h2>O que fazemos?</h2>
                        <p>Aproximamos a sua necessidade às possibilidades fornecidas por gente que, como você, quer se inserir de maneira colaborativa e rápida para o crescimento dos seus negócios.</p>
                    </div>
                </div>
                <!-- /.End Of Single Work -->

                <!-- Single Work -->
                <div class="col-sm-4">
                    <div class="sin-whatWork">
                        <h2>Nossa Missão</h2>
                        <p>Ajudamos pessoas a concluirem seus projetos.</p>
                    </div>
                </div>
                <!-- /.End Of Single Work -->

                <!-- Single Work -->
                <div class="col-sm-4">
                    <div class="sin-whatWork">
                        <h2>Nosso Objetivo</h2>
                        <p>Ajudar você a encontrar e compartilhar recursos pelo mundo.</p>
                    </div>
                </div>
                <!-- /.End Of Single Work -->

            </div>
        </div>
    </div>
    <!-- /.What WeDo Area -->

    <!-- Our Team Area
        =========================== -->
    <section class="our-team-area section-padding overlay">
        <div class="container">
            <div class="row">
                <div class="section-title mb-90 white text-center">
                    <h2>Nossa Equipe</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <!-- Single Member -->
                    <div class="single-member-progile mb-65 fix">
                        <div class="member-photo">
                            <img src="about/img/members/img-01.jpg" alt="">
                        </div>
                        <div class="member-bio">
                            <h2>Cristian Mello</h2>
                            <!--<span class="member-pos">Head of Ideas</span>-->
                            <p>“Oh, oh, oh / Sweet child o' mine...”</p>
                        </div>
                    </div>
                    <!-- /.End Of Single Member -->
                </div>

                <div class="col-md-4 col-sm-6">
                    <!-- Single Member -->
                    <div class="single-member-progile mb-65 fix">
                        <div class="member-photo">
                            <img src="about/img/members/img-02.jpg" alt="">
                        </div>
                        <div class="member-bio">
                            <h2>Djonatas Costa</h2>
                            <!--<span class="member-pos">Project Manager</span>-->
                            <p>“Se não está na sprint não faça”</p>
                        </div>
                    </div>
                    <!-- /.End Of Single Member -->
                </div>

                <div class="col-md-4 col-sm-6">
                    <!-- Single Member -->
                    <div class="single-member-progile mb-65 fix">
                        <div class="member-photo">
                            <img src="about/img/members/img-03.jpg" alt="">
                        </div>
                        <div class="member-bio">
                            <h2>Emerson Romaneli</h2>
                            <!--<span class="member-pos">Project Manager</span>-->
                            <p>“Não é que não dá pra fazer, só não tenho tempo”</p>
                        </div>
                    </div>
                    <!-- /.End Of Single Member -->
                </div>
                <div class="col-md-offset-2 col-md-4 col-sm-6">
                    <!-- Single Member -->
                    <div class="single-member-progile mb-65 fix">
                        <div class="member-photo">
                            <img src="about/img/members/img-04.jpg" alt="">
                        </div>
                        <div class="member-bio">
                            <h2>Gustavo Amorim</h2>
                            <!--<span class="member-pos">Product Designer</span>-->
                            <p>“POG - Programação Orientada a Gambiarra”</p>
                        </div>
                    </div>
                    <!-- /.End Of Single Member -->
                </div>
                <div class="col-md-4 col-sm-6">
                    <!-- Single Member -->
                    <div class="single-member-progile mb-65 fix">
                        <div class="member-photo">
                            <img src="about/img/members/img-05.jpg" alt="">
                        </div>
                        <div class="member-bio">
                            <h2>Luciano França</h2>
                            <!--<span class="member-pos">Code Ninja</span>-->
                            <p>“Não estou nem aqui”</p>
                        </div>
                    </div>
                    <!-- /.End Of Single Member -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.End Of Our Team Area -->

    <!-- CTA Area
        =========================== -->
    <section class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="cta-text">
                        <h2>Gostou da gente?</h2>
                        <span>Curta a nossa página</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="cta-right">
                        <a href="http://facebook.com/recursolivre/" class="button button-hover button-cta">Facebook</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Of CTA Area -->

    <!-- Testimonial Area
        =========================== -->
    <!--
    <section class="tesimonial-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center mb-65">
                        <h2>what our clients say</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="testimonial-wrap testimonial-active">

                    <div class="sin-tesimonial">
                        <span class="quote">Claritas est etiam processus dynamicus, qui
                        sequitur mutationem consuetudium lectorum.Mirum est notare quam littera
                        gothica, quam nunc putamus parum claram.</span>

                        <div class="cliet-bio">
                            <h2>Farhan Rizvi</h2>
                            <span class="client-pos">Product Designer</span>
                        </div>
                    </div>

                    <div class="sin-tesimonial">
                        <span class="quote">Claritas est etiam processus dynamicus, qui
                        sequitur mutationem consuetudium lectorum.Mirum est notare quam littera
                        gothica, quam nunc putamus parum claram.</span>

                        <div class="cliet-bio">
                            <h2>David Ramon</h2>
                            <span class="client-pos">CEO, MX Limited</span>
                        </div>
                    </div>

                    <div class="sin-tesimonial">
                        <span class="quote">Claritas est etiam processus dynamicus, qui
                        sequitur mutationem consuetudium lectorum.Mirum est notare quam littera
                        gothica, quam nunc putamus parum claram.</span>

                        <div class="cliet-bio">
                            <h2>Bushra Ahsani</h2>
                            <span class="client-pos">CEO, Home Limited</span>
                        </div>
                    </div>

                    <div class="sin-tesimonial">
                        <span class="quote">Claritas est etiam processus dynamicus, qui
                        sequitur mutationem consuetudium lectorum.Mirum est notare quam littera
                        gothica, quam nunc putamus parum claram.</span>

                        <div class="cliet-bio">
                            <h2>David Ramon</h2>
                            <span class="client-pos">CEO, MX Limited</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.End Of Testimonial Area -->
