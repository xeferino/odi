<div class="ps-subscribe">
    <div class="ps-container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                <p> <span><i class="fa fa-envelope"></i> Suscríbete </span> a nuestro Newsletter</p>
                <p>...y recibe todas <span>nuestras promos.</span></p><br><br>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                <br>
                <form class="ps-subscribe__form" action="{{ route('store.subscribe') }}" method="POST">
                    @csrf
                    <input class="form-control" type="email" placeholder="" name="email">
                    <button>Enviar</button>
                </form>
            </div>

        </div>
    </div>
</div>