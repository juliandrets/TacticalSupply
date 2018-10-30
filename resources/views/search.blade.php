<!-- Planilla default header y css -->
@extends('layout.default')

<!-- Nombre del titulo de la pagina -->
<?php $title = $search.' - Smart'; ?>

@section('content')

    <!-- Header -->
    @include('layout.header-default')


    <section id="category">
        <aside>
            <ul class="categories">
                <h2>Nuestras Categorias</h2>
                <div>
                @foreach($categories as $category)
                <li>
                    <a href="/category/{{$category->name}}">
                        {{$category->name}}
                    </a>
                </li>
                @endforeach
                </div>
            </ul>

            <section id="filter">
                <h3>Filtros</h3>
                <form method="post" action="/search/filter/price">
                    {{ csrf_field() }}
                    <span>Por precio:</span>
                    <div class="inp">
                        <input type="number" min="1" value="1" name="min">
                        <div class="b"></div>
                        <input type="number" min="1" value="9999" name="max">
                    </div>
                    <button class="boton-redondeado r1">Filtrar <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                </form>
            </section>

            <section id="latest-products">
                <h3>Últimos productos</h3>
                <ul class="products">
                    @foreach($latestProducts as $product)
                    <?php  
                        $ofertProduct = ($product->price * $product->ofert) / 100;
                        $priceProduct = $product->price - $ofertProduct; 
                    ?>
                    <li>
                        <a href="/products/{{$product->id}}"><figure>
                            <img src="/uploads/products/{{$product->picture}}" alt="">
                            @if($product->ofert)<div class="ofert-box">-${{$ofertProduct}}</div>@endif
                        </figure></a>
                        <section class="data">
                            <div class="price">
                                @if($product->ofert)
                                    <span class="ofertProductTextColor" style='color:green'>${{$priceProduct}}</span>
                                    <span class="ofertProductSquare">OFERTA!</span>
                                @else
                                    ${{$product->price}}
                                @endif
                            </div>
                            <p> 
                                {{$product->name}}
                            </p>
                        </section>
                    </li>
                    @endforeach
                </ul>
            </section>
        </aside>
        <section class="container">

            <section id="publicity">
                <article>
                    <h2>Generamos confianza</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur at quidem voluptas amet. Ea quis magni distinctio dignissimos nostrum amet illum necessitatibus nemo libero sapiente quo, eveniet! Ab, libero aperiam. <br><br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio sunt ullam fuga vitae laudantium quia voluptate consectetur illum eos facere voluptatibus a, ad, enim mollitia dolores, fugit accusamus! Totam, distinctio.</p>
                    <div class="boton-redondeado r1">Leer más <i class="fa fa-angle-right" aria-hidden="true"></i></div>
                </article>
            </section>

            <h2 class="title-category">Busqueda: {{$search}}</h2>

            <ul class="products">
                @if(count($searchProducts) == 0)
                    <p class="aviso">No se encontraron productos que coincidan con tu busqueda.</p>
                @endif

                @foreach($searchProducts as $product)
                    <?php  
                        $ofertProduct = ($product->price * $product->ofert) / 100;
                        $priceProduct = $product->price - $ofertProduct; 
                    ?>
                    <li>
                        <a href="/products/{{$product->id}}"><figure>
                            <img src="/uploads/products/{{$product->picture}}" alt="">
                            @if($product->ofert)<div class="ofert-box">-${{$ofertProduct}}</div>@endif
                        </figure></a>
                        <div class="price">
                            @if($product->ofert)
                                <span class="ofertProductTextColor" style='color:green'>${{$priceProduct}}</span>
                                <span class="ofertProductSquare">OFERTA!</span>
                            @else
                                ${{$product->price}}
                            @endif
                        </div>
                        <p> 
                            {{$product->name}}
                        </p>
                    </li>
                @endforeach
            </ul>
            {{ $searchProducts->links() }}
        </section>
    </section>

    <!-- Incluyo el footer y los script -->
    @include('layout.footer')
    @include('layout.scripts')

@endsection