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
            setTimeout(_this.escondeSiga, 10000);
        });
    };
    
    escondeSiga() {
        $(_this.target).fadeOut('fast', function () {
            $(_this.boxCarregando).fadeOut('slow');
            $(_this.target).empty().removeClass( _this.classeResult);
        });
    };
    
}