const carrito = document.getElementById("carrito");

var cont = 0;

function addCarrito(nombre,precio,img,desc){

    console.log(nombre,precio,img,desc);

    carrito.innerHTML +=
    `
    <div class="item" id="item_${cont}">
        <div class="buttons">
            <button class="delete-btn" onclick="deleteItem('item_${cont}')"></button>
            <span class="like-btn is-active"></span>
        </div>
        <div class="image">
            <img class="image" src="../images/comida/${img}" alt="" />
        </div>
        <div class="description">
            <input type="text" name="nombre[]" id="nombre_${cont}" autocomplete="off" value="${nombre}" required>
            <span>${desc}</span>
        </div>
        <div class="quantity">
            <button class="plus-btn" type="button" name="button" onclick="add(${cont});">
                <img src="../images/plus.svg" alt="" />
            </button>

            <input type="text" name="cantidad[]" id="cantidad_${cont}" autocomplete="off" value="1">

            <button class="minus-btn" type="button" name="button" onclick="sub(${cont});">
                <img src="../images/minus.svg" alt="" />
            </button>
        </div>
        <div class="total-price">$<input type="text" name="precio[]" id="precio_${cont}" value="${precio}"></div>
    </div>
    `;
    cont++;
}

function deleteItem(id){
    var item = document.getElementById(id);

    item.remove();
}

function add(id)
{
    var txtNumber = document.getElementById(`cantidad_${id}`); 
    var newNumber = parseInt(txtNumber.value) + 1;
    txtNumber.value = newNumber;

    var txtPrecio = document.getElementById(`precio_${id}`);
    var newPrecio;
    var tmp = document.getElementById(`nombre_${id}`);

    switch(tmp.value){
        case 'Torta':
            newPrecio = parseInt(txtPrecio.value) +  55;
            break;
        case 'Taco':
            newPrecio = parseInt(txtPrecio.value) +  20;
            break;
        case 'Tacos Dorados':
            newPrecio = parseInt(txtPrecio.value) +  40;
            break;
        case 'Gordita':
            newPrecio = parseInt(txtPrecio.value) +  30;
            break;
        case 'Michelada':
            newPrecio = parseInt(txtPrecio.value) +  39;
            break;
        default: break;
    }
    txtPrecio.value = newPrecio;
}

function sub(id)
{
    var txtNumber = document.getElementById(`cantidad_${id}`);
    var newNumber;
    if(txtNumber.value > 0)
        newNumber = parseInt(txtNumber.value) - 1;
    else
        newNumber = 0
    txtNumber.value = newNumber;

    var txtPrecio = document.getElementById(`precio_${id}`);
    var newPrecio;
    var tmp = document.getElementById(`nombre_${id}`);

    console.log(txtPrecio.value);
    if(txtPrecio.value > 0){
        switch(tmp.value){
        case 'Torta':
            newPrecio = parseInt(txtPrecio.value) - 55;
            break;
        case 'Taco':
            newPrecio = parseInt(txtPrecio.value) - 20;
            break;
        case 'Tacos Dorados':
            newPrecio = parseInt(txtPrecio.value) - 40;
            break;
        case 'Gordita':
            newPrecio = parseInt(txtPrecio.value) - 30;
            break;
        case 'Michelada':
            newPrecio = parseInt(txtPrecio.value) -  39;
            break;
        default:
            break;
        }
    } else {
        newPrecio = 0;
    }
    txtPrecio.value = newPrecio;
}

function print(){
    console.log("SI JALA");
}

const inputName = document.getElementById("nombre");
const inputPrecio = document.getElementById("precio");
const inputCantidad = document.getElementById("cantidad");

function guardarOrden() {
    //Guardar 
    var nombre = inputName.value;
    var precio = inputPrecio.value == "" ? null : inputPrecio.value;
    var cantidad = inputCantidad.value;

    var json = {
        nombre: nombre,
        precio: precio,
        cantidad: cantidad
    };

    var xhttp = new XMLHttpRequest();

    xhttp.open("POST", "/PROYECTO/Controllers/agregarOrdenesController.php", false);

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            var response = JSON.parse(this.responseText);

            if (this.status == 201) {
                goList();
            }
            else if (this.status == 500) {
                alert(response.messages[0]);
            }
            else if (this.status == 400) {
                alert(response.messages[0]);
            }
        }
    };

    xhttp.setRequestHeader("Content-Type", "application/json");

    xhttp.send(JSON.stringify(json));
}