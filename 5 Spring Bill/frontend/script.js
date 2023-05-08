let ans = fetch("http://localhost:8080/electricity/calculateBill/233")
    .then((res) => {
		return res.json();
	}).then((json)=>{
		document.getElementById("bill").innerHTML = json;
	})
    
