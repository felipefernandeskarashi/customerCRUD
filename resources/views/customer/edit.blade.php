	<h1> Edit Customer {{ $customer->name }}</h1>


<form action="\customers\{{ $customer->id }}" method="post">

@method('PUT')

	@include('customer.form')

	 <button> Save Customer </button>
</form>