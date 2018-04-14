<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Students</title>
	<link rel="stylesheet" href="/template/css/style.css">
	<link rel="stylesheet" href="/template/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<table class="table table-hover table-dark">
			  <thead>
			    <tr>
			      <th scope="col">№</th>
			      <th scope="col">Ім’я</th>
			      <th scope="col">Фамілія</th>
			      <th scope="col">Група</th>
			      <th scope="col" class="centr">Операції</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr class="tall">
			      <th scope="row">1</th>
			      <td>Владислав</td>
			      <td>Понич</td>
			      <td>PI</td>
			      <td class="centr">
			      	<button type="button" class="dete-btn btn btn-primary btn-sm red">Видалити</button>
					<button type="button" class="btn btn-secondary btn-sm">Редагувати</button>
				</td>
			    </tr>
			    <tr class="tall">
			      <th scope="row">2</th>
			      <td>Віктор</td>
			      <td>Руснак</td>
			      <td>KSM</td>
			      <td class="centr">
			      	<button type="button" class="dete-btn btn btn-primary btn-sm red">Видалити</button>
					<button type="button" class="btn btn-secondary btn-sm">Редагувати</button>
				</td>
			    </tr>
			    <tr class="tall">
			      <th scope="row">3</th>
			      <td>Віталій</td>
			      <td>Борніцький</td>
			      <td>KI</td>
			      <td class="centr">
			      	<button type="button" class="dete-btn btn btn-primary btn-sm red">Видалити</button>
					<button type="button" class="btn btn-secondary btn-sm">Редагувати</button>
				</td>
			    </tr>
			  </tbody>
			</table>
		</div>
	</div>
    <script src="/template/scripts/jquery-3.3.1.min.js"></script>
    <script>
        $(function () {
            $btn = $(".dete-btn");
            $btn.click(function () {
                $(this).parents('tr').hide("slow");
            });
        });
    </script>
</body>
</html>
