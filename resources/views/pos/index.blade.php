<!DOCTYPE html>
<html>
<head>
	<title>POS Page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<style type="text/css">
		.item {
			padding: 10px;
			cursor: pointer;
		}

		.item:hover {
			background-color: #eceef1;
		}
	</style>
</head>
<body>
	<!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar navbar-expand-sm bg-primary">
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <form method="get">
      	<input type="text" name="s" class="form-control" placeholder="Enter searching ..." style="width: 350px">
      </form>
    </li>
  </ul>

</nav>
<div class="container">
	<div class="row">
		<div class="col-md-5" style="background-color: #eceef1">
			<table class="table table-bordered table-striped bg-white table-responsive">
				<thead>
					<tr>
						<th>Thumbnail</th>
						<th>Title</th>
						<th>Num</th>
						<th>Price</th>
						<th>Total</th>
						<th></th>
					</tr>
				</thead>
				<tbody id="card_list">

				</tbody>
			</table>
			<div class="row bg-white" style="margin: 5px;">
				<div class="col-md-8">
					Total Money:
				</div>
				<div class="col-md-4" style="float: right; margin-bottom: 20px;" id="total_money">
				</div>
				<div class="col-md-8">
					Input Money:
				</div>
				<div class="col-md-4" style="float: right; margin-bottom: 20px;">
					<input type="number" name="cash" value="" class="form-control">
				</div>
				<div class="col-md-8">
					Cashback:
				</div>
				<div class="col-md-4" style="float: right; margin-bottom: 20px;" id="cashback">
				</div>
			</div>

			{{-- <div class="col-md-12"> --}}
				<button class="btn btn-success" style="width: 100%; font-size: 20px;" onclick="submitOrder()">Save</button>
			{{-- </div> --}}
		</div>
		<div class="col-md-7">
			<div class="row" id="data_list">
				@foreach($dataList as $item)
					<div class="col-md-4 item" style="text-align: center;" field-thumbnail="{{ $item->thumbnail }}" field-price="{{ $item->price }}" field-title = "{{ $item->title }}" field-id = "{{ $item->id }}">
						<img src="{{ $item->thumbnail }}" style="width: 100%;">
						<p>{{ $item->category_name }}</p>
						<p style="font-weight: bold;">{{ $item->title }}</p>
						<p style="color: red">{{ number_format($item->price) }} vnd</p>
					</div>
				@endforeach
			</div>
			{{ $dataList->links() }}
		</div>
	</div>
</div>
{{-- cookie & session & localStorage (JS) --}}
<script type="text/javascript">
	var cartList = []
	var totalMoney = 0

	$(function() {
		var json = localStorage.getItem('cartList')
		if(json != null && json != '') {
			cartList = JSON.parse(json)
			showCart()
		}

		$('.item').click(function() {
			var id = $(this).attr('field-id')
			var thumbnail = $(this).attr('field-thumbnail')
			var title = $(this).attr('field-title')
			var price = $(this).attr('field-price')

			var isFind = false

			for(i=0;i<cartList.length;i++) {
				if(cartList[i].id == id) {
					cartList[i].num++
					isFind = true
					break
				}
			}

			if(!isFind) {
				cartList.push({
					'id': id,
					'thumbnail': thumbnail,
					'title': title,
					'price': price,
					'num': 1
				})
			}

			showCart()
		})

		$('[name=cash]').keyup(function() {
			cash = $(this).val()
			cashback = cash - totalMoney
			$('#cashback').html(cashback)
		})
	})

	function showCart() {
		$('#card_list').empty()

		for(i=0;i<cartList.length;i++) {
			money = cartList[i].price * cartList[i].num
			$('#card_list').append(`<tr>
						<td><img src="${cartList[i].thumbnail}" style="width: 90px"/></td>
						<td>${cartList[i].title}</td>
						<td><input type="number" onchange="changeAmount(this, ${cartList[i].id})" class="form-control" value="${cartList[i].num}" style="width: 60px"/></td>
						<td>${cartList[i].price}</td>
						<td name="total_money">${money}</td>
						<td><button class="btn btn-danger" onclick="deleteItem(${cartList[i].id})">X</button></td>
					</tr>`)
			totalMoney += money
		}

		localStorage.setItem('cartList', JSON.stringify(cartList))
		$('#total_money').html(totalMoney)
	}

	function changeAmount(that, productId) {
		var currentAmount = $(that).val()
		for(i=0;i<cartList.length;i++) {
			if(cartList[i].id == productId) {
				cartList[i].num = currentAmount
				//update giao dien
				money = currentAmount * cartList[i].price
				// console.log($(that).parent().parent().html())
				// console.log($(that).parent().parent().find('[name=total_money]').html())
				$(that).parent().parent().find('[name=total_money]').html(money)
				break
			}
		}
		localStorage.setItem('cartList', JSON.stringify(cartList))
		// showCart();
	}

	function deleteItem(id) {
		for(i=0;i<cartList.length;i++) {
				if(cartList[i].id == id) {
					cartList.splice(i, 1)
					break
				}
			}

		showCart();
	}

	function submitOrder() {
		var json = localStorage.getItem('cartList')
		if(json != null && json != '') {
			$.post('{{ route('pos_save') }}', {
				data: json,
				total_money: totalMoney,
				'_token': '{{ csrf_token() }}'
			}, function(data) {
				alert(data)
				localStorage.removeItem('cartList')
				location.reload()
			})
		}
	}
</script>
</body>
</html>