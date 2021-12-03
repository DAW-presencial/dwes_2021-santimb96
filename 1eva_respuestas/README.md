##EJERCICIO 4:

a) Sí. En el ejemplo detallado en el ejercicio4.php, he puesto de ejemplo dos clases: Escudería y Piloto.
Piloto extiende de escudería pero sin embargo sólo tiene el constructor y la herencia de la clase Escudería.
He puesto de ejemplo dos elementos en pantalla diferenciados. En el primero caso, instancio Escudería y le añado una marca;
además, le añado una propiedad denominada "color" la cual le defino que sea "azul".
Cuando pintamos los datos accediendo a las propiedades $escuderia->marca y $escuderia->color, me pinta el predeterminado + el añadido
por la función mágica __set();

Cuando instancio al hijo, en este caso le paso la marca y el nombre del piloto pero, además, creo una propiedad mediante $piloto->numero_piloto = 55
la cual establezco una nueva propiedad que es su dorsal y le adjudico 55.
Cuando pinto al Piloto, me pinta la marca de la escudería que le he pasado por constructor al heredar de Escudería y,
además, me pinta el nombre del piloto y el número de este.

Por lo tanto, al no especificar __set() y __get() en el hijo, se pueden acceder a los del padre.

![img.png](img.png)

b) En principio en herencias siempre se recomienda usar una visibilidad protegida debido a que sólo la herencia pueda acceder/ver
la propiedad del padre; si esta fuera pública, por ejemplo, la podrían ver todos.

Si es privada, a efectos prácticos haciendo pruebas, me ha seguido devolviendo las 
propiedades del padre+las del hijo, debido a esto:

`public function __construct($marca, $nombre)
{
$this->nombre = $nombre;
parent::__construct($marca);
}` al hacer parent::__constructor() accedo al constructor del padre y le paso la $marca recogida por el hijo, de manera 
que en este caso, la visibilidad no afecta para nada aunque se recomiende que sea protegida.

##EJERCICIO 5

En este ejercicio he creado los campos requeridos para el nombre, apellidos, un tipo "date"
y otros dos campos para la subida de ficheros los cuales tienen un identificador y name peculiares por algo que detallaré ahora.

En el control de los ficheros, en este caso hay dos inputs los cuales su name son file0 y file1 respectivamente.
Esto está hecho a propósito porque tengo un control el cual mediante un for podría añadir más inputs siguiendo
un orden numérico consecuente (file0, file1, file2, file3...) y ese for recoge el campo del nombre `$_FILES['file'. $i]`,
de manera que cada iteración recorrerá un fichero diferente si este sigue esta nomenclatura:

![img_2.png](img_2.png)

Y este sería el resultado esperado con los ficheros subidos y el output que se solicita:

![img_1.png](img_1.png)

