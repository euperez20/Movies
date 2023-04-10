/******w**************
    
    Assignment 4 Javascript
    Name: Eunice Perez
    Date: February 12, 2023
    Description: Program to search parks and spaces in Winnipeg City from dataset

*********************/



window.onload = function() {
  var form = document.getElementById('search-form');
  form.addEventListener('submit', async (event) => {  
  event.preventDefault(); 

  // Get data from the form
  const neighbourhoodtext = document.getElementById('text_neighbourhood').value;

  // Build API URL with form data
   const apiUrl = `https://data.winnipeg.ca/resource/tx3d-pfxq.json?$where=lower(neighbourhood) like lower('%${neighbourhoodtext}%')`
                  + '&$order=park_name DESC' +
                    '&$limit=100';

  let encodedURL = encodeURI(apiUrl); 

  // Call the API
  try {
    var response = await fetch(encodedURL);
    var data = await response.json();
    // Clear results before displaying new results
    clearResults();
    displayResults(data);
  } catch (error) {
    console.error(error);

  }

});

// Clean  results
function clearResults() {
  const resultsContainer = document.getElementById("results");
  
  while (resultsContainer.firstChild) {
    resultsContainer.removeChild(resultsContainer.firstChild);
  }
  
  const main = document.getElementById("search-container");
  const h1 = document.querySelector("h1");
  if (h1) {
    main.removeChild(h1);
  }
  
  const table = document.querySelector("table");
  if (table) {
    main.removeChild(table);
  }
}

// Display results in the form
const displayResults = (data) => {
  const resultsContainer = document.getElementById('results'); 
 
  // Display message when no results 
  if (!data.length) {
    resultsContainer.innerHTML = 'No results found.'; 
    return;

  }

  // Create table       
  const main = document.getElementById("search-container");
  const h1 = document.createElement("h1");
  const table = document.createElement("table");
  const tableHead = document.createElement("thead");
  const tableHeadRow = document.createElement("tr");
  const tableBody = document.createElement("tbody");    

// Assign values  
  main.appendChild(h1);
  main.appendChild(table);
  table.appendChild(tableHead);
  tableHead.appendChild(tableHeadRow);
  table.appendChild(tableBody);

  // Add table headers
  const headers = ["ID", "Park Name", "Location", "Category", "District", "Neighbourhood"];
  headers.forEach(header => {
  const th = document.createElement("th");
  th.innerHTML = header;
  tableHeadRow.appendChild(th);
  });

  // Add table rows
  data.forEach(item => {
    const tableRow = document.createElement("tr");
    tableBody.appendChild(tableRow);
    const values = [item.park_id, item.park_name, item.location_description, item.park_category, item.district, item.neighbourhood];
    values.forEach(value => {
    const td = document.createElement("td");
    td.innerHTML = value;
    tableRow.appendChild(td);

  });

});

}

}