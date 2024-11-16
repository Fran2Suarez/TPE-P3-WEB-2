Integrantes del grupo:

+ Franco Suarez Barraza
+ Pablo Ezequiel Salas Ferrari  

****

Email de los integrantes:

+ francosuarezbarraza@gmail.com
+ salasferraripablo@gmail.com

****

Tematica del Trabajo Practico Especial:

Pagina sobre videojuegos.

****

Descripcion de la tematica:

Es una pagina que brinda informacion de videojuegos.

****

Endpoints:

- GET: Devuelve los juegos:
```json
[
    {
    "id": 2,
    "title": "Dragon Ball Sparking Zero",
    "description": "DRAGON BALL: Sparking! ZERO lleva a un nuevo nivel el legendario estilo de juego de la serie Budokai Tenkaichi. Aprende a dominar a diversos personajes jugables, cada uno con sus habilidades, transformaciones y técnicas propias. Libera tu espíritu de lucha y pelea en escenarios que se derrumban y reaccionan a tu poder a medida que el combate se recrudece.",
    "id_genre": 2,
    "image": "https://images.g2a.com/940x528/1x1x0/dragon-ball-sparking-zero-pc-steam-account-global-i10000506157007/302aae41117241c89dc0c949"
    },
...
]
```

****

- GET BY ID: Devuelve un juego especifico por su id:
```json
[
    {
    "id": 13,
    "title": "Geometry Dash",
    "description": "Geometry Dash es un videojuego de plataformas y videojuego rítmico creado en 2013 por el desarrollador sueco Robert Topala, y posteriormente desarrollado por su empresa independiente RobTop Games.",
    "id_genre": 11,
    "image": "https://images.g2a.com/300x400/1x1x1/geometry-dash-steam-key-global-i10000018369004/60266d2f7e696c59b00b0fd2"
    }
]
```

****

- POST: Crea un nuevo juego:
```json
"Juego agregado con exito"
```

****

- PUT: Edita un juego en base a un id:
```json
{
  "id": 23,
  "title": "Editar juego",
  "description": "Esta es una prueba de edicion",
  "id_genre": 2,
  "image": "*Imagen*"
}
```