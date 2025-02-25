localStorage.getItem("sesion").fecha = new Date().getDate();

let texto = getElementById("id_1").value;
let sesion = localStorage.getItem("sesion");
prg = localStorage.getItem("pregActual");


sesion[prg]["data"].id_1 = texto;
