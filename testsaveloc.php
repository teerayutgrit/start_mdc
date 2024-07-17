<!DOCTYPE html> 
<html lang="en"> 

<head> 
	<link href= 
"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
		rel="stylesheet"> 
	<script src= 
"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"> 
	</script> 
</head> 

<body> 
	<div class="container"> 
		<h1 class="text-success"> 
			GeeksforGeeks 
		</h1> 
		<h2> 
			Multiple Selection Dropdown with Checkbox 
		</h2> 

		<div class="dropdown"> 
			<button class="btn btn-success dropdown-toggle"type="button" id="multiSelectDropdown"data-bs-toggle="dropdown" aria-expanded="false"> Select </button> 
			<ul class="dropdown-menu" aria-labelledby="multiSelectDropdown"><li> 
				<label><input type="checkbox"value="Java"> Java</label></li> 
				<li> 
				<label> <input type="checkbox" value="C++"> C++</label> 
				</li> 
				<li> 
				<label> <input type="checkbox" value="Python"> Python </label> 
				</li> 
			</ul> 
		</div> 
	</div> 

	

	<script> 
		const chBoxes = 
			document.querySelectorAll('.dropdown-menu input[type="checkbox"]'); 
		const dpBtn = 
			document.getElementById('multiSelectDropdown'); 
		let mySelectedListItems = []; 

		function handleCB() { 
			mySelectedListItems = []; 
			let mySelectedListItemsText = ''; 

			chBoxes.forEach((checkbox) => { 
				if (checkbox.checked) { 
					mySelectedListItems.push(checkbox.value); 
					mySelectedListItemsText += checkbox.value + ', '; 
				} 
			}); 

			dpBtn.innerText = 
				mySelectedListItems.length > 0 
					? mySelectedListItemsText.slice(0, -2) : 'Select'; 
		} 

		chBoxes.forEach((checkbox) => { 
			checkbox.addEventListener('change', handleCB); 
		}); 
	</script> 
</body> 

</html>
