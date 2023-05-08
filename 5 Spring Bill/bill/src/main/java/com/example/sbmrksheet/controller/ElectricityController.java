package com.example.sbmrksheet.controller;

import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.RestController;


@RestController
@RequestMapping("/electricity")
@CrossOrigin(origins = {"http://localhost:8080/", "http://127.0.0.1:8080/"})
public class ElectricityController {

	@PostMapping("/test")
	public String postBody(@RequestBody String name){
		return "Hello " + name;
	}

	@GetMapping("/calculateBill/{unitsUsed}")
	public @ResponseBody String calculateBillAmount(@PathVariable("unitsUsed") int unitsUsed) {
		float cost = 0;

		if (unitsUsed <= 50) {
			cost = (float) (unitsUsed * 3.5);
		} 
		else if (unitsUsed <= 150) {
			cost = (float) (50 * 3.5 + (unitsUsed - 50) * 4.0);
		} 
		else if (unitsUsed <= 250) {
			cost = (float) (50 * 3.5 + 100 * 4.0 + (unitsUsed - 150) * 5.2);
		} 
		else {
			cost = (float) ((50 * 3.5) + (100 * 4.0) + (100 * 5.2) + ((unitsUsed - 250) * 6.5));
		}

		return cost+"";
	}

}
