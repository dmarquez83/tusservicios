<section class="bg-navy" id="contacto">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="text-center padding">Contactanos</h2>
            </div>
            <div class="col-xs-12">
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <h4 class="text-center text-ts-blue">Escribenos</h4>
                                {!! Form::open() !!}
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" placeholder="Nombre y Apellido" class="form-control">
                                </div>
                                <br/>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                    <input type="tel" placeholder="Teléfono" class="form-control">
                                </div>
                                <br/>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="email" placeholder="Correo" class="form-control">
                                </div>
                                <br/>
                                <div class="form-group">
                                    <textarea placeholder="Mensaje" rows="3" class="form-control"></textarea>
                                </div>

                                {!! Form::close() !!}
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <h4 class="text-center text-ts-blue">Nuestras Redes</h4>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-offset-3 text-center margin-bottom">
                                        <a class="btn btn-block btn-social btn-default">
                                            <i class="fa fa-facebook btn-facebook"></i> Facebook
                                        </a>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-offset-3 margin-bottom">
                                        <a class="btn btn-block btn-social btn-default">
                                            <i class="fa fa-google-plus btn-google"></i> Google Plus
                                        </a>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-offset-3 margin-bottom">
                                        <a class="btn btn-block btn-social btn-default">
                                            <i class="fa fa-twitter btn-twitter"></i> Twiter
                                        </a>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-offset-3 margin-bottom">
                                        <a class="btn btn-block btn-social btn-default">
                                            <i class="fa fa-instagram btn-instagram"></i> Instagram
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</section>