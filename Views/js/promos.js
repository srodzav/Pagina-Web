const carrito = document.getElementById("carrito");

var cont = 0;

function addCarrito(nombre,precio,imagen,producto1,producto2,producto3,user){

    console.log(nombre,precio,imagen,producto1,producto2,producto3,user);

    carrito.innerHTML +=
    `
    <div class="item" id="item_${cont}">
        <div class="buttons">
            <button class="delete-btn" onclick="deleteItem('item_${cont}')"></button>
            <span class="like-btn is-active"></span>
        </div>
        <div class="image">
            <img class="image" src="/PROYECTO/Controllers/uploads/${imagen}" alt="" />
        </div>
        <div class="description">
            <input type="text" name="nombre[]" id="nombre_${cont}" autocomplete="off" value="${nombre}" required>
        </div>
        <div class="quantity">
            <button class="plus-btn" type="button" name="button" onclick="add(${cont}, ${precio});">
                <img src="../images/plus.svg" alt="" />
            </button>

            <input type="text" name="cantidad[]" id="cantidad_${cont}" autocomplete="off" value="1">

            <button class="minus-btn" type="button" name="button" onclick="sub(${cont}, ${precio});">
                <img src="../images/minus.svg" alt="" />
            </button>
        </div>
        <div class="total-price">$<input type="text" name="precio[]" id="precio_${cont}" value="${precio}"></div>
        <div style="display:none"> <input type="text" name="usuario[]" id="usuario_${cont}" value="${user}"> </div>
    </div>
    `;
    cont++;
}

function deleteItem(id){
    var item = document.getElementById(id);

    item.remove();
}


function deleteItem(id){
    var item = document.getElementById(id);

    item.remove();
}

function add(id, precio)
{
    var txtNumber = document.getElementById(`cantidad_${id}`); 
    var newNumber = parseInt(txtNumber.value) + 1;
    txtNumber.value = newNumber;

    var txtPrecio = document.getElementById(`precio_${id}`);
    txtPrecio.value = parseInt(txtPrecio.value) + precio;
}

function sub(id, precio)
{
    var txtNumber = document.getElementById(`cantidad_${id}`);
    var newNumber;
    if(txtNumber.value > 0)
        newNumber = parseInt(txtNumber.value) - 1;
    else
        newNumber = 0
    txtNumber.value = newNumber;

    var txtPrecio = document.getElementById(`precio_${id}`);

    if(txtPrecio.value > 0)
        txtPrecio.value = parseInt(txtPrecio.value) - precio;
    else
        txtPrecio.value = 0;

}