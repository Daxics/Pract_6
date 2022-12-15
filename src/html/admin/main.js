let currentId = null;

async function getOrders() {
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
        <a href="#" class="card-link" onclick=deleteOrder(${order.orderID})>Удалить</a>
        <a href="#" style ="margin-left: 0" class="card-link" onclick="selectOrder('${order.orderID}', '${order.name}', '${order.order}')">Редактировать</a>
      </div>
    </div> 
    `
  })
}
getOrders();

async function addOrder() {
  const name = document.getElementById("name").value, order = document.getElementById("order").value;

  let formData = new FormData();
  formData.append('name', name);
  formData.append('order', order);

  const res = await fetch('http://localhost:8080/api/orders', {
    method: 'POST',
    body: formData
  });

  const data = await res.json();
  if (data.status === true) {
    getOrders();
  }
}

async function deleteOrder(id) {
  const res = await fetch(`http://localhost:8080/api/orders/${id}`, {
    method: 'DELETE'
  });

  const data = await res.json();
  if (data.status === true) {
    getOrders();
  }
}

function selectOrder(id, name, order) {
  currentId = id;
  document.getElementById('edit-name').value = name;
  document.getElementById('edit-order').value = order;
}

async function updateOrder() {
  console.log(currentId);
  const name = document.getElementById('edit-name').value,
    order = document.getElementById('edit-order').value;
  const data = {
    name: name,
    order: order
  };
  const res = await fetch(`http://localhost:8080/api/orders/${currentId}`, {
    method: "PATCH",
    body: JSON.stringify(data)
  });

  const resData = await res.json();
  if (resData.status === true) {
    getOrders();
  }
}