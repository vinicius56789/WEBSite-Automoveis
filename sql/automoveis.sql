-- create database automoveis default character set utf8 default collate utf8_general_ci; --
-- provid81_automoveis --
-- provid81_login --
-- Dialindo123! --
-- use automoveis; --

create table carro(
	id_carro int not null auto_increment,
	modelo varchar(40) not null,
    marca varchar(30) not null, 
	km varchar(30) not null default '0',
    cor varchar(25) not null,
    combustivel varchar(30) not null,
    descricao char(250) not null,
    ano_fab int not null,
    ano_modelo int not null,
    valor int unsigned not null,
    motor varchar(40) not null,
    primary key (id_carro)
)default charset=utf8;

create table imagens_carro(
	id_imagem int not null auto_increment,
    arquivo varchar(44) not null,
    id_carro int not null,
    primary key (id_imagem),
    foreign key (id_carro) references carro(id_carro) on delete cascade
) default charset=utf8;

create table usuvendeveic(
	id_venda int not null auto_increment,
    nome varchar(65) not null,
    tel varchar(20) not null,
    celular varchar(20) not null,
    email varchar(65) not null,
    marca varchar(30) not null,
	modelo varchar(40) not null,
	ano_fab int not null,
    ano_modelo int not null,
    km varchar(30) not null,
	cor varchar(25) not null,
    combustivel varchar(30) not null,
    descricao text,
    primary key(id_venda)
) default charset=utf8;

create table imagens_venda(
	id_imagem int not null auto_increment,
	arquivo varchar(44) not null,
	id_venda int not null,
	primary key (id_imagem),
    foreign key (id_venda) references usuvendeveic(id_venda) on delete cascade
) default charset=utf8;

create table cliente(
	id_cliente int not null auto_increment,
    nome varchar(65) not null,
	cpf varchar(25) not null,
    rg varchar(25) not null,
    endereço varchar(100) not null,
    uf char(2) not null,
    cidade varchar(30) not null,
    cep varchar(25) not null,
    bairro varchar(25) not null,
    tel varchar(20) not null,
	celular varchar(20) not null,
    email varchar(65) not null,
    nascimento varchar(20),
	sexo enum('M' , 'F'),
    profissao varchar(30) not null,
    salario_liq_mensal varchar(40) not null,
    salario_brut_mensal varchar(40) not null,
    primary key (id_cliente)
) default charset=utf8;

create table dados_pessoais(
	id_pessoa int not null auto_increment,
    nome varchar(65) not null,
    cpf varchar(25) not null,
    rg varchar(25) not null,
    endereco varchar(100) not null,
    uf char(2) not null,
    cidade varchar(30) not null,
    cep varchar(25) not null,
    bairro varchar(25) not null,
    tempo_reside varchar(20) not null,
    tipo_reside varchar(20) not null, -- aluguel/proprio
	tel varchar(20) not null,
	celular varchar(20) not null,
    email varchar(65) not null,
    nascimento varchar(14) not null,
	sexo enum('M' , 'F'),
    e_civil varchar(30) not null,
    dependentes int not null,
	nome_mae varchar(65),
    nome_pai varchar(65),
    profissao varchar(30) not null,
    admissao_empresa varchar(14) not null,
    salario_liq_mensal varchar(40) not null,
    salario_brut_mensal varchar(40) not null,
    primary key (id_pessoa)
) default charset=utf8;

create table bem_financiar(
	id_financiamento int not null auto_increment,
    pago_vista varchar(20) not null default '0',
	financiar varchar(30) not null,
	comentario char(200),
    id_carro int not null,
    id_pessoa int not null,
    prestacoes int not null,
    primary key (id_financiamento),
    foreign key (id_carro) references carro(id_carro) on delete cascade,
	foreign key (id_pessoa) references dados_pessoais(id_pessoa) on delete cascade
) default charset=utf8;

create table referencia(
	id_referencia int not null auto_increment,
	nome1 varchar(60) not null,
	tel1 varchar(20),
    cel1 varchar(20),
	nome2 varchar(60) not null,
	tel2 varchar(20),
    cel2 varchar(20),
    id_pessoa int not null,
	primary key(id_referencia),
    foreign key (id_pessoa) references dados_pessoais(id_pessoa) on delete cascade
) default charset=utf8;

create table empresa(
	id_empresa int not null auto_increment,
	tel varchar(30) not null,
    celular varchar(30) not null,
    email varchar(65) not null,
    descricao text not null,
    primary key (id_empresa)
) default charset=utf8;

insert into empresa values (default, '----', '----','----','isso é apenas um exemplo de site de automóveis, não existe, de fato, quaisquer dos carros que estão aqui. Se você é dono de revenda e se interessou, entre em contato para negociarmos um valor :)');

create table opcionais(
	id_opcional int not null auto_increment,
    nome varchar(50) not null,
	primary key (id_opcional)
) default charset=utf8;

create table possui_opcionais(
	id_possui int not null auto_increment,
    id_carro int not null,
	id_opcional int not null,
    primary key (id_possui),
    foreign key (id_carro) references carro(id_carro) on delete cascade,
	foreign key (id_opcional) references opcionais(id_opcional) on delete cascade
) default charset=utf8;

create table adm(
	id_usuario int not null auto_increment,
    usuario varchar(30) not null,
	senha varchar(32) not null,
	primary key (id_usuario)
) default charset=utf8;

select * from adm;
insert into adm values (default, 'provrev', md5('abacaxi123'));