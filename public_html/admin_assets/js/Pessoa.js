class Pessoa {
    constructor(nome, email) {
        this.formDdl = "Este";
         this.nome =  nome;
         this.comidas = [];
         // verifica se o e-mail foi preenchido
         if (email) {
             this.email = email;    
         }
         this.fala();
    }
 
    fala() {
        console.log("Olá, meu nome é "+this.nome+" e meu email é "+this.email);
    }
 
    get primeiroNome() {
           this.fala();
        return this.nome.split(" ")[0];
    }
 
    set gostaDe(comida) {
        this.comidas.push(comida);
    }
}
 