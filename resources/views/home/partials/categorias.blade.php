<section id="categorias-list" class="bg-gray-light container-fluid padding">
    <div class="row">
        <div class="col-md-12 col-lg-10 ">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 margin-bottom">
                        <h1 class="text-center text-ts-blue">Categorias</h1>
                    </div>
                    @foreach($categories AS $categorie)
                        <div class="col-xs-12 col-sm-4 col-md-3 text-center margin-bottom">
                            <a href="{{ route('detalle-categorias',$categorie->id) }}" class="text-black">
                                <img class="thumbnail img-responsive img-rounded"
                                     src="{{ asset('assets/img/categorias-img/'.$categorie->foto) }}"
                                     alt="categoria"/>
                                <h3 class="text-center text-ts-blue">{{ $categorie->nombre }}</h3>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="hidden-md hidden-xs hidden-sm col-lg-2">
            <div class="box box-solid with-border margin">
                <div class="box-body" style="height: 100%">
                    <h3 class="text-ts-blue text-center">Publicidad</h3>
                </div>
            </div>
        </div>
    </div>
</section>