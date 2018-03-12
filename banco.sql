create table questionario(
	id int auto_increment primary key,
	q1 int not null,
	q2 int not null,
	q3 int not null,
	q4 int not null,
	q5 int not null,
	q6 int not null,
	q7 int not null,
	q8 int not null,
	q9 int not null,
	q10 int not null,
	q11 int not null,
	q12 int not null,
	q13 int not null,
	q14 int not null,
	q15 int not null,
	q16 int not null,
	q17 int not null,
	q18 int not null,
	q19 int not null,
	q20 int not null
);

create table funcionario(
	id int auto_increment primary key,
	login varchar(25) not null unique,
	senha varchar(25) not null
);

create table respostas_funcionario(
	id_questionario int, 
	id_funcionario int,
	FOREIGN KEY (id_questionario) REFERENCES questionario(id)
                    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_funcionario) REFERENCES funcionario(id)
                    ON DELETE CASCADE ON UPDATE CASCADE,                
)