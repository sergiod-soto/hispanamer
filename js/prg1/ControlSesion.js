class ControlSesion {

    sesion = localStorage.getItem["sesion"];
    fetch(){
        
    }

    constructor() {

        if (sesion == null) {
            var currentdate = new Date();
            sesion =
            {
                "dia": currentdate.getDay(),
                "usuario": "fulanito",
                "programa": "prg265",
                "data": [
                    "",
                    "",
                    {}
                ]
            }
        } else {
            sesion =
            {
                "dia": currentdate.getDay(),
                "usuario": "fulanito",
                "programa": "prg265",
                "data": [
                    "",
                    "",
                    {}
                ]
            }
        }
    }

}