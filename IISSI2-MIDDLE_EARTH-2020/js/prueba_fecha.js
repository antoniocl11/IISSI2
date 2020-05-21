//Prueba para ver si al instroducir una fecha, calcula la edad y compara con 16 años,
//si es menor no se puede registrar, si es mayor o igual a 16 sí.

let fechaNacimiento = new Date('17/05/2019');
let ahora = new Date();
let anyos = ahora.getFullYear() - fechaNacimiento.getFullYear();





console.log(anyos);