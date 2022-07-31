let offre_samed1= document.getElementById("offre_samed1");
let offre_samed2= document.getElementById("offre_samed2");
let offre_samed3= document.getElementById("offre_samed3");
let offre_samed4= document.getElementById("offre_samed4");
let offre_samed5= document.getElementById("offre_samed5");
let offre_samed6= document.getElementById("offre_samed6");
let valeur="";

offre_samed1.addEventListener("click", function(){

	if(offre_samed1.checked)
	{
		valeur= offre_samed1.value;
		document.getElementById('pack').value=valeur;
	}

});
offre_samed2.addEventListener("click", function(){

	if(offre_samed2.checked)
	{
		valeur= offre_samed2.value;
		document.getElementById('pack').value=valeur;
	}

});
offre_samed3.addEventListener("click", function(){

	if(offre_samed3.checked)
	{
		valeur= offre_samed3.value;
		document.getElementById('pack').value=valeur;
	}

});
offre_samed4.addEventListener("click", function(){

	if(offre_samed4.checked)
	{
		valeur= offre_samed4.value;
		document.getElementById('pack').value=valeur;
	}

});
offre_samed5.addEventListener("click", function(){

	if(offre_samed5.checked)
	{
		valeur= offre_samed5.value;
		document.getElementById('pack').value=valeur;
	}

});
offre_samed6.addEventListener("click", function(){

	if(offre_samed6.checked)
	{
		valeur= offre_samed6.value;
		document.getElementById('pack').value=valeur;
	}

});

