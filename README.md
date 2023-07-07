# salescontrol

# rodar script para poder criar a tabela principal

create schema main collate utf8mb4_general_ci;
create table main.client_databases
(
    id int not null primary key AUTO_INCREMENT,
    database_name VARCHAR(80) not null,
    status BOOLEAN default true
);

# ao criar um novo banco adicionar em system32/drivers/etc/hosts 
seguintes exemplos :
127.0.0.1 salescontrol.localhost
127.0.0.1 tenant1.localhost
 
