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

<h1 style="margin: 25px 25px 15px 15px">Управление заказами</h1>

<div class="row" style="margin: 25px 25px 15px 15px">
  <div class="col-4">
      <h3>Добавить заказ</h3>
      <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" class="form-control" id="name">
      </div>
      <div class="form-group">
        <label for="order">Заказ</label>
        <textarea type="text" class="form-control" id="order"></textarea>
      </div>
      <button class="btn btn-primary" style="margin-top: 5px" onclick=addOrder()>Добавить заказ</button>
  </div>
  <div class="col-4">
      <h3>Редактировать заказ</h3>
      <div class="form-group">
        <label for="edit-name">Имя</label>
        <input type="text" class="form-control" id="edit-name">
      </div>
      <div class="form-group">
        <label for="edit-order">Заказ</label>
        <textarea type="text" class="form-control" id="edit-order"></textarea>
      </div>
      <button class="btn btn-primary" style="margin-top: 5px" onclick=updateOrder()>Изменить заказ</button>
  </div> 
</div>

<script src="./main.js"></script>
</body>
</html>