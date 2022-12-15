<html lang="en">
<head>
    <title>Hello page</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
  <div class="row order-list"></div>
</div> 

<script>
let currentId = null;

async function getOrders(){
let res = await fetch('http://localhost:8080/api/orders');
let orders = await res.json(); 

document.querySelector('.order-list').innerHTML = '';

orders.forEach((order) => {
  document.querySelector('.order-list').innerHTML += `
    <div class="card" style="width: 25%; margin: 5px 5px 5px 5px;">
      <div class="card-body">
        <h5 class="card-title" style="--bs-card-title-spacer-y: 1rem">Заказ №${order.orderID}</h5>
        <p class="card-text" style ="margin: 0 0 8px">${order.name}</p>
        <p class="card-text">${order.order}</p>
      </div>
    </div> 
    `
}) 
}
getOrders(); 

</script>
</body>
</html>