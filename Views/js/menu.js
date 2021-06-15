const carrito = document.getElementById("carrito");

var cont = 0;

function addCarrito(x){

    console.log(x);

    switch(x){
        case 1: // TORTA
            carrito.innerHTML +=
            `
            <div class="item" id="item_${cont}">
                <div class="buttons">
                    <button class="delete-btn" onclick="deleteItem('item_${cont}')"></button>
                    <span class="like-btn is-active"></span>
                </div>
                <div class="image">
                    <img src="../images/comida/Torta_128.jpg" alt="" />
                </div>
                <div class="description">
                    <input type="text" name="nombre[]" id="nombre_${cont}" autocomplete="off" value="Torta" required>
                    <span>Torta de maciza</span>
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
                <div class="total-price">$<input type="text" name="precio[]" id="precio_${cont}" value="55"></div>
            </div>
            `;
            cont++;
            break;

        case 2: // TACO
            carrito.innerHTML +=
            `
            <div class="item" id="item_${cont}">
                <div class="buttons">
                    <button class="delete-btn" onclick="deleteItem('item_${cont}')"></button>
                    <span class="like-btn is-active"></span>
                </div>
                <div class="image">
                    <img src="../images/comida/Taco_128.jpg" alt="" />
                </div>
                <div class="description">
                    <input type="text" name="nombre[]" id="nombre_${cont}" autocomplete="off" value="Taco" required>
                    <span>Taco de maciza</span>
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
                <div class="total-price">$<input type="text" name="precio[]" id="precio_${cont}" value="20"></div>
            </div>
            `;
            cont++;
            break;

        case 3: // TACOS DORADOS
            carrito.innerHTML += 
            `
            <div class="item"  id="item_${cont}">
                <div class="buttons">
                    <button class="delete-btn" onclick="deleteItem('item_${cont}')"></button>
                    <span class="like-btn is-active"></span>
                </div>
                <div class="image">
                    <img src="../images/comida/Tacos_128.jpg" alt="" />
                </div>
                <div class="description">
                    <input type="text" name="nombre[]" id="nombre_${cont}" autocomplete="off" value="Tacos Dorados" required>
                    <span>Orden de Tacos Dorados</span>
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
                <div class="total-price">$<input type="text" name="precio[]" id="precio_${cont}" value="40"></div>
            </div>
            `;
            cont++;
            break;

        case 4: // GORDITAS
            carrito.innerHTML +=
            `
            <div class="item"  id="item_${cont}">
                <div class="buttons">
                    <button class="delete-btn" onclick="deleteItem('item_${cont}')"></button>
                    <span class="like-btn  is-active"></span>
                </div>
                <div class="image">
                    <img src="../images/comida/Gordita_128.jpg" alt="" />
                </div>
                <div class="description">
                    <input type="text" name="nombre[]" id="nombre_${cont}" autocomplete="off" value="Gordita" required>
                    <span>Gordita de maciza</span>
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
                <div class="total-price">$<input type="text" name="precio[]" id="precio_${cont}" value="30"></div>
            </div>
            `;
            cont++;
            break;

        default:
    }
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
    default:
        break;
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

    if(tmp.value > 0){
        switch(tmp.value){
        case 'Torta':
            vnewPrecio = parseInt(txtPrecio.value) - 55;
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