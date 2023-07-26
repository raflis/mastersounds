<?php

function getRoles()
{
    $roles = [
        '0' => 'Administrador',
        '1' => 'Usuario',
        '2' => 'Colaborador'
    ];
    return $roles;
}

function getRole($id)
{
    $roles = [
        '0' => 'Administrador',
        '1' => 'Usuario',
        '2' => 'Colaborador'
    ];
    
    return $roles[$id];
}

function types()
{
    $types = [
        'Casas' => 'Casas',
        'Departamentos' => 'Departamentos',
        'Oficinas' => 'Oficinas',
        'Terrenos' => 'Terrenos',
        'Locales' => 'Locales',
        'Otros' => 'Otros',
    ];
    
    return $types;
}

function types2()
{
    $types2 = [
        'Venta' => 'Venta',
        'Alquiler' => 'Alquiler',
    ];
    
    return $types2;
}

function getStatus($value)
{
    $status = [
        'PUBLISHED' => 'Publicado',
        'DRAFT' => 'Borrador',
    ];
    return $status[$value];
}

function zero_fill($valor, $long = 0)
{
    return str_pad($valor, $long, '0', STR_PAD_LEFT);
}

function outP($text)
{
    $text = str_replace(array("<p>","</p>"), "", $text);
    return $text;
}

function validatePermission($route, $permissions)
{
    if(in_array($route, $permissions))
    {
        return true;
    }else{
        return false;
    }
}

function user_permissions()
{
    $p = [
        'page_fields' => [
            'title' => 'Configuración',
            'key' => [
                'pagefields.logos' => 'Logos - Puede editar',
                'pagefields.home' => 'Página de inicio - Puede editar',
                'pagefields.social' => 'Redes sociales - Puede editar',
                'pagefields.files' => 'Files footer - Puede editar',
            ]
        ],
        'users' => [
            'title' => 'Usuarios',
            'key' => [
                'users.index' => 'Puede ver el listado',
                'users.create' => 'Puede crear un nuevo item',
                'users.edit' => 'Puede editar un item',
                'users.delete' => 'Puede eliminar un item',
                'users.permissions' => 'Puede editar permisos',
            ]
        ],
        'home_sliders' => [
            'title' => 'Slider Home',
            'key' => [
                'home_sliders.index' => 'Puede ver el listado',
                'home_sliders.create' => 'Puede crear un nuevo item',
                'home_sliders.edit' => 'Puede editar un item',
                'home_sliders.delete' => 'Puede eliminar un item',
            ]
        ],
        'solution_sliders' => [
            'title' => 'Slider Soluciones',
            'key' => [
                'solution_sliders.index' => 'Puede ver el listado',
                'solution_sliders.create' => 'Puede crear un nuevo item',
                'solution_sliders.edit' => 'Puede editar un item',
                'solution_sliders.delete' => 'Puede eliminar un item',
            ]
        ],
        'episode_sliders' => [
            'title' => 'Slider Episodios',
            'key' => [
                'episode_sliders.index' => 'Puede ver el listado',
                'episode_sliders.create' => 'Puede crear un nuevo item',
                'episode_sliders.edit' => 'Puede editar un item',
                'episode_sliders.delete' => 'Puede eliminar un item',
            ]
        ],
        'post_sliders' => [
            'title' => 'Slider Noticias',
            'key' => [
                'post_sliders.index' => 'Puede ver el listado',
                'post_sliders.create' => 'Puede crear un nuevo item',
                'post_sliders.edit' => 'Puede editar un item',
                'post_sliders.delete' => 'Puede eliminar un item',
            ]
        ],
        'category_solutions' => [
            'title' => 'Categoria Soluciones',
            'key' => [
                'category_solutions.index' => 'Puede ver el listado',
                'category_solutions.create' => 'Puede crear un nuevo item',
                'category_solutions.edit' => 'Puede editar un item',
                'category_solutions.delete' => 'Puede eliminar un item',
            ]
        ],
        'item_solutions' => [
            'title' => 'Soluciones',
            'key' => [
                'item_solutions.index' => 'Puede ver el listado',
                'item_solutions.create' => 'Puede crear un nuevo item',
                'item_solutions.edit' => 'Puede editar un item',
                'item_solutions.delete' => 'Puede eliminar un item',
            ]
        ],
        'category_episodes' => [
            'title' => 'Categoria Episodios',
            'key' => [
                'category_episodes.index' => 'Puede ver el listado',
                'category_episodes.create' => 'Puede crear un nuevo item',
                'category_episodes.edit' => 'Puede editar un item',
                'category_episodes.delete' => 'Puede eliminar un item',
            ]
        ],
        'item_episodes' => [
            'title' => 'Episodios',
            'key' => [
                'item_episodes.index' => 'Puede ver el listado',
                'item_episodes.create' => 'Puede crear un nuevo item',
                'item_episodes.edit' => 'Puede editar un item',
                'item_episodes.delete' => 'Puede eliminar un item',
            ]
        ],
        'category_posts' => [
            'title' => 'Categoria Noticias',
            'key' => [
                'category_posts.index' => 'Puede ver el listado',
                'category_posts.create' => 'Puede crear un nuevo item',
                'category_posts.edit' => 'Puede editar un item',
                'category_posts.delete' => 'Puede eliminar un item',
            ]
        ],
        'item_posts' => [
            'title' => 'Noticias',
            'key' => [
                'item_posts.index' => 'Puede ver el listado',
                'item_posts.create' => 'Puede crear un nuevo item',
                'item_posts.edit' => 'Puede editar un item',
                'item_posts.delete' => 'Puede eliminar un item',
            ]
        ],
        'records' => [
            'title' => 'Registros',
            'key' => [
                'records.index' => 'Puede ver los registros',
                'records.excel' => 'Puede descargar los registros',
            ]
        ],
    ];
    return $p;
}