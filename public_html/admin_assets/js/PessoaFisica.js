class PessoaFisica extends Pessoa{
 
    constructor(nome, email, cpf){
        super(nome, email);
        this.cpf = cpf;
    }
   
    dizCpf(){
        console.log(this.fala());
    }
}
 
var leo = new PessoaFisica("Leonardo", "leonardo.wolter@caelum.com.br", "meucpf" );
// leo.gostaDe = "bolo";
// console.log(leo.comidas); // ["bolo"]
// console.log(leo.idade); // 63
// leo.dizCpf(); // "meucpf"
// leo.fala(); // Olá, meu nome é Leonardo e meu email é leonardo.wolter@caelum.com.br 