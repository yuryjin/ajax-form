<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>


	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


	<style>
		.container-form {
			margin: 300px 0px 0px 500px;
			height: 500px;
			width: 300px;
			background-color: #eeeeee;
		}

		.container-for {
			margin-top: 300px;
			max-height: 1000px;
			max-width: 600px;
			background-color: #eeeeee;
		}
	</style>


</head>

<body>



	<!--
	<div class="container container-form">
		<div class="formdiv">
			<form action="">
				<div class="text-center"><h4>Форма обратной связи</h4></div>
				<label>Brand:<input type="text" name="brand" size="15" required></label>
				<label>Brand:<input type="text" name="brand" size="15" required></label>
				<label>Brand:<input type="text" name="brand" size="15" required></label>
			</form>
		</div>
	</div>
	-->

	<div class="container container-for">
		<div class="formdiv p-3">
			<form name="submit-form" id="formsubmit">
				<div class="text-center">
					<h3>
						Форма обратной связи
					</h3>
				</div>
				<div class="form-group">
					<label for="NameInput">Имя</label>
					<input name="name" type="text" class="form-control" id="NameInput" aria-describedby="NameInputAria"
						placeholder="Введите ваше имя" required>
				</div>
				<div class="form-group">
					<label for="phoneInput">Телефон</label>
					<input name="phone" type="tel" class="form-control" id="phoneInput"
						aria-describedby="phoneInputAria" placeholder="Введите ваш телефон"
						required>
				</div>
				<div class="form-group">
					<label for="emailInput">Email</label>
					<input name="email" type="email" class="form-control" id="emailInput"
						aria-describedby="emailInputAria" placeholder="Введите вашу почту"
						required>
				</div>
				<div class="form-group">
					<label for="fileInput">Приложенные файлы</label>
					<input name="files" type="file" class="form-control" id="fileInput" aria-describedby="fileInputAria"
						placeholder="Приложите файлы" multiple>
				</div>
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="formCheck" required>
					<label class="form-check-label" for="formCheck">Согласие на обработку персональных данных</label>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-primary">Отправить</button>
				</div>

			</form>

			<!--
			<div class="text-center">
				<button onclick="submitForm();" class="btn btn-primary">Отправить 2</button>
			</div>
-->
		</div>
	</div>



	<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
		integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


	<script>
		$(function () {

			$('form').on('submit', function (e) {

				e.preventDefault();

				//console.log($('files').val);

				var obj = {
				files: document.getElementById("fileInput").files || []
			}
			//console.log(obj);

				var files_arr_string = "";

				for (let index = 0; index < obj.files.length; index++) {
					//const element = array[index];
					//console.log(obj.files[index].name);
					files_arr_string += obj.files[index].name + ",\n";
					
				}
				console.log(files_arr_string);

				$.ajax({
					type: 'post',
					url: 'send.php',
					//data: $('form').serialize(),
					data: ({"name": $('input[name=name]').val(), 
					"phone": $('input[name=phone]').val(),
					"email": $('input[name=email]').val(),
					"files": files_arr_string
					
					
					}),
					success: function () {
						console.log('form was submitted');
					}
				});

				console.log("success");

			});

		});




		/*
			$('form').submit(printObj);

			function printObj(e) {
				e.preventDefault();
				var obj = {
					name: $('input[name=name]').val(),
					phone: $('input[name=phone]').val(),
					email: $('input[name=email]').val(),
					files: document.getElementById("fileInput").files || []
				}
				console.log(obj);
			}

			function submitForm() {
				alert("yyy");
			}
			*/
	</script>


</body>

</html>