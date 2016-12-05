@extends('pages.master')

{{-- PLUGIN --}}

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('vendor/slippry/css/slippry.css') }}" type="text/css" />
    
    <link rel="stylesheet" href="{{ asset('vendor/jcarousel/responsive/css/jcarousel.responsive.css') }}" type="text/css" />
@endpush

@push('posscripts')
    <script type="text/javascript" src="{{ asset('vendor/jquery/jquery-migrate-3.0.0.min.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('vendor/slippry/js/slippry.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/slippry/js/init.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('vendor/jcarousel/jquery.jcarousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jcarousel/responsive/js/jcarousel.responsive.js') }}"></script>
@endpush

{{--  PAGE  --}}

@section('title', 'Início')

@section('header')
    @include('modules.header.navbar')
@endsection

@section('content')
    @include('modules.vendor.slippry.slider', [
        'slides' => [
            [
                'link' => route('user.about'),
                'img' => asset('img/home-slider/001.png')
            ],
            [
                'link' => '#slide2',
                'img' => asset('img/home-slider/002.png')
            ]
        ]
    ])
    
    @include('modules.content.generic.horizontal-line', [
        'backgroundColor' => '#1f80c0',
        'textColor' => '#e6e6e6',
        'borderColor' => '#3b5998',
        'text' => 'RECURSOS A UM CLIQUE DE DISTÂNCIA'
    ])
    
    @include('modules.content.generic.horizontal-text-line', [
        'texts' => [
            [
                'title' => 'Pague online',
                'image' => 'http://resources.mlstatic.com/homes/images/information-mp_mlb__v1d5ad91f43e.png',
                'description' => 'Use o Pagseguro, a solução da Recurso Livre para pagar com segurança em até 12 parcelas e com o meio de pagamento que preferir.',
                'link' => '#'
            ],
            [
                'title' => 'Conheça nossa empresa',
                'image' => 'http://resources.mlstatic.com/homes/images/information-shipping__v1d5ad91f43e.png',
                'description' => 'Nossa empresa possui um sistema fácil, rápido e prático para te conectar a qualquer serviço disponível. Clique aqui e saiba mais sobre nossas políticas e objetivos.',
                'link' => route('user.about')
            ],
            [
                'title' => 'Proteja a sua compra',
                'image' => 'http://resources.mlstatic.com/homes/images/information-bpp__v1d5ad91f43e.png',
                'description' => 'Receba o produto que está esperando ou devolvemos o dinheiro. Pague através do Pagseguro e aproveite a tranquilidade de comprar seguro.',
                'link' => '#'
            ]
        ]
    ])
    
    <div class="container">
        
        @for($count = 0; $count < 2; $count++)
            @include('modules.content.resource.multi-slider', [
                'title' => key($resources),
                'resources' => array_shift($resources)
            ])
        @endfor
        
    </div>
    
    @include('modules.content.generic.horizontal-text-line', [
        'texts' => [
            [
                'title' => 'Cadastre-se agora!',
                'image' => 'http://2.bp.blogspot.com/-vwAYMI_H5F8/UpINiWTF9II/AAAAAAAACgw/34ifXntPoL8/s1600/Facebook_like_thumb.png',
                'description' => 'Cadastre-se no nosso site, é grátis! Cadastre seu endereço para que possa adquirir produtos rapidamente.',
                'link' => '/usuario/cadastrar'
            ]
        ]
    ])
    
    <div class="container">
    
        @for($count = 0; $count < 2; $count++)
            @include('modules.content.resource.multi-slider', [
                'title' => key($resources),
                'resources' => array_shift($resources)
            ])
        @endfor
    
    </div>
    
@endsection

@section('footer')
    @include('modules.footer.master')
@endsection