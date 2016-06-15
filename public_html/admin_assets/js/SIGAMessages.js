class SIGAMessages {
    constructor() {
        this.classeResult = '';
        this.carregando = '.carregando';
        this.boxCarregando = '.box-carregando';
        this.target = '#alert';
    }
    
    messageSiga(msg, classe) {
         _this.classeResult = classe;
        $(_this.carregando).fadeOut('fast');
        $(_this.target).addClass(classe).html(msg).fadeIn('fast', function () {
            setTimeout(_this.escondeSiga(classe,_this), 5000);
        });
    };
    
    escondeSiga(classe,_this) {
        $(_this.target).fadeOut('fast', function () {
            $(_this.boxCarregando).fadeOut('slow');
            $(_this.target).empty().removeClass(classe);
        });
    };
    
}