const carrito = document.getElementById("carrito");

function addCarrito(x){
    console.log(x);
    switch(x){
        case 1: // TORTA
            carrito.innerHTML += 
            `
            <div class="item">
                <div class="buttons">
                    <span class="delete-btn"></span>
                    <span class="like-btn"></span>
                </div>
                <div class="image">
                    <img src="../images/comida/Torta_128.jpg" alt="" />
                </div>
                <div class="description">
                    <input type="text" name="nombre" id="email" autocomplete="off" value="Torta" required>
                    <span>Torta de maciza</span>
                </div>
                <div class="quantity">
                    <span>Cantidad</span>
                    <input type="text" name="cantidad" id="cantidad" autocomplete="off" value="1" required>
                </div>
                <div class="total-price">$55</div>
            </div>
            `;
            break;

        case 2: // TACO
            carrito.innerHTML += 
            `
            <div class="item">
                <div class="buttons">
                    <span class="delete-btn"></span>
                    <span class="like-btn"></span>
                </div>
                <div class="image">
                    <img src="../images/comida/Taco_128.jpg" alt="" />
                </div>
                <div class="description">
                    <input type="text" name="nombre" id="email" autocomplete="off" value="Taco" required>
                    <span>Taco de maciza</span>
                </div>
                <div class="quantity">
                    <span>Cantidad</span>
                    <input type="text" name="cantidad" id="cantidad" autocomplete="off" value="1" required>
                </div>
                <div class="total-price">$20</div>
            </div>
            `;
            break;

        case 3: // TACOS DORADOS
            carrito.innerHTML += 
            `
            <div class="item">
                <div class="buttons">
                    <span class="delete-btn"></span>
                    <span class="like-btn"></span>
                </div>
                <div class="image">
                    <img src="../images/comida/Tacos_128.jpg" alt="" />
                </div>
                <div class="description">
                    <input type="text" name="nombre" id="email" autocomplete="off" value="Tacos Dorados" required>
                    <span>Orden de Tacos Dorados</span>
                </div>
                <div class="quantity">
                    <span>Cantidad</span>
                    <input type="text" name="cantidad" id="cantidad" autocomplete="off" value="1" required>
                </div>
                <div class="total-price">$40</div>
            </div>
            `;
            break;

        case 4: // GORDITAS
            carrito.innerHTML += 
            `
            <div class="item">
                <div class="buttons">
                    <span class="delete-btn"></span>
                    <span class="like-btn"></span>
                </div>
                <div class="image">
                    <img src="../images/comida/Gordita_128.jpg" alt="" />
                </div>
                <div class="description">
                    <input type="text" name="nombre" id="email" autocomplete="off" value="Gordita" required>
                    <span>Gordita de maciza</span>
                </div>
                <div class="quantity">
                    <span>Cantidad</span>
                    <input type="text" name="cantidad" id="cantidad" autocomplete="off" value="1" required>
                </div>
                <div class="total-price">$30</div>
            </div>
            `;
            break;

        default:
    }
}

// switch(x){
//     case 1: // TORTA
//         carrito.innerHTML += 
//         `
//         <div class="item">
//             <div class="buttons">
//                 <span class="delete-btn"></span>
//                 <span class="like-btn"></span>
//             </div>
//             <div class="image">
//                 <img src="../images/comida/Torta_128.jpg" alt="" />
//             </div>
//             <div class="description">
//                 <span>Torta</span>
//                 <span>Torta de maciza</span>
//             </div>
//             <div class="quantity">
//                 <span>Cantidad</span>
//                 <input type="text" name="name" value="1">
//             </div>
//             <div class="total-price">$55</div>
//         </div>
//         `;
//         break;

//     case 2: // TACO
//         carrito.innerHTML += 
//         `
//         <div class="item">
//             <div class="buttons">
//                 <span class="delete-btn"></span>
//                 <span class="like-btn"></span>
//             </div>
//             <div class="image">
//                 <img src="../images/comida/Taco_128.jpg" alt="" />
//             </div>
//             <div class="description">
//                 <span>Taco</span>
//                 <span>Taco de maciza</span>
//             </div>
//             <div class="quantity">
//                 <span>Cantidad</span>
//                 <input type="text" name="name" value="1">
//             </div>
//             <div class="total-price">$40</div>
//         </div>
//         `;
//         break;

//     case 3: // TACOS DORADOS
//         carrito.innerHTML += 
//         `
//         <div class="item">
//             <div class="buttons">
//                 <span class="delete-btn"></span>
//                 <span class="like-btn"></span>
//             </div>
//             <div class="image">
//                 <img src="../images/comida/Tacos_128.jpg" alt="" />
//             </div>
//             <div class="description">
//                 <span>Orden de Tacos</span>
//                 <span>5 tacos</span>
//             </div>
//             <div class="quantity">
//                 <span>Cantidad</span>
//                 <input type="text" name="name" value="1">
//             </div>
//             <div class="total-price">$30</div>
//         </div>
//         `;
//         break;

//     case 4: // GORDITAS
//         carrito.innerHTML += 
//         `
//         <div class="item">
//             <div class="buttons">
//                 <span class="delete-btn"></span>
//                 <span class="like-btn"></span>
//             </div>
//             <div class="image">
//                 <img src="../images/comida/Gordita_128.jpg" alt="" />
//             </div>
//             <div class="description">
//                 <span>Gordita</span>
//                 <span>Gordita de Maciza</span>
//             </div>
//             <div class="quantity">
//                 <span>Cantidad</span>
//                 <input type="text" name="name" value="1">
//             </div>
//             <div class="total-price">$30</div>
//         </div>
//         `;
//         break;

//     default:
// }