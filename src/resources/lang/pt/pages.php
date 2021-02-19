<?php

return [
    'customers' => [
        'tittle' => 'Cadastro de Clientes',
        'page-name' => 'Clientes',
        'fields'=>[
            'id' => 'Id',
            'name' => 'Nome',
            'email' => 'Email'
        ]
    ],
    'products' => [
        'tittle' => 'Cadastro de Produtos',
        'page-name' => 'Produtos',
        'fields'=> [
            'id' => 'Id',
            'name' => 'Nome',
            'price' => 'Preço',
            'category_id' => 'Categoria',
            'category_name' => 'Categoria'
        ]
    ],
    'product-categories' => [
        'tittle' => 'Cadastro de Categorias',
        'page-name' => 'Categorias',
        'fields' => [
            'id' => 'Id',
            'name' => 'Nome'
        ]
    ],
    'orders' => [
        'tittle' => 'Pedidos',
        'page-name' => 'Pedidos',
        'fields'=>[
            'id' => 'Id',
            'product' => 'Produto',
            'quantity' => 'Quantidade',
            'price' => 'Preço',
            'total' => 'Total'
        ]
    ],
    'users' => [
        'tittle' => 'Cadastro de Usuários',
        'page-name' => 'Usuários',
        'fields'=>[
            'id' => 'Id',
            'name' => 'Nome',
            'email' => 'Email',
            'password' => 'Senha'
        ]
    ],
    'login' => [
        'tittle' => 'Entrar em Multiplier',
        'fields'=>[
            'email' => 'Email',
            'password' => 'Senha'
        ]
    ]
];
