<div class="col-md-12">
    <h2 class="text-center">tuSServicios.com.ve</h2>
    <hr style="border-color: #333">
    @if(Auth::check())
    <div class="container">
        <section class="content-header margin-bottom">
            <h1>
                {{ Auth::user()->name }} <small>{{ Auth::user()->email }}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-th-large"></i>Panel</a></li>
                <li class="active">Principal</li>
            </ol>
        </section>
    </div>
    @endif
</div>