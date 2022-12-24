var projectenMenu = document.querySelectorAll('.project-menu li');
var projectParent = document.querySelector('.projecten');
var visualisatieProjecten = projectParent.querySelectorAll('.Visualisatie');
var InterieurontwerpProjecten = projectParent.querySelectorAll('.Interieurontwerp');


function SetActive(clicked)
{
	projectenMenu.forEach(listItem => {
		if(listItem === clicked)
		{
			listItem.classList.add("active");
			SetRightProjectsActive(listItem);
		}
		else
		{
			listItem.classList.remove("active");
		}
	});
}

function SetRightProjectsActive(listItem)
{
	if(listItem.classList.contains('All'))
	{
		showElements(visualisatieProjecten);
		showElements(InterieurontwerpProjecten);
	}
	else if(listItem.classList.contains('Visualisatie'))
	{
		showElements(visualisatieProjecten);
		hideElements(InterieurontwerpProjecten);
	}
	else if(listItem.classList.contains('Interieurontwerp'))
	{
		showElements(InterieurontwerpProjecten);
		hideElements(visualisatieProjecten);
	}
}

function hideElements(array)
{
	array.forEach(p => {
		p.classList.add("hide")
	});
}

function showElements(array)
{
	array.forEach(p => {
		p.classList.remove("hide")
	});
}

projectenMenu.forEach(listItem => {
	listItem.addEventListener("click",function() {  SetActive(listItem)});
});